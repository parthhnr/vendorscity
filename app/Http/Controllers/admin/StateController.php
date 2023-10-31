<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\State;
use App\Models\admin\Country;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['all_state'] = State::orderBy('id','DESC')->get();
        return view('admin.list_state',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['all_country'] = Country::get();
        return view('admin.add_state',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $state= new State;
        $state->country_id=$request->country_id;
        $state->state=$request->state;
        
        $state->save();
        return redirect()->route('state.index')->with('success', 'State Added Successfully');
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
    public function edit(State $state)
    {
        $data['all_country'] = Country::get();
        return view('admin.edit_state',compact('state'),$data);
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
        $state = State::find($id);
        $state->country_id     = $request->country_id;
        $state->state     = $request->state;
       
        $state->save();

        return redirect()->route('state.index')->with('success', 'State Update Successfully');
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
        State::whereIn('id',$delete_id)->delete();
        return redirect()->route('state.index')->with('success','State has been deleted successfully');
    }
}