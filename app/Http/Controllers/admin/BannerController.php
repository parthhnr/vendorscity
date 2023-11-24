<?php



namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\admin\Banner;

use Image;

use Session;

use DB;



class BannerController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $data['all_data'] = Banner::orderBy('id','DESC')->get();

        return view('admin.list_banner',$data);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {



        return view('admin.add_banner');

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

            // 'title' => 'required',

            

        ]);



        $data = new Banner;

        $data->title      = $request->title;

        $data->sub_title  = $request->sub_title;

        $data->link  = $request->link;

        $data->set_order = 0;



        if($request->hasfile('image') != ''){



            $image = $request->file('image');

            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());

            $data['image'] = time() . $remove_space;



            $destinationPath = public_path('upload/banner/large');

            $img = Image::make($image->path());

            $width=1920;

            $height=1100;



            $img->resize($width,$height,function($constraint){

            })->save($destinationPath.'/'.$data['image']);



            $destinationPath = public_path('upload/banner/small');

            $width=50;

            $height=50;

            $img->resize($width,$height,function($constraint){

            })->save($destinationPath.'/'.$data['image']);

                

            $destinationPath = public_path('upload/banner');

            $image->move($destinationPath,$data['image']);



            $image = $data['image'];

        }else{

            $image = "";

        }



        $data->image  = $image;



        $data->save();



        return redirect()->route('banner.index')->with('success', 'Banner Added Successfully');

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

    public function edit(Banner $banner)

    {

        return view('admin.edit_banner',compact('banner'));

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

            // 'title' => 'required',

            

        ]);



        $data = Banner::find($id);

        $data->title      = $request->title;

        $data->sub_title     = $request->sub_title;

        $data->link = $request->link;



         if($request->hasfile('image') != ''){



            $image = $request->file('image');

            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());

            $data['image'] = time() . $remove_space;



            $destinationPath = public_path('upload/banner/large');

            $img = Image::make($image->path());

            $width=1920;

            $height=1100;



            $img->resize($width,$height,function($constraint){

            })->save($destinationPath.'/'.$data['image']);



            $destinationPath = public_path('upload/banner/small');

            $width=50;

            $height=50;

            $img->resize($width,$height,function($constraint){

            })->save($destinationPath.'/'.$data['image']);

                

            $destinationPath = public_path('upload/banner');

            $image->move($destinationPath,$data['image']);



            $image = $data['image'];



             $data->image  = $image;

        }



       



        $data->save();



        return redirect()->route('banner.index')->with('success', 'Banner Update Successfully');

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

        Banner::whereIn('id',$delete_id)->delete();

        return redirect()->route('banner.index')->with('success','Banner has been deleted successfully');

    }



    public function set_order()

    {

        $id = $_POST['id'];

        $val = $_POST['val'];

        // echo $id."-".$val;exit;

        DB::table('banners')->where('id', $id)->update(array('set_order' => $val));

        echo "1";

        // return redirect()->route('product.index')->with('success','Set Order has been Updated successfully');

    }

}