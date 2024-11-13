<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Verification Report</title>
    <style>
   body {
    font-family: 'Times New Roman', serif;
    margin: 0;
    padding: 0;
    background-color: #fff;
}

.container {
    width: 100%; /* Utilize full width for A4 page */
    max-width: 750px; /* Limit width for readability */
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #000;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    page-break-inside: avoid; /* Prevent breaking inside elements */
}

.header-section {
    display: flex; /* Flexbox layout for alignment */
    justify-content: center; /* Center content horizontally */
    align-items: center; /* Center content vertically */
    margin-bottom: 20px; /* Reduced space for A4 fitting */
    padding: 10px 0; /* Padding for spacing */
    gap: 20px; /* Space between the logo and text */
    flex-wrap: wrap; /* Allow content to wrap on smaller screens */
}

.company-logo {
    display: flex; /* Flexbox for centering */
    justify-content: center; /* Center the logo horizontally */
    align-items: center; /* Center the logo vertically */
    flex: 1 1 auto; /* Allow the logo to grow and shrink */
    max-width: 200px; /* Smaller max width for A4 fitting */
    text-align: center; /* Center text if any */
}

.company-logo img {
    max-width: 100%; /* Ensure image scales properly */
    height: auto; /* Maintain aspect ratio */
}

.report-summary {
    flex: 1 1 auto; /* Allow text to grow and shrink */
    max-width: 400px; /* Maximum width for text container */
    text-align: center; /* Center align text */
}

.report-summary table {
    width: 100%; /* Full width of the container */
    table-layout: auto; /* Ensure table width is dynamic */
    border-collapse: collapse; /* Collapse borders for neat look */
}

.report-summary th, .report-summary td {
    padding: 5px 10px; /* Padding for cells */
    text-align: left; /* Align text to the left */
    border: 1px solid #000; /* Add border */
}

.report-summary th {
    background-color: #f2f2f2; /* Background color for headers */
    font-weight: bold; /* Bold text for headers */
}

h1, h2 {
    font-size: 16px; /* Slightly smaller for A4 fitting */
    color: #000;
    text-transform: uppercase;
    margin: 10px 0; /* Reduced margin for A4 fitting */
    text-align: center;
}

.report-details {
    width: 100%;
    margin-bottom: 15px; /* Reduced margin for fitting */
    border-collapse: collapse;
}

.report-details th, .report-details td {
    border: 1px solid #000;
    padding: 8px; /* Reduced padding for A4 fitting */
    text-align: left;
}

.report-details th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.image-section {
    margin: 10px 0; /* Reduced margin for A4 fitting */
    text-align: center;
}

.image-section img {
    max-width: 100%; /* Use full width */
    height: auto; /* Maintain aspect ratio */
    margin: 0 auto; /* Center align */
}

.signature-section {
    margin-top: 30px; /* Reduced margin for A4 fitting */
    text-align: center;
}

.signature-section img {
    max-width: 150px;
    height: auto;
}

.footer {
    text-align: center;
    margin-top: 30px; /* Reduced margin for A4 fitting */
    font-size: 12px;
    color: #555;
}


/*css for button */
.button-container {
    display: flex;
    justify-content: center; /* Align buttons to the right */
    gap: 15px; /* Increased spacing between buttons */
    margin-right: 20px; /* Optional: Add some margin to the right side of the container */
}

.btn-reject {
    background-color: #ff6347; /* Tomato color */
    color: white;
    border: none;
    padding: 15px 30px; /* Larger button size */
    font-size: 18px; /* Larger font size */
    border-radius: 8px;
    cursor: pointer;
}

.btn-complete {
    background-color: #20b2aa; /* Light Sea Green color */
    color: white;
    border: none;
    padding: 15px 30px; /* Larger button size */
    font-size: 18px; /* Larger font size */
    border-radius: 8px;
    cursor: pointer;
}

.btn-reject:hover, .btn-complete:hover {
    opacity: 0.9; /* Subtle transparency on hover */
    transform: scale(1.05); /* Slight scale effect on hover */
    transition: transform 0.2s;
}




.page-break {
    page-break-before: always;
}

@media print {
    body {
        margin: 0;
        padding: 0;
        background-color: #fff;
    }

    .container {
        width: 100%;
        border: none;
        box-shadow: none;
        padding: 0;
        margin: 0;
        max-width: 100%; /* Use full width for printing */
    }

    .header-section, .footer {
        page-break-after: avoid; /* Avoid breaks after headers */
    }

    .page-break {
        page-break-before: always;
    }
    

}
</style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="company-logo">
                <img src="https://via.placeholder.com/150x50.png?text=Company+Logo" alt="Company Logo">
            </div>
            <div class="report-summary">
                <table>
                    <tr>
                        <th scope="col">Company Name</th>
                        <td scope="col">Founder Code Technology</td>
                    </tr>
                    <tr>
                        <th scope="col">Company Ref. Num</th>
                        <td scope="col">12334 Q S D DWQdq 5</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Report Summary -->
        <h1>Vendors Details</h1>

        <!-- Applicant Details -->
        <table class="report-details">
            <tr>
                <th>Vendor_ID</th>
                <td>00070</td>
                <th>Vendor Name</th>
                <td>XYZ Corporation</td>
            </tr>
            <tr>
                <th>Remark</th>
                <td>Good</td>
                <th>Sign </th>
                <td><img src="https://via.placeholder.com/150x50.png?text=sign" alt="sign"></td>
            </tr>
            <!--<tr>-->
            <!--    <th>Case Start Date</th>-->
            <!--    <td>12-May-2024</td>-->
            <!--    <th>Employee ID</th>-->
            <!--    <td>1110</td>-->
            <!--</tr>-->
        </table>

        <!-- Case Details Table -->
        <h2>Site Details</h2>
        <table class="report-details">
            <tr>
                <th>Address Type</th>
                <td>Permanent</td>
                <th>Address</th>
                <td>1/798 Lucknow</td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td>9999977567</td>
                <th>Email</th>
                <td>instalocate@gmail.com</td>
            </tr>
            <tr>
                <th>State</th>
                <td>Uttar Pradesh</td>
                <th>City</th>
                <td>Lucknow</td>
            </tr>
            <tr>
                <th>Pin Code</th>
                <td>226010</td>
                <th>Pan Card Number</th>
                <td>XXXXX0000X</td>
            </tr>
            <tr>
                <th>Stay From</th>
                <td>28 July 2022</td>
                <th>Stay To</th>
                <td>30 Aug 2030</td>
            </tr>
            <tr>
                <th>Contact Person Name</th>
                <td>XYZZZ</td>
                <th>Contact Person Designation</th>
                <td>XYZZZZ</td>
            </tr>
            <tr>
                <th>Site Vendor Name</th>
                <td>XYZZZZZZ</td>
                <th>GST NO.</th>
                <td>1234567890fdgshdj</td>
            </tr>
        </table>

        <!-- Respondent Information Table -->
        <h2>Verification Details</h2>
        <table class="report-details">
            <tr>
                <th>Permises Type</th>
                <td>XXXXXXX</td>
                <th>Tenure Since</th>
                <td>XXXXXXXX</td>
            </tr>
            <tr>
                <th>Tenure To</th>
                <td>XXXXXXX</td>
                <th>Site Type</th>
                <td>XXXXXXXXX</td>
            </tr>
            <tr>
                <th>Neighbour Check 1</th>
                <td>XXXXXXX</td>
                <th>Neighbour Check 2</th>
                <td>XXXXXXXXX</td>
            </tr>
            <tr>
                <th>Landmark</th>
                <td>XXXXXXX</td>
                <th>Security Confirmation</th>
                <td>XXXXXXXXX</td>
            </tr>
            <tr>
                <th>Name Of The Sign Board</th>
                <td>XXXXXXX</td>
                <th>Name Of Partners</th>
                <td>XXXXXXXXX</td>
            </tr>
            <tr>
                <th>Is Owner Call Before?</th>
                <td>Yes/No</td>
                
            </tr>
            <tr>
                <th>Was The Mobile Number Is Correect</th>
                <td>Yes/NO</td>
                
            </tr>
            <tr>
                <th>Documents Verification Details</th>
                <td>Yes/No</td>
                
            </tr>
            <tr>
                <th>Who Approached Them From Lombard</th>
                <td>XXXXXXX</td>
                
            </tr>
            <tr>
                <th>In Past You have done business with 
                the Lombard</th>
                <td>Yes/NO</td>
            </tr>
            <tr>
                <th>In your company ever black listed 
                with other company or establishment</th>
                <td>yes/No</td>
                
            </tr>
            <tr>
                <th>In any of your relative or friend working 
                with lombard</th>
                <td>yes/No</td>
                
            </tr>
            <tr>
                <th>Hash and action been initiated by law 
                enforcement against your company</th>
                <td>yes/No</td>
                
            </tr>
            <tr>
                
                <th>Final Comment</th>
                <td>XXXXXXXXX</td>
                <th>Stamp & Signature of client/company</th>
                <td><img src="https://via.placeholder.com/150x50.png?text=sign" alt="sign"></td>
            </tr>
            <tr>
                <th>IL Manager Name:</th>
                <td>XXXXXXX</td>
                <th>Seal And Signature</th>
                <td><img src="https://via.placeholder.com/150x50.png?text=sign" alt="sign"></td>
            </tr>
            <tr>
                <th>Date</th>
                <td>22 July 2024</td>
                <th>Sarveyor's Name</th>
                <td>XXXXXXXXX</td>
            </tr>
            <tr>
                
                <th>Date</th>
                <td>30 August 2024</td>
                <th>Signature</th>
                <td><img src="https://via.placeholder.com/150x50.png?text=sign" alt="sign"></td>
            </tr>
            
        </table>

        <!-- Residence Details -->
        <!--<h2>Residence Details</h2>-->
        <!--<table class="report-details">-->
        <!--    <tr>-->
        <!--        <th>Residence Status</th>-->
        <!--        <td>Permanent</td>-->
        <!--        <th>Residence Type</th>-->
        <!--        <td>Owned</td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <th>Stay Period From</th>-->
        <!--        <td>01 January 2015</td>-->
        <!--        <th>Stay Period To</th>-->
        <!--        <td>Present</td>-->
        <!--    </tr>-->
        <!--</table>-->

        <!-- Address Breakdown -->
        <!--<h2>Address Breakdown</h2>-->
        <!--<table class="report-details">-->
        <!--    <tr>-->
        <!--        <th>House</th>-->
        <!--        <td>123 Main St</td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <th>Gate</th>-->
        <!--        <td>Gate A</td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <th>Door</th>-->
        <!--        <td>Door 5</td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <th>Near Landmark</th>-->
        <!--        <td>Next to the Grocery Store</td>-->
        <!--    </tr>-->
        <!--</table>-->

        <h1><strong>Verification Photos</strong></h1>

        <!-- Verification Photos-->
        <div class="image-section">
            <h2>Car Wahsing Area</h2>
            <img src="https://via.placeholder.com/600x400.png?text=car washing area+Image" alt="Car Washing Aera Image">
        </div>
        <div class="image-section">
            <h2>Car Repair Center</h2>
            <img src="https://via.placeholder.com/600x400.png?text=Car Repair Center+Image" alt="Car Repair Center Image">
        </div>
        <div class="image-section">
            <h2>Car Paint Booth</h2>
            <img src="https://via.placeholder.com/600x400.png?text=Car Paint Booth+Image" alt="Car Paint Booth Image">
        </div>
        <div class="image-section">
            <h2>Car Lift Machine</h2>
            <img src="https://via.placeholder.com/600x400.png?text=Car Lift Machine+Image" alt="Car Lift Machine Image">
        </div>
        <div class="image-section">
            <h2>Separate Office</h2>
            <img src="https://via.placeholder.com/600x400.png?text=Separate Office+Image" alt="Separate Office Image">
        </div>
        <div class="image-section">
            <h2>Customer Lounge</h2>
            <img src="https://via.placeholder.com/600x400.png?text=Customer Lounge+Image" alt="Customer Lounge Image">
        </div>
         
        <!-- Footer -->
        <!--<div class="footer">-->
        <!--    <p>Confidential | Page 1 of 7</p>-->
        <!--</div>-->

        <!-- Page Break for Additional Pages -->
        <!--<div class="page-break"></div>-->
        <div class="button-container">
            <button class="btn-reject">Rejected</button>
            <button class="btn-complete">Mark as Completed</button>
        </div>


    </div>
    
</body>

</html>
