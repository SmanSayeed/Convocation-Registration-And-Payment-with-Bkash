<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class FinalSearch extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('final.final');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function finalsearchtable()
    {
                 if(request()->ajax())
                     {
                          if(!empty($request->filter_gender))
                          {
                           $data = DB::table('tbl_customer')
                             ->select('CustomerName', 'Gender', 'Address', 'City', 'PostalCode', 'Country')
                             ->where('Gender', $request->filter_gender)
                             ->where('Country', $request->filter_country)
                             ->get();
                          }
                          else
                          {
                           $data = DB::table('finals')
                             ->select('*')
                             ->get();
                          }
                          return datatables()->of($data)->make(true);
                    }
     $faculty = DB::table('finals')
          ->select('faculty')
          ->groupBy('faculty')
          ->orderBy('faculty', 'ASC')
          ->get();
     return view('final.data', compact('faculty'));
    }

 public function searchdept()
    {
                 if(request()->ajax())
                     {
                          if(!empty($request->filter_gender))
                          {
                           $data = DB::table('tbl_customer')
                             ->select('CustomerName', 'Gender', 'Address', 'City', 'PostalCode', 'Country')
                             ->where('Gender', $request->filter_gender)
                             ->where('Country', $request->filter_country)
                             ->get();
                          }
                          else
                          {
                           $data = DB::table('finals')
                             ->select('*')
                             ->get();
                          }
                          return datatables()->of($data)->make(true);
                    }
     $faculty = DB::table('finals')
          ->select('faculty')
          ->groupBy('faculty')
          ->orderBy('faculty', 'ASC')
          ->get();
     return view('final.data', compact('faculty'));
    }

    
    public function download(Request $r){

        // $data = DB::table('finals')->get();

        // Excel::create('finals',function($excel) use ($data){

        //     $excel->sheet('Sheet',function($sheet) use ($data) {
        //         $sheet->fromArray($data);
        //     });
        // })->download('xls');
        // return redirect()->back();



    }
}
