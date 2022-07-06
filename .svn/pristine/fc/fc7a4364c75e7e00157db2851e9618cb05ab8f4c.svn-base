<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostcentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

          Schema::create('costcentres', function ($table) {
            $table->increments('id');
            $table->string('costcode')->nullable()->default(NULL);
            $table->integer('dept_id')->nullable()->default(NULL);
            $table->string('note')->nullable()->default(NULL);     
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {          
        Schema::drop('costcentres');
    }
}
