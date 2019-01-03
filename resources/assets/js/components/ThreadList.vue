<template>
  <div><br />
    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead>
            <th>Title</th>
            <th>Username</th>
            <th>Replies</th>
            <th>Last Reply</th>
          </thead>
          <tbody>
            <template v-for="thread in threads.data" >
              <postbit :title="thread.title" :userid="thread.user_id" :replycount="thread.id"></postbit>
            </template><!-- /.template -->
          </tbody>
        </table>
      </div> <!-- /.card-body -->
      <div class="card-footer">
          <pagination :data="threads" @pagination-change-page="loadThreads"></pagination>
      </div> <!-- /.card-footer -->
    </div> <!-- /.card -->
  </div> <!-- /.div-->
</template>

<script>

import postbit from './Forum/ThreadBits.vue'

export default {
  data() {
    return {
      threads: {}
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

<style>

</style>
