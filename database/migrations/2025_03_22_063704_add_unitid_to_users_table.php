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
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('unit_id')->nullable()->after('id');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('set null');
        });
        Schema::table('units', function (Blueprint $table) {
            $table->foreignUuid('div_id')
                ->references('id')
                ->on('divisions')
                ->nullable();
            $table->foreignUuid('manager_id')
                ->references('id')
                ->on('users')
                ->nullable();
        });
        Schema::table('divisions', function (Blueprint $table) {
            $table->foreignUuid('director_id')
                ->references('id')
                ->on('users')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::table('users', function (Blueprint $table)
        {
            $table->dropForeign('users_unit_id_foreign');
            $table->dropColumn('unit_id');
        });
        Schema::table('divisions', function (Blueprint $table)
        {
            $table->dropForeign('divisions_director_id_foreign');
            $table->dropColumn('director_id');
        });
        Schema::table('units', function (Blueprint $table)
        {
            $table->dropForeign('units_div_id_foreign');
            $table->dropColumn('div_id');
            $table->dropForeign('units_manager_id_foreign');
            $table->dropColumn('manager_id');
        });
    }
};
