<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Wallet;
use Auth;
use DB;

class AdminWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $data['wallet_data'] = Wallet::orderBy('id', 'DESC')->get();
        $data['wallet_data'] =Wallet::orderByDesc('id')->get();  
    
       return view('admin.list_adminwallet',$data);
       
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
        //echo"<pre>";
        // print_r($value);
        // echo"</pre>";exit;
    }
    public  function change_status_wallet(){

        $id = $_POST['id'];
        $vendorid = $_POST['vendorid'];
        $value = $_POST['value'];
        
        // Update 'wallets' table
        DB::table('wallets')->where('id', $id)->update(['status' => $value]);
        
        // Retrieve data from 'wallets' table, including the 'price' column
        $walletData = DB::table('wallets')->where('id', $id)->first();
        // echo"<pre>";
        // print_r($walletData);
        // echo"</pre>";exit;
        
        // Assuming 'users' table has a column 'wallet_amount', update it
        DB::table('users')->where('id', $vendorid)->update([
            'wallet_amount' => DB::raw('wallet_amount ' . ($value == 0 ? '-' : '+') . ' ' . $walletData->price),
            // Adjust column names as needed
        ]);
        
        echo "1";



    }
}