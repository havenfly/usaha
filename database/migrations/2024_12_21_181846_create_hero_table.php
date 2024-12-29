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
    Schema::create('hero', function (Blueprint $table) {
        $table->id('id_hero');
        $table->string('nama_hero');
        $table->unsignedBigInteger('rolehero_id'); // Kolom unsigned untuk foreign key
        $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
        $table->enum('tier', ['S', 'S++']);
        $table->timestamps();

        // foreign key
        $table->foreign('rolehero_id')->references('id')->on('role_hero')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero');
    }
};
