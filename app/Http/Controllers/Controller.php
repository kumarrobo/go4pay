<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\PaymentWallet;
use GuzzleHttp\Client;
use App\PaymentWalletTransaction;
use App\WalletRechargePayment;
use App\Helpers\Helper;
use App\MoneyTransferCharge;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * @param  string
     * @return string
     */
    public function getAmount($number) {
      
            return 'Rs '.number_format($number,2);   
              
    }


    /**
     * @return integer
     */
    public function getPageItem() {
      
            return 10;   
              
    }


    /**
     * @param  string
     * @return string
     */
    public  function getWalletBalance() {

        if(Auth::guard('user')->check()){
            $user_id = Auth::user()->id;
            $PaymentWallet = PaymentWallet::where('user_id','=',$user_id)->first();
            if(!empty($PaymentWallet)){
                return $PaymentWallet['total_balance'];
            }else{
                return '0.00';    
            }
        }

         if(Auth::guard('ro')->check()){
            $user_id = Auth::user()->id;
            $PaymentWallet = PaymentWallet::where('user_id','=',$user_id)->first();
            if(!empty($PaymentWallet)){
                return $PaymentWallet['total_balance'];
            }else{
                return '0.00';    
            }  
        }
    
              
    }


    public function getNewOTP($mobile){
        $randomid       = mt_rand(123456,999999); 
        $username       = "Siddhient";
        $key            = "2f67b0dccfXX";
        $mobileNumber   = $mobile;
        $message        = "New OTP for login for Siddi Venture is ".$randomid. ". Please do not share it with anyone.";
        $senderId       = "INFOTP";
        //return $randomid; 
        $url ="http://mobicomm.dove-sms.com//submitsms.jsp?user=".$username."&key=".$key."&mobile=+91".$mobileNumber."&message=".$message."&senderid=".$senderId."&accusage=1"; 
        if($this->sendSMS($url)){
            return $randomid; 
        }
    }


    private function sendSMS($url){

        $client = new Client();
        $res = $client->request('GET', $url);
        $res->getStatusCode();
        $res->getHeader('content-type');
        $res->getBody();
        if($res->getStatusCode() == 200){
            return true;
        }
    }


    //Get Create Date
    public function getNow(){
    	return date("Y-m-d H:i:s");
    }



    //Get Create Date
    public function getTodayDate(){
        return date("Y-m-d");
    }



    //Get Create Date
    public function getFormatDate($date){
    	return date("Y-m-d",strtotime($date));
    }



     //Get Create Date
    public function getDisplayDate($date){
        return date("d-m-Y",strtotime($date));
    }


    //Get Auth User Id
    public function getAuthUserID(){
        if(Auth::guard('user')->check()){
            return Auth::user()->id;
        }
        if(Auth::guard('ro')->check()){
            return Auth::user()->id;
        }
    }


    //Get Random Transaction Number 
    public function getTransactionNumber(){
        return time().mt_rand(123456,999999);   
    }




    /**
     * Get the Wallet Payment Id of the user
     * Pramas as user Id of the Distributor OR RO
     * @param integer
     * @return integer
     */
    public  function getPaymentWalletDetails($user_id){
        $paymentWalletDetails = array();
        if($user_id>0){
            $paymentWalletDetails = PaymentWallet::where('status','=',1)->where('user_id','=',$user_id)->first();
            return $paymentWalletDetails;
        }else{
            return $paymentWalletDetails;
        }
    }





    /**
     * Get the Wallet Payment Id of the user
     * Pramas as user Id of the Distributor OR RO
     * @param integer
     * @return integer
     */
    public  function getPaymentWalletID($user_id){
        $paymentWalletDetails = array();

        if($user_id>0){
            $paymentWalletDetails = PaymentWallet::where('status','=',1)->where('user_id','=',$user_id)->first();
            return $paymentWalletDetails['id'];
        }else{
            return $paymentWalletDetails;
        }
    }






    /**
     * Get the Wallet Payment Id of the user
     * Pramas as user Id of the Distributor OR RO
     * @param integer
     * @return integer
     */
    public  function isValidPaymentWallet($user_id){
        $paymentWalletDetails = array();
        if($user_id>0){
            if (PaymentWallet::where('status','=',1)->where('user_id','=',$user_id)->count()) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }




   /**
     * Get the Wallet Payment Id of the user
     * Pramas as user Id of the Distributor OR RO
     * @param integer
     * @return integer
     */
    public  function getUserId(){
        return Auth::user()->id;
    }




   /**
     * Get the Wallet Payment Id of the user
     * Pramas as user Id of the Distributor OR RO
     * @param integer
     * @return integer
     */
    public  function getTransferLimitPerMonth(){
        return '25000';
    }

   




    /**
    * @param Last Payment Wallet Transaction ID
    * @param Amount
    * @return boolean , True on sucess, False of Failed
    */
    public function updatePaymentWalletTransactionBalance($newBalance, $lastPaymentWalletTransactionId){
            $paymentObj = PaymentWalletTransaction::find($lastPaymentWalletTransactionId);
            $paymentObj->updated_wallet_balance = $newBalance;
            if($paymentObj->save()){
                return true;
            }
    }





   /**
    * @param Total Amount Paid as net_amount_credit
    * @param deduction_percentage after doing payment
    * @return boolean , True on sucess, False of Failed
    */
    public function getCreditedAmount($payment_mode, $net_amount_credit){
           echo  $deduction_percentage   = $this->getCommissionValue($payment_mode); die;
            $totalAmount            = $net_amount_credit;
            $deduction_percentage   = $deduction_percentage;
            $balanceAmt = $net_amount_credit - (($net_amount_credit*$deduction_percentage)/100);
            return $balanceAmt;
    }


    /**
    * @param Payment Mode Type i.e Debit Card, Credit Card
    * @return float, Percentage Value or Flat Value
    */
    private function getCommissionValue($payment_mode){
                $user_id = Auth::user()->id;
                if(Auth::guard('ro')->check()){
                    $role_id = 3;
                }
                if(Auth::guard('user')->check()){
                    $role_id = 2;
                }
                $agentCommissionsValue = AgentCommission::where('user_id','=',$user_id)
                ->where('role_id','=',$role_id)
                ->where('transaction_type_id','=',$payment_mode)
                ->where('status','=',1)
                ->first();
                dd($agentCommissionsValue);
                if(!empty($agentCommissionsValue)){
                    return $agentCommissionsValue['value'];
                }else{
                    return '0.00';
                }
        
    }




    /**
    * @param Total Amount Paid as net_amount_credit
    * @param deduction_percentage after doing payment
    * @return boolean , True on sucess, False of Failed
    */
    public function creditAdminPaymentWalletTransactionOnRecharge($last_payment_id){

            $rechargePaymentId     = WalletRechargePayment::find($last_payment_id);
            //dd($rechargePaymentId);
            $userId                = $rechargePaymentId->user_id; 
            $net_amount_credit     = $rechargePaymentId->net_amount_credit;
            $deduction_percentage  = $rechargePaymentId->deduction_percentage;
            $payment_ref_key       = $rechargePaymentId->payment_ref_key;
            $status                = $rechargePaymentId->status;
            $productinfo           = $rechargePaymentId->productinfo;
            $payment_mode          = $rechargePaymentId->payment_mode;
            $adminWalletAmount     = $rechargePaymentId->amount_credited;
            $payment_date          = $rechargePaymentId->payment_date;
            
            $payment_wallet_id     = Helper::getPaymentWalletID(1);

            $adminPaymentWallet    = PaymentWallet::find($payment_wallet_id);
            $adminPaymentWallet->total_balance = $adminPaymentWallet->total_balance +  $adminWalletAmount;
            $newBalance         = $adminPaymentWallet->total_balance +  $adminWalletAmount; 

            if($adminPaymentWallet->save()){

            $payAWTObj               = new PaymentWalletTransaction();
            $payment_wallet_id       = Helper::getPaymentWalletID(1);
            $payAWTObj['payment_wallet_id']          = $payment_wallet_id;
            $payAWTObj['debit_amount']               = '0.00';
            $payAWTObj['credit_amount']              = $this->getCreditedAmount($payment_mode, $net_amount_credit);
            $payAWTObj['transaction_number']         = $payment_ref_key;
            $payAWTObj['transaction_date']           = $payment_date;
            $payAWTObj['user_id']                    = $userId;
            $payAWTObj['status']                     = 'Success';
            $payAWTObj['ds_wallet_balance_request_id'] = '0';
            $payAWTObj['remarks']                    = $productinfo;
            $payAWTObj['wallet_recharge_payment_id'] = $last_payment_id;
            $payAWTObj['updated_wallet_balance']     = $newBalance;

            dd($payAWTObj);
            if($payAWTObj->save()){
                    return true;
            }
           }

    }



    public function getMoneyTransferCharge(){
            $MoneyTransferCharge = MoneyTransferCharge::with('AmountType')
                                    ->where('user_id','=',$this->getUserId())
                                    ->where('status','=',1)
                                    ->get();
            return  $MoneyTransferCharge;       
    }



    public function getTransferCharge($amount){
            if($amount<=1000){
                $id = 1;
            }else if($amount>1000 && $amount<=25000){
                $id = 2; 
            }else{
                $id = 3;
            }
            $res = MoneyTransferCharge::with('AmountType')
                    ->where('user_id','=',$this->getUserId())
                    ->where('amount_type','=',$id)
                    ->where('status','=',1)
                    ->first();
            if(!empty($res)){
                return $res['value'];
            }            
    }





}
