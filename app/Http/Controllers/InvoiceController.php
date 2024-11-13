<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('Asia/Calcutta');

class InvoiceController extends Controller{
    
            public function invoice(? string $status)
              {
                  
                $up = DB::table('client_details')
                      ->select('id', 'a_company_name')
                      ->get();
                      
                      $task = DB::table('invoice')
                    ->leftjoin('client_details', 'invoice.clientname', '=', 'client_details.id')
                    ->select(
                        'invoice.*',
                        'client_details.a_company_name as companyname')
                         ->where('invoice.status', $status)
                        ->orderBy('invoice.id', 'desc')
                        ->get();
                   return view('invoice.invoice', ['up' => $up ,'task' => $task , 'status' => $status]);
              }
              public function updateinvoice(Request $request){
                 
                  $request->validate([
                     'id' => 'required|',
                     'spendingfile' => 'required|',
                 ]);
                // dd($request);
                 if ($request->file('spendingfile')) {
                     $file = $request->file('spendingfile');
                     $filename = time() . '.' . $file->getClientOriginalExtension();
                     $filePath = env('APP_URL').'spendingfile/' . $filename;
                     $file->move(public_path('spendingfile'), $filename); 
                     $currentDateTime = date("Y-m-d H:i:s");
                     $data = [
                        'spendingfile' => $filePath,
                        'remark' => $request->input('remark'),
                        'status' =>  2,
                        'updated_at' => now(),
                    ];
                    //dd($data);
                     DB::table('invoice')
                    ->where('id', $request->input('id')) // Match the ID
                    ->update($data);
                    return back()->with('success', 'Invoice saved successfully.');
                }
                return back()->with('error', 'Please select a PDF file to upload.'); 
             } 
             
             public function downloadFile(Request $request){
                    $fileUrl = $request->query('file');
                    $fileContent = file_get_contents($fileUrl);
                    $fileName = basename($fileUrl);
                    return Response::streamDownload(function () use ($fileContent) {
                        echo $fileContent;
                    }, $fileName);
                } 
             
             
             
             
             
             
             
             
}