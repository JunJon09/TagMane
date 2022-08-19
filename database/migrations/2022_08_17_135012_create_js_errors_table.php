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
        Schema::create('js_errors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('registrations_id');
            $table->bigInteger('boxes_id');
            $table->bigInteger('url_js');
            $table->bigInteger('headline_js');
            $table->bigInteger('subtitle_js');
            $table->bigInteger('img_js');
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
        Schema::dropIfExists('js_errors');
    }
};
