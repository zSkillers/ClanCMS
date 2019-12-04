<template>
  <div>

      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Forums
              <small>Disscussion amongst the community.</small>
          </h1>
          <ol v-if="$gate.isAdmin()" class="breadcrumb">
              <li><button v-if="$gate.isAdmin()" @click="toggleAdminCP" class="btn btn-primary btn-xs">{{adminToggleButton}}</button></li>
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
            <th class="text-right" v-if="$gate.isAdmin() && toggle == 1">Action</th>
          </thead>
          <tbody>
            <template v-for="thread in threads.data" >
                <tr>
                  <td><router-link :to="'../../thread/' + thread.id + ''"><i v-if="thread.pinned" class="fa fa-map-pin"></i><i v-if="thread.locked" class="fa fa-lock"></i> {{thread.title}}</router-link></td>
                  <td>{{ thread.user.name }}</td>
                  <td>{{ thread.post_count }}</td>
                  <td>Last UserID Here</td>
                  <td class="text-right" v-if="$gate.isAdminOrAuthor() && toggle == 1">
                      <a href="#" @click="pinOrUnpinThread(thread.id)">
                          <i class="fa fa-map-pin blue"></i>
                      </a>
                      /
                      <a href="#" @click="lockOrUnpockThread(thread.id)">
                          <i class="fa fa-lock blue"></i>
                      </a>
                      /
                      <a href="#" @click="editModalForum(forum)">
                          <i class="fa fa-edit blue"></i>
                      </a>
                      /
                      <a href="#" @click="deleteForum(forum.id)">
                          <i class="fa fa-trash red"></i>
                      </a>

                  </td>
                </tr>
            </template><!-- /.template -->
          </tbody>
        </table>
              <pagination :data="threads" @pagination-change-page="loadThreads"></pagination>
      </div> <!-- /.card-body -->
      </div> <!-- /.card -->
      <div class="box">
          <div class="box-body">
              <label>Thread Title</label>
              <input style="margin-bottom:5px;" type="text" class="form-control" placeholder="Enter title here..." v-model="thread_title"/>
              <editor v-model="thread_body"></editor>
              <button style="margin-top:5px;" class="btn btn-success page-item btn-sm pull-right" @click="createThread">Create Thread<i class="fa  fa-plus-square fa-fw"></i></button>
          </div>
      </div> <!-- /.card-footer -->
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
            thread_body: '',
            adminToggleButton: 'Enable Admin CP',
            toggle: 0,
        }
    },

    components: {
        postbit,
        editor,
    },

    methods: {

        /**
         * [toggleAdminCP Toggle Admin CP]
         * @return {[void]}
         */
        toggleAdminCP() {
            if (this.toggle == 0) {
                this.toggle = 1;
                this.adminToggleButton = 'Disable Admin CP';
            } else {
                this.toggle = 0;
                this.adminToggleButton = 'Enable Admin CP';
            }
        },

        /**
         * [loadThreads load the threads of current page]
         * @param  {Number} [page=1] [Page number]
         * @return {[void]}
         */
        loadThreads(page = 1) {
            axios
                .get(this.$site_url_address + 'api/threads/' + this.$route.params.forum_id + '?page=' + page)
                .then(response => (this.threads = response.data));
        },

        /**
         * [createThread description]
         * @return {[void]} [description]
         */
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

      /**
       * [createThread description]
       * @return {[void]} [description]
       */
       pinOrUnpinThread(threadID) {
          axios({
              method: 'post',
              url: this.$site_url_address + 'api/thread/pinned',
              data: {
                  id: threadID
              }
          })
              .then(response => (
                  toast({
                      type: 'success',
                      title: 'Pinned Change Successful'
                  })
      ))
              .catch(function(response) {
                  console.log(response);
                  swal("Failed!", "Something went wrong!", "warning");
              });
      this.thread_body = "";
      this.loadThreads();
    },

    /**
     * [lockOrUnpockThread description]
     * @return {[void]} [description]
     */
     lockOrUnpockThread(threadID) {
        axios({
            method: 'post',
            url: this.$site_url_address + 'api/thread/locked',
            data: {
                id: threadID
            }
        })
            .then(response => (
                toast({
                    type: 'success',
                    title: 'Lock Change Successful'
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
