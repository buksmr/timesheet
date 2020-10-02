<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
             $table->increments('id');
            $table->string('issue');
            $table->string('description');
            $table->string('customer_number');
            $table->string('cname');
            $table->string('caddress');
            $table->string('taccount');
             $table->string('priority');
            $table->string('gender');
            $table->string('pnumber');
            $table->string('email');
            $table->string('editor1');
            
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
        Schema::dropIfExists('ticket');
    }
}
