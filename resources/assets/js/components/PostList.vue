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
        <editor v-model="model"></editor>
        <button class="btn btn-success page-item btn-sm" @click="loadLastPost">Add Post<i class="fas fa-user-plus fa-fw"></i></button>
      </div><!-- /.card-body -->
      <div class="card-footer" style="overflow-x: scroll;">
          <pagination :data="posts" @pagination-change-page="loadPosts"></pagination>
      </div> <!-- /.card-footer -->
    </div> <!-- /.container -->
  </div>
</template>

<script>
import postbit from './Forum/PostBit.vue'
import editor from './Editor.vue'

export default {
  data() {
    return {
      posts: {},
      model: ''
    }
  },
  components: {
    postbit,
    editor
  },
  methods: {
    loadPosts(page = 1) {
      axios
        .get(this.$site_url_address + 'api/posts/' + this.$route.params.thread_id + '?page=' + page)
        .then(response => (this.posts = response.data));
    },
    loadLastPost() {
        this.posts.current_page = this.posts.last_page;
    }
  },
  mounted() {
    this.loadPosts();
  }
}
</script>

<style>

</style>
