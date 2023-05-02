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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('days');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('leave_type_id')->constrained();
            $table->unsignedBigInteger('approval_user_id');
            $table->foreign('approval_user_id')->references('id')->on('users')->nullable();
            $table->foreignId('leave_statuse_id')->constrained();
            $table->string('comment');
            $table->timestamps();

            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
