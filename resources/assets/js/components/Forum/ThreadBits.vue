<template>
    <tr>
      <td><router-link :to="'../../thread/' + titleid + ''">{{title}}</router-link></td>
      <td>{{ username }}</td>
      <td>{{ replycount }}</td>
      <td>Last Reply Here</td>
    </tr><!-- /.tr -->
</template>

<script>
export default {
  props: ['title', 'titleid', 'username', 'replycount', 'url']
}
</script>

<style>

</style>
