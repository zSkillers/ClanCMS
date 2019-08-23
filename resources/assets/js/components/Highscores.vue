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

                    <div class="pull-right">
                        <select name="type">
                            <option value="">Select Skill</option>
                            <option value="admin">Overall</option>
                            <option value="user">Attack</option>
                            <option value="author">Defence</option>
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

                            <tr v-for="stat in even(stats)" :key="stat.id">
                                <td>{{stat.id}}</td>
                                <td>{{stat.rsname}}</td>
                                <td>{{stat.overall_xp}}</td>
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
                skill: "overall_xp",
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
    return b.overall_xp - a.overall_xp;
  });
}

        },
        created() {
            this.getStats();
        }

    }
</script>
