<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_contact_name')->nullable();
            $table->string('business_contact_number')->nullable();
            $table->string('business_contact_email')->nullable();
            $table->string('business_website')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->text('business_profile')->nullable();
            $table->json('business_sectors')->nullable();
            $table->json('services')->nullable();
            $table->json('business_hours')->nullable();
            $table->string('business_establishment_date')->nullable();
            $table->string('geographical_area')->nullable();
            $table->json('search_keywords')->nullable();
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
        Schema::dropIfExists('businesses');
    }
}
