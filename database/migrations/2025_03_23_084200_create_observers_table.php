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
        Schema::create('observers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->string('callsign');
            $table->date('initial_course_date')->nullable();
            $table->date('refresher_course_date')->nullable();
            $table->date('assigement_date')->nullable();
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::table('observers', function (Blueprint $table)
        {
            $table->dropForeign('observers_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('observers');
    }
};
