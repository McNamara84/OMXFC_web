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
        Schema::table('users', function (Blueprint $table) {
            $table->string('vorname');
            $table->string('nachname');
            $table->string('strasse');
            $table->string('hausnummer');
            $table->string('postleitzahl');
            $table->string('stadt');
            $table->string('land');
            $table->string('rolle')->default('anwaerter'); // Standardrolle setzen
            $table->boolean('agb_akzeptiert')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('vorname');
            $table->dropColumn('nachname');
            $table->dropColumn('strasse');
            $table->dropColumn('hausnummer');
            $table->dropColumn('postleitzahl');
            $table->dropColumn('stadt');
            $table->dropColumn('land');
            $table->dropColumn('rolle');
            $table->dropColumn('agb_akzeptiert');
        });
    }
};
