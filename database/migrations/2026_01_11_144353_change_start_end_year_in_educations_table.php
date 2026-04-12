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
    Schema::table('educations', function (Blueprint $table) {
        $table->year('start_year')->change();
        $table->year('end_year')->change();
    });
}

public function down()
{
    Schema::table('educations', function (Blueprint $table) {
        $table->date('start_year')->change();
        $table->date('end_year')->change();
    });
}
};
