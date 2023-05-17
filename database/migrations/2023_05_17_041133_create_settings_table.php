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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slogan');
            $table->text('shortDescription');
            $table->text('longDescription');
            $table->string('strHomeBanner');
            $table->string('strVideo');
            $table->string('strLink');
            $table->string('strFace');
            $table->string('strInsta');
            $table->string('strFooter');
            $table->string('strLocation');
            $table->string('strContact');
            $table->string('strEmail');
            $table->text('strMap');
            $table->integer('experience');
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
        Schema::dropIfExists('settings');
    }
};
