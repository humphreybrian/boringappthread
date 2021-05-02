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
        $deposit_amounts = Transacton::where('user_id', $usr_id)->get(); 

        // count total contributions. 
        $total_countributions = Transacton::where('user_id', $usr_id)->count(); 
        // count amount in deposit.
        $actual_deposit_balance = Transacton::where('user_id', $usr_id)->sum('deposit_amount'); 
      //  $actual_deposit_balance = (int)$deposit_amounts - 100000;
        $loan_balance = Loan::where('user_id', $usr_id)->sum('loan_amount'); 
        $get_group_id = User::select('group_id')->where('id', $usr_id)->get();
    

      //  $price = DB::table('orders')->max('price');
        // Loan Balance.
        // Group messages.
        
        return view ('home', compact ('deposit_amounts','total_countributions','actual_deposit_balance','loan_balance','get_group_id'));
    }
}
