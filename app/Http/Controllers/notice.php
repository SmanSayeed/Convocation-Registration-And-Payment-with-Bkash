<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Support\Facades\Redirect;
use Shipu\Bkash\Managers\Checkout;
use Shipu\Bkash\Enums\BkashKey;

class notice extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home_notice_list(){

        $notice = DB::table('notices')->get();

        return view('layouts.app')->with('notice',$notice);
    }

     public function home_single_notice($id){

        $data = DB::table('notices')->where('id',$id)->get()->first();

        return view('student.home_single_notice')->with('data',$data);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_create_notice()
    {
        return view('admin.admin_create_notice');
    }



        public function admin_store_notice(Request $request)
    {
        DB::table('notices')->insert([
                'title'=>$request->title,
                'description'=>$request->description
            ]);
        return redirect()->route('admin_view_notice')->with('success','Notice Created Successfully!');
    }




     public function admin_view_notice()
    {
         $data = DB::table('notices')->get()->all();
        return view('notices.blade.php')->with('data',$data);
    }



       public function admin_edit_notice($id)
    {
            $data = DB::table('notices')->where('id',$id)->get()->first();
        return view('admin.admin_edit_notice')->with('data',$data);
    }



         public function admin_update_notice(Request $request,$id)
    {
         DB::table('notices')->where('id',$id)->update([
                'title'=>$request->title,
                'description'=>$request->description
            ]);
        return redirect()->route('admin_view_notice')->with('success','Notice Updated Successfully!');
    }




        public function admin_delete_notice($id)
    {
        DB::table('notices')->where('id', '=', $id)->delete();
         return redirect()->route('admin_view_notice')->with('success','Notice Deleted Successfully!');
    }




        public function allNotice()
    {
        return view('admin.home_notice_list')->with('data',$data);
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
