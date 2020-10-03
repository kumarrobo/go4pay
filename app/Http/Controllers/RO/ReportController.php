<?php

namespace App\Http\Controllers\RO;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RO\SMSController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use Log;
use Hash;
use DB;
use App\Helpers\Helper;
use App\User;
use App\State;
use App\City;
use App\UserDetail;
use App\DocumentType;
use App\DsWalletBalanceRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\PaymentWalletTransaction;
use App\PaymentWallet;
use App\TransactionType;
use App\AgentCommission;
use App\WalletRechargePayment;


class ReportController extends Controller
{
    //
    public $SMSController;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //dd('dasd');
        //echo \Request::route()->getName();    die;
        $this->SMSController = new SMSController();
        $this->middleware('auth:ro');
    }


    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function myReport(Request $request){
        $payemntWalletId = Helper::getPaymentWalletID($this->getAuthUserID());
        $payment_wallet_transactions = PaymentWalletTransaction::with('WalletRechargePayment','PaymentWallet')
        ->where('payment_wallet_id','=',$payemntWalletId)
        ->where('user_id','=',$this->getAuthUserID())
        ->orderBy('id','DESC')
        ->paginate($this->getPageItem());
       //dd($payment_wallet_transactions);
        return view('RO.Report.MyReport',array(
            'payment_wallet_transactions'=>$payment_wallet_transactions
        ));
    }




     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function walletRechargeReport(Request $request){
        $payemntWalletId = Helper::getPaymentWalletID($this->getAuthUserID());
        $payment_wallet_transactions = WalletRechargePayment::where('user_id','=',$this->getAuthUserID())
        ->orderBy('id','DESC')
        ->paginate($this->getPageItem());
        //dd($payment_wallet_transactions);
        return view('RO.Report.MyWalletRechargeReport',array(
            'payment_wallet_transactions'=>$payment_wallet_transactions
        ));
    }


     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function writeus(Request $request){
        return view('RO.Report.WriteUS',array());
    }






    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function loginNow(Request $request, $id){
        $id = Crypt::decryptString($id);
        $WalletRechargePayment = WalletRechargePayment::with('User')->find($id);
        $user = $WalletRechargePayment['User'];        
        if($user)  {
            if(Auth::guard('ro')->login($user)){
                return true;
            }
        }
    }





    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function loginNowForFailed(Request $request){
       $email = $request->get('udf3'); 
       $mobile = $request->get('udf2'); 
       $user = User::where('email','=',$email)->where('mobile','=',$mobile)->first();       
        if($user)  {
            if(Auth::guard('ro')->login($user)){
                return true;
            }
        }
    }



    //If Payment is Failed
    public function walletRechargeFailed(Request $request){
        //dd($request->all());
        $status = $request->get('status');
        $this->loginNowForFailed($request);
        return redirect('RO/tatrechargeesybuz/')->with(['error'=>['Sorry '.$status.' ! Payment not processed successfully.']]);
        
    }



















}
