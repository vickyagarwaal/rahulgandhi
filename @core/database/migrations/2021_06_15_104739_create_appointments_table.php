<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categories_id')->nullable();
            $table->string('booking_time_ids')->nullable();
            $table->text('title')->nullable();
            $table->string('designation')->nullable();
            $table->text('location')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('additional_info')->nullable();
            $table->longText('experience_info')->nullable();
            $table->longText('specialized_info')->nullable();
            $table->longText('booking_info')->nullable();
            $table->string('status')->nullable();
            $table->string('appointment_status')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('max_appointment')->nullable();
            $table->float('price')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_tags')->nullable();
            $table->text('og_meta_description')->nullable();
            $table->text('og_meta_title')->nullable();
            $table->text('og_meta_image')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('created_by')->nullable();
            $table->text('slug')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
