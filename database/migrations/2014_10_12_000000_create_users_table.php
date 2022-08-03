<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('password');
            $table->string('image')->default('images/profile.png');
            $table->string('type', 1)->default(1);
            $table->string('phone')->nullable();
            $table->string('address')->nullable();  
            $table->date('dob')->nullable();
            $table->unsignedBigInteger('created_user_id');
            $table->foreign('created_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('updated_user_id');
            $table->foreign('updated_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('deleted_user_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
};
