<template>
    <tr>
      <td>{{ title }}</td>
      <td>{{ user.name }}</td>
      <td>{{ replycount }}</td>
      <td>Last Reply Here</td>
    </tr><!-- /.tr -->
</template>

<script>
export default {
  data() {
    return {
      user: {name:'Loading..'},
    }
  },
  props: ['title', 'userid', 'replycount'],
  created() {
    axios.get(this.$site_url_address + 'api/user/' + this.userid)
    .then(response => {this.user = response.data});
  }
}
</script>

<style>

</style>
