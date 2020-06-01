<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Validator;

use Illuminate\Support\Facades\Auth;

use PDF;

class studentController extends Controller
{
    
    public function GetStudentDashboardPage(){
        return view('student.dashboard');
    }


    public function FinalRegisterpage(){
   
          return view('student.final_register');
    }





      public function FinalRegisterViewpage(){
        $id = Auth::user()->id; 
        $data=DB::table('finals')
                    ->where('f_key',$id)
                    ->get()->first();



        // print_r($data);die();
      
        return view('student.view_register',['data'=>$data]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function FinalRegistrationProcess(Request $request)
    {
            $ev = Auth::user()->email_verified_at;

      if($ev!=null){

       
        // echo $request->name;
        // echo $request->mobile; 
        // echo $request->faculty;
        // echo $request->dept;
        // echo $request->image;
        // die();
        $f_key = Auth::user()->id;


         $this->validate($request,[
                'name'=>'required',
              
 
                'faculty'=>'required',

                'hall'=>'required',

                'degree'=>'required',

                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:100',

            ]);

        if($request->dept==null){
             $this->validate($request,[
                'dept'=>'required',
              
            ]);
        }

        if($request->degree == "Bachelor's"){

              if($request->sessionbsc==null || $request->rollnobsc==null || $request->registrationnobsc==null || $request->resultbsc==null || $request->certificateb==null ){
             $this->validate($request,[
                'sessionbsc'=>'required',
                'rollnobsc'=>'required',
                'registrationnobsc'=>'required',
                'resultbsc'=>'required',
                'certificateb'=>'required',

                ]);
        }
        }
      

        // if($request->degree == "Master's"){

        // if($request->sessionmsc==null || $request->rollnomsc==null || $request->registrationnomsc==null || $request->resultmsc==null || $request->certificatem==null ){
        //              $this->validate($request,[
        //                   'sessionmsc'=>'required',
        //                     'rollnomsc'=>'required',
        //                     'registrationnomsc'=>'required',
        //                     'resultmsc'=>'required',
        //                     'certificatem'=>'required',
                      
        //             ]);
        //         }
        //     }
                 if($request->degree == "Bachelor's and Master's"){

        if($request->sessionmsc==null || $request->rollnomsc==null || $request->registrationnomsc==null || $request->resultmsc==null || $request->certificatem==null ){
                     $this->validate($request,[
                            'sessionmsc'=>'required',
                            'rollnomsc'=>'required',
                            'registrationnomsc'=>'required',
                            'resultmsc'=>'required',
                            'certificatem'=>'required',
                            'sessionbsc'=>'required',
                            'rollnobsc'=>'required',
                            'registrationnobsc'=>'required',
                            'resultbsc'=>'required',
                            'certificateb'=>'required',
                      
                    ]);
                }
            }




                        $imageName=null;
                     if( $request->hasFile('image')){
                      // $sname = strtolower($request->name);  
                      // $imageName = time().'.'.$sname.'.'.$request->image->getClientOriginalExtension();
                      // $request->image = $imageName; 
                      // $request->image->store('public/student_images');
                            $image = $request->file('image');
                         $fname= $request->name;

                           $imageName = time().'-'.$fname.'.'.request()->image->getClientOriginalExtension();
                           $imageName=strtolower($imageName);
                           $imageName=trim($imageName);
                            $imageName=str_replace(' ', '', $imageName)  ;
                            $imageName=str_replace('.', '', $imageName)  ;

                                $folder = '/student_images/';

                                         // $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                                          // $this->uploadOne($image, $folder, 'public', $name);
                                           request()->image->move(public_path($folder), $imageName);  }
        // echo $request->name;
        // echo $request->mobile; 
        // echo $request->faculty;
        // echo $request->dept;
        // echo $imageName ;


            /*====== From CPanel ============*/
/*
                        $imageName=null;
                     if( $request->hasFile('image')){
                      // $sname = strtolower($request->name);  
                      // $imageName = time().'.'.$sname.'.'.$request->image->getClientOriginalExtension();
                      // $request->image = $imageName; 
                      // $request->image->store('public/student_images');
                            $image = $request->file('image');
                         $fname= $request->name;

                           $imageName = time().'-'.$fname.'.'.request()->image->getClientOriginalExtension();
                           $imageName=strtolower($imageName);
                           $imageName=trim($imageName);
                            $imageName=str_replace(' ', '', $imageName)  ;
                                $folder = base_path('student_images/');
                              // echo $folder;die();

                                         // $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                                          // $this->uploadOne($image, $folder, 'public', $name);
                                           request()->image->move($folder, $imageName);
    */
          
        /*====== From CPanel END ============*/
        // die();  
$r = $request;
       DB::table('finals')->insert([
            'username' =>$r->name,

            'father' =>$r->father,
            'mother' =>$r->mother,
            'hall' =>$r->hall,
            'registrationnobsc' =>$r->registrationnobsc,
            'rollnobsc' =>$r->rollnobsc,
            'sessionbsc' =>$r->sessionbsc,

             'registrationnomsc' =>$r->registrationnomsc,
            'rollnomsc' =>$r->rollnomsc,
            'sessionmsc' =>$r->sessionmsc,

            'degree' =>$r->degree,
            'resultbsc' =>$r->resultbsc,
            'resultmsc' =>$r->resultmsc,
            
            'address' =>$r->address,
            'job' =>$r->job,

            'trdx' =>$r->trdx,
            'bkashno' =>$r->bkashno,
            'amountpaid' =>$r->amountpaid,
            'certificateb' =>$r->certificateb,
            'certificatem' =>$r->certificatem,

            'contactemail'=>$r->contactemail,


        'mobile' =>$r->mobile,
        'faculty' =>$r->faculty,
        'dept' =>$r->dept,
        'image' =>$imageName,
        'f_key'=>$f_key
        ]);

        DB::table('users')
                ->where('id',$f_key)
                ->update(['final_key'=>1]);

         return redirect()->route('student-view-register')

            ->with('success','You have successfully Registered')

            ->with('image',$imageName);
    
    }

}
    public function EditRegisterpage(){
         $f_key = Auth::user()->id;
         $p_key =  Auth::user()->payment_key;
         if($p_key==1){
                $data = DB::table('finals')
                ->where('f_key',$f_key)
                ->first();
          return view('student.edit_register')->with('data',$data);
        }elseif($p_key==1){
          return back();
        }

    }


        public function EditRegistrationProcess(Request $request)
    {

       
        // echo $request->name;
        // echo $request->mobile; 
        // echo $request->faculty;
        // echo $request->dept;
        // echo $request->image;
        // die();
        $f_key = Auth::user()->id;

          $data = DB::table('finals')
                ->where('f_key',$f_key)
                ->first();
       
                       if($request->degree == null){
            $request->degree=$data->degree;
         }
          if($request->faculty == null){
            $request->faculty=$data->faculty;
         }
           if($request->dept == null){
            $request->dept=$data->dept;
         }

         $this->validate($request,[
                'name'=>'required',


            ]);

      

                        $imageName=null;
                     if( $request->hasFile('image')){
                      // $sname = strtolower($request->name);  
                      // $imageName = time().'.'.$sname.'.'.$request->image->getClientOriginalExtension();
                      // $request->image = $imageName; 
                      // $request->image->store('public/student_images');
                            $image = $request->file('image');
                         $fname= $request->name;

                           $imageName = time().'-'.$fname.'.'.request()->image->getClientOriginalExtension();
                           $imageName=strtolower($imageName);
                           $imageName=trim($imageName);
                          $imageName=str_replace(' ', '', $imageName)  ;
                           $folder = '/student_images/';

                                         // $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                                          // $this->uploadOne($image, $folder, 'public', $name);
                                           request()->image->move(public_path($folder), $imageName);
        // echo $request->name;
        // echo $request->mobile; 
        // echo $request->faculty;
        // echo $request->dept;
        // echo $imageName ;

            }

            /*====== From CPanel ============*/
/*
                        $imageName=null;
                     if( $request->hasFile('image')){
                      // $sname = strtolower($request->name);  
                      // $imageName = time().'.'.$sname.'.'.$request->image->getClientOriginalExtension();
                      // $request->image = $imageName; 
                      // $request->image->store('public/student_images');
                            $image = $request->file('image');
                         $fname= $request->name;

                           $imageName = time().'-'.$fname.'.'.request()->image->getClientOriginalExtension();
                           $imageName=strtolower($imageName);
                           $imageName=trim($imageName);
                            $imageName=str_replace(' ', '', $imageName)  ;
                                $folder = base_path('student_images/');
                              // echo $folder;die();

                                         // $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                                          // $this->uploadOne($image, $folder, 'public', $name);
                                           request()->image->move($folder, $imageName);
    */
          
        /*====== From CPanel END ============*/
        // die();  
$r = $request;
if($r->image==null){
     DB::table('finals')->where('f_key',$f_key)->update([
             'username' =>$r->name,

            'father' =>$r->father,
            'mother' =>$r->mother,
            'hall' =>$r->hall,
            'registrationnobsc' =>$r->registrationnobsc,
            'rollnobsc' =>$r->rollnobsc,
            'sessionbsc' =>$r->sessionbsc,

             'registrationnomsc' =>$r->registrationnomsc,
            'rollnomsc' =>$r->rollnomsc,
            'sessionmsc' =>$r->sessionmsc,

            'degree' =>$r->degree,
            'resultbsc' =>$r->resultbsc,
            'resultmsc' =>$r->resultmsc,
            
            'address' =>$r->address,
            'job' =>$r->job,

            'trdx' =>$r->trdx,
            'bkashno' =>$r->bkashno,
            'amountpaid' =>$r->amountpaid,
            'certificateb' =>$r->certificateb,
            'certificatem' =>$r->certificatem,

            'contactemail'=>$r->contactemail,


        'mobile' =>$r->mobile,
        'faculty' =>$r->faculty,
        'dept' =>$r->dept,
   
        'f_key'=>$f_key
        ]);
 }else{
         DB::table('finals')->where('f_key',$f_key)->update([
             'username' =>$r->name,

            'father' =>$r->father,
            'mother' =>$r->mother,
            'hall' =>$r->hall,
            'registrationnobsc' =>$r->registrationnobsc,
            'rollnobsc' =>$r->rollnobsc,
            'sessionbsc' =>$r->sessionbsc,

             'registrationnomsc' =>$r->registrationnomsc,
            'rollnomsc' =>$r->rollnomsc,
            'sessionmsc' =>$r->sessionmsc,

            'degree' =>$r->degree,
            'resultbsc' =>$r->resultbsc,
            'resultmsc' =>$r->resultmsc,
            
            'address' =>$r->address,
            'job' =>$r->job,

            'trdx' =>$r->trdx,
            'bkashno' =>$r->bkashno,
            'amountpaid' =>$r->amountpaid,
            'certificateb' =>$r->certificateb,
            'certificatem' =>$r->certificatem,

            'contactemail'=>$r->contactemail,


        'mobile' =>$r->mobile,
        'faculty' =>$r->faculty,
        'dept' =>$r->dept,
        'image' =>$imageName,
        'f_key'=>$f_key
        ]);
       }
 
      

      

         return redirect()->route('student-view-register')

            ->with('success','You have successfully Registered')

            ->with('image',$imageName);
          }
    
    //   }
    // }

    public function idcardView(){
      $convocid='';
          $id = Auth::user()->id; 
        $data=DB::table('finals')
                    ->where('f_key',$id)
                    ->get()->first();
         $b=DB::table('bkashpayments')
                    ->where('f_key',$id)
                    ->get()->first();

                    if(Auth::user()->payment_key==2){

                      if($data->convocid==null){
                      // echo $data->faculty;
                        if($data->faculty == "Science"){
                                                          if($data->dept=="Mathematics"){
                                                            $convocid = "1100".$data->f_key;
                                                          }
                                                          if($data->dept=="Chemistry"){
                                                            $convocid = "1200".$data->f_key;
                                                          }
                                                          if($data->dept=="Physics"){
                                                            $convocid = "1300".$data->f_key;
                                                          }
                                                          if($data->dept=="Statistics"){
                                                            $convocid = "1400".$data->f_key;
                                                          }
                                                          if($data->dept=="Pharmacy"){
                                                            $convocid = "1500".$data->f_key;
                                                          }
                                                           if($data->dept==""){
                                                            $convocid = "No convocation id";
                                                          }
                                                       }

                         if($data->faculty == "Arts and Humanities"){
                          // echo ' this '.$data->dept;
                                          if($data->dept=="English"){
                                            $convocid = "2100".$data->f_key;
                                              // echo ' this '.$convocid;
                                          }
                                          if($data->dept=="Bangla"){
                                            $convocid = "2200".$data->f_key;
                                          }
                                        
                                           if($data->dept==""){
                                            $convocid = "No convocation id";
                                           }
                                  }

                         if($data->faculty == "Social Science"){
                                  if($data->dept=="Archeology"){$convocid = "3100".$data->f_key;}
                                  if($data->dept=="Economics"){ $convocid = "3200".$data->f_key; }
                                
                                   if($data->dept=="Public Administration"){$convocid = "3300".$data->f_key; }
                                   if($data->dept=="Anthropology"){$convocid = "3400".$data->f_key; }
                                
                                   if($data->dept=="Mass Communication And Journalism"){$convocid ="3500".$data->f_key; }

                                   if($data->dept==""){ $convocid = "No convocation id"; }
                              }

                           if($data->faculty == "Business Studies"){
                                  if($data->dept=="Management Studies"){ $convocid = "4100".$data->f_key; }
                                  if($data->dept=="Accounting And Information System"){$convocid = "4200".$data->f_key;  }
                                
                                   if($data->dept=="Marketing"){$convocid = "4300".$data->f_key; }
                                   if($data->dept=="Finance And Banking"){$convocid = "4400".$data->f_key;}
                                
                                   if($data->dept==""){$convocid = "No convocation id"; }
                               }

                         if($data->faculty == "Engineering"){
                                  if($data->dept=="CSE"){ $convocid = "5100".$data->f_key;}
                                  if($data->dept=="ICT"){$convocid = "5200".$data->f_key; }
                                  if($data->dept==""){ $convocid = "No convocation id";}
                                }
                           if($data->faculty == "Law"){
                                if($data->dept=="Law"){ $convocid = "6100".$data->f_key; }
                                if($data->dept==""){$convocid = "No convocation id";}
                                 }

                        DB::table('finals')->where('f_key',$data->f_key)->update(['convocid'=>$convocid]);
                          return view('student.view_idcard',['data'=>$data,'b'=>$b]);
                      }

                }
                    else{

                        echo 'You have not Paid Yet <br>';
                    }
              
                    // die();


        return redirect()->view('student.view_idcard',['data'=>$data,'b'=>$b]);
    }

//$2y$10$zXtDuKksgMi4EgnHee77rOJttNEfaEAqIygR50hqm4LF/Iw7AvBNS
    //$2y$10$1PlmpFQg0zAqaOuW5sL.NOvrP4pkvwzu72n6l5TuHnvPZwqUXKmi2
 

        public function idcardDownload(){
          $id = Auth::user()->id; 
        $data=DB::table('finals')
                    ->where('f_key',$id)
                    ->get()->first();

    $pdf = PDF::loadView('student.download_idcard',['data'=>$data]);
return $pdf->stream('couconvocation_id_'.$data->username.'-'.$data->id.'.pdf');
        return view('student.download_idcard',['data'=>$data]);
    }



}
