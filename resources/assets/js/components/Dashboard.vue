<template>
  <div>
        <div v-if="$gate.isAdminOrAuthor()">
          <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Widgets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Widgets</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{widgetInfo.userCount}}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <router-link to="/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{widgetInfo.categoryCount}}</h3>

                <p>Category</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <router-link to="/category" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{widgetInfo.forumCount}}</h3>

                <p>Forums</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <router-link to="/category" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          <!-- ./col -->
        </div>
          <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fa fa-envelope-o"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Messages</span>
                          <span class="info-box-number">1,410</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fa fa-flag-o"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Bookmarks</span>
                          <span class="info-box-number">410</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fa fa-files-o"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Uploads</span>
                          <span class="info-box-number">13,648</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>

                    <!-- /.col -->
                  </div>
        </div>

        <div v-if="!$gate.isAdminOrAuthor()">
            <not-found></not-found>
        </div>
      </div>
</template>

<script>
    export default {
      data() {
          return {
              widgetInfo : ''
          }
      },
      mounted() {
        console.log('Component mounted.')
        this.loadSetting();
      },
      methods: {
        loadSetting() {
          axios.get('api/dashboard').then(response => {
            this.widgetInfo = response.data;
            console.log(this.widgetInfo);
                      console.log(this.widgetInfo.userCount);
          });
        },
        created() {
           this.loadSetting();
            //setInterval(() => this.loadSetting(), 3000);
        }
      }
    }
</script>
