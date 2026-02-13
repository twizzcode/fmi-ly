<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('link_services', function (Blueprint $table) {
        $table->id();
        $table->string('judul');      // Judul kartu
        $table->text('keterangan');   // Deskripsi di bawah judul
        $table->string('url');        // Link Google Form
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_services');
    }
};
