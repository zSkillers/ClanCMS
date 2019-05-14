<template>
  <div>

      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Threads
              <small>Something here.</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Forum</a></li>
              <li class="active">Categories</li>
          </ol>
      </section>

      <section class="content">

    <div class="box">
      <div class="box-body">
        <table class="table table-striped table-hover">
          <thead>
            <th>Title</th>
            <th>Username</th>
            <th>Replies</th>
            <th>Last Reply</th>
          </thead>
          <tbody>
            <template v-for="thread in threads.data" >
              <postbit
              :title="thread.title"
              :titleid="thread.id"
              :username="thread.user.name"
              :url="'thread/' + thread.title + '/' + thread.titleid"
              :replycount="thread.id"
              ></postbit>
            </template><!-- /.template -->
          </tbody>
        </table>
      </div> <!-- /.card-body -->
      <div class="box-footer">
          <pagination :data="threads" @pagination-change-page="loadThreads"></pagination>
      </div> <!-- /.card-footer -->
        <editor v-model="model">{{ model }}</editor>
    </div> <!-- /.card -->
</section>
  </div> <!-- /.div-->
</template>

<script>
import postbit from './Forum/ThreadBits.vue'

export default {
    data() {
        return {
            threads: {},
        }
    },
    components: {
        postbit
    },
    methods: {
        loadThreads(page = 1) {
            axios
                .get(this.$site_url_address + 'api/threads/' + this.$route.params.forum_id + '?page=' + page)
                .then(response => (this.threads = response.data));
        }
    },
    mounted() {
        this.loadThreads();
    }
}
</script>
