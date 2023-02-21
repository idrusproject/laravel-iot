<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mqtt_messages', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->string('relay1')->nullable();
            $table->string('relay2')->nullable();
            $table->string('relay3')->nullable();
            $table->string('relay4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mqtt_messages');
    }
};
