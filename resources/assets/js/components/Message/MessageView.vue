<template>
    <section class="content"><div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ messages.data[0].private_thread.title }}</h3>

                <div class="box-tools pull-right">
                    <pagination size="small" :data="messages" @pagination-change-page="loadMessages"></pagination>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div v-for="messageItem in messages.data" class="mailbox-read-message">
                    <postbit
                        :username='messageItem.user.name'
                        avatar='http://zforums.org/data/avatars/l/0/1.jpg?1503969235'
                        :message='messageItem.message'
                        :date='messageItem.updated_at'
                    ></postbit>
                </div>
                <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
                <div class="pull-right">
                    <button type="button" class="btn btn-default" disabled><i class="fa fa-reply"></i> Reply</button>
                    <button type="button" class="btn btn-default" disabled><i class="fa fa-share"></i> Forward</button>
                </div>
                <button type="button" class="btn btn-default" disabled><i class="fa fa-trash-o"></i> Delete</button>
                <button type="button" class="btn btn-default" disabled><i class="fa fa-print"></i> Print</button>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /. box -->
    </div></div>
    </section>
</template>

<script>
import postbit from '../Forum/PostBit.vue'
import editor from "../Editor";

export default {
    data() {
        return {
            messages: {},
        }
    },

    components: {
        postbit
    },

    mounted() {
        this.loadMessages();
    },

    methods : {
        loadMessages(page = 1) {
            axios.get(this.$site_url_address + 'api/message/' + this.$route.params.message_id + '?page=' + page)
                .then(response => {
                    this.messages = response.data;
                });
        },
    }
}
</script>

<style>
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 0px 0;
        border-radius: 4px
    }
</style>
