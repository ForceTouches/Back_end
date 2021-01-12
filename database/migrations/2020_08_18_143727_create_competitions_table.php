<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->boolean('type')->comment = '1:location 2:social';
            $table->date('expire_date');
            $table->time('expire_time');
            $table->string('country');
            $table->string('gift_cate');
            $table->string('gift');
            $table->string('location')->nullable();
            $table->string('latitude')->nullable();;
            $table->string('longitude')->nullable();;
            $table->text('social_links')->nullable();
            $table->boolean('installed')->comment = '0:uninstalled 1:installed';
            $table->boolean('approved')->comment = '0:unapproved 1:approved';
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
        Schema::dropIfExists('competitions');
    }
}
