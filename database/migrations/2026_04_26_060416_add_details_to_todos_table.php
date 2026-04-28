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
    Schema::table('todos', function (Blueprint $table) {
        $table->date('due_date')->nullable(); // Menambah kolom tanggal
        $table->enum('priority', ['low', 'medium', 'high'])->default('medium'); // Menambah kolom prioritas
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todos', function (Blueprint $table) {
            //
        });
    }
};
