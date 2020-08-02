<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateProgrammeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 100);
            $table->string('description', 255);
            $table->string('thumbnail', 255)->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->integer('channel_id')->index('programme_channel_idx');
            $table->timestamps();
            $table->foreign('channel_id', 'programme_channel_fk')
                ->references('id')
                ->on('channel')
                ->onUpdate('NO ACTION')
                ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programme');
    }
}
