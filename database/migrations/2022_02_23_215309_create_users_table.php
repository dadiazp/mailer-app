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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('id_number');
            $table->string('password');
            $table->date('birthday');
            $table->string('phone_number')->nullable();
            $table->boolean('is_admin')->default(0); // 0 = client && 1 = admin
            $table->boolean('is_active')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->foreignId('city_id')->constrained('cities');
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
