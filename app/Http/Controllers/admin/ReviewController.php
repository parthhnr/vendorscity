<?php



namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\admin\Review;
use DB;



class ReviewController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $data['all_data'] = Review::orderBy('id','DESC')->get();        

        return view('admin.list_review',$data);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        //

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

    public function edit(Subscribe $subscribe)

    {

       

        // return view('admin.edit_subscribe',compact('subscribe'));

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

        //

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

        Review::whereIn('id',$delete_id)->delete();

        return redirect()->route('review.index')->with('success','Review has been deleted successfully');

        // $id=$request->id;

        // Subscribe::whereIn('id',$id)->delete();

        // return redirect()->route('subscribe.index');

    }

    public  function change_status_review(){



        $id=$_POST['id'];

        $value=$_POST['value'];

        

        DB::table('reviews')->where('id',$id)->update(array('status'=>$value));

        echo"1";

    }

}