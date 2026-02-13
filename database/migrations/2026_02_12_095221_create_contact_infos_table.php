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
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Untuk menyimpan: Sekretariat, Email, atau WhatsApp
            $table->string('icon'); // Untuk nama icon heroicons (o-map-pin, o-envelope, dll)
            $table->text('value');  // Untuk isi kontaknya (Alamat, email@..., no hp)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_infos');
    }
};
