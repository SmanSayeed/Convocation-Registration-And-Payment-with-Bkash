<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finals', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('convocid')->nullable();
            $table->string('username');

                $table->string("father");
                $table->string("mother");

                $table->string("hall");

                $table->string("registrationnobsc")->nullable();
                $table->string("rollnobsc")->nullable();
                $table->string("sessionbsc")->nullable();

                 $table->string("registrationnomsc")->nullable();
                $table->string("rollnomsc")->nullable();
                $table->string("sessionmsc")->nullable();

                $table->string("degree");

                $table->string("resultbsc")->nullable();
                $table->string("resultmsc")->nullable();
        

                $table->string("address");

                $table->string("job")->nullable();
            

                $table->string("trdx")->nullable();
                    $table->string("bkashno")->nullable();
                        $table->string("amountpaid")->nullable();

                        $table->integer("certificateb")->default(0)->nullable();
                        $table->integer("certificatem")->default(0)->nullable();
            


            $table->string('mobile')->nullable();
             $table->string('contactemail')->nullable();
            $table->string('faculty');
            $table->string('dept');
            $table->integer('payment_key')->default(1);
            $table->integer('f_key');
            $table->string('image')->nullable();

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
        Schema::dropIfExists('finals');
    }
}
