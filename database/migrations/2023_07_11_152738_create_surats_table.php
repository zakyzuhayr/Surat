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
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('status_surat')->nullable()->comment('cth: Asli');
            $table->string('sifat_surat')->nullable()->comment('cth: Penting, Sangat Penting');
            $table->string('sumber_surat')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('kode_surat')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->date('tanggal_surat_masuk')->nullable();
            $table->string('perihal')->nullable();
            $table->string('file')->nullable();
            $table->string('check_status')->nullable();
            $table->string('tindakan')->nullable();
            $table->string('catatan')->nullable();
            $table->foreignId('divisi_id')->nullable();
            // $table->foreignId('disposisi_id')->nullable();
            $table->timestamps();
        });

        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->nullable();
            $table->string('sifat_surat')->nullable();
            $table->string('perihal')->nullable();
            $table->string('tanggal_surat')->nullable();
            $table->string('surat_kepada')->nullable();
            $table->string('pembuat_surat')->nullable();
            $table->string('status_surat')->nullable();
            $table->string('lampiran')->nullable();
            $table->foreignId('divisi_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuk');
        Schema::dropIfExists('surat_keluar');
    }
};
