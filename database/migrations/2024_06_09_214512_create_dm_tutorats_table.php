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
        Schema::create('dm_tutorats', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('niveau');
            $table->string('expertise');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère user_id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_tutorats');
    }

};
