<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {

            $table->increments('id', true);

            $table->integer('type_id')->index()->unsigned();
            $table->foreign('type_id')->references('id')->on('users_type')->onDelete('cascade');
            
            $table->string('name', 50)->nullable();
            $table->string('avatar', 100)->default('static/icon/user.png');
            $table->string('phone', 50)->unique()->nullable();
            $table->string('email', 50)->unique()->nullable();
            $table->string('password');
            $table->dateTime('password_last_updated_at')->nullable();
            $table->dateTime('password_last_updater')->nullable();
            $table->boolean('is_active')->default(0);

            $table->integer('creator_id')->unsigned()->index()->nullable();
            $table->integer('updater_id')->unsigned()->index()->nullable();
            $table->integer('deleter_id')->unsigned()->index()->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
