<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subscription_page');
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
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public  function base_on_service_lead(){

        if(request()->input('action') == 'add'){

            $currentDateTime = date("Y-m-d H:i:s");
            $end_date = date('Y-m-d H:i:s', strtotime($currentDateTime . ' +30 days'));

            $data['vendor_id'] = Auth::user()->id;
            $data['subscription_name'] = request()->input('subscription_name');
            $data['subscription_id'] = request()->input('subscription_id');
            $data['country'] = request()->input('country');
            $data['state'] = request()->input('state');
            $data['city'] = request()->input('city');
            $data['services'] = implode(',', request()->input('services'));
            $data['sub_service'] = implode(',', request()->input('sub_service'));
            $data['total'] = request()->input('total');
            $data['startdate'] = $currentDateTime;
            $data['enddate'] = $end_date;
            $data['added_date'] = $currentDateTime;

            $id = DB::table('subscription')->insertGetId($data);
            //$id = 10;
            $content['subscription_id'] = $id;
            $content['sub_service'] = request()->input('sub_service');

            $this->insert_attribute($content);

            return redirect()->route('subscription.index')->with('success','Subscription Purchased Successfully.');

            //echo "<pre>";print_r($data);echo "</pre>";exit;
        }
        $data['country_data'] = DB::table('countries')->select('*')->orderBy('id','DESC')->get();
        $data['state_data'] = DB::table('states')->select('*')->orderBy('id','DESC')->get();
        $data['allcity'] = DB::table('cities')->select('*')->get();
        $data['allservices'] = DB::table('services')->select('*')->get();
        $data['allsub_services'] = DB::table('subservices')->select('*')->get();

        return view('admin.base_on_service_lead',$data);
    }


    function insert_attribute($content){

        foreach($content['sub_service'] as $sub_service_data){

            $result = DB::table('subservices')->select('*')->where('id','=',$sub_service_data)->first();
            
           // echo "<pre>";print_r($result);echo "</pre>";

            $data['subscription_id'] = $content['subscription_id'];
            $data['service_id'] = $result->serviceid;
            $data['subservice_id'] = $result->id;
            $data['charge'] = $result->charge;
            $data['no_of_inquiry'] = $result->no_of_inquiry;

            DB::table('subscription_subservice_attribute')->insertGetId($data);
            
        }

        //exit;
    }


    public  function based_on_booking_services(){
        $data['country_data'] = DB::table('countries')->select('*')->orderBy('id','DESC')->get();
        $data['state_data'] = DB::table('states')->select('*')->orderBy('id','DESC')->get();
        $data['allcity'] = DB::table('cities')->select('*')->get();
        
        return view('admin.based_on_booking_services',$data);
    }

    public  function based_on_listing_criteria(){
        $data['country_data'] = DB::table('countries')->select('*')->orderBy('id','DESC')->get();
        $data['state_data'] = DB::table('states')->select('*')->orderBy('id','DESC')->get();
        $data['allcity'] = DB::table('cities')->select('*')->get();
        
        return view('admin.based_on_listing_criteria',$data);
    }

    function state_show_subscription(){
        $country_id = $_POST['country_id'];
        //echo $cat_id;exit;
        $result = DB::table('states')->select('*')->where('country_id','=',$country_id)->get();

        $result_new = $result->toArray();

        $html = "<select id='state' name='state' class='form-control' onchange='city_change(this.value);'>";
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

    function city_show(){
        $state_id = $_POST['state_id'];
        //echo $cat_id;exit;
        $result = DB::table('cities')->select('*')->where('state','=',$state_id)->get();

        $result_new = $result->toArray();

        $html = "<select id='city' name='city' class='form-control'>";
        $html .= "<option value=''>Select City</option>";
        if($result != '' && count($result) >0)
        {
            for($i=0;$i<count($result);$i++)
            {
                //echo "<pre>";print_r($result[$i]->id);echo "</pre>";exit;
                $html .= "<option value='".$result[$i]->id ."'>".$result[$i]->name ."</option>";
            }
        }
        $html .="</select>";
        //echo "<pre>";print_r($html);echo "</pre>";exit;
        echo $html;
    }

    function subservice_change(){
        $service_id = $_POST['service_id'];

        // $result = DB::table('subservices')->select('*')->whereIn('serviceid','=',$service_id)->get();
        $result = DB::table('subservices')
                ->select('*')
                ->whereIn('serviceid', $service_id)
                ->get();
        $result_new = $result->toArray();
        $html = '<select class="form-control" id="sub_service" name="sub_service[]" multiple="multiple" onchange="subservice_table_change(this.value);">';
         $html .= "<option value=''>Select Sub Service</option>";
        if($result != '' && count($result) >0){
            for($i=0;$i<count($result);$i++)
            {
                //echo "<pre>";print_r($result[$i]->id);echo "</pre>";exit;
                $html .= "<option value='".$result[$i]->id ."'>".$result[$i]->subservicename ."</option>";
            }
        }
        $html .="</select>";
        echo $html;
        // echo "<pre>";print_r($result);echo "</pre>";exit;

    }

    function subservice_table_change(){

        $subservice_id = $_POST['subservice_id'];
        //echo "<pre>";print_r($result);echo "</pre>";exit;

        if($subservice_id != ''){
       

        // $result = DB::table('subservices')->select('*')->whereIn('serviceid','=',$service_id)->get();
        $result = DB::table('subservices')
                ->select('*')
                ->whereIn('id', $subservice_id)
                ->get();

        $result_new = $result->toArray();

        $html = '<div class="row">';
            
            $html .= '<div class="col-md-12">';

                $html .= '<div class="table-responsive">';
                
                    $html .= '<table class="invoice-table table table-bordered">';

                    $html .="<thead>";

                        $html .= '<tr><th>Sub Services</th><th class="text-end">Price</th></tr>';

                    $html .= '</thead>';

                    $html .='<tbody>';
                    $total = 0;
        if($result != '' && count($result) >0){

            for($i=0;$i<count($result);$i++){

                $html .= "<tr><td>".$result[$i]->subservicename ."</td><td class='text-end'>".$result[$i]->charge ."</td> </tr>";

                $total += $result[$i]->charge;

            }
        }

        $html .='</div></div>';

         $html .='</tbody>';

        $html .= '</table>';

        $html .='<div class="col-md-6 col-xl-4 ms-auto">';
            $html .='<div class="table-responsive">';
                $html .='<table class="invoice-table-two table">';
                    $html .= '<tbody><tr><th>Total :</th><td><span>'.$total.'</span></td></tr></tbody>';
                $html .='</table>';
            $html .='</div>';
        $html .='</div><input type="hidden" name="total" id="total" value="'.$total.'">';



       

        $html .= '</div>';
    }else{
        $html = "";
    }

        echo $html;

    }

    
}
