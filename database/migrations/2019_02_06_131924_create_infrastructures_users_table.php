<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfrastructuresUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infrastructures_users', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->default(NULL); 
            $table->integer('infrastructures_id')->nullable()->default(NULL);    
            $table->integer('assigned_to')->nullable()->default(NULL);       
            $table->timestamps();
        });
        
        Schema::table('infrastructures', function ($table) {
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
        Schema::drop('infrastructures_users');
        
        Schema::table('infrastructures', function ($table) {
            $table->dropColumn('location_id');
        });
    }
}
