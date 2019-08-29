<template>
    <div>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Forums
                <small>Disscussion amongst the community.</small>
            </h1>
            <ol v-if="$gate.isAdmin()" class="breadcrumb">
                <li><button v-if="$gate.isAdmin() && toggle == 1" @click="createModalForum()" class="btn btn-primary btn-xs">Add Category</button></li>
                <li><button v-if="$gate.isAdmin()" @click="toggleAdminCP" class="btn btn-primary btn-xs">{{adminToggleButton}}</button></li>
            </ol>
        </section>

        <section class="content">

        <div class="row mt-5">
          <div class="col-md-12" v-for="category in categories" :key="category.id">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{category.title}} </h3>
                    <div class="box-tools" @mouseover="changeCategoryId(category.id)">
                        <template v-if="$gate.isAdmin() && toggle == 1">
                            <a href="#" @click="createForumModel(category)">
                                <i class="fa fa-plus blue"></i>
                            </a>
                            /
                            <a href="#" @click="editCategoryModel(category)">
                                <i class="fa fa-edit blue"></i>
                            </a>
                            /
                            <a href="#" @click="deleteCategory(category.id)">
                                <i class="fa fa-trash red"></i>
                            </a>
                        </template>
                    </div>
                </div>
              <!-- /.card-header -->
              <div class="box-body table-responsive p-0">
                <table class="table table-hover center">
                  <tbody>
                    <tr>
                        <th>Title</th>
                        <th>Threads</th>
                        <th>Posts</th>
                        <th class="text-right" v-if="$gate.isAdmin() && toggle == 1">Action</th>
                  </tr>
                    <tr v-for="forum in category.forums" :key="forum.id">
                    <td><router-link :to="'forum/' + forum.title + '/' + forum.id">{{forum.title}}</router-link><br /><small>{{forum.description}}</small></td>
                    <td><router-link :to="'forum/' + forum.title + '/' + forum.id">{{forum.thread_count}}</router-link></td>
                    <td><router-link :to="'forum/' + forum.title + '/' + forum.id">{{forum.post_count}}</router-link></td>

                    <td class="text-right" v-if="$gate.isAdminOrAuthor() && toggle == 1">
                        <a href="#" @click="editModalForum(forum)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                        <a href="#" @click="deleteForum(forum.id)">
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
            <div class="modal fade in" id="categoryModel" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
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

            <!-- Modal -->
                    <div class="modal fade in" id="forumModel" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New Forum</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Forum Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="editmode ? updateForum() : createForum()">
                        <div class="modal-body">
                             <div class="form-group">
                                <input v-model="formForum.title" type="text" name="title"
                                    placeholder="Title"
                                    class="form-control" :class="{ 'is-invalid': formForum.errors.has('title') }">
                                <has-error :form="formForum" field="title"></has-error>
                            </div>

                             <div class="form-group">
                                <input v-model="formForum.description" type="text" name="decription"
                                    placeholder="Description"
                                    class="form-control">
                                <has-error :form="formForum" field="description"></has-error>
                            </div>

                            <div class="form-group">
                               <input v-model="formForum.category_id" type="number" name="category_id"
                                   placeholder="Category Id"
                                   class="form-control" :class="{ 'is-invalid': formForum.errors.has('category_id') }">
                               <has-error :form="formForum" field="category_id"></has-error>
                           </div>

                             <div class="form-group">
                                <input v-model="formForum.sort" type="number" name="sort"
                                placeholder="Sort Number"
                                class="form-control" :class="{ 'is-invalid': formForum.errors.has('sort') }"></input>
                                <has-error :form="formForum" field="sort"></has-error>
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
                toggle: '0',
                adminToggleButton: 'Enable Admin CP',
                form: new Form({
                    id:'',
                    title : '',
                    description: '',
                    sort: '',
                    created_at: '',
                    updated_at: ''
                }),
                formForum: new Form({
                    id:'',
                    title : '',
                    description: '',
                    category_id: '',
                    sort: '',
                    created_at: '',
                    updated_at: ''
                }),
                formNewForum: new Form({
                    title : '',
                    description : '',
                    sort : ''
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
            toggleAdminCP() {
                if (this.toggle == 0) {
                    this.toggle = 1;
                    this.adminToggleButton = 'Disable Admin CP';
                } else {
                    this.toggle = 0;
                    this.adminToggleButton = 'Enable Admin CP';
                }
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
                    $('#categoryModel').modal('hide');
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
            updateForum(){
                this.$Progress.start();
                // console.log('Editing data');
                this.formForum.put(this.$site_url_address + 'api/forum/'+this.formForum.id)
                .then(() => {
                    // success
                    $('#forumModel').modal('hide');
                     swal(
                        'Updated!',
                        'Forum has been updated.',
                        'success'
                        )
                        this.$Progress.finish();
                         Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });

            },
            editCategoryModel(categories){
                this.editmode = true;
                this.form.reset();
                $('#categoryModel').modal('show');
                this.form.fill(categories);
            },
            createForumModel(categories){
                this.editmode = false;
                this.formForum.reset();
                this.formForum.category_id = categories.id;
                $('#forumModel').modal('show');
            },
            editModalForum(forum){
                this.editmode = true;
                this.formForum.reset();
                $('#forumModel').modal('show');
                this.formForum.fill(forum);
            },
            createModalForum(){
                this.editmode = false;
                this.form.reset();
                $('#categoryModel').modal('show');
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
                                    swal("Failed!", "There was something wrong.", "warning");
                                });
                         }
                    })
            },
            deleteForum(id){
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
                                this.formForum.delete(this.$site_url_address + 'api/forum/'+id).then(()=>{
                                        swal(
                                        'Deleted!',
                                        'The forum has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreate');
                                }).catch(()=> {
                                    swal("Failed!", "There was something wrong.", "warning");
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
                  $('#categoryModel').modal('hide');
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
        },
        createForum(){
            this.$Progress.start();

            this.formForum.post(this.$site_url_address + 'api/forum')
            .then(()=>{
              // success
              $('#forumModel').modal('hide');
               swal(
                  'Created!',
                  'Forum has been created.',
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
