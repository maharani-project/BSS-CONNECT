<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengumumen', function (Blueprint $table) {
            $table->dropColumn(['isi', 'target', 'tanggal', 'waktu']);
        });
    }

    public function down(): void
    {
        Schema::table('pengumumen', function (Blueprint $table) {
            $table->text('isi')->nullable();
            $table->string('target')->nullable();
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
        });
    }
};