<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->char('type',50)->default('app');
            $table->boolean('status')->default(1);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('note_ar')->nullable();
            $table->string('note_en')->nullable();
            $table->string('link',20)->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
