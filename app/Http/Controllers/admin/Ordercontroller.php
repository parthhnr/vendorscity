<?php



namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\admin\Order;

use DB;

class Ordercontroller extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index($order_id = '', $status = '')

    {
        $data['error'] = '';

        //$data['subscribe_data'] = Subscribe::orderBy('id','DESC')->get();    

        $query = DB::table('ci_orders')
        ->leftJoin('front_users', 'ci_orders.user_id', '=', 'front_users.id')
        ->leftJoin('ci_shipping_address', 'ci_orders.order_id', '=', 'ci_shipping_address.order_id')
        ->select('front_users.email as user_email', 'front_users.name as user_name', 'front_users.mobile as user_mobile',  'ci_orders.*', 'ci_shipping_address.*');

    if (!empty($order_id)) {
        $query->where('ci_orders.order_id', $order_id);
    }

    if (!empty($status)) {
        if ($status == 'SUCCESS' || $status == 'FAILED') {
            $query->where('ci_orders.payment_status', $status);
        } else {
            $query->where('ci_orders.order_status', $status);
        }
    }

    $query->orderBy('ci_orders.order_id', 'DESC');

    $orderList = $query->get();

    foreach ($orderList as $order) {
        $itemList = DB::table('ci_order_item')
            ->where('order_id', $order->order_id)
            ->get();

        $total = 0;
        $additionalCost = 0;

        foreach ($itemList as $item) {
            $product = DB::table('products')
                ->where('id', $item->product_id)
                ->first();

            $total += $item->product_item_price * $item->product_quantity;
        }

        $order->items = $itemList;
        $order->sub_total = $total;
    }

   $orderList;  

    $data['orders_list'] = $orderList;

    //echo "<pre>";print_r($data);echo"</pre>";exit;  

        return view('admin.list_order',$data);

    }

    function detail($order_id){
        //echo $id;exit;
        $data['error'] = '';

        $query = DB::table('ci_orders')
        ->leftJoin('front_users', 'ci_orders.user_id', '=', 'front_users.id')
        ->leftJoin('ci_shipping_address', 'ci_orders.order_id', '=', 'ci_shipping_address.order_id')
        ->select('front_users.email as user_email', 'front_users.name as user_name', 'front_users.mobile as user_mobile',  'ci_orders.*', 'ci_shipping_address.*');

    if (!empty($order_id)) {
        $query->where('ci_orders.order_id', $order_id);
    }

    if (!empty($status)) {
        if ($status == 'SUCCESS' || $status == 'FAILED') {
            $query->where('ci_orders.payment_status', $status);
        } else {
            $query->where('ci_orders.order_status', $status);
        }
    }

    $query->orderBy('ci_orders.order_id', 'DESC');

    $orderList = $query->get();

    foreach ($orderList as $order) {
        $itemList = DB::table('ci_order_item')
            ->where('order_id', $order->order_id)
            ->get();

        $total = 0;
        $additionalCost = 0;

        foreach ($itemList as $item) {
            $product = DB::table('products')
                ->where('id', $item->product_id)
                ->first();

            $total += $item->product_item_price * $item->product_quantity;
        }

        $order->items = $itemList;
        $order->sub_total = $total;
    }

    $orderList;  

    $data['order'] = $orderList[0];


         // echo "<pre>";print_r($data);echo"</pre>";exit;  

        return view('admin.view_order',$data);
    }

    public function destroy(Request $request)

    {

        $delete_id = $request->selected;

        // echo $delete_id;exit;

        Subscribe::whereIn('id',$delete_id)->delete();

        return redirect()->route('subscribe.index')->with('success','Subscribe has been deleted successfully');

        // $id=$request->id;

        // Subscribe::whereIn('id',$id)->delete();

        // return redirect()->route('subscribe.index');

    }


}