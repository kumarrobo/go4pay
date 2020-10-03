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


class GeneralController extends Controller
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
    public function writeus(Request $request){
        return view('RO.General.WriteUS',array());
    }




    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function help(Request $request){
        return view('RO.General.Help',array());
    }























}
