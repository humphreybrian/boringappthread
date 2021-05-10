<?php

namespace App\Http\Controllers;

use App\Models\Transacton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TransactonController extends Controller
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
        if(session('success_message')){
            Alert::success('Thank you', session('success_message'));
        }
        //get the deposited amounts.
        $deposit_amounts = Transacton::orderBy('id')->get();
        
        return view ('transact.index', compact ('deposit_amounts'));
    }
    public function deposit()
    {
        //
       // return view ('deposit_amount');
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
    public function withdraw()
    {
        //
        if(session('success_message')){
            Alert::success('Thank you', session('success_message'));
        }
        //get the deposited amounts.
        $deposit_amounts = Transacton::orderBy('id')->get();
        
        return view ('withdraw', compact ('deposit_amounts'));
        // return view ('withdraw');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get  user ID.
        $usr_id = Auth::id(); 

        $request->validate([
            'deposit_receipt_number' => 'required',
            'pay_period' => 'required',
            'deposit_amount' => 'required',
            'deposit_note' => 'required',
            'deposit_status' => 'required',
            'reference_number'=>'required',
            'payment_method'=>'required',
            // 'transaction_type'=>'required',
            //get user_id
        ]);
        $new_deposit = new Transacton();
        $new_deposit ->deposit_receipt_number = $request->deposit_receipt_number;
        $new_deposit->pay_period = $request->pay_period;
        $new_deposit->deposit_amount = $request->deposit_amount;
        $new_deposit->deposit_note = $request->deposit_note;
        $new_deposit->deposit_status = $request->deposit_status;
        //get user id
        $new_deposit ->user_id = $usr_id;
        $new_deposit->payment_method = $request->payment_method;
        $new_deposit->reference_number=$request->reference_number;
        $new_deposit->transaction_type= '0';  //deposit
       
        $new_deposit -> save();
        return redirect('/transact')->withSuccessMessage('We have received your deposit amount. Kindly check your email for confirmation');

        //Send email after deposit..

    }
    public function withdrawamount(Request $request){
        $usr_id = Auth::id(); 

        $request->validate([
            'deposit_receipt_number' => 'required',
            'pay_period' => 'required',
            'deposit_amount' => 'required',
            'deposit_note' => 'required',
            'deposit_status' => 'required',
            'reference_number'=>'required',
            'payment_method'=>'required',
            // 'transaction_type'=>'required',
            //get user_id
        ]);
        $new_deposit = new Transacton();
        $new_deposit ->deposit_receipt_number = $request->deposit_receipt_number;
        $new_deposit->pay_period = $request->pay_period;
        $new_deposit->deposit_amount = $request->deposit_amount;
        $new_deposit->deposit_note = $request->deposit_note;
        $new_deposit->deposit_status = $request->deposit_status;
        //get user id
        $new_deposit ->user_id = $usr_id;
        $new_deposit->payment_method = $request->payment_method;
        $new_deposit->reference_number=$request->reference_number;
        $new_deposit->transaction_type= 'withdraw';
       
        $new_deposit -> save();
        return redirect('/transact')->withSuccessMessage('We have received your deposit amount. Kindly check your email for confirmation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transacton  $transacton
     * @return \Illuminate\Http\Response
     */
    public function show(Transacton $transacton)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transacton  $transacton
     * @return \Illuminate\Http\Response
     */
    public function edit(Transacton $transacton)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transacton  $transacton
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transacton $transacton)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transacton  $transacton
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transacton $transacton)
    {
        //
    }
}
