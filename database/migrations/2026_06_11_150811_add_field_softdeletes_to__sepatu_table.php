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
        Schema::table('sepatus', function (Blueprint $table) {
            $table->text('deskripsi')->nullable(); // field baru
            $table->softDeletes();                 // dukungan soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sepatus', function (Blueprint $table) {
            $table->dropColumn('deskripsi');       // rollback field baru
            $table->dropSoftDeletes();             // rollback soft deletes
        });
    }
};
