<template>
  <div>
    <h1>{{posts.data[0].thread.title}}</h1>
    <div class="card">
      <div class="card-body">
        <template v-for="post in posts.data">
          <postbit
          :username='post.user.name'
          avatar='http://zforums.org/data/avatars/l/0/1.jpg?1503969235'
          :message='post.body'
          :date='post.created_at'
          ></postbit>
        </template>
      </div><!-- /.card-body -->
      <div class="card-footer" style="overflow-x: scroll;">
          <pagination :data="posts" @pagination-change-page="loadPosts"></pagination>
      </div> <!-- /.card-footer -->
    </div> <!-- /.container -->
  </div>
</template>

<script>
import postbit from './Forum/PostBit.vue'

export default {
  data() {
    return {
      posts: {}
    }
  },
  components: {
    postbit
  },
  methods: {
    loadPosts(page = 1) {
      axios
        .get(this.$site_url_address + 'api/posts/' + this.$route.params.thread_id + '?page=' + page)
        .then(response => (this.posts = response.data));
    }
  },
  mounted() {
    this.loadPosts();
  }
}
</script>

<style>

</style>
