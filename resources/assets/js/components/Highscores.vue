<template>
    <div>
        <section class="content-header">
            <h1>
                Highscore
                <small>Whos the best?</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Highscores</a></li>
                <li class="active">Overall</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Highscores</h3>

                    <div @change="updatehighscore" class="pull-right">
                        <select v-model="skill">
                            <option value="">Select Skill</option>
                            <option value="overall">Overall</option>
                            <option value="attack">Attack</option>
                            <option value="defence">Defence</option>
                            <option value="strength">Strength</option>
                            <option value="hitpoints">Hitpoints</option>
                            <option value="ranged">Ranged</option>
                            <option value="prayer">Prayer</option>
                            <option value="magic">Magic</option>
                            <option value="cooking">Cooking</option>
                            <option value="woodcutting">Woodcutting</option>
                            <option value="fletching">Fletching</option>
                            <option value="fishing">Fishing</option>
                            <option value="firemaking">Firemaking</option>
                            <option value="crafting">Crafting</option>
                            <option value="smithing">Smithing</option>
                            <option value="mining">Mining</option>
                            <option value="herblore">Herblore</option>
                            <option value="agility">Agility</option>
                            <option value="thieving">Thieving</option>
                            <option value="slayer">Slayer</option>
                            <option value="farming">Farming</option>
                            <option value="runecraft">Runecraft</option>
                            <option value="hunter">Hunter</option>
                            <option value="construction">Construction</option>
                            <option value="clue_scroll_all">Clue Scroll All</option>
                            <option value="clue_scroll_easy">Clue Scroll Easy</option>
                            <option value="clue_scroll_beginner">Clue Scroll Beginner</option>
                            <option value="clue_scroll_medium">Clue Scroll Medium</option>
                            <option value="clue_scroll_hard">Clue Scroll Hard</option>
                            <option value="clue_scroll_elite">Clue Scroll Elite</option>
                            <option value="clue_scroll_master">Clue Scroll Master</option>
                        </select>
                        <select @change="" v-model="type">
                            <option value="">Select Type</option>
                            <option value="xp">Experience</option>
                            <option value="rank">Rank</option>
                            <option value="level">Level</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <tbody>

                            <tr>
                                <th>Rank</th>
                                <th>Username</th>
                                <th>Experience</th>
                            </tr>

                            <tr v-for="stat in updatehighscore(stats)" :key="stat.id">
                                <td>{{stat.id}}</td>
                                <td>{{stat.rsname}}</td>
                                <!-- Overall -->
                                <td v-if="skill == 'overall' && type== 'xp'">{{stat.overall_xp}}</td>
                                <td v-if="skill == 'overall' && type== 'level'">{{stat.overall_level}}</td>
                                <td v-if="skill == 'overall' && type== 'rank'">{{stat.overall_rank}}</td>
                                <!-- Attack -->
                                <td v-if="skill == 'attack' && type== 'xp'">{{stat.attack_xp}}</td>
                                <td v-if="skill == 'attack' && type== 'level'">{{stat.attack_level}}</td>
                                <td v-if="skill == 'attack' && type== 'rank'">{{stat.attack_rank}}</td>
                                <!-- Defence -->
                                <td v-if="skill == 'defence' && type== 'xp'">{{stat.defence_xp}}</td>
                                <td v-if="skill == 'defence' && type== 'level'">{{stat.defence_level}}</td>
                                <td v-if="skill == 'defence' && type== 'rank'">{{stat.defence_rank}}</td>
                                <!-- Strength -->
                                <td v-if="skill == 'strength' && type== 'xp'">{{stat.strength_xp}}</td>
                                <td v-if="skill == 'strength' && type== 'level'">{{stat.strength_level}}</td>
                                <td v-if="skill == 'strength' && type== 'rank'">{{stat.strength_rank}}</td>
                                <!-- Hitpoints -->
                                <td v-if="skill == 'hitpoints' && type== 'xp'">{{stat.hitpoints_xp}}</td>
                                <td v-if="skill == 'hitpoints' && type== 'level'">{{stat.hitpoints_level}}</td>
                                <td v-if="skill == 'hitpoints' && type== 'rank'">{{stat.hitpoints_rank}}</td>
                                <!-- Ranged -->
                                <td v-if="skill == 'ranged' && type== 'xp'">{{stat.ranged_xp}}</td>
                                <td v-if="skill == 'ranged' && type== 'level'">{{stat.ranged_level}}</td>
                                <td v-if="skill == 'ranged' && type== 'rank'">{{stat.ranged_rank}}</td>
                                <!-- Prayer -->
                                <td v-if="skill == 'prayer' && type== 'xp'">{{stat.prayer_xp}}</td>
                                <td v-if="skill == 'prayer' && type== 'level'">{{stat.prayer_level}}</td>
                                <td v-if="skill == 'prayer' && type== 'rank'">{{stat.prayer_rank}}</td>
                                <!-- Magic -->
                                <td v-if="skill == 'magic' && type== 'xp'">{{stat.magic_xp}}</td>
                                <td v-if="skill == 'magic' && type== 'level'">{{stat.magic_level}}</td>
                                <td v-if="skill == 'magic' && type== 'rank'">{{stat.magic_rank}}</td>
                                <!-- Woodcutting -->
                                <td v-if="skill == 'woodcutting' && type== 'xp'">{{stat.woodcutting_xp}}</td>
                                <td v-if="skill == 'woodcutting' && type== 'level'">{{stat.woodcutting_level}}</td>
                                <td v-if="skill == 'woodcutting' && type== 'rank'">{{stat.woodcutting_rank}}</td>
                                <!-- Fletching -->
                                <td v-if="skill == 'fletching' && type== 'xp'">{{stat.fletching_xp}}</td>
                                <td v-if="skill == 'fletching' && type== 'level'">{{stat.fletching_level}}</td>
                                <td v-if="skill == 'fletching' && type== 'rank'">{{stat.fletching_rank}}</td>
                                <!-- Fishing -->
                                <td v-if="skill == 'fishing' && type== 'xp'">{{stat.fishing_xp}}</td>
                                <td v-if="skill == 'fishing' && type== 'level'">{{stat.fishing_level}}</td>
                                <td v-if="skill == 'fishing' && type== 'rank'">{{stat.fishing_rank}}</td>
                                <!-- Firemaking -->
                                <td v-if="skill == 'firemaking' && type== 'xp'">{{stat.firemaking_xp}}</td>
                                <td v-if="skill == 'firemaking' && type== 'level'">{{stat.firemaking_level}}</td>
                                <td v-if="skill == 'firemaking' && type== 'rank'">{{stat.firemaking_rank}}</td>
                                <!-- Crafting -->
                                <td v-if="skill == 'crafting' && type== 'xp'">{{stat.crafting_xp}}</td>
                                <td v-if="skill == 'crafting' && type== 'level'">{{stat.crafting_level}}</td>
                                <td v-if="skill == 'crafting' && type== 'rank'">{{stat.crafting_rank}}</td>
                                <!-- Smithing -->
                                <td v-if="skill == 'smithing' && type== 'xp'">{{stat.smithing_xp}}</td>
                                <td v-if="skill == 'smithing' && type== 'level'">{{stat.smithing_level}}</td>
                                <td v-if="skill == 'smithing' && type== 'rank'">{{stat.smithing_rank}}</td>
                                <!-- Mining -->
                                <td v-if="skill == 'mining' && type== 'xp'">{{stat.mining_xp}}</td>
                                <td v-if="skill == 'mining' && type== 'level'">{{stat.mining_level}}</td>
                                <td v-if="skill == 'mining' && type== 'rank'">{{stat.mining_rank}}</td>
                                <!-- Herblore -->
                                <td v-if="skill == 'herblore' && type== 'xp'">{{stat.herblore_xp}}</td>
                                <td v-if="skill == 'herblore' && type== 'level'">{{stat.herblore_level}}</td>
                                <td v-if="skill == 'herblore' && type== 'rank'">{{stat.herblore_rank}}</td>
                                <!-- Agility -->
                                <td v-if="skill == 'agility' && type== 'xp'">{{stat.agility_xp}}</td>
                                <td v-if="skill == 'agility' && type== 'level'">{{stat.agility_level}}</td>
                                <td v-if="skill == 'agility' && type== 'rank'">{{stat.agility_rank}}</td>
                                <!-- Thieving -->
                                <td v-if="skill == 'thieving' && type== 'xp'">{{stat.thieving_xp}}</td>
                                <td v-if="skill == 'thieving' && type== 'level'">{{stat.thieving_level}}</td>
                                <td v-if="skill == 'thieving' && type== 'rank'">{{stat.thieving_rank}}</td>
                                <!-- Slayer -->
                                <td v-if="skill == 'slayer' && type== 'xp'">{{stat.slayer_xp}}</td>
                                <td v-if="skill == 'slayer' && type== 'level'">{{stat.slayer_level}}</td>
                                <td v-if="skill == 'slayer' && type== 'rank'">{{stat.slayer_rank}}</td>
                                <!-- Farming -->
                                <td v-if="skill == 'farming' && type== 'xp'">{{stat.farming_xp}}</td>
                                <td v-if="skill == 'farming' && type== 'level'">{{stat.farming_level}}</td>
                                <td v-if="skill == 'farming' && type== 'rank'">{{stat.farming_rank}}</td>
                                <!-- Runecrafting -->
                                <td v-if="skill == 'runecrafting' && type== 'xp'">{{stat.runecrafting_xp}}</td>
                                <td v-if="skill == 'runecrafting' && type== 'level'">{{stat.runecrafting_level}}</td>
                                <td v-if="skill == 'runecrafting' && type== 'rank'">{{stat.overarunecrafting_rank}}</td>
                                <!-- Hunter -->
                                <td v-if="skill == 'hunter' && type== 'xp'">{{stat.hunter_xp}}</td>
                                <td v-if="skill == 'hunter' && type== 'level'">{{stat.hunter_level}}</td>
                                <td v-if="skill == 'hunter' && type== 'rank'">{{stat.hunter_rank}}</td>
                                <!-- Construction -->
                                <td v-if="skill == 'construction' && type== 'xp'">{{stat.construction_xp}}</td>
                                <td v-if="skill == 'construction' && type== 'level'">{{stat.construction_level}}</td>
                                <td v-if="skill == 'construction' && type== 'rank'">{{stat.construction_rank}}</td>
                                <!-- Clue Scroll All -->
                                <td v-if="skill == 'clue_scroll_all_score'">{{stat.clue_scroll_all}}</td>
                                <!-- Clue Scroll Beginner -->
                                <td v-if="skill == 'clue_scroll_beginner_score'">{{stat.clue_scroll_beginner}}</td>
                                <!-- Clue Scroll Easy -->
                                <td v-if="skill == 'clue_scroll_easy_score'">{{stat.clue_scroll_easy}}</td>
                                <!-- Clue Scroll Medium -->
                                <td v-if="skill == 'clue_scroll_medium_score'">{{stat.clue_scroll_medium}}</td>
                                <!-- Clue Scroll Hard -->
                                <td v-if="skill == 'clue_scroll_hard_score'">{{stat.clue_scroll_hard}}</td>
                                <!-- Clue Scroll Elite -->
                                <td v-if="skill == 'clue_scroll_elite_score'">{{stat.clue_scroll_elite}}</td>
                                <!-- Clue Scroll Master -->
                                <td v-if="skill == 'clue_scroll_master_score'">{{stat.clue_scroll_master}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div> <!-- /.container -->
</template>

<script>
    export default {
        data() {
            return {
                stats: {},
                skill: "overall",
                type: "xp",
            }
        },
        mounted() {

        },
        methods: {
            getStats() {
                axios.get(this.$site_url_address + "api/stat").then(({ data }) => (this.stats = data));
                console.log(this.stats);
                },
                even: function(arr) {
                  // Set slice() to avoid to generate an infinite loop!
                  return arr.slice().sort(function(a, b) {
                    return b[4]- a[4];
                })
            },
            updatehighscore(arr) {
                // Overall
                if (this.skill == 'overall' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.overall_xp - a.overall_xp;
                  })
                }
                else if (this.skill == 'overall' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.overall_level - a.overall_level;
                  })
                }
                else if (this.skill == 'overall' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.overall_rank - a.overall_rank;
                  })
                }
                // Attack
                else if (this.skill == 'attack' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.attack_xp - a.attack_xp;
                  })
                }
                else if (this.skill == 'attack' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.attack_level - a.attack_level;
                  })
                }
                else if (this.skill == 'attack' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.attack_rank - a.attack_rank;
                  })
                }
                // Defence
                else if (this.skill == 'defence' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.defence_xp - a.defence_xp;
                  })
                }
                else if (this.skill == 'defence' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.defence_level - a.defence_level;
                  })
                }
                else if (this.skill == 'defence' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.defence_rank - a.defence_rank;
                  })
                }
                // Strength
                else if (this.skill == 'strength' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.strength_xp - a.strength_xp;
                  })
                }
                else if (this.skill == 'strength' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.strength_level - a.strength_level;
                  })
                }
                else if (this.skill == 'strength' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.strength_rank - a.strength_rank;
                  })
                }
                // Hitpoints
                else if (this.skill == 'hitpoints' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.hitpoints_xp - a.hitpoints_xp;
                  })
                }
                else if (this.skill == 'hitpoints' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.hitpoints_level - a.hitpoints_level;
                  })
                }
                else if (this.skill == 'hitpoints' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.hitpoints_rank - a.hitpoints_rank;
                  })
                }
                // Ranged
                else if (this.skill == 'ranged' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.ranged_xp - a.ranged_xp;
                  })
                }
                else if (this.skill == 'ranged' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.ranged_level - a.ranged_level;
                  })
                }
                else if (this.skill == 'ranged' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.ranged_rank - a.ranged_rank;
                  })
                }
                // Prayer
                else if (this.skill == 'prayer' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.prayer_xp - a.prayer_xp;
                  })
                }
                else if (this.skill == 'ranged' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.prayer_level - a.prayer_level;
                  })
                }
                else if (this.skill == 'prayer' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.prayer_rank - a.prayer_rank;
                  })
                }
                // Magic
                else if (this.skill == 'magic' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.magic_xp - a.magic_xp;
                  })
                }
                else if (this.skill == 'magic' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.magic_level - a.magic_level;
                  })
                }
                else if (this.skill == 'magic' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.magic_rank - a.magic_rank;
                  })
                }
                // Cooking
                else if (this.skill == 'cooking' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.cooking_xp - a.cooking_xp;
                  })
                }
                else if (this.skill == 'cooking' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.cooking_level - a.cooking_level;
                  })
                }
                else if (this.skill == 'cooking' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.cooking_rank - a.cooking_rank;
                  })
                }
                // Woodcutting
                else if (this.skill == 'woodcutting' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.woodcutting_xp - a.woodcutting_xp;
                  })
                }
                else if (this.skill == 'woodcutting' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.woodcutting_level - a.woodcutting_level;
                  })
                }
                else if (this.skill == 'woodcutting' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.woodcutting_rank - a.woodcutting_rank;
                  })
                }
                // Fletching
                else if (this.skill == 'fletching' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.fletching_xp - a.fletching_xp;
                  })
                }
                else if (this.skill == 'fletching' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.fletching_level - a.fletching_level;
                  })
                }
                else if (this.skill == 'fletching' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.fletching_rank - a.fletching_rank;
                  })
                }
                // Fishing
                else if (this.skill == 'fishing' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.fishing_xp - a.fishing_xp;
                  })
                }
                else if (this.skill == 'fishing' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.fishing_level - a.fishing_level;
                  })
                }
                else if (this.skill == 'fishing' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.fishing_rank - a.fishing_rank;
                  })
                }
                // Firemaking
                else if (this.skill == 'firemaking' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.firemaking_xp - a.firemaking_xp;
                  })
                }
                else if (this.skill == 'firemaking' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.firemaking_level - a.firemaking_level;
                  })
                }
                else if (this.skill == 'firemaking' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.firemaking_rank - a.firemaking_rank;
                  })
                }
                // Crafting
                else if (this.skill == 'crafting' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.crafting_xp - a.crafting_xp;
                  })
                }
                else if (this.skill == 'crafting' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.crafting_level - a.crafting_level;
                  })
                }
                else if (this.skill == 'crafting' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.crafting_rank - a.crafting_rank;
                  })
                }
                // Smithing
                else if (this.skill == 'smithing' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.smithing_xp - a.smithing_xp;
                  })
                }
                else if (this.skill == 'smithing' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.smithing_level - a.smithing_level;
                  })
                }
                else if (this.skill == 'smithing' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.smithing_rank - a.smithing_rank;
                  })
                }
                // Mining
                else if (this.skill == 'mining' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.mining_xp - a.mining_xp;
                  })
                }
                else if (this.skill == 'mining' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.mining_level - a.mining_level;
                  })
                }
                else if (this.skill == 'mining' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.mining_rank - a.mining_rank;
                  })
                }
                // Herblore
                else if (this.skill == 'herblore' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.herblore_xp - a.herblore_xp;
                  })
                }
                else if (this.skill == 'herblore' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.herblore_level - a.herblore_level;
                  })
                }
                else if (this.skill == 'herblore' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.herblore_rank - a.herblore_rank;
                  })
                }
                // Agility
                else if (this.skill == 'agility' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.agility_xp - a.agility_xp;
                  })
                }
                else if (this.skill == 'agility' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.agility_level - a.agility_level;
                  })
                }
                else if (this.skill == 'agility' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.agility_rank - a.agility_rank;
                  })
                }
                // thieving
                else if (this.skill == 'thieving' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.thieving_xp - a.thieving_xp;
                  })
                }
                else if (this.skill == 'thieving' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.thieving_level - a.thieving_level;
                  })
                }
                else if (this.skill == 'thieving' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.thieving_rank - a.thieving_rank;
                  })
                }
                // slayer
                else if (this.skill == 'slayer' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.slayer_xp - a.thieving_xp;
                  })
                }
                else if (this.skill == 'slayer' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.slayer_level - a.slayer_level;
                  })
                }
                else if (this.skill == 'slayer' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.slayer_rank - a.slayer_rank;
                  })
                }
                // farming
                else if (this.skill == 'farming' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.farming_xp - a.farming_xp;
                  })
                }
                else if (this.skill == 'farming' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.farming_level - a.farming_level;
                  })
                }
                else if (this.skill == 'farming' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.farming_rank - a.farming_rank;
                  })
                }
                // runecraft
                else if (this.skill == 'runecraft' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.runecraft_xp - a.runecraft_xp;
                  })
                }
                else if (this.skill == 'runecraft' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.runecraft_level - a.runecraft_level;
                  })
                }
                else if (this.skill == 'runecraft' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.runecraft_rank - a.runecraft_rank;
                  })
                }
                // hunter
                else if (this.skill == 'hunter' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.hunter_xp - a.hunter_xp;
                  })
                }
                else if (this.skill == 'hunter' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.hunter_level - a.hunter_level;
                  })
                }
                else if (this.skill == 'hunter' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.hunter_rank - a.hunter_rank;
                  })
                }
                // construction
                else if (this.skill == 'construction' && this.type == "xp") {
                    return arr.slice().sort(function(a, b) {
                      return b.construction_xp - a.construction_xp;
                  })
                }
                else if (this.skill == 'construction' && this.type == "level") {
                    return arr.slice().sort(function(a, b) {
                      return b.construction_level - a.constructionlevel;
                  })
                }
                else if (this.skill == 'construction' && this.type == "rank") {
                    return arr.slice().sort(function(a, b) {
                      return b.construction_rank - a.construction_rank;
                  })
                }
                // clue_scroll_all_score
                else if (this.skill == 'clue_scroll_all_score') {
                    return arr.slice().sort(function(a, b) {
                      return b.clue_scroll_all_score - a.clue_scroll_all_score
                  })
                }
                // clue_scroll_easy_score
                else if (this.skill == 'clue_scroll_easy_score') {
                    return arr.slice().sort(function(a, b) {
                      return b.clue_scroll_easy_score - a.clue_scroll_easy_score
                  })
                }
                // clue_scroll_beginner_score
                else if (this.skill == 'clue_scroll_beginner_score') {
                    return arr.slice().sort(function(a, b) {
                      return b.clue_scroll_beginner_score - a.clue_scroll_beginner_score
                  })
                }
                // clue_scroll_medium_score
                else if (this.skill == 'clue_scroll_medium_score') {
                    return arr.slice().sort(function(a, b) {
                      return b.clue_scroll_medium_score - a.clue_scroll_medmium_score
                  })
                }
                // clue_scroll_hard_score
                else if (this.skill == 'clue_scroll_hard_score') {
                    return arr.slice().sort(function(a, b) {
                      return b.clue_scroll_hard_score - a.clue_scroll_hard_score
                  })
                }
                // clue_scroll_elite_score
                else if (this.skill == 'clue_scroll_elite_score') {
                    return arr.slice().sort(function(a, b) {
                      return b.clue_scroll_elite_score - a.clue_scroll_lite_score
                  })
                }
                // clue_scroll_master_score
                else if (this.skill == 'clue_scroll_master_score') {
                    return arr.slice().sort(function(a, b) {
                      return b.clue_scroll_mater_score - a.clue_scroll_master_score
                  })
                }
            }

        },
        created() {
            this.getStats();
        }

    }
</script>
