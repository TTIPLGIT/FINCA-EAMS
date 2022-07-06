<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectronicsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('electronics_users');
        Schema::create('electronics_users', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->default(NULL); 
            $table->integer('electronics_id')->nullable()->default(NULL);    
            $table->integer('assigned_to')->nullable()->default(NULL);       
            $table->timestamps();
        });
        
        Schema::table('electronics', function ($table) {
            $table->integer('location_id')->nullable()->default(NULL);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('electronics_users');
        
        Schema::table('electronics', function ($table) {
            $table->dropColumn('location_id');
        });


    }
}
