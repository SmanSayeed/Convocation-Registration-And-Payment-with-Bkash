<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExecutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executes', function (Blueprint $table) {
       $table->bigIncrements('id');
         $table->integer('f_key');
             $table->string('createTime');
              $table->string('orgLogo');
               $table->string('orgName');
                $table->string('transactionStatus');
                 $table->string('amount');
                  $table->string('currency');
                   $table->string('intent');
                    $table->string('merchantInvoiceNumber');


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
        Schema::dropIfExists('executes');
    }
}


             // DB::table('executes') ->insert([ 
             //        'paymentId'=>$request->paymentId,
             //        'createTime'=>$request->createTime,    
             //        'orgLogo'=>$request->orgLogo,  
             //        'orgName'=>$request->orgName,  
             //        'transactionStatus'=>$request->transactionStatus,  
             //        'amount'=>$request->amount,
             //        'currency'=>$request->currency,  
             //        'intent'=>$request->intent,
             //        'merchantInvoiceNumber'=>$request->merchantInvoiceNumber, ]);

