<?php



namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;



class Subscriptiondetails_controller extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {
        $id = Auth::user()->id;
         $currentDate = now(); // Get the current date and time

        $result = DB::table('subscription')
            ->select('*')
            ->where('vendor_id', '=', $id)
            ->orderBy('id', 'desc')
            ->get();

        // Add the "status" column to the result based on the "enddate" and current date
        $result = $result->map(function ($item) use ($currentDate) {
            $item->status = $item->enddate >= $currentDate ? "active" : "inactive";
            return $item;
        });
        $data['all_data']=$result;

        return view('admin.list_subscription_details',$data);

    }



}