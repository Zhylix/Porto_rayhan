<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
Schema::create('educations', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('school');
    $table->year('start_year'); // simpan tahun saja
    $table->year('end_year');   // simpan tahun saja
    $table->timestamps();
});

    }

    public function down(): void
    {
    Schema::table('educations', function (Blueprint $table) {
        $table->dropColumn('title');
    });
    }
};
