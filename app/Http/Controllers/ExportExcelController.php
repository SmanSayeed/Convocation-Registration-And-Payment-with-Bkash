<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Exports\FinalsExport;

class ExportExcelController extends Controller
{
    function index()
    {
     $customer_data = DB::table('finals')->get();
     return view('final.export_excel')->with('customer_data', $customer_data);
    }

    function excel()
    {
    	/*
     $customer_data = DB::table('finals')->get()->toArray();
     $customer_array[] = array('username', 'faculty', 'dept', 'degree', 'payment_key','id');
     foreach($customer_data as $customer)
     {
      $customer_array[] = array(
       'username'  => $customer->username,
       'faculty'   => $customer->faculty,
       'dept'    => $customer->dept,
       'degree'  => $customer->degree,
       'payment_key'   => $customer->payment_key,
       'id' => $customer->id
      );
     }
     Excel::store('Customer Data', function($excel) use ($customer_array){
      $excel->setTitle('Customer Data');
      $excel->sheet('Customer Data', function($sheet) use ($customer_array){
       $sheet->fromArray($customer_array, null, 'A1', false, false);
      });
     });
     //->download('xlsx');
      return Excel::download(new FinalExport, 'Customer Data.xlsx');
	*/
       return Excel::download(new FinalsExport, 'users.xlsx');
	
    }
}

?>