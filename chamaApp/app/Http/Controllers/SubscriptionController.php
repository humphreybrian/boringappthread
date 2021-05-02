<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Auth;
use App\Models\TransactionInit;
use App\Models\Payment;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        $phone = "254".substr(Auth::user()->phone, -9);
        $reason = 'Mpesa Payment';
        if ($type == 1) {
            $charges = 1;
        }
        elseif ($type == 2){
            $charges = 2;
        }
        elseif ($type == 3){
            $charges = 3;
        }

        $response = \STK::push($charges, $phone, 'Uchaguzi', $reason);
        
        if($response){
            $payload = json_decode(json_encode($response),true);
            // dd($payload);
            //listing
            $init = TransactionInit::where('user_id',Auth::user()->id)->first();
            if ($init) {
                $init->payment_type = $type;

                $init->CheckoutRequestID = $payload['CheckoutRequestID'];
                $init->MerchantRequestID = $payload['MerchantRequestID'];

                $init->save();
            }else{
                $init = new TransactionInit;  
                $init->payment_type = $type;
                $init->user_id = Auth::user()->id;
                $init->CheckoutRequestID = $payload['CheckoutRequestID'];
                $init->MerchantRequestID = $payload['MerchantRequestID'];

                $init->save();
            }

            return redirect()->back();
        }
    }

    public function payment(Request $request)
    {
        $payload =  file_get_contents('php://input');
 
        $result = json_decode($payload,true);

        if($result['Body']['stkCallback']['ResultCode'] == 0)

        $trans_no = $result['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
        $trans = Payment::where('mpesa_receipt_no',$trans_no)->first();
        if($trans)
        {
            return response('Double transaction');
        }
        {
            $init = TransactionInit::where('MerchantRequestID',$result['Body']['stkCallback']['MerchantRequestID'])->first();
            if ((bool)$init) {
                // if ($init->payment_type == 1) {
                //     $days = 7;
                // }else{
                //     $days = 0;
                // }
                if ($init->payment_type == 1) {
                    $days = 7;
                }elseif ($init->payment_type == 2){
                    $days = 10;
                }elseif ($init->payment_type == 3){
                    $days = 15;
                }
                $user_id = $init->user_id;
                $sub = Subscription::where('user_id',$user_id)->first();

                $today = date("Y-m-d H:i:s");
                
                if ($sub) {
                    $current = $sub->status;
                    if ($current > $today) {
                        $status = date('Y-m-d H:i:s',strtotime($current.'+'.$days.' days'));
                    }else{
                        $status = date('Y-m-d H:i:s',strtotime('+'.$days.' days'));
                    }

                    $sub->subscription_type = $init->payment_type;
                    $sub->status = $status;
                    $sub->save();
                }else{
                    $sub = new Subscription;
                    $status = date('Y-m-d H:i:s',strtotime('+'.$days.' days'));

                    $sub->subscription_type = $init->payment_type;
                    $sub->status = $status;
                    $sub->user_id = $user_id;
                    $sub->save();
                }
                

            }

            //save to db
           
                $mpesa = new Payment;

                $mpesa->merchant_id = $result['Body']['stkCallback']['MerchantRequestID'];
                $mpesa->checkout_id = $result['Body']['stkCallback']['CheckoutRequestID'];
                $mpesa->result_code = $result['Body']['stkCallback']['ResultCode'];
                $mpesa->phone_no = $result['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
                $mpesa->amount = $result['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
                $mpesa->mpesa_receipt_no = $result['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];

                $mpesa->save();

                 return response()->json(['success']);
            
        //      else
        // {
        //     $mpesa = new FailedTransaction;

        //     $mpesa->merchant_id = $result['Body']['stkCallback']['MerchantRequestID'];
        //     $mpesa->checkout_id = $result['Body']['stkCallback']['CheckoutRequestID'];
        //     $mpesa->result_code = $result['Body']['stkCallback']['ResultCode'];
        //     $mpesa->result_desc = $result['Body']['stkCallback']['ResultDesc'];

        //     $listing = Listing::where('CheckoutRequestID',$result['Body']['stkCallback']['CheckoutRequestID'])->first();

        //     $mpesa->amount = $listing->package->charges;
        //     $mpesa->phone_no = $listing->user->phone;

        //     $mpesa->save();

        // }
            // else
                // return response()->json(['error']);
        }
    }

}
