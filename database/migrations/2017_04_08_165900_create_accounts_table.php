<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account',60);
            $table->string('currency',20)->unique();
            $table->timestamps();
        });        
        //seed some values
        DB::table('accounts')->insert([
            ['account' => 'wallet','currency' => 'eur'],
            ['account' => 'brdcard','currency' => 'ron']

        ]); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
