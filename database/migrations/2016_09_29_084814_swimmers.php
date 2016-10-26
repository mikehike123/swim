<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Swimmers.
 *
 * @author  The scaffold-interface created at 2016-09-29 08:48:14pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Swimmers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('swimmers',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('FirstName');
        
        $table->String('LastName');
        
        /**
         * Foreignkeys section
         */
        
        
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('swimmers');
    }
}
