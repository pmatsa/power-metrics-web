<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1555511164472DevicesTable extends Migration
{
    public function up()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->string('name')->change();
        });
    }

    public function down()
    {
        Schema::table('devices', function (Blueprint $table) {
        });
    }
}
