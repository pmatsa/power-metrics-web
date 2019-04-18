<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1555510407617DeviceTypesTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('device_types');
    }

    public function down()
    {
        Schema::create('device_types', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }
}
