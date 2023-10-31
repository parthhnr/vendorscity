<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Models\admin\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blog_data']=Blog::orderBy('id','DESC')->get();
        return view('admin.list_blog',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo"<pre>";print_r($request->post());echo"</pre>";exit;
        $request->validate([
            'name' => 'required',
        ]);

        $name = $request->input('name');
        $page_url = $request->input('page_url');
        $description = $request->input('description');

        if($request->file('image') != ''){

            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $image_name = time().$remove_space;

            $destination_path = public_path('upload/blog/large');
            $img = Image::make($image->path());

            $width = 525;
            $height = 370;

            $img->resize($width,$height,function($constraint){

            })->save($destination_path."/".$image_name);


            $width = 265;
            $height = 185;
            $destination_path = public_path('upload/blog/small');
            $img->resize($width,$height,function($constraint){

            })->save($destination_path."/".$image_name);

            $destination_path = public_path('upload/blog');
            $image->move($destination_path,$image_name);
            $image = $image_name;
        }else{
            $image = "";
        }


        $data = array(
            'name' => $name,
            'page_url' => $page_url,
            'description' => $description,
            'image' => $image,
           
        );

        DB::table('blogs')->insert($data);

        return redirect()->route('blog.index')->with('success', 'Blog Added Successfully');
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
    public function edit(Blog $blog)
    {
        
        return view('admin.edit_blog',compact('blog'));
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
            'page_url' => 'required'
        ]);

        $blog = Blog::find($id);
        $blog->name = $request->input('name');
        $blog->page_url = $request->input('page_url');
        $blog->description = $request->input('description');

        if($request->file('image') != ''){
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $image_name = time().$remove_space;

            $destination_path = public_path('upload/blog/large');
            $img = Image::make($image->path());

            $width = 525;
            $height = 370;

            $img->resize($width,$height,function($contrainst){

            })->save($destination_path."/".$image_name);

            $width = 265;
            $height = 185;
            $destination_path = public_path('upload/blog/small');
            $img->resize($width,$height,function($constraint){

            })->save($destination_path."/".$image_name);

            $destinationPath = public_path('upload/blog');
            $image->move($destinationPath,$image_name);

            $blog->image = $image_name;
        }

        $blog->save();

        return redirect()->route('blog.index')->with('success','Blog Updated Successfully');
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
        Blog::whereIn('id',$delete_id)->delete();
        return redirect()->route('blog.index')->with('success','Blog has been deleted successfully');
    }
}