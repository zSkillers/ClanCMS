<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories as CategoryModel;
use Illuminate\Support\Facades\DB;
use App\Category as Category;
use App\Forum as Forum;


class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::all();
      foreach ($categories as $key => $category) {
        $category['forums'] = Forum::where('category_id', $category['id'])->paginate(5);
      }

      return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'sort' => 'required|integer'
        ]);
        // $this->validate;

        Category::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'sort' => $request['sort']
        ]);

        return ['message' => 'Created Category successful.'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $this->validate($request,[
            'title' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'sort' => 'required|integer'
        ]);

        $category->update($request->all());
        return ['message' => 'Updated the category info'];
    }

    public function countTotal() {
      return ['count' => Category::count()];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $this->authorize('isAdmin');

      $category = Category::findOrFail($id);

      $category->delete();

      return ['message' => 'Category Deleted'];
    }

    public function search(){
      if ($search = \Request::get('q')) {
          $categories = Category::where(function($query) use ($search){
              $query->where('title','LIKE',"%$search%")
                      ->orWhere('description','LIKE',"%$search%");
          })->paginate(20);
      }else{
          $categories = Category::latest()->paginate(5);
      }

      return $categories;
    }
}
