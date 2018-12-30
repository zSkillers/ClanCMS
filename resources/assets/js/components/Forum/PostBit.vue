<template>
  <div class="direct-chat-msg">
    <div class="direct-chat-info clearfix">
        <span class="direct-chat-name pull-left">{{username}}</span>
        <span class="direct-chat-timestamp pull-right">{{date}}</span>
    </div><!-- /.direct-chat-info -->
    <img class="direct-chat-img" :src='avatar' alt="message user image">
    <!-- /.direct-chat-img -->
    <div class="direct-chat-text">
        {{message}}
    </div><!-- /.direct-chat-text -->
  </div><!-- /.direct-chat-msg -->
</template>

<script>
export default {
  props: ['username', 'avatar', 'message', 'date']
}
</script>
