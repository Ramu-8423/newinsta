<?php
// error_reporting(E_ERROR | E_WARNING);
// //Display errors on the web page
// ini_set('display_errors', 1);

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
session_start();
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$url = env('APP_URL', 'default_value');
$database = env('DB_DATABASE');
$username = env('DB_USERNAME');
$db_password = env('DB_PASSWORD');

$conn = mysqli_connect('localhost',$username,$db_password,$database);

$table_headers = [];
$table_data = [];
$ver_charge_name ='Verification';

if (isset($_POST['submit'])) {
    $filename = $_FILES['excel_file']['name'];
    $project = $_POST['project'];
    
    
    $client_id = $_POST['client_id'];
    $login_client_pay_type = $_POST['login_client_pay_type'];
    $ver_charge_name = $project==1?'Address Verification':($project==2?'Site Investigation':'Digital Address Verification');
    $row_det = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `client_details` WHERE `id`=$client_id"));
    
    if($row_det['status']==0){
         echo "<script>
                      alert('Can not process your  request! Please contact to admin.');
                                window.location.href = '".$url."newallocation';
                      </script>";
                 exit;
    }
 
    $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['excel_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        
        $data = $spreadsheet->getActiveSheet()->toArray();
        $data = array_filter($data, function ($row) {
                return !empty(array_filter($row));
           });
           //echo "<pre>";print_r($data);echo "</pre>";
           //die;
        $table_headers = $data[0]; // First row as table headers
        $table_data = array_slice($data, 1); // Remaining rows as table data
        
        if($row_det['payment_preference']==2){
            $_SESSION['table_data'] = $table_data;
             $row_count = count($table_data);
             $_SESSION['session_row_count']=$row_count;
        }else{
             $wallet = $row_det['wallet'];
             $address_ver_charge = $row_det['address_charge'];
             $site_ver_charge = $row_det['site_charge'];
             $digital_ver_charge = $row_det['digital_charge'];
             $ver_charge = $project==1?$address_ver_charge:($project==2?$site_ver_charge:$digital_ver_charge);
            
             
             if($ver_charge<=0||$ver_charge==null){
                  echo "<script>
                                alert('Please contact to admin to update your ".$ver_charge_name." charge.');
                                window.location.href = '".$url."newallocation';
                              </script>";
                              exit;
             }
             
           if($wallet<=0){
                 echo "<script>
                            alert('Can not upload! Insufficient Balance!');
                            window.location.href ='".$url."newallocation';
                          </script>";
                          exit;
           }
           
             $row_can_insert = floor($wallet/$ver_charge);
             $row_count = count($table_data);
             
             
            if($row_count<=$row_can_insert){
                 $_SESSION['table_data'] = $table_data;
                 $_SESSION['update_balance']=$row_count*$ver_charge;
                 $_SESSION['session_row_count']=$row_count;
            }else{
                  if ($row_can_insert <= 0) {
                        echo "<script>
                                alert('Can not upload! Insufficient Balance! Cost per verification is " . $ver_charge . " ₹');
                                window.location.href = '".$url."newallocation';
                              </script>";
                              exit;
                            }

                 $_SESSION['table_data'] = array_slice($table_data,0,$row_can_insert);
                 $_SESSION['update_balance']=$row_can_insert*$ver_charge;
                 $_SESSION['session_row_count']=$row_can_insert;
                // $_SESSION['not_inserted_record']=array_slice($table_data,$row_can_insert);
            }
            
            
        }
        
        $_SESSION['table_headers'] = $table_headers;
       // $_SESSION['location'] = $location;
        $_SESSION['project'] = $project;
        $_SESSION['client_id'] = $client_id;
        $table_data =  $_SESSION['table_data'];
    } else {
        echo "Upload a valid file!.";
    }
}


if (isset($_POST['upload'])) {
    
    date_default_timezone_set('Asia/Kolkata');
           $datetime = date('Y-m-d H:i:s');
    
    $table_headers = $_SESSION['table_headers'];
    $table_data = $_SESSION['table_data'];
   // $location = $_SESSION['location'];
    $project = $_SESSION['project'];
    $client_id = $_SESSION['client_id'];
    $update_balance = $_SESSION['update_balance'];
    $session_row_count =  $_SESSION['session_row_count'];
    
    
//     echo "<pre>";print_r($table_data);echo "</pre>";
//   die;
//   echo 'project-'.$project.' client- '.$client_id.' update_balance- '.$update_balance.' roecount - '.$session_row_count;
//   die;
 // Employee_id,Candidate_name,Mobile_number,Email_id,Father_name,Mother_name, Address_type, Address,City,State,Pincode,Period_of_stay_from,Period_of_stay_to
        

      if($project == 1 || $project == 3 ){
 foreach ($table_data as $row) {
        $stmt = $conn->prepare("INSERT INTO case_details (
         client_id,project_type,location,employee_id,candidate_name,mobile,email,father_name,mother_name,address_type,address,city,state,pincode,period_of_stay_from,period_of_stay_to,created_at
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        
        // $case_id = rand(100000, 999999);
        $stmt->bind_param(
            "sssssssssssssssss", 
            $client_id,$project,$row[0], $row[1], $row[2], $row[3], $row[4], 
            $row[5], $row[6], $row[7], $row[8], $row[9], 
            $row[10], $row[11], $row[12], $row[13],$datetime
        );
        if (!$stmt->execute()) {
            echo "<script>
                alert('Something went wrong! ".$stmt->error."');
                window.location.href = '".$url."newallocation';
              </script>";
           exit;
        }
        
    }
      }else if($project == 2){
          
          //echo "<pre>"; print_r($table_data);echo "</pre>";
          //die;
           foreach ($table_data as $row) {
        $stmt = $conn->prepare("INSERT INTO case_details (
         client_id,project_type,location,employee_id,site_vendor_name,mobile,email,address_type,address,city,state,pincode,period_of_stay_from,period_of_stay_to,gst_number,pan_card_num,contact_person_name,contact_person_desi,created_at
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        
        // $case_id = rand(100000, 999999);
        $stmt->bind_param(
            "sssssssssssssssssss", 
            $client_id,$project,$row[0], $row[1], $row[2], $row[3], $row[4], 
            $row[5], $row[6], $row[7], $row[8], $row[9], 
            $row[10], $row[11], $row[12], $row[13],$row[14],$row[15],$datetime
        );
      
        if (!$stmt->execute()) {
            echo "<script>
                alert('Something went wrong! ".$stmt->error."');
                window.location.href = '".$url."newallocation';
              </script>";
           exit;
        }
        
    }
          
      }
      $wallet_update = mysqli_query($conn,"UPDATE `client_details` SET `wallet`=`wallet`-$update_balance where id=$client_id");
      $upload_case_history = mysqli_query($conn,"INSERT INTO `case_upload_count`(`client_id`, `project_type`, `case_count`,`created_at`) VALUES ('$client_id','$project','$session_row_count','$datetime')");
      $trs_history = mysqli_query($conn,"INSERT INTO `client_transaction`(`client_id`,`amount`,`type`,`status`,`created_at`) VALUES ('$client_id','$update_balance','2','1','$datetime')");
      
     echo "<script>
                alert('File uploaded successfully!');
                window.location.href = '".$url."newallocation';
              </script>";
       exit;

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $ver_charge_name; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4"><?php echo $ver_charge_name; ?></h2>
    <table class="table table-bordered" style="white-space: nowrap;>
        <thead class="thead-dark">
            <tr>
                <?php foreach ($table_headers as $header): ?>
                    <th><?php echo htmlspecialchars($header); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($table_data as $row): ?>
                <tr>
                    <?php foreach ($row as $cell): ?>
                        <td><?php echo htmlspecialchars($cell); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
    <!-- Back and Cancel buttons -->
    <div class="d-flex justify-content-center mt-4">
        <form action="allocation_preview.php" method="POST">
            <button type="submit" name="upload" class="btn btn-secondary">Upload</button>
            <button type="button" class="btn btn-danger ml-5" onclick="window.location.href='<?php echo $url;?>newallocation'">Cancel</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



