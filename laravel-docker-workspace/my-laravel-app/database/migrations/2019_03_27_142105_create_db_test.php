<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::connection('mysql_3')->create('db_tests', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('comment'); 
            $table->longtext('image'); // 画像に関する記述
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
        Schema::connection('mysql_3')->dropIfExists('db_tests');    
    }
}
