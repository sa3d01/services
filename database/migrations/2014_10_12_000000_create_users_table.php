<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['ADMIN','USER','PROVIDER'])->default('USER');
            $table->string('name')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->json('location')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->string('image')->nullable();
            //for provider
            $table->boolean('approved')->nullable()->default(false);
            $table->string('reject_reason')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->string('marketer_id')->nullable();
            //id and os
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->json('device')->nullable();
            $table->boolean('banned')->nullable()->default(false);
            $table->string('last_ip')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
