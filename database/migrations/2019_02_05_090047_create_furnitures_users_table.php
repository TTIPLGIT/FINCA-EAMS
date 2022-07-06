<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFurnituresUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('furnitures_users', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->default(NULL); 
            $table->integer('furnitures_id')->nullable()->default(NULL);    
            $table->integer('assigned_to')->nullable()->default(NULL);       
            $table->timestamps();
        });
        
        Schema::table('furnitures', function ($table) {
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
        Schema::drop('furnitures_users');
        
        Schema::table('furnitures', function ($table) {
            $table->dropColumn('location_id');
        });

    }
}
