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
        Schema::create('noss_sessions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('programme_id')->constrained('programmes')->onDelete('cascade');
            $table->time('time_start');
            $table->time('time_end');
            $table->json('specialty');
            $table->string('position')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('noss_sessions', function (Blueprint $table){
            $table->dropForeign('sessions_programme_id_foreign');
            $table->dropColumn('programme_id');
        });
        Schema::dropIfExists('noss_sessions');
    }
};
