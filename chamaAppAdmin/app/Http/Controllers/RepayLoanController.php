<?php

namespace App\Http\Controllers;

use App\Models\RepayLoan;
use Illuminate\Http\Request;
use Auth;
use App\Models\Loan;
use App\Models\Transacton;
use RealRashid\SweetAlert\Facades\Alert;
class RepayLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usr_id = Auth::id(); 
        if(session('success_message')){
            Alert::success('Thank you', session('success_message'));
        }
        //get the deposited amounts.
        $loan_amounts = Loan::where('user_id', $usr_id)
       ->where('loan_status', 1)
        ->orderBy('id')->get();

        $loan_receipts = Loan::where('user_id', $usr_id)
        ->where('loan_status', 0)
        ->orderBy('id')->get();

        //  $actual_deposit_balance = (int)$deposit_amounts - 100000;
        $actual_loan_balance = Loan::where('user_id', $usr_id)
        ->where('loan_status', 0)->sum('loan_amount'); 
        $loan_repaid = Loan::where('user_id', $usr_id)
        ->where('loan_status', 1)->sum('loan_amount');
        $loan_balance = $actual_loan_balance-$loan_repaid;

        if($loan_balance < 0){
          $loan_balance = 0;
        }else{
          $loan_balance = $actual_loan_balance-$loan_repaid;
        }
        
        return view ('repay_loan', compact ('loan_amounts','loan_receipts','loan_balance'));
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
        $actual_deposit_balance = Transacton::where('user_id', $usr_id)->sum('deposit_amount'); 
        

        $request -> validate([
            // 'loan_receipt_number'=>'required',
            // 'loan_type_id'=>'required',
            // 'loan_amount'=>'required',
            // 'loan_request_date'=>'required',
          //  loan_refrence_number
        ]);
        //loan validation you cannot borrow without having a balace in your account
        if ($actual_deposit_balance > 200){
            $new_loan = new Loan();
            $new_loan -> loan_receipt_number = $request ->loan_receipt_number;
            $new_loan -> loan_type_id = '1';
            $new_loan -> loan_amount = $request ->loan_amount;
            $new_loan -> loan_request_date = $request ->loan_request_date;
            $new_loan -> user_id = $usr_id;
            $new_loan->loan_status = '1'; //repayment or New loan. 1 =repayment 0 =new loan
            $new_loan->loan_refrence_number = '1';
            $new_loan->loan_repay_refrence_number = $request ->loan_repay_refrence_number;
    
    
            $new_loan -> save();

        }else{
            return redirect('/repay_loan')->withSuccessMessage('You dont qualify for a loan');
        }
       
        return redirect('/repay_loan')->withSuccessMessage('We have received your Loan Request. Kindly check your email for confirmation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RepayLoan  $repayLoan
     * @return \Illuminate\Http\Response
     */
    public function show(RepayLoan $repayLoan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RepayLoan  $repayLoan
     * @return \Illuminate\Http\Response
     */
    public function edit(RepayLoan $repayLoan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RepayLoan  $repayLoan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RepayLoan $repayLoan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RepayLoan  $repayLoan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RepayLoan $repayLoan)
    {
        //
    }
}
