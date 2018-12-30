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
            <SmallBoxMoreInfo
            v-bind:header='widgetInfo.userCount'
            body='Users'
            url='/users'
            icon='ion ion-ios-people'
            color='bg-success-gradient'
            ></SmallBoxMoreInfo>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <SmallBoxMoreInfo
            v-bind:header='widgetInfo.categoryCount'
            body='Category'
            url='/category'
            icon='ion ion-locked'
            color='bg-primary-gradient'
            ></SmallBoxMoreInfo>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <SmallBoxMoreInfo
            v-bind:header='widgetInfo.forumCount'
            body='Forum'
            url='/category'
            icon='ion ion-pie-graph'
            color='bg-danger-gradient'
            ></SmallBoxMoreInfo>
          </div>

        </div>
        <div class="row">
          <div class="col-lg-4 col-6">
            <SmallBoxMoreInfo
            v-bind:header='widgetInfo.categoryCount'
            body='Threads'
            url='/users'
            icon='ion ion-ios-people'
            color='bg-warning'
            ></SmallBoxMoreInfo>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <SmallBoxMoreInfo
            v-bind:header='widgetInfo.forumCount'
            body='Posts'
            url='/category'
            icon='ion ion-chatbubble-working'
            color='bg-info'
            ></SmallBoxMoreInfo>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <SmallBoxMoreInfo
            v-bind:header='widgetInfo.userCount'
            body='Staff Online'
            url='/category'
            icon='ion ion-arrow-graph-up-right'
            color='bg-danger'
            ></SmallBoxMoreInfo>
          </div>
          <!-- ./col -->
        </div>
        </div>

        <div v-if="!$gate.isAdminOrAuthor()">
            <not-found></not-found>
        </div>
      </div>
</template>

<script>
import SmallBoxMoreInfo from './Widgets/SmallBoxMoreInfo.vue'
    export default {
      data() {
          return {
              widgetInfo : ''
          }
      },
      components: {
        SmallBoxMoreInfo
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
