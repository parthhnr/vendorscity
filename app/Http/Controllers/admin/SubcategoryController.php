<?php



namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\admin\Subcategory;

use App\Models\admin\Category;

use App\Models\admin\Group;

use Image;

use Session;

use DB;



class SubcategoryController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $data['all_data'] = Subcategory::orderBy('id','DESC')->get();

        



        //echo "<pre>";print_r($data);echo"</pre>";exit;

        return view('admin.list_subcategory',$data);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $data['all_group'] = Group::orderBy('id','DESC')->get()->toArray();

        $data['all_category'] = Category::orderBy('id','DESC')->get()->toArray();

        return view('admin.add_subcategory',$data);

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



        $data = new Subcategory;

        $data->group_id      = $request->group_id;

        $data->cat_id      = $request->cat_id;

        $data->name      = $request->name;

        $data->page_url  = $request->page_url;

        $data->meta_title  = $request->meta_title;

        $data->meta_keywords  = $request->meta_keywords;

        $data->meta_description  = $request->meta_description;

        $data->set_order = 0;

        if($request->hasfile('image') != ''){
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;
            $destinationPath = public_path('upload/size_guide/large');
            $img = Image::make($image->path());

            $width=600;
            $height=500;
            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);

            $destinationPath = public_path('upload/size_guide/small');

            $width=50;
            $height=50;
            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);

            $destinationPath = public_path('upload/size_guide');
            $image->move($destinationPath,$data['image']);
            $image = $data['image'];
        }else{
            $image = "";
        }
        $data->image  = $image;
        $data->save();



        return redirect()->route('subcategory.index')->with('success', 'Subcategory Added Successfully');

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

    public function edit(Subcategory $subcategory)

    {   

        $data['all_group'] = Group::orderBy('id','DESC')->get()->toArray();

        $data['all_category'] = Category::orderBy('id','DESC')->where('group_id',$subcategory->group_id)->get()->toArray();

        return view('admin.edit_subcategory',compact('subcategory'),$data);

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



        $data = Subcategory::find($id);

        $data->group_id      = $request->group_id;

        $data->cat_id      = $request->cat_id;

        $data->name     = $request->name;

        $data->page_url = $request->page_url;

        $data->meta_title  = $request->meta_title;

        $data->meta_keywords  = $request->meta_keywords;

        $data->meta_description  = $request->meta_description;


        if($request->hasfile('image') != ''){
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;
            $destinationPath = public_path('upload/size_guide/large');
            $img = Image::make($image->path());

            $width=600;
            $height=500;
            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);

            $destinationPath = public_path('upload/size_guide/small');
            $width=50;
            $height=50;
            $img->resize($width,$height,function($constraint){
            })->save($destinationPath.'/'.$data['image']);

            $destinationPath = public_path('upload/size_guide');
            $image->move($destinationPath,$data['image']);
            $image = $data['image'];
            
            $data->image  = $image;
        }

        $data->save();



        return redirect()->route('subcategory.index')->with('success', 'Subcategory Update Successfully');

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

        Subcategory::whereIn('id',$delete_id)->delete();

        return redirect()->route('subcategory.index')->with('success','Subcategory has been deleted successfully');

    }



    public function set_order()

    {

        $id = $_POST['id'];

        $val = $_POST['val'];

        // echo $id."-".$val;exit;

        DB::table('subcategories')->where('id', $id)->update(array('set_order' => $val));

        echo "1";

        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');

    }

    public function group_shows_category()

    {

        

            $group_id=$_POST['group_id'];

            // echo $group_id;exit;



            $result=DB::table('categories')

                    ->select('*')

                    ->where('group_id','=',$group_id)

                    ->get();

            $result_new=$result->toArray();

            // echo"<pre>";print_r($result_new);echo"</pre>";exit;

            $html  ="<select class='form-control' id='cat_id' name='cat_id'>";

            $html .="<option value=''>select category</option>";

            if($result !='' &&  count($result)>0){

    

                for($i=0; $i<count($result); $i++){

                    

                    $html .="<option value='".$result[$i]->id."'>".$result[$i]->name."</option>";

                }

            }

            $html  .="<select>";

            echo $html;

    

    

           

    }

}