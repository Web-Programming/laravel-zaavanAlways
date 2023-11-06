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
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->foreignId('prodi_id')->after('tanggal_lahir')->constrained()
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }
    public function down(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropForeign('mahasiswa_prodi_id_foreign');
                $table->dropColumn('prodi_id');
        });
    }
};