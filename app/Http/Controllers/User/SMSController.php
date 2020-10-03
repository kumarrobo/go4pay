<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\PaymentWalletTransaction;
use App\LoginOtp;
use Auth;

class SMSController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');

    }

    public function isValidOTP(Request $request){
        $otp    = $request->get('otp'); 
        $userId = Auth::user()->id;
        $responseArray['status'] = false;
        $responseArray['message'] = "Invalid OTP !!.";
        //echo $loginOtpData = LoginOtp::where('user_id','=',$userId)->where('OTP','=',$otp)->count();die;
        if(LoginOtp::where('user_id','=',$userId)->where('OTP','=',$otp)->count()>0){
            $responseArray['status'] = true;
            $responseArray['message'] = "OTP Verified !!. Please wait...";
        }
        return response()->json($responseArray);
    }


    /**
    * Check is there is OLd OTP present
    * @param user_id and mobile number
    * @return true is old data is not present
    * If Old OTP present, then clear old data 
    */
    private function isValidOTPRequest($user_id, $mobile){
            if(LoginOtp::where('user_id','=',$user_id)->where('mobile','=',$mobile)->count()){
                LoginOtp::where('user_id','=',$user_id)->where('mobile','=',$mobile)->delete();
                return true;
            }else{
                return true;
            }
    }   




    public function getNewSMSOTP($user_id, $mobile){
        //Verify is there old OTP is present or not
        if($this->isValidOTPRequest($user_id, $mobile)){
            $loginOtpObj = new LoginOtp();
            $loginOtpObj['user_id']     = $user_id;
            $loginOtpObj['mobile']      = $mobile;
            $loginOtpObj['OTP']         = $this->getOTP();
            $loginOtpObj['time']        = time();
            $loginOtpObj['created_at']  = $this->getNow();
            if($loginOtpObj->save()){
                return $loginOtpObj;
            }
        }
    }


    //Generate New OTP For Verification
    public function getOTP(){
        $randomid  = mt_rand(123456,999999); 
        return $randomid;
    }


    private function sendSMS($mobile,$message){

        $username       = config('global.SMS_USERNAME');
        $key            = config('global.SMS_KEY');
        $mobileNumber   = $mobile;
        $senderId       = "INFOTP";
        $url ="http://mobicomm.dove-sms.com//submitsms.jsp?user=".$username."&key=".$key."&mobile=+91".$mobileNumber."&message=".$message."&senderid=".$senderId."&accusage=1";

        $client = new Client();
        $res = $client->request('GET', $url);
        $res->getStatusCode();
        $res->getHeader('content-type');
        $res->getBody();
        if($res->getStatusCode() == 200){
            return true;
        }
    }



    public function sendSMSForVerifyBalanceTransfer($mobile,$message){
            //Add Signature
            $message = $message.' '.$this->getSignature();
            //return true;
            if($this->sendSMS($mobile,$message)){
                return true;
            }
    }


    /**
     * Send SMS when user got deducted balance.
     */
    public  function sendDeductSMS($mobile,$amount,$user_id,$lastPaymentWalletTransactionId)
    {
        //Get Details of Wallet Transaction
        $walletTransactionArr = $this->getPaymentWalletTransactionDetails($lastPaymentWalletTransactionId);
        if($walletTransactionArr!= null){
            //dd($walletTransactionArr);
            $transactionDate    = $this->getDisplayDate($walletTransactionArr['transaction_date']);
            $transationNumber   = $walletTransactionArr['transaction_number'];
            $newBalance         = $this->getAmount($walletTransactionArr['PaymentWallet']['total_balance']); 

            $message = $this->getAmount($amount)." is debited from your wallet on ".$transactionDate.' with Ref No. '.$transationNumber.' Avl Bal.'.$newBalance.'. '.$this->getSignature(); 
            return $this->sendSMS($mobile,$message);
        }
    }




    /**
     * Send SMS when user got deducted balance.
     */
    public  function sendCreditSMS($mobile,$amount,$user_id,$lastPaymentWalletTransactionId)
    {
        //Get Details of Wallet Transaction
        $walletTransactionArr = $this->getPaymentWalletTransactionDetails($lastPaymentWalletTransactionId);
        //dd($walletTransactionArr);
        if($walletTransactionArr!= null){
            $transactionDate    = $this->getDisplayDate($walletTransactionArr['transaction_date']);
            $transationNumber   = $walletTransactionArr['transaction_number'];
            $userAgent          = $walletTransactionArr['User']['name'].'-'.$walletTransactionArr['User']['AgentCode'];
            $newBalance         = $this->getAmount($walletTransactionArr['PaymentWallet']['total_balance']); 
            $message = 'Update: '.$this->getAmount($amount)." is credited into your wallet on ".$transactionDate.' with Ref No. '.$transationNumber.' from '.$userAgent.'. Avl bal: '.$newBalance;
            return $this->sendSMS($mobile,$message);
        }
    }



    private function getSignature(){
        return "Not you ? Call on ".env('ADMIN_PHONE').' to report.';
    }



    /**
    *Get Details of Wallet Transaction
    * @param id of the PaymentWalletTransaction
    */
    private function getPaymentWalletTransactionDetails($lastPaymentWalletTransactionId){
        return PaymentWalletTransaction::with('PaymentWallet','User')->find($lastPaymentWalletTransactionId);
    }
}
