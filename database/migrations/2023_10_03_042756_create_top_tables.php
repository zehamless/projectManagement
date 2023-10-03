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
        Schema::create('top', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('project_id'); // Tambahkan kolom project_id
            $table->string('type');
            $table->decimal('progress');
            $table->string('description');
            $table->string('status');
            $table->timestamps();

            // Tambahkan constraint foreign key ke tabel projects dan set cascade onDelete
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top');
    }
};
