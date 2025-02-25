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
        Schema::create('kassenbuch', function (Blueprint $table) {
            $table->id();
            $table->date('datum');
            $table->string('beschreibung');
            $table->decimal('einnahmen', 8, 2)->nullable();
            $table->decimal('ausgaben', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kassenbuch');
    }
};