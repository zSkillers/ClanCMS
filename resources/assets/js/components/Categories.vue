<template>
    <div>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Forum
                <small>Manage, add, and remove user accounts.</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Forum</a></li>
                <li class="active">Categories</li>
            </ol>
        </section>

        <section class="content">

        <div class="row mt-5">
          <div class="col-md-12" v-for="category in categories" :key="category.id">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{category.title}} Table [{{category.forums.total}}]</h3>

                    <div class="box-tools" @mouseover="changeCategoryId(category.id)">
                        <pagination class="pagination pagination-sm no-margin pull-right" :data="category.forums" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
              <!-- /.card-header -->
              <div class="box-body table-responsive p-0">
                <table class="table table-hover center">
                  <tbody>
                    <tr>
                        <th  v-if="$gate.isAdminOrAuthor()">ID</th>
                        <th>Title</th>
                        <th class="text-right" v-if="$gate.isAdminOrAuthor()">Action</th>
                  </tr>
                    <tr v-for="forum in category.forums.data" :key="forum.id">
                    <td  v-if="$gate.isAdminOrAuthor()">{{forum.id}}</td>
                    <td><router-link :to="'forum/' + forum.title + '/' + forum.id">{{forum.title}}</router-link></td>

                    <td class="text-right" v-if="$gate.isAdminOrAuthor()">
                        <a href="#" @click="editModal(forum)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                        <a href="#" @click="deleteCategory(category.id)">
                            <i class="fa fa-trash red"></i>
                        </a>

                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

    <!-- Modal -->
            <div class="modal fade in" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New Category</h5>
                    <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Categories Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editmode ? updateCategory() : createCategory()">
                <div class="modal-body">
                     <div class="form-group">
                        <input v-model="form.title" type="text" name="title"
                            placeholder="Title"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                        <has-error :form="form" field="title"></has-error>
                    </div>

                     <div class="form-group">
                        <input v-model="form.description" type="text" name="decription"
                            placeholder="Description"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
                        <has-error :form="form" field="description"></has-error>
                    </div>

                     <div class="form-group">
                        <input v-model="form.sort" type="number" name="sort"
                        placeholder="Sort Number"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('sort') }"></input>
                        <has-error :form="form" field="sort"></has-error>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                    <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                </div>

                </form>

                </div>
            </div>
            </div>
        </section>
    </div>



</template>

<script>
    export default {
        data() {
            return {
                editmode: false,
                categories : {},
                category_id: '1',
                form: new Form({
                    id:'',
                    title : '',
                    description: '',
                    sort: '',
                    created_at: '',
                    updated_at: ''
                })
            }
        },
        mounted() {
          //do something after mounting vue instance

        },
        methods: {
            changeCategoryId(id) {
              this.category_id = id;
            },
            getResults(page = 1) {
              var categoryId = this.category_id;
                  axios.get(this.$site_url_address + 'api/forum/category/' + categoryId + '?page=' + page)
                      .then(response => {
                        this.categories.forEach(function(entry) {
                          if (entry.id == categoryId) {
                            entry.forums = response.data;
                          }
                        });
                          //this.categories[category_id].forums = response;
                        });
                },
            updateCategory(){
                this.$Progress.start();
                // console.log('Editing data');
                this.form.put(this.$site_url_address + 'api/category/'+this.form.id)
                .then(() => {
                    // success
                    $('#addNew').modal('hide');
                     swal(
                        'Updated!',
                        'Category has been updated.',
                        'success'
                        )
                        this.$Progress.finish();
                         Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });

            },
            editModal(categories){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(categories);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteCategory(id){
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                        // Send request to the server
                         if (result.value) {
                                this.form.delete(this.$site_url_address + 'api/category/'+id).then(()=>{
                                        swal(
                                        'Deleted!',
                                        'The category has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreate');
                                }).catch(()=> {
                                    swal("Failed!", "There was something wronge.", "warning");
                                });
                         }
                    })
            },
            loadCategories(){
                    axios.get(this.$site_url_address + "api/category").then(({ data }) => (this.categories = data));
                    console.log(this.categories);
            },

            createCategory(){
                this.$Progress.start();

                this.form.post(this.$site_url_address + 'api/category')
                .then(()=>{
                  // success
                  $('#addNew').modal('hide');
                   swal(
                      'Created!',
                      'Category has been created.',
                      'success'
                      )
                      this.$Progress.finish();
                       Fire.$emit('AfterCreate');
                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            }
        },
        created() {
            Fire.$on('searching',() => {
                let query = this.$parent.search;
                axios.get(this.$site_url_address + 'api/findCategory?q=' + query)
                .then((data) => {
                    this.categories = data.data
                })
                .catch(() => {
                    this.$Progress.fail();
                })
            });
           this.loadCategories();
           Fire.$on('AfterCreate',() => {
               this.loadCategories();
           });
        //    setInterval(() => this.loadUsers(), 3000);
        }

    }
</script>
