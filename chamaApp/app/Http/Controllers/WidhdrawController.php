<?php

namespace App\Http\Controllers;

use App\Models\Widhdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Transacton;

class WidhdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $usr_id = Auth::id();
        if(session('success_message')){
            Alert::success('Thank you', session('success_message'));
        }
        //get the deposited amounts.
        $deposit_amounts = Transacton::where('user_id', $usr_id)
        ->where('transaction_type', 1)
        ->orderBy('id')->get();
        
        // count amount in deposit.
        $deposit_balance = Transacton::where('user_id', $usr_id)->
        where('transaction_type', 0)->sum('deposit_amount'); 
        $amount_withdrawn = Transacton::where('user_id', $usr_id)
        ->where('transaction_type', 1)->sum('deposit_amount'); 

        $actual_deposit_balance = $deposit_balance - $amount_withdrawn;

        if($actual_deposit_balance < 0){
          $actual_deposit_balance = 0;
        }else{
          $actual_deposit_balance = $deposit_balance - $amount_withdrawn;
        }

        return view ('withdraw', compact ('deposit_amounts','actual_deposit_balance'));
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
        $usr_id = Auth::id(); 

        //restrict wthdrawal.
        // count amount in deposit.
        $deposit_balance = Transacton::where('user_id', $usr_id)->
        where('transaction_type', 0)->sum('deposit_amount'); 
        $amount_withdrawn = Transacton::where('user_id', $usr_id)
        ->where('transaction_type', 1)->sum('deposit_amount'); 

        $actual_deposit_balance = $deposit_balance - $amount_withdrawn;

      

        

        $request->validate([
            'deposit_receipt_number' => 'required',
            // 'pay_period' => 'required',
            'deposit_amount' => 'required',
            // 'deposit_note' => 'required',
            // 'deposit_status' => 'required',
            // 'reference_number'=>'required',
            // 'payment_method'=>'required',
            // 'transaction_type'=>'required',
            //get user_id
        ]);
        $new_deposit = new Transacton();
        $new_deposit ->deposit_receipt_number = $request->deposit_receipt_number;
        $new_deposit->pay_period = '1';
        $new_deposit->deposit_amount = $request->deposit_amount;
        $withdrawon_amount = $new_deposit->deposit_amount = $request->deposit_amount;
        $new_deposit->deposit_note = '1';
        $new_deposit->deposit_status = '1';
        //get user id
        $new_deposit ->user_id = $usr_id;
        $new_deposit->payment_method = '1';
        $new_deposit->reference_number='1';
        $new_deposit->transaction_type= '1'; //withdrawal

        if($withdrawon_amount >  $actual_deposit_balance){
            return redirect('/withdraw')->withSuccessMessage('You dont have enough money in your account');
            
        }else{
            $new_deposit -> save();
            return redirect('/withdraw')->withSuccessMessage('Success you have withdrawn the amount.');

        }
       
        

        //Send email after deposit..

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Widhdraw  $widhdraw
     * @return \Illuminate\Http\Response
     */
    public function show(Widhdraw $widhdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Widhdraw  $widhdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Widhdraw $widhdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Widhdraw  $widhdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Widhdraw $widhdraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Widhdraw  $widhdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Widhdraw $widhdraw)
    {
        //
    }
}
