<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Support\Facades\Redirect;
use Shipu\Bkash\Managers\Checkout;
use Shipu\Bkash\Enums\BkashKey;

session_start();

class adminController extends Controller
{
    
    public function login(){
        return view('admin.login');
    }


       public function dashboard(Request $request){

        $admin_username = $request->admin_username;
        $admin_password = md5($request->admin_password);

        $result = DB::table('admins')
                    ->where('admin_username',$admin_username)
                    ->where('admin_password',$admin_password)
                    ->first();

                    if($result){
                            Session::put('admin_username',$result->admin_username);
                            Session::put('admin_password',$result->admin_password);
                            Session::put('id',$result->id);

                        return redirect()->route('admin-getdashboard');
                    }else{
                             Session::put('message','Email or Password Invalid');
                             return redirect()->route('admin-login');
                    }

    }

    public function AdminRegisteredStudentsPage(){
       $data= DB::table('users')->get();
       return view('admin.registered_students_view',['data'=>$data]);
    }

        public function AdminFinalRegisteredStudentsPage(){
          $data= DB::table('finals')
                ->join('users','finals.f_key','=','users.id')
                ->get();
           
       return view('admin.final_registered_students_view',['data'=>$data]);
    }

 

      public function viewTransaction(){

                 


                 $checkoutConfig = [
                     BkashKey::SANDBOX       => "true",
                     BkashKey::VERSION       => "v1.2.0-beta",
                     BkashKey::APP_KEY       => "5tunt4masn6pv2hnvte1sb5n3j",
                     BkashKey::APP_SECRET    => "1vggbqd4hqk9g96o9rrrp2jftvek578v7d2bnerim12a87dbrrka",
                     BkashKey::USER_NAME     => "sandboxTestUser",
                     BkashKey::PASSWORD      => "hWD@8vtzw0",
                     BkashKey::SANDBOX_SCRIPT => "https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js",
                     BkashKey::PRODUCTION_SCRIPT => "",
                 ];
           
           $checkout = new Checkout($checkoutConfig);
               $o = $checkout->support()->queryOrganizationBalance();
               // echo $o()->organizationBalance; die();
                   echo "<pre>";
                     print_r($o);
                 echo "</pre>";
                 die();
        
    }

      public function viewStudentProfile($id){
         $d= DB::table('finals')
                ->where('f_key',$id)->get()->first();
              $f_key = $d->f_key;
          $u = DB::table('users')
                ->where('id',$id)->get()->first();

          $p = DB::table('bkashpayments')->where('f_key',$f_key)->get()->first();
      

                


                      if(!$p){

                   return view('admin.view_student_profile')->with('p','0')->with('u',$u)->with('d',$d); 

          }else{
    // echo 'test';
    return view('admin.view_student_profile')->with('p',$p)->with('u',$u)->with('d',$d); 
    }

}


}
