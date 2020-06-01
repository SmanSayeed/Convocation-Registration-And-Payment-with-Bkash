<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Validator;

use Illuminate\Support\Facades\Auth;

use PDF;

use Shipu\Bkash\Managers\Checkout;
use Shipu\Bkash\Enums\BkashKey;
use Shipu\Bkash\Apis\Checkout\CheckoutBaseApi;




class studentPayment extends Controller
{

    public function StudentPayment(Request $request){
         $f_key = Auth::user()->id;

          $data = DB::table('finals')
                ->where('f_key',$f_key)
                ->first();
    	 return view('student.payment',['data'=>$data]);
    
	
}
public function test2(){
        $checkoutConfig = [
      BkashKey::SANDBOX       => false,
    BkashKey::VERSION       => "v1.2.0-beta",
    BkashKey::APP_KEY       => "tunarpg8hvagg2gjc8uphbto9",
    BkashKey::APP_SECRET    => "16kbvhfna6srr8t6g4e88tjf455oje35o8252svqg10bgvhuu49h",
    BkashKey::USER_NAME     => "COMILLAUNIVERSITY",
    BkashKey::PASSWORD      => "C0@nV1C9At5rM4",
    BkashKey::SANDBOX_SCRIPT => "https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js",
    BkashKey::PRODUCTION_SCRIPT => "https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js",
];
// echo "<pre>";    
//  dd($request);
//  echo "</pre>";          
//  die();

        $checkout = new Checkout($checkoutConfig);

        $payerReference = 'your payerReference';

        // $f_key = Auth::user()->id; 
        // DB::table('bkashpayments')->insert(
        //          [
        //          'f_key' =>$f_key,
        //          'bkash_paymentid'=>$request->paymentId,  
                    
        //          ]
        //      );

echo $checkout->payment()->execute("NSX3DNX1571561658540")->query()->toJson();
}

public function test(){

    $checkoutConfig = [
      BkashKey::SANDBOX       => false,
    BkashKey::VERSION       => "v1.2.0-beta",
    BkashKey::APP_KEY       => "tunarpg8hvagg2gjc8uphbto9",
    BkashKey::APP_SECRET    => "16kbvhfna6srr8t6g4e88tjf455oje35o8252svqg10bgvhuu49h",
    BkashKey::USER_NAME     => "COMILLAUNIVERSITY",
    BkashKey::PASSWORD      => "C0@nV1C9At5rM4",
    BkashKey::SANDBOX_SCRIPT => "https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js",
    BkashKey::PRODUCTION_SCRIPT => "https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js",
];
 $checkout = new Checkout($checkoutConfig);

             // $o = $checkout->support()->queryOrganizationBalance();
             //       echo "<pre>";
             //         print_r($o);
             //     echo "</pre>";
             //     die();

$d =$checkout ->support()->searchTransaction("6JK201SK9E");
echo "<pre>";
print_r($d);
echo "</pre>";
die();

// $tokenApi = new CheckoutBaseApi($checkoutConfig);
// $grandToken = $tokenApi->grantToken();

// echo $grandToken()->id_token."             <br><br>  "; // return only id_token
// echo $grandToken()->refresh_token; // return only refresh_token
// // echo $grandToken()->statusCode; // return only statusCode
// // echo $grandToken()->statusMessage; 
// die();

        $checkout = new Checkout($checkoutConfig);

        $payerReference = 'your payerReference';
        // $callbackUrl = 'merchant callback url';

// $checkout->payment()->create( $amount, $merchantInvoiceNumber, $intent, $currency, $merchantAssociationInfo );
echo $checkout->payment()->create("4500", "cou1")->query()->toJson();
}


  public function StudentPaymentProcess(Request $request){
    	// echo "<pre>";
        // dd( $request); 
     //        echo "</pre>";
        // die();
  		     $f_key = Auth::user()->id;

             $p = DB::table('bkashpayments')->where('f_key',$f_key)->get()->first();
                    	// echo $request->p_id;die();
                     // if($p){
                 // 	   $p = DB::table('bkashpayments')->where('f_key',$f_key)->get()->first();
                 // }else{
                 // 	echo 'not done';die();
                 // }
                 // echo $p->bkash_paymentid; die();


                 $checkoutConfig = [
                        BkashKey::SANDBOX       => false,
    BkashKey::VERSION       => "v1.2.0-beta",
    BkashKey::APP_KEY       => "tunarpg8hvagg2gjc8uphbto9",
    BkashKey::APP_SECRET    => "16kbvhfna6srr8t6g4e88tjf455oje35o8252svqg10bgvhuu49h",
    BkashKey::USER_NAME     => "COMILLAUNIVERSITY",
    BkashKey::PASSWORD      => "C0@nV1C9At5rM4",
    BkashKey::SANDBOX_SCRIPT => "https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js",
    BkashKey::PRODUCTION_SCRIPT => "https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js",
                 ];
    			 
    			 $checkout = new Checkout($checkoutConfig);
    			     // $o = $checkout->support()->queryOrganizationBalance();
            //        echo "<pre>";
            //          print_r($o);
            //      echo "</pre>";
            //      die();

             	 $paymentId =  $request->p_id;


             	        if(!$p){

    			if($request->status=='success' && $request->n_type=='success'){
 

                 $paid_data = $checkout->payment()->queryPayment($paymentId);

             

                 // echo $paid_data()->amount; die();
                 // echo "<pre>";
                 //     print_r($paid_data);
                 // echo "</pre>";
                 // die();



                 // $paid_data = $checkout->payment()->capture($paymentId);

                 // echo "<pre>";
                 //  print_r($paid_data);
                 // echo "</pre>";
                 // die();


                 // $paid_data =$checkout->payment()->void($paymentId);
                 // echo "<pre>";
                 //  print_r($paid_data);
                 // echo "</pre>";
                 // die();

          
                 DB::table('bkashpayments')
            ->where('f_key',$f_key)
            ->insert([  'f_key' =>$f_key,
                    'bkash_paymentid'=>$request->p_id,
                    'bkash_trxID'=>$paid_data()->trxID,    
                    'bkash_amount'=>$paid_data()->amount,  
                    'bkash_currency'=>$paid_data()->currency,  
                    'bkash_transactionStatus'=>$paid_data()->transactionStatus,  
                    'bkash_intent'=>$paid_data()->intent,
                    'bkash_merchantinvoicenumber'=>$paid_data()->merchantInvoiceNumber,  
                    'bkash_updatetime'=>$paid_data()->updateTime,
                    'bkash_createtime'=>$paid_data()->createTime, ]);
            $success='Successful';
              // return view('student-payment-status')->with('success',$success);

            DB::table('finals')->where('f_key',$f_key)->update(['payment_key'=>2]);
            DB::table('users')->where('id',$f_key)->update(['payment_key'=>2]);
            return redirect()->route('student-payment-status')->with('success',$success);

          }  else if($request->status=='failed'){
			    	// echo $request->status;
			    	// echo $request->n_msg;die();
			    	  // return view('student.payment_process')->with('error','Failed..!! '.$request->n_msg);
			    	 // return view('student.payment_process')->with('p','0')->with('error','Failed..!! '.$request->n_msg);
          	 return redirect()->route('student-payment-status')->with('p','0')->with('error','Failed..!! '.$request->n_msg);

					    } else if($request->status=='failed?n_type=error'){
					    	// echo $request->status."<br>";
					    	// echo $request->n_msg;die();
					    	 // return view('student.payment_process')->with('error','Failed..!! '.$request->n_msg);
					    	 // return view('student.payment_process')->with('p','0')->with('error','Failed..!! '.$request->n_msg);
					    	 return redirect()->route('student-payment-status')->with('p','0')->with('error','Failed..!! '.$request->n_msg);
					    
						} else {
									 return view('student.payment_process')->with('p','0');
							 // return redirect()->route('student-payment-status')->with('error','Failed..!! '.$request->n_msg);
							   }
        
   		 }  else{
		// echo 'test';
		return view('student.payment_process')->with('p',$p); 
	
	}
}

    public function StudentPaymentAction(Request $request){



				return view('student.payment_action')->with('data',$request);

// dd($data);

    }

    public function StudentPaymentExecute(Request $request){

    $checkoutConfig = [
      BkashKey::SANDBOX       => false,
    BkashKey::VERSION       => "v1.2.0-beta",
    BkashKey::APP_KEY       => "tunarpg8hvagg2gjc8uphbto9",
    BkashKey::APP_SECRET    => "16kbvhfna6srr8t6g4e88tjf455oje35o8252svqg10bgvhuu49h",
    BkashKey::USER_NAME     => "COMILLAUNIVERSITY",
    BkashKey::PASSWORD      => "C0@nV1C9At5rM4",
    BkashKey::SANDBOX_SCRIPT => "https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js",
    BkashKey::PRODUCTION_SCRIPT => "https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js",
];
// echo "<pre>";	
// 	dd($request);
// 	echo "</pre>";			
// 	die();

		$checkout = new Checkout($checkoutConfig);
            $f_key = Auth::user()->id; 
		$payerReference = 'your payerReference';
        if($request->paymentId){
         DB::table('executes') ->insert([ 
                    'f_key'=>$f_key,
                    'paymentId'=>$request->paymentId,
                    'createTime'=>$request->createTime,    
                    'orgLogo'=>$request->orgLogo,  
                    'orgName'=>$request->orgName,  
                    'transactionStatus'=>$request->transactionStatus,  
                    'amount'=>$request->amount,
                    'currency'=>$request->currency,  
                    'intent'=>$request->intent,
                    'merchantInvoiceNumber'=>$request->merchantInvoiceNumber, ]);
        }

	
		// DB::table('bkashpayments')->insert(
		// 		    [
		// 		    'f_key' =>$f_key,
		// 		    'bkash_paymentid'=>$request->paymentId,  
				    
		// 		    ]
		// 		);

echo $checkout->payment()->execute($request->paymentId)->query()->toJson();


    }



        public function StudentPaymentCreate(Request $request){

    $checkoutConfig = [
    BkashKey::SANDBOX       => false,
    BkashKey::VERSION       => "v1.2.0-beta",
    BkashKey::APP_KEY       => "tunarpg8hvagg2gjc8uphbto9",
    BkashKey::APP_SECRET    => "16kbvhfna6srr8t6g4e88tjf455oje35o8252svqg10bgvhuu49h",
    BkashKey::USER_NAME     => "COMILLAUNIVERSITY",
    BkashKey::PASSWORD      => "C0@nV1C9At5rM4",
    BkashKey::SANDBOX_SCRIPT => "https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js",
    BkashKey::PRODUCTION_SCRIPT => "https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js",
];

    $checkout = new Checkout($checkoutConfig);
          $f_key = Auth::user()->id;
          $p = DB::table('finals')->where('f_key',$f_key)->get()->first();

          $vu=array("fooerror" => " Wrong payment amount or invoice id",);
          
    if($p->degree=="Bachelor's"){
            if($request->amount=="1" && $request->ref_no==$f_key){
              echo $checkout->payment()->create($request->amount, $request->ref_no)->query()->toJson();
            }
              else{

                    // $vu=" Wrong payment amount or invoice id";
                 echo $vu->toJson();
                       // return view('student.payment_process')->with('errorp','Failed..!! Wrong payment amount or invoice id');
              }    
            }else if($p->degree=="Bachelor's and Master's"){
                if($request->amount=="2" && $request->ref_no=="$f_key"){
              echo $checkout->payment()->create($request->amount, $request->ref_no)->query()->toJson();
            }
              else{
                // $vu=" Wrong payment amount or invoice id";
                 echo $vu->toJson();
                 // return view('student.payment_process')->with('errorp','Failed..!! Wrong payment amount or invoice id');
              } 
            }else{
              // $checkout->payment()->create( $amount, $merchantInvoiceNumber, $intent, $currency, $merchantAssociationInfo );
              // $vu=" Wrong payment amount or invoice id";
                 echo $vu->toJson();
            }



		// $payerReference = 'your payerReference';

		// $callbackUrl = 'merchant callback url';

// $checkout->payment()->create( $amount, $merchantInvoiceNumber, $intent, $currency, $merchantAssociationInfo );
// echo $checkout->payment()->create($request->amount, $request->ref_no)->query()->toJson();
        // $data= $checkout->payment()->create($request->amount, $request->ref_no)->query()->toJson();
// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();
// return view('student.payment_action')->with('data',$data);

// dd($data);

    }
}


/*


                        )

                )

        )

    [contents:protected] => {"organizationBalance":[{"accountTypeName":"Organization eMoney Account","accountStatus":"Active","accountHolderName":"50011 - testOST Merchant","currency":"BDT","currentBalance":"1866082.74","availableBalance":"1866082.74","updateTime":"2019-10-11T21:44:35:395 GMT+0000"},{"accountTypeName":"Organization Disbursement eMoney Account","accountStatus":"Active","accountHolderName":"50011 - testOST Merchant","currency":"BDT","currentBalance":"6141.56","availableBalance":"6141.56","updateTime":"2019-10-11T21:44:35:395 GMT+0000"}]}
    [queries:protected] => Apiz\QueryBuilder Object
        (
            [_offset:protected] => 0
            [_take:protected] => 
            [_node:protected] => 
            [_map:protected] => Array
                (
                    [organizationBalance] => Array
                        (
                            [0] => Array
                                (
                                    [accountTypeName] => Organization eMoney Account
                                    [accountStatus] => Active
                                    [accountHolderName] => 50011 - testOST Merchant
                                    [currency] => BDT
                                    [currentBalance] => 1866082.74
                                    [availableBalance] => 1866082.74
                                    [updateTime] => 2019-10-11T21:44:35:395 GMT+0000
                                )

                            [1] => Array
                                (
                                    [accountTypeName] => Organization Disbursement eMoney Account
                                    [accountStatus] => Active
                                    [accountHolderName] => 50011 - testOST Merchant
                                    [currency] => BDT
                                    [currentBalance] => 6141.56
                                    [availableBalance] => 6141.56
                                    [updateTime] => 2019-10-11T21:44:35:395 GMT+0000
                                )

                        )

                )

            [_select:protected] => Array
                (
                )

            [_except:protected] => Array
                (
                )

            [_baseContents:protected] => Array
                (
                    [organizationBalance] => Array
                        (
                            [0] => Array
                                (
                                    [accountTypeName] => Organization eMoney Account
                                    [accountStatus] => Active
                                    [accountHolderName] => 50011 - testOST Merchant
                                    [currency] => BDT
                                    [currentBalance] => 1866082.74
                                    [availableBalance] => 1866082.74
                                    [updateTime] => 2019-10-11T21:44:35:395 GMT+0000
                                )

                            [1] => Array
                                (
                                    [accountTypeName] => Organization Disbursement eMoney Account
                                    [accountStatus] => Active
                                    [accountHolderName] => 50011 - testOST Merchant
                                    [currency] => BDT
                                    [currentBalance] => 6141.56
                                    [availableBalance] => 6141.56
                                    [updateTime] => 2019-10-11T21:44:35:395 GMT+0000
                                )

                        )

                )

            [_conditions:protected] => Array

*/
/*

eyJjdHkiOiJKV1QiLCJlbmMiOiJBMjU2R0NNIiwiYWxnIjoiUlNBLU9BRVAifQ.VNk0-8FP0H_6IXLBS43ewg0BWGgAPiMx2PWQRfJeUD98y0RH79z646Mcc3boUra3V4YPW2dNecKyy7a5SkFfdnjBBDM4uNS1bljg6e02XcXBay5vwPm-fxjtXvP3Lfa0TZoLA3A9K-0YNzi6P2ry3dLfoyIVMUIRL7fhC8q-JGfR3-jZYgm7n3b91N14TPnB1YM-dRZb0wdoV_0rxuWk2bs6PRnvZYbw4mK-UVFtJqO6zOLcFL6bkmyXhqfiJoD2U8x7ZKpZ4VWq3Fed5iv3GRj-E7z15S-8N9E-j0kX5GC8DM-qIBzfYeQHFB38BOI75WHIz89lXN-OlEtvXRG_mQ.MCwHMAXyXJGw3a-x.0agr_zgetrqfEo6-emT-F3TTO_VguO4Z_7gYIFBadd_EeL7g_J2yr2BuluNmb037BzZZ032d0dRLblYMiz6Cy8zJwyrlAbE8xQ7eNBSoYF9LX3ZC3is69ZXqypKabs6VPTjlF-Gfsqo4hcxdunXGoWSzwtoMVGII28IQ1Cl5EVAhNkc26tgf3_-E_hY7NKDZAxpcoewmR6dlcg0prAttleIrtLUgCdqJqoZrkTMtlQl3Jc4OMnRW-tqBEv6L3QDbeohViWtz8tRoVPl7gaKAj9fhLfvs1gpIqAL794BGDyFjVcI6JVfbPKVwRLDF6PVg5FyTg-aRERGaelIceK1G0qmS8O-SIDPNv5jjeg1vSnZsMDUP3IbLgZz1nymJUWNHJ00PP2WCQ5O2g9hYj3pO8tI_mzzE3DNe-pCRk20F-MWPY-wxh70sRHHKFsieZI96ro5Z4MAT8c6G1wvuNc3ZsvAYc1rFY7kicrrwzbOIwjCKvYhvf2kPc5Hg9bZ_cVDZvvytkGhQdIANj5ee4PjGNJxdExQb8k4WsodyR4BS4dtmhGU-g6Pykb1yEr7YegzBx7blh7p368ETRKbSL2Y0z_YmNF0y9yVPCZJY8F2ch20Z4JlX3foO-62SR2rPN_4xBGiUaEYmTLQGmZMIyPq9sg1me9hBzHhw98eCfucl0_T5K2eQcRiygz7eUA5YSDBAyXKG7OcrxWW0ZwmLeSf3MmeSyNTGxlEomIY9qyhJKsS9mEHyTJfWBqLU0xInJURnN--HYTovqiIQfctHdOMAoV0GkAUNHUXs6nSBYoflo4vvS9jk-4zmxT6mWumhsaggL4dJ1P5AdgcS1oXjP4DR8ikpVdkogJcu4v83Y0XskmLcfaMYPcTit0yu_oGtnFElh1mNMCWapu9VkwH_hBNntN9GeiZdzyEy8XnYgKfnKkxYexQMBIkxt_qv7Sys3OsPRQFfPoSPxpijNfZpOy9WcOidGrNSlWGKp-a_08Q-Kz4m1Z8poPnQAjQ0rQsA-sRYiCvbMwt9hr9pUK-o9Q7amjYOe6ZxtLNjXPXvACfU3mL9xjfyydzcrVGhtLVq2FqWVnOS6diBlJKWhGz7VJX3zF7Ol2lvm7B-nCj65r9wWpk0_7H39D9uREKbyAa0pdyndlPwbs7PJv4CEcvnYILbhJbt2Zifn_5zx56TupyzRe7jvhdc_1qA1I0DIGvpjR-mAxF1f-xchmqOIdqbKD1ycxu9qLqE8I44-shd996zUtZCU89q8vaClNrRUjMcS2GJCF_HgxpTZRLCir-botwF8XA5ZcmK4rFHN8SEix0.w8rY98bmFvVtFAl0UbQhWA

*/

/*
eyJraWQiOiJmalhJQmwxclFUXC9hM215MG9ScXpEdVZZWk5KXC9qRTNJOFBaeGZUY3hlamc9IiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiJiM2Q4OGVkZC0xNzc2LTRhMjEtYWZlMi0zN2FkZTk3NzEyZDMiLCJhdWQiOiI1dHVudDRtYXNuNnB2MmhudnRlMXNiNW4zaiIsImV2ZW50X2lkIjoiZDVjOTIwYjYtMzY4MC00ZTIxLWI1NjMtZDFlMzQ3YjY2M2NiIiwidG9rZW5fdXNlIjoiaWQiLCJhdXRoX3RpbWUiOjE1NzA4MTEzNzEsImlzcyI6Imh0dHBzOlwvXC9jb2duaXRvLWlkcC5hcC1zb3V0aGVhc3QtMS5hbWF6b25hd3MuY29tXC9hcC1zb3V0aGVhc3QtMV9rZjVCU05vUGUiLCJjb2duaXRvOnVzZXJuYW1lIjoic2FuZGJveFRlc3RVc2VyIiwiZXhwIjoxNTcwODE0OTcxLCJpYXQiOjE1NzA4MTEzNzJ9.HzOC3k3KRxZ0LmANQvfB_UUUP3-FcptFX0WdwrSkzPG_KgJYLorDXiOrv9AZAFrpdBPsgmI_7ATo9vtOxaRyP1Eh45wHY7NX8ZJ7VnAjBuJSY7uSAVwcntrk_cphhGeHUgE3SyE3XYl2RI9wVlw-Wpu4Vd5pr8m5tTtQO5bNX01141-ly8x_S6eoOcQapC-Xr74X3WLJnh_tF_L9ksSQoS_KXLNOKwOAlBadCH4c8-XvVZ9exEPnHa16A3YNoCFEvUR-VevA-EBTItbEy0SPf3aQj91NT2m9Bdk07-kiQThpKKJ6bMF2smjf_xHNZd9NuicyRsh_F1bzaeFFXYhoXg
*/

/*

{
  "paymentID": "A6VUWI21570812786836",
  "createTime": "2019-10-11T16:53:06:928 GMT+0000",
  "orgLogo": "https://s3-ap-southeast-1.amazonaws.com/merchantlogo.sandbox.bka.sh/merchant-default-logo.png",
  "orgName": "TestCheckoutDemoMerchant1",
  "transactionStatus": "Initiated",
  "amount": "2000",
  "currency": "BDT",
  "intent": "authorization",
  "merchantInvoiceNumber": "12"
}

*/
/*

{
  "paymentID": "5UTS8QH1570812967301",
  "createTime": "2019-10-11T16:56:07:409 GMT+0000",
  "orgLogo": "https://s3-ap-southeast-1.amazonaws.com/merchantlogo.sandbox.bka.sh/merchant-default-logo.png",
  "orgName": "TestCheckoutDemoMerchant1",
  "transactionStatus": "Initiated",
  "amount": "2000",
  "currency": "BDT",
  "intent": "authorization",
  "merchantInvoiceNumber": "12"
}
*/