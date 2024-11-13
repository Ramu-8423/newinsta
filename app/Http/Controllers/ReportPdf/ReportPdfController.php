<?php
 
namespace App\Http\Controllers\ReportPdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
 
use App\Models\User;
use Illuminate\View\View;
 
class ReportPdfController    extends Controller
{

     
    public function addressreport()
    {
        
        $vendor = DB::table('v_report_submitted_addre')->where('v_id', 1)->first(); 
        
        
        if (!$vendor) {
            return response()->json(['error' => 'Vendor not found'], 404);
        }

       
        return view('report_pdf.addressreport', compact('v_report_submitted_addre'));
    }
    
    public function sitereportpdf()
    {
        return view('report_pdf.sitereport');
    }

    
}
