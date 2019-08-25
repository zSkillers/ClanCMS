<?php

use Illuminate\Database\Seeder;

class StatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 50; $i++) {
          DB::table('stats')->insert([
            'user_id' => $i,
            'overall_rank' => rand(),
            'overall_level' => rand(),
            'overall_xp' => rand(),
            'attack_rank' => rand(),
            'attack_level' => rand(),
            'attack_xp' => rand(),
            'defence_rank' => rand(),
            'defence_level' => rand(),
            'defence_xp' => rand(),
            'strength_rank' => rand(),
            'strength_level' => rand(),
            'strength_xp' => rand(),
            'hitpoints_rank' => rand(),
            'hitpoints_level' => rand(),
            'hitpoints_xp' => rand(),
            'ranged_rank' => rand(),
            'ranged_level' => rand(),
            'ranged_xp' => rand(),
            'prayer_rank' => rand(),
            'prayer_level' => rand(),
            'prayer_xp' => rand(),
            'magic_rank' => rand(),
            'magic_level' => rand(),
            'magic_xp' => rand(),
            'cooking_rank' => rand(),
            'cooking_level' => rand(),
            'cooking_xp' => rand(),
            'woodcutting_rank' => rand(),
            'woodcutting_level' => rand(),
            'woodcutting_xp' => rand(),
            'fletching_rank' => rand(),
            'fletching_level' => rand(),
            'fletching_xp' => rand(),
            'fishing_rank' => rand(),
            'fishing_level' => rand(),
            'fishing_xp' => rand(),
            'firemaking_rank' => rand(),
            'firemaking_level' => rand(),
            'firemaking_xp' => rand(),
            'crafting_rank' => rand(),
            'crafting_level' => rand(),
            'crafting_xp' => rand(),
            'smithing_rank' => rand(),
            'smithing_level' => rand(),
            'smithing_xp' => rand(),
            'mining_rank' => rand(),
            'mining_level' => rand(),
            'mining_xp' => rand(),
            'herlore_rank' => rand(),
            'herlore_level' => rand(),
            'herlore_xp' => rand(),
            'agility_rank' => rand(),
            'agility_level' => rand(),
            'agility_xp' => rand(),
            'thieving_rank' => rand(),
            'thieving_level' => rand(),
            'thieving_xp' => rand(),
            'slayer_rank' => rand(),
            'slayer_level' => rand(),
            'slayer_xp' => rand(),
            'farming_rank' => rand(),
            'farming_level' => rand(),
            'farming_xp' => rand(),
            'runecraft_rank' => rand(),
            'runecraft_level' => rand(),
            'runecraft_xp' => rand(),
            'hunter_rank' => rand(),
            'hunter_level' => rand(),
            'hunter_xp' => rand(),
            'construction_rank' => rand(),
            'construction_level' => rand(),
            'construction_xp' => rand(),
            'clue_scroll_all_score' => rand(),
            'clue_scroll_easy_score' => rand(),
            'clue_scroll_beginner_score' => rand(),
            'clue_scroll_medium_score' => rand(),
            'clue_scroll_hard_score' => rand(),
            'clue_scroll_elite_score' => rand(),
            'clue_scroll_master_score' => rand(),
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
          ]);
        }
    }
}
