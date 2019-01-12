<template>
    <div class="container">
      <br />
      <div class="card text-white bg-primary mb-3 shadow">
  <div class="card-header">Header</div>
  <div class="card-body bg-white">
    <div class="direct-chat-msg">
      <div class="direct-chat-info clearfix">
          <span class="direct-chat-name pull-left">Alexander Pierce</span>
          <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
      </div><!-- /.direct-chat-info -->
      <img class="direct-chat-img" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="message user image">
      <!-- /.direct-chat-img -->
      <div class="direct-chat-text">
          Is this template really for free? That's unbelievable!
      </div><!-- /.direct-chat-text -->
  </div><!-- /.direct-chat-msg -->
  <div class="direct-chat-msg">
    <div class="direct-chat-info clearfix">
        <span class="direct-chat-name pull-left">Alexander Pierce</span>
        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
    </div><!-- /.direct-chat-info -->
    <img class="direct-chat-img" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="message user image">
    <!-- /.direct-chat-img -->
    <div class="direct-chat-text">
        Is this template really for free? That's unbelievable!
    </div><!-- /.direct-chat-text -->
</div><!-- /.direct-chat-msg -->    <div class="direct-chat-msg">
      <div class="direct-chat-info clearfix">
          <span class="direct-chat-name pull-left">Alexander Pierce</span>
          <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
      </div><!-- /.direct-chat-info -->
      <img class="direct-chat-img" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="message user image">
      <!-- /.direct-chat-img -->
      <div class="direct-chat-text">
          Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!Is this template really for free? That's unbelievable!
      </div><!-- /.direct-chat-text -->
  </div><!-- /.direct-chat-msg -->    <div class="direct-chat-msg">
        <div class="direct-chat-info clearfix">
            <span class="direct-chat-name pull-left">Alexander Pierce</span>
            <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
        </div><!-- /.direct-chat-info -->
        <img class="direct-chat-img" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
            Is this template really for free? That's unbelievable!
        </div><!-- /.direct-chat-text -->
    </div><!-- /.direct-chat-msg -->    <div class="direct-chat-msg">
          <div class="direct-chat-info clearfix">
              <span class="direct-chat-name pull-left">Alexander Pierce</span>
              <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
          </div><!-- /.direct-chat-info -->
          <img class="direct-chat-img" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="message user image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
              Is this template really for free? That's unbelievable!
          </div><!-- /.direct-chat-text -->
      </div><!-- /.direct-chat-msg -->    <div class="direct-chat-msg">
            <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-left">Alexander Pierce</span>
                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
            </div><!-- /.direct-chat-info -->
            <img class="direct-chat-img" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="message user image">
            <!-- /.direct-chat-img -->
            <div class="direct-chat-text">
                Is this template really for free? That's unbelievable!
            </div><!-- /.direct-chat-text -->
        </div><!-- /.direct-chat-msg -->

  </div>
  <div class="card-footer bg-white">
    <form action="#" method="post">
        <div class="input-group">
            <input type="text" name="message" placeholder="Type Message ..." class="form-control">
            <span class="input-group-btn">
<button type="button" class="btn btn-primary btn-flat">Send</button>
</span>
        </div>
    </form>
  </div>
</div>


    </div>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        methods: {
          getThreads()
          {
            axios.get(this.$site_url_address + 'api/forum/category/' + categoryId + '?page=' + page)
                .then(response => {
                  this.categories.forEach(function(entry) {
                    if (entry.id == categoryId) {
                      entry.forums = response.data;
                    }
                  });
                    //this.categories[category_id].forums = response;
                  });
          }
        }
    }
</script>
