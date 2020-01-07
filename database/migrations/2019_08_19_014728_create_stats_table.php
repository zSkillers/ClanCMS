<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->increments('id');
            $table
                ->integer('user_id')
                ->unsigned()
                ->index()
                ->nullable();

            $table->integer('overall_rank');
            $table->integer('overall_level');
            $table->integer('overall_xp');

            $table->integer('attack_rank');
            $table->integer('attack_level');
            $table->integer('attack_xp');

            $table->integer('defence_rank');
            $table->integer('defence_level');
            $table->integer('defence_xp');

            $table->integer('strength_rank');
            $table->integer('strength_level');
            $table->integer('strength_xp');

            $table->integer('hitpoints_rank');
            $table->integer('hitpoints_level');
            $table->integer('hitpoints_xp');

            $table->integer('ranged_rank');
            $table->integer('ranged_level');
            $table->integer('ranged_xp');

            $table->integer('prayer_rank');
            $table->integer('prayer_level');
            $table->integer('prayer_xp');

            $table->integer('magic_rank');
            $table->integer('magic_level');
            $table->integer('magic_xp');

            $table->integer('cooking_rank');
            $table->integer('cooking_level');
            $table->integer('cooking_xp');

            $table->integer('woodcutting_rank');
            $table->integer('woodcutting_level');
            $table->integer('woodcutting_xp');

            $table->integer('fletching_rank');
            $table->integer('fletching_level');
            $table->integer('fletching_xp');

            $table->integer('fishing_rank');
            $table->integer('fishing_level');
            $table->integer('fishing_xp');

            $table->integer('firemaking_rank');
            $table->integer('firemaking_level');
            $table->integer('firemaking_xp');

            $table->integer('crafting_rank');
            $table->integer('crafting_level');
            $table->integer('crafting_xp');

            $table->integer('smithing_rank');
            $table->integer('smithing_level');
            $table->integer('smithing_xp');

            $table->integer('mining_rank');
            $table->integer('mining_level');
            $table->integer('mining_xp');

            $table->integer('herlore_rank');
            $table->integer('herlore_level');
            $table->integer('herlore_xp');

            $table->integer('agility_rank');
            $table->integer('agility_level');
            $table->integer('agility_xp');

            $table->integer('thieving_rank');
            $table->integer('thieving_level');
            $table->integer('thieving_xp');

            $table->integer('slayer_rank');
            $table->integer('slayer_level');
            $table->integer('slayer_xp');

            $table->integer('farming_rank');
            $table->integer('farming_level');
            $table->integer('farming_xp');

            $table->integer('runecraft_rank');
            $table->integer('runecraft_level');
            $table->integer('runecraft_xp');

            $table->integer('hunter_rank');
            $table->integer('hunter_level');
            $table->integer('hunter_xp');

            $table->integer('construction_rank');
            $table->integer('construction_level');
            $table->integer('construction_xp');

            $table->integer('clue_scroll_all_score');
            $table->integer('clue_scroll_easy_score');
            $table->integer('clue_scroll_beginner_score');
            $table->integer('clue_scroll_medium_score');
            $table->integer('clue_scroll_hard_score');
            $table->integer('clue_scroll_elite_score');
            $table->integer('clue_scroll_master_score');

            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stats');
    }
}
