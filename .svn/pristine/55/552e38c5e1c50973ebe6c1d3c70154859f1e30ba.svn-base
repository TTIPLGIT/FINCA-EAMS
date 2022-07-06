<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfrastructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infrastructures', function ($table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('stock_holder_code')->nullable();
            $table->integer('category_id')->nullable()->default(NULL);
            $table->string('description')->nullable();
            $table->date('purchase_date')->nullable();
            $table->decimal('purchase_cost', 8, 2)->nullable();
            $table->string('revenue_village')->nullable()->default(NULL);
            $table->string('dimension')->nullable()->default(NULL);
            $table->string('improvement')->nullable()->default(NULL);
            $table->string('life_of_assets')->nullable()->default(NULL);
            $table->integer('no_of_floor')->nullable()->default(NULL);
            $table->integer('no_of_years')->nullable()->default(NULL);
            $table->integer('remaining_life')->nullable()->default(NULL);
            $table->decimal('rate_of_depreciation', 8, 2)->nullable();
            $table->string('currunt_use_of_building')->nullable()->default(NULL);
            $table->string('remarks')->nullable()->default(NULL);
            $table->integer('assigned_to')->nullable();           
            $table->integer('user_id')->nullable();
            $table->timestamps();            
            $table->engine = 'InnoDB';
        });

         Schema::table('asset_logs', function ($table) {
            $table->integer('infrastructures_id')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('infrastructures');
         Schema::table('infrastructures', function ($table) {
            $table->dropColumn('location_id');
        });
    }
}
