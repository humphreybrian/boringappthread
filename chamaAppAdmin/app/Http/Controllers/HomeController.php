<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Auth;
use App\Models\Transacton;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // //return view('home');
        // $subscription = Auth::user()->subscription;
        // $diff = '';
        // // dd($subscription);
        // $status = false;
        // if ($subscription != null) {
        //     $end = Carbon::now();
        //     $start = Carbon::parse($subscription->status);
        //     $diff = $end->diffInDays($start);

            

        //     if ($subscription->status > date("Y-m-d H:i:s")) {
        //         $status = true;
        //     }
        // }
        // return view('home')->withStatus($status)->withDiff($diff);

        $usr_id = Auth::id();
        if(session('success_message')){
            Alert::success('Thank you', session('success_message'));
        }
        //get the deposited amounts.
       // $deposit_amounts = Transacton::orderBy('id')->get();
       //Get the total user count. 
       $total_users = User::where('role', 'user')->count();
       //Get list of Users
       $list_users = User::where('role', 'user')->get();
       //total Loans requested
      //  $total_loans = Loans::where('loan_status',0)->sum('loan_amount');
        //deposit amount
        $deposit_amounts = Transacton::where('user_id', $usr_id)->get(); 

        // count total contributions. 
        $total_countributions = Transacton::where('user_id', $usr_id)->count(); 
        // count amount in deposit.
        $deposit_balance = Transacton::where('transaction_type', 0)->sum('deposit_amount'); 
        $amount_withdrawn = Transacton::where('transaction_type', 1)->sum('deposit_amount'); 

        $actual_deposit_balance = $deposit_balance - $amount_withdrawn;

        if($actual_deposit_balance < 0){
          $actual_deposit_balance = 0;
        }else{
          $actual_deposit_balance = $deposit_balance - $amount_withdrawn;
        }



      //  $actual_deposit_balance = (int)$deposit_amounts - 100000;
        $actual_loan_balance = Loan::where('loan_status', 0)->sum('loan_amount'); 
        $loan_repaid = Loan::where('loan_status', 1)->sum('loan_amount');
        $loan_balance = $actual_loan_balance-$loan_repaid;

        if($loan_balance < 0){
          $loan_balance = 0;
        }else{
          $loan_balance = $actual_loan_balance-$loan_repaid;
        }
        $get_group_id = User::select('group_id')->where('id', $usr_id)->get();


        $actual_balance = Loan::where('user_id', $usr_id)
        ->where('loan_status', 0)->sum('loan_amount'); 
        $loan_repaid = Loan::where('user_id', $usr_id)
        ->where('loan_status', 1)->sum('loan_amount');
        $loan_balance = $actual_loan_balance-$loan_repaid;

        if($loan_balance < 0){
          $loan_balance = 0;
        }else{
          $loan_balance = $actual_loan_balance-$loan_repaid;
        }
    

      //  $price = DB::table('orders')->max('price');
        // Loan Balance.
        // Group messages.
        
        // return view ('home', compact ('deposit_amounts','total_countributions','actual_deposit_balance','loan_balance','get_group_id'));
        return view ('home', compact ('total_users','deposit_amounts','total_countributions','actual_deposit_balance','loan_balance','get_group_id','amount_withdrawn','list_users'));
    }
}
