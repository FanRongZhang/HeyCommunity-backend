<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsWithTopicOrTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords_with_topic_or_timelines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('word_id');
            $table->integer('topic_timeline_id');
            $table->boolean('is_topic_id');
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
        Schema::drop('keywords_with_topic_or_timelines');
    }
}
