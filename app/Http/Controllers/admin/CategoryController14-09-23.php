<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use Image;
use Session;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category_data'] = Category::orderBy('id','DESC')->paginate(5);
        return view('admin.list_category',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'page_url' => 'required',
        ]);

        $category = new Category;
        $category->name      = $request->name;
        $category->page_url  = $request->page_url;
        $category->meta_title  = $request->meta_title;
        $category->meta_keywords  = $request->meta_keywords;
        $category->meta_description  = $request->meta_description;
        $category->set_order = 0;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category Added Successfully');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.edit_category',compact('category'));
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
        $request->validate([
            'name' => 'required',
            'page_url' => 'required',
        ]);

        $category = Category::find($id);
        $category->name     = $request->name;
        $category->page_url = $request->page_url;
        $category->meta_title  = $request->meta_title;
        $category->meta_keywords  = $request->meta_keywords;
        $category->meta_description  = $request->meta_description;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete_id = $request->selected;
        // echo $delete_id;exit;
        Category::whereIn('id',$delete_id)->delete();
        return redirect()->route('category.index')->with('success','Category has been deleted successfully');
    }

    public function set_order_category()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        // echo $id."-".$val;exit;
        DB::table('categories')->where('id', $id)->update(array('set_order' => $val));
        echo "1";
        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');
    }
}
