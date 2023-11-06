<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Price;

use DB;

class Pricecontroller extends Controller
{
    //
    public function index()

    {

        $data['all_data'] = Price::orderBy('id','DESC')->get();       

       return view('admin.list_price',$data);

    }

    public function create()

    {

        return view('admin.add_price');

    }

    public function store(Request $request)

    {

       

        $price = new Price;

        $price->service_type   =   $request->service_type;

        $price->price          =   $request->price;

        $price->set_order = 0;

        $price->save();        

        return redirect()->route('price.index')->with('success','Price data added successfully');

    }

    public function edit(Price $price)

    {
       return view('admin.edit_price',compact('price'));

    }

    public function update(Request $request, $id)

    {

        $group = Price::find($id);

        $group->service_type          = $request->service_type;

        $group->price      = $request->price;

        $group->save();

        return redirect()->route('price.index')->with('success','Price data Updated successfully');;

    }

    public function destroy(Request $request)

    {

        $id=$request->selected;

        Price::whereIn('id',$id)->delete();

        return redirect()->route('price.index')->with('success','Price data Deleted successfully');

    }
}
