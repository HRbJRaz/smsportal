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
        Schema::create('observer_programme', function (Blueprint $table) {
            $table->foreignUuid('observer_id')->constrained('observers');
            $table->foreignUuid('programme_id')->constrained('programmes');;
            $table->primary(['observer_id', 'programme_id']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observer_programme');
    }
};
