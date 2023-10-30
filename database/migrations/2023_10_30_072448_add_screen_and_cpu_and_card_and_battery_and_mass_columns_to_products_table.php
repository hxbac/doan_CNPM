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
        Schema::table('products', function (Blueprint $table) {
            $table->string('screen');
            $table->string('cpu');
            $table->string('card');
            $table->integer('battery');
            $table->integer('mass');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('screen');
            $table->dropColumn('cpu');
            $table->dropColumn('card');
            $table->dropColumn('battery');
            $table->dropColumn('mass');
        });
    }
};
