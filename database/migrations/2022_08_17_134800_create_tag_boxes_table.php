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
        Schema::create('tag_boxes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('registrations_id');
            $table->text('url_text');
            $table->text('headline_text');
            $table->text('subtitle_text');
            $table->string('img_file')->nullable();
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
        Schema::dropIfExists('tag_boxes');
    }
};
