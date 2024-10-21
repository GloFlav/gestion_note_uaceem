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
        //
        Schema::table('vagues', function (Blueprint $table) {
            $table->string('commentaire')->nullable();
            $table->date('deb_insc');
            $table->date('fin_insc')->nullable();
            $table->date('deb_conc');
            $table->date('fin_conc')->nullable();
            $table->foreignId('concours_id')->nullable()->constrained('concours')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
