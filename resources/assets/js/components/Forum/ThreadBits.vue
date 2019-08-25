<template>
    <tr>
      <td><router-link :to="'../../thread/' + titleid + ''"><i v-if="pinned" class="fa fa-map-pin"></i> {{title}}</router-link></td>
      <td>{{ username }}</td>
      <td>{{ replycount }}</td>
      <td>Last Reply Here</td>
    </tr><!-- /.tr -->
</template>

<script>
export default {
  props: ['title', 'titleid', 'username', 'replycount', 'url', 'pinned']
}
</script>

<style>

</style>
