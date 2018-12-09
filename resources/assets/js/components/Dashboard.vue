<template>
    <div class="container">
        <div class="row justify-content-center" v-if="$gate.isAdminOrAuthor()">
          <div class="box box-solid box-default">...</div>
          <div class="box box-solid box-primary">...</div>
          <div class="box box-solid box-info">...</div>
          <div class="box box-solid box-warning">...</div>
          <div class="box box-solid box-success">...</div>
          <div class="box box-solid box-danger">...</div>
        </div>

        <div v-if="!$gate.isAdminOrAuthor()">
            <not-found></not-found>
        </div>
    </div>
</template>

<script>
    export default {
      name: 'Button',
      components: {

      }
    }
</script>
