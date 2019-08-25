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
              :pinned="thread.pinned"
              :username="thread.user.name"
              :url="'thread/' + thread.titleid"
              :replycount="thread.id"
              ></postbit>
            </template><!-- /.template -->
          </tbody>
        </table>
      </div> <!-- /.card-body -->
      <div class="box-footer">
          <pagination :data="threads" @pagination-change-page="loadThreads"></pagination>
                    <div>
          <label>Thread Title</label>
          <input style="margin-bottom:5px;" type="text" class="form-control" placeholder="Enter title here..." v-model="thread_title"/>
          <editor v-model="thread_body"></editor>
          <button style="margin-top:5px;" class="btn btn-success page-item btn-sm pull-right" @click="createThread">Create Thread<i class="fa  fa-plus-square fa-fw"></i></button>
      </div>
      </div> <!-- /.card-footer -->    </div> <!-- /.card -->
</section>
  </div> <!-- /.div-->
</template>

<script>
import postbit from './Forum/ThreadBits.vue'
import editor from './Editor.vue'

export default {
    data() {
        return {
            threads: {},
            thread_title: '',
            thread_body: ''
        }
    },
    components: {
        postbit,
        editor,
    },
    methods: {
        loadThreads(page = 1) {
            axios
                .get(this.$site_url_address + 'api/threads/' + this.$route.params.forum_id + '?page=' + page)
                .then(response => (this.threads = response.data));
        },
         createThread() {
            axios({
                method: 'post',
                url: this.$site_url_address + 'api/thread',
                data: {
                    forum_id: this.$route.params.forum_id,
                    thread_title: this.thread_title,
                    thread_body: this.thread_body
                }
            })
                .then(response => (
                    toast({
                        type: 'success',
                        title: 'Thread Created Successful'
                    })
        ))
                .catch(function(response) {
                    console.log(response);
                    swal("Failed!", "Something went wrong!", "warning");
                });
        this.thread_body = "";
        this.loadThreads();
      },
    },
    mounted() {
        this.loadThreads();
    }
}
</script>
