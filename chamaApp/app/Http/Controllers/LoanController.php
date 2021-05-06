<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Transacton;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoanController extends Controller
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
        $loan_amounts = Loan::where('user_id', $usr_id)
            ->where('loan_status', 0)
            ->orderBy('id')
            ->get();
        
        return view ('loan.index', compact ('loan_amounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view ('loan.create');
        $usr_id = Auth::id(); 
        if(session('success_message')){
            Alert::success('Thank you', session('success_message'));
        }
        //get the deposited amounts.
        $loan_amounts = Loan::where('user_id', $usr_id)->orderBy('id')->get();
        
        return view ('loan.create', compact ('loan_amounts'));

    }
    // 

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
        $actual_deposit_balance = Transacton::where('user_id', $usr_id)->sum('deposit_amount'); 

        $request -> validate([
            'loan_receipt_number'=>'required',
            'loan_type_id'=>'required',
            'loan_amount'=>'required',
            'loan_request_date'=>'required',
          //  loan_refrence_number
        ]);
        //loan validation you cannot borrow without having a balace in your account
        if ($actual_deposit_balance > 200){
            $new_loan = new Loan();
            $new_loan -> loan_receipt_number = $request ->loan_receipt_number;
            $new_loan -> loan_type_id = $request ->loan_type_id;
            $new_loan -> loan_amount = $request ->loan_amount;
            $new_loan -> loan_request_date = $request ->loan_request_date;
            $new_loan -> user_id = $usr_id;
            $new_loan->loan_status = '0'; //repayment or New loan. 1 =repayment 0 =new loan
            $new_loan->loan_refrence_number = '1';
    
    
            $new_loan -> save();

        }else{
            return redirect('/loan')->withSuccessMessage('You dont qualify for a loan');
        }
       
        return redirect('/loan')->withSuccessMessage('We have received your Loan Request. Kindly check your email for confirmation');
    

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
