<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Collection;
Use Image;
use Session;
use DB;
class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['all_data'] = Collection::orderBy('id', 'DESC')->get();
        return view('admin.list_collection',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.add_collection');
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
        ]);
        $name = $request->input('name');
        $page_url = $request->input('page_url');
        $description = $request->input('description');
        $meta_title = $request->input('meta_title');
        $meta_keywords = $request->input('meta_keywords');
        $meta_description = $request->input('meta_description');


        if($request->file('image') != ''){
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $image_name = time().$remove_space;
            $destination_path = public_path('upload/collection/large');
            $img = Image::make($image->path());
            $width = 600;
            $height = 800;
            $img->resize($width,$height,function($constraint){
            })->save($destination_path."/".$image_name);
            $width = 270;
            $height = 365;
            $destination_path = public_path('upload/collection/small');
            $img->resize($width,$height,function($constraint){
            })->save($destination_path."/".$image_name);
            $destination_path = public_path('upload/collection');
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
            'meta_title' => $meta_title,
            'meta_keywords' => $meta_keywords,
            'meta_description' => $meta_description,
            'set_order' => 0
        );
        DB::table('collections')->insert($data);
        return redirect()->route('collection.index')->with('success', 'Collection Added Successfully');
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
    public function edit(Collection $collection)
    {
        return view('admin.edit_collection',compact('collection'));
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
        $collection = Collection::find($id);
        $collection->name = $request->input('name');
        $collection->page_url = $request->input('page_url');
        $collection->description = $request->input('description');
        $collection->meta_title = $request->input('meta_title');
        $collection->meta_keywords = $request->input('meta_keywords');
        $collection->meta_description = $request->input('meta_description');


        if($request->file('image') != ''){
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $image_name = time().$remove_space;
            $destination_path = public_path('upload/collection/large');
            $img = Image::make($image->path());
            $width = 600;
            $height = 800;
            $img->resize($width,$height,function($contrainst){
            })->save($destination_path."/".$image_name);
            $width = 270;
            $height = 365;
            $destination_path = public_path('upload/collection/small');
            $img->resize($width,$height,function($constraint){
            })->save($destination_path."/".$image_name);
            $destinationPath = public_path('upload/collection');
            $image->move($destinationPath,$image_name);
            $collection->image = $image_name;
        }
        $collection->save();
        return redirect()->route('collection.index')->with('success','Collection Updated Successfully');
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
        Collection::whereIn('id',$delete_id)->delete();
        return redirect()->route('collection.index')->with('success','Collection has been deleted successfully');
    }
    public function collection_set_order()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        // echo $id."-".$val;exit;
        DB::table('collections')->where('id', $id)->update(array('set_order' => $val));
        echo "1";
        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');
    }
}