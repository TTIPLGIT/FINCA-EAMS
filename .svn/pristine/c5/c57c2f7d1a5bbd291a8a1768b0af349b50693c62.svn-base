<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFurnituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('furnitures', function ($table) {
            $table->increments('id');
            $table->string('name')->nullable()->default(NULL);
            $table->integer('category_id')->nullable()->default(NULL);
            $table->integer('user_id')->nullable()->default(NULL);
            $table->integer('qty')->default(0);
            $table->boolean('requestable')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });

        Schema::table('asset_logs', function ($table) {
            $table->integer('furnitures_id')->nullable()->default(NULL);
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
