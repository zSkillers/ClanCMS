<template>
  <div>

      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1 v-model="title">
              {{title}}
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Forum</a></li>
              <li class="active">Categories</li>
          </ol>
      </section>

      <section class="content">
    <div class="box">
      <div class="box-body">
        <template v-for="post in posts.data">
          <postbit
          :username='post.user.name'
          avatar='http://zforums.org/data/avatars/l/0/1.jpg?1503969235'
          :message='post.body'
          :date='post.created_at'
          ></postbit>
        </template>
        <div style="overflow-x: scroll;">
            <pagination :data="posts" @pagination-change-page="loadPosts"></pagination>
        </div> <!-- /.card-footer -->
        <editor v-model="model"></editor>
        <button style="margin-top:5px;" class="btn btn-success page-item btn-sm pull-right" @click="createPost">Add Post<i class="fa  fa-plus-square fa-fw"></i></button>
      </div><!-- /.card-body -->
    </div> <!-- /.container -->
</section>
  </div>
</template>

<script>
import postbit from './Forum/PostBit.vue'
import editor from './Editor.vue'

export default {
  data() {
    return {
      posts: {},
      model: '',
      title: ''
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
        .then(response => (this.posts = response.data,
        this.title = response.data.data[0].thread.title));
    },
      createPost() {
          axios({
              method: 'post',
              url: this.$site_url_address + 'api/post',
              data: {
                  thread_id: this.$route.params.thread_id,
                  post: this.model,
              }
          })
              .then(response => (
                  this.model = '',
                  toast({
                      type: 'success',
                      title: 'Post Created Successful'
                  })
      ))
              .catch(function(response) {
                  console.log(response);
                  swal("Failed!", "Something went wrong!", "warning");
              });
              this.loadPosts();
              this.model = '';
    },
  },
  mounted() {
    this.loadPosts();
  }
}
</script>

<style>

</style>
