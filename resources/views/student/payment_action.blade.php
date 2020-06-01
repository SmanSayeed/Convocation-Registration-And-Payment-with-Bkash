
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bkash Checkout</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
    <style>
        html {
            margin: 0;
            padding: 0;
        }
        #bKashFrameWrapper {
            width: 100% !important;
            height: 100% !important;
        }


    </style>

</head>
<body>
<div class="page">
<h1 style="text-align:center">Please Wait until bkash pop up appears. It will take few seconds.</h1>
<span id="bKash_button"></span>

</div>
<div id="loading"></div>
<script type="text/javascript">
  $(function () {
    // Change script url when it's live
    var scriptLink = 'https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js';

    var successUrl = '<?=$data["success_url"]?>';
    var failedUrl = '<?=$data["failed_url"]?>';
     var amount_check = '<?=$data["amount"]?>';
     var ref_no_check = '<?=$data["ref_no"]?>';
       var degree_check = 'bbb';
     var f_key = '<?=Auth::user()->id?>';

     var amount='<?=$data["amount"]?>';

    var ref_no ='<?=$data["ref_no"]?>';
   

      // if(degree_check=="bbb"){
      //     if(amount_check=="1" && ref_no_check==f_key){
      //            amount='3540';
      //            ref_no=ref_no_check;
      //              failedUrl="vuu";
      //       }
      //         else{
      //           amount=null;
      //            ref_no=null;
      //         }    
      //       }else if($data["degree"]=="Bachelor's and Master's"){
      //           if(amount_check=="4045" && ref_no_check==f_key){
      //           amount='4045';
      //            ref_no=ref_no_check;
      //       }
      //         else{
      //        amount=null;
      //          ref_no=null;
      //            // return view('student.payment_process')->with('errorp','Failed..!! Wrong payment amount or invoice id');
      //         } 
      //       }else{
      //         // $checkout->payment()->create( $amount, $merchantInvoiceNumber, $intent, $currency, $merchantAssociationInfo );
      //       amount=null;
      //         ref_no=null;
      //       }


    function errorMessage(response) {
      let msg = '?n_type=error';
      if(typeof response.errorMessage === 'undefined') {
        msg += '&n_key=payment_failed';
      } else {
        let errorMessage = '&n_msg=Sorry, your payment was unsuccessful !!! '+data.errorMessage;
        let errorCode = data.errorCode;
        let bkashErrorCode = [ 2001, 2002, 2003, 2004, 2007, 2008, 2009, 2011, 2012, 2013, 2020,
          2021, 2022, 2025, 2027, 2028, 2030, 2031, 2032, 2033, 2036, 2037, 2038, 2040, 2041, 2042,
          2043, 2044, 2045, 2046, 2047, 2048, 2049, 2050, 2051, 2052, 2053, 2054, 2055, 2056
        ];

        if(bkashErrorCode.includes(errorCode)) {
          errorMessage = '&n_key=payment_failed';
        } else if(errorCode == 2029) {
          errorMessage = '&n_msg=Sorry, your payment was unsuccessful !!! For same amount transaction, please try again after 10 minutes.';
        }

        msg += errorMessage;
      }
      return msg;
    }

    $.getScript(scriptLink)
      .done(function(script){
        //finished loading the script

        var amount_error=null;
        var payment_ID = null;
        var create_Time=null;

        var org_Logo  = null;
        var org_Name=null;

        var transaction_Status = null;
        var _amount=null;

        var _currency = null;
        var _intent=null;

        var merchant_InvoiceNumber = null;


        var bkashPaymentRequest = {
          amount: amount,
          intent: "sale",
          ref_no: ref_no,
          currency: "BDT",
          _token:"{{csrf_token()}}",
        };

        //call the bkash init function
        bKash.init({
          paymentMode: 'checkout',
          paymentRequest: bkashPaymentRequest,
          createRequest: function (request) {
            // write your logic
            $.ajax({
              url: 'bkash_create_payment',
              type: 'POST',
              data: request,
              success: function (response) {
                data = JSON.parse(response);
                if (data && data.paymentID != null) {
                  payment_ID = data.paymentID;
                  console.log(data);
                  create_Time=data.createTime;

         org_Logo  = data.orgLogo;
         org_Name=data.orgName;

         transaction_Status = data.transactionStatus;
         _amount=data.amount;

         _currency = data.currency;
         _intent=data.intent;

         merchant_InvoiceNumber = data.merchantInvoiceNumber;

                  bKash.create().onSuccess(data);
                }else if(data && data.fooerror!=null){
                   bKash.create().onError();
                  window.location.href = failedUrl+"&n_type=error&n_msg=Sorry, your payment was unsuccessful !!! Invalid Payment Id"+data.fooerror;
                } else {
                  bKash.create().onError();
                  window.location.href = failedUrl+"&n_type=error&n_msg=Sorry, your payment was unsuccessful !!! Invalid Payment Id";
                }
              },
              error: function (xhr, textStatus, errorThrown) {
                bKash.create().onError();
                console.log(xhr);
                window.location.href = failedUrl+"&n_type=error&n_msg=Sorry, your payment was unsuccessful !!! Invalid Request";
              }
            });

          },

          executeRequestOnAuthorization: function () {
            $.ajax({
              url: 'bkash_execute_payment',
              type: 'POST',
              data: {
                paymentId: payment_ID, 
                createTime: create_Time,
                orgLogo: org_Logo,
                orgName: org_Name,
                transactionStatus: transaction_Status,
                amount: _amount,
                currency: _currency,
                intent: _intent,
                merchantInvoiceNumber: merchant_InvoiceNumber,
                  _token:"{{csrf_token()}}"
              },
              success: function (response) {
                data = JSON.parse(response);
                if (data && data.paymentID != null) {
                  paymentID = null;
                  window.location.href = successUrl+"&n_type=success&n_key=payment_done&p_id="+data.paymentID;
                } else {
                  bKash.execute().onError();
                  window.location.href = failedUrl+errorMessage(data);
                }
              },
              error: function (xhr) {
                data = xhr.responseJSON;
                bKash.execute().onError();
                window.location.href = failedUrl+errorMessage(data);
              }
            });

          },
          onClose : function () {
            window.location.href = failedUrl+"&n_type=error&n_msg=Sorry, your payment was unsuccessful !!! Please try again !!!";
          }
        });

        $('#bKash_button').click();

      });
      // window.location.replace(window.location.href);
  });
</script>

<script type="text/javascript">
  function onReady(callback) {
  var intervalId = window.setInterval(function() {
    if (document.getElementsByTagName('body')[0] !== undefined) {
      window.clearInterval(intervalId);
      callback.call(this);
    }
  }, 1000);
}

function setVisible(selector, visible) {
  document.querySelector(selector).style.display = visible ? 'block' : 'none';
}

onReady(function() {
  setVisible('.page', true);
  setVisible('#loading', false);
});
</script>
</body>
</html>

