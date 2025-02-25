<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todo_liste', function (Blueprint $table) {
            $table->id();
            $table->string('titel');
            $table->text('beschreibung')->nullable();
            $table->unsignedBigInteger('zugewiesen_an'); // Fremdschlüssel zu users.id
            $table->boolean('erledigt')->default(false);
            $table->integer('belohnungspunkte')->default(0);
            $table->timestamps();

            $table->foreign('zugewiesen_an')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_liste');
    }
};