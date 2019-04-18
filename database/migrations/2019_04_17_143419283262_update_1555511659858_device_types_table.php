<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1555511659858DeviceTypesTable extends Migration
{
    public function up()
    {
        Schema::table('device_types', function (Blueprint $table) {
            $table->string('name')->change();
        });
    }

    public function down()
    {
        Schema::table('device_types', function (Blueprint $table) {
        });
    }
}
