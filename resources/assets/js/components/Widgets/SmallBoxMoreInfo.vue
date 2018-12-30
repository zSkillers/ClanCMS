<template>
  <div class="small-box shadow" :class='color'>
    <div class="inner">
      <h3>{{header}}</h3>
      <p>{{body}}</p>
    </div>
    <div class="icon">
      <i :class='icon'></i>
    </div>
    <router-link :to='url' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></router-link>
  </div>
</template>

<script>
export default {
  props: ['header', 'body', 'url', 'icon', 'color']
}
</script>

<style>

</style>
