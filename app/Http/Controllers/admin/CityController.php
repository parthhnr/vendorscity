<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\City;
use Session;
use DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['city_data'] = City::orderBy('id','DESC')->get();

        return view('admin.list_city',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['country_data'] = DB::table('countries')->select('*')->orderBy('id','DESC')->get();
        $data['state_data'] = DB::table('states')->select('*')->orderBy('id','DESC')->get();

        return view('admin.add_city',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = new City;
        $city->country = $request->country;
        $city->state = $request->state;
        $city->name = $request->name;

        $city->save();

        return redirect()->route('city.index')->with('success','City Added Successfully.');
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
    public function edit(City $city)
    {

        $data['country_data'] = DB::table('countries')->select('*')->orderBy('id','DESC')->get();       
        $data['state_data'] = DB::table('states')->select('*')->orderBy('id','DESC')->get();
        
        return view('admin.edit_city',compact('city'),$data);
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
        $city = City::find($id);
        $city->country = $request->country;
        $city->state = $request->state;
        $city->name = $request->name;

        $city->save();

        return redirect()->route('city.index')->with('success','City Updated Successfully.');
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
        City::whereIn('id',$delete_id)->delete();
        return redirect()->route('city.index')->with('success','City has been deleted successfully');
    }

    function state_show(){
        $country_id = $_POST['country_id'];
        //echo $cat_id;exit;
        $result = DB::table('states')->select('*')->where('country_id','=',$country_id)->get();

        $result_new = $result->toArray();

        $html = "<select id='state' name='state' class='form-control'>";
        $html .= "<option value=''>Select State</option>";
        if($result != '' && count($result) >0)
        {
            for($i=0;$i<count($result);$i++)
            {
                //echo "<pre>";print_r($result[$i]->id);echo "</pre>";exit;
                $html .= "<option value='".$result[$i]->id ."'>".$result[$i]->state ."</option>";
            }
        }
        $html .="</select>";
        //echo "<pre>";print_r($html);echo "</pre>";exit;
        echo $html;
    }
}