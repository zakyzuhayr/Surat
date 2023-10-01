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
        Schema::create('disposisis', function (Blueprint $table) {
            $table->id();
            $table->string('penerima')->nullable();
            $table->string('tenggat_waktu')->nullable();
            $table->string('isi_disposisi')->nullable();
            $table->string('sifat_status')->nullable();
            $table->string('catatan')->nullable();
            $table->foreignId('surat_masuk_id')->nullable();
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
        Schema::dropIfExists('disposisis');
    }
};
