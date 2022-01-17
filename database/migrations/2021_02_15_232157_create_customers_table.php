<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("first_name");
            $table->string("last_name");
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->integer('age')->default(0);
            $table->string('password');
            $table->enum('gender', ['Male', 'Female']);
            
            $table->enum('status', ['Active', 'Blocked']);
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
}
