<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBkashpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bkashpayments', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('f_key');
                $table->string('bkash_paymentid')->nullable();
                $table->string('bkash_trxID')->nullable();
                $table->string('bkash_amount')->nullable();
                   $table->string('bkash_currency')->nullable();
                   $table->string('bkash_transactionStatus')->nullable();
                   $table->string('bkash_updatetime')->nullable();
                   $table->string('bkash_createtime')->nullable();
                   

 $table->string('bkash_intent')->nullable();

 $table->string('bkash_merchantinvoicenumber')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bkashpayments');
    }
}
/*


DB::table('bkashpayments')->insert(
                    [
                    'f_key' =>$f_key,
                    'bkash_paymentid'=>$request->paymentId,
                    'bkash_trxID'=>$paid_data()->trxID,    
                    'bkash_amount'=>$paid_data()->currency,  
                    'bkash_currency'=>$paid_data()->amount,  
                    'bkash_transactionStatus'=>$paid_data()->transactionStatus,  
                    'bkash_intent'=>$paid_data()->intent,
                    'bkash_merchantinvoicenumber'=>$paid_data()->merchantInvoiceNumber,  
                    'bkash_updatetime'=>$paid_data()->updateTime,
                    'bkash_createtime'=>$paid_data()->createTime,  

                     
                    
                    ]
                );s

*/
                /*

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Validator;

use Illuminate\Support\Facades\Auth;

use PDF;

use Shipu\Bkash\Managers\Checkout;
use Shipu\Bkash\Enums\BkashKey;


class studentPayment extends Controller
{

    public function StudentPayment(){

 //                 $f_key = Auth::user()->id;
 //                 $p = DB::table('bkashpayments')->where('f_key',$f_key)->get()->first();
 //                 // echo $p->bkash_paymentid; die();

    //                                      $checkoutConfig = [
    //                  BkashKey::SANDBOX       => "true",
    //                  BkashKey::VERSION       => "v1.2.0-beta",
    //                  BkashKey::APP_KEY       => "5tunt4masn6pv2hnvte1sb5n3j",
    //                  BkashKey::APP_SECRET    => "1vggbqd4hqk9g96o9rrrp2jftvek578v7d2bnerim12a87dbrrka",
    //                  BkashKey::USER_NAME     => "sandboxTestUser",
    //                  BkashKey::PASSWORD      => "hWD@8vtzw0",
    //                  BkashKey::SANDBOX_SCRIPT => "https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js",
    //                  BkashKey::PRODUCTION_SCRIPT => "",
    //              ];
    // $checkout = new Checkout($checkoutConfig);
                    
    //              $paymentId =  $p->bkash_paymentid;



    //              // $paid_data = $checkout->payment()->capture($paymentId);

    //              // echo "<pre>";
    //              //  print_r($paid_data);
    //              // echo "</pre>";
    //              // die();


 //                 $paid_data = $checkout->payment()->queryPayment($paymentId);
 //                 // echo $paid_data()->amount; die();
    //              echo "<pre>";
    //                  print_r($paid_data);
    //              echo "</pre>";
    //              die();

    //              // $paid_data =$checkout->payment()->void($paymentId);
    //              // echo "<pre>";
    //              //  print_r($paid_data);
    //              // echo "</pre>";
    //              die();
    
        return view('student.payment');
    }

    public function StudentPaymentAction(Request $request){

                
                return view('student.payment_action')->with('data',$request);

// dd($data);

    }

    public function StudentPaymentExecute(Request $request){

        
                    $paymentId =  $request->paymentId;



                    $paid_data = $checkout->payment()->capture($paymentId);

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
// echo "<pre>";
//  dd($request);
//  echo "</pre>";
//  die();

        $checkout = new Checkout($checkoutConfig);

        $payerReference = 'your payerReference';

        $f_key = Auth::user()->id; 
        DB::table('bkashpayments')->insert(
                    [
                    'f_key' =>$f_key,
                    'bkash_paymentid'=>$request->paymentId,
                    'bkash_trxID'=>$paid_data()->trxID,    
                    'bkash_amount'=>$paid_data()->currency,  
                    'bkash_currency'=>$paid_data()->amount,  
                    'bkash_transactionStatus'=>$paid_data()->transactionStatus,  
                    'bkash_intent'=>$paid_data()->intent,
                    'bkash_merchantinvoicenumber'=>$paid_data()->merchantInvoiceNumber,  
                    'bkash_updatetime'=>$paid_data()->updateTime,
                    'bkash_createtime'=>$paid_data()->createTime,  

                     
                    
                    ]
                );

echo $checkout->payment()->execute($request->paymentId)->query()->toJson();


    }



        public function StudentPaymentCreate(Request $request){

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

        $payerReference = 'your payerReference';
        // $callbackUrl = 'merchant callback url';

// $checkout->payment()->create( $amount, $merchantInvoiceNumber, $intent, $currency, $merchantAssociationInfo );
echo $checkout->payment()->create($request->amount, $request->ref_no)->query()->toJson();
// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();
// return view('student.payment_action')->with('data',$data);

// dd($data);

    }
}
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











































































/*

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Validator;

use Illuminate\Support\Facades\Auth;

use PDF;

use Shipu\Bkash\Managers\Checkout;
use Shipu\Bkash\Enums\BkashKey;


class studentPayment extends Controller
{

    public function StudentPayment(Request $request){

        
        $success_status =  $request->input('status');
        if($success_status=='success'){
            

                  $f_key = Auth::user()->id;
                 $p = DB::table('bkashpayments')->where('f_key',$f_key)->get()->first();
                 // echo $p->bkash_paymentid; die();

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
                    
                 $paymentId =  $p->bkash_paymentid;



                 // $paid_data = $checkout->payment()->capture($paymentId);

                 // echo "<pre>";
                 //  print_r($paid_data);
                 // echo "</pre>";
                 // die();


                 $paid_data = $checkout->payment()->queryPayment($paymentId);
                 // echo $paid_data()->amount; die();
                 echo "<pre>";
                     print_r($paid_data);
                 echo "</pre>";
                 die();

                 // $paid_data =$checkout->payment()->void($paymentId);
                 // echo "<pre>";
                 //  print_r($paid_data);
                 // echo "</pre>";
                 // die();
    
            
        return view('student.payment');

        }else if($success_status=='failed'){
            
        
        return view('student.payment');

        }
            

    

    
        return view('student.payment');
    }

    public function StudentPaymentAction(Request $request){



                return view('student.payment_action')->with('data',$request);

// dd($data);

    }

    public function StudentPaymentExecute(Request $request){

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
// echo "<pre>";
//  dd($request);
//  echo "</pre>";
//  die();

        $checkout = new Checkout($checkoutConfig);

        $payerReference = 'your payerReference';

        $f_key = Auth::user()->id; 
        DB::table('bkashpayments')->insert(
                    [
                    'f_key' =>$f_key,
                    'bkash_paymentid'=>$request->paymentId,  
                    
                    ]
                );

echo $checkout->payment()->execute($request->paymentId)->query()->toJson();


    }



        public function StudentPaymentCreate(Request $request){

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

        $payerReference = 'your payerReference';
        // $callbackUrl = 'merchant callback url';

// $checkout->payment()->create( $amount, $merchantInvoiceNumber, $intent, $currency, $merchantAssociationInfo );
echo $checkout->payment()->create($request->amount, $request->ref_no)->query()->toJson();
// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();
// return view('student.payment_action')->with('data',$data);

// dd($data);

    }
}
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

