<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VerifyBeneficiariesBankAccount;
use App\VerifyMobileBeneficiariesBankAccount;

class WireAPIController extends Controller
{


   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }


    
    /*****************************************WIRE API START HERE**********************/
    private function getMerchentKey(){
        return config('global.MONEY_MERCHANT_KEY');
    }

    private function getMerchentSalt(){
        return config('global.MONEY_SALT');
    }

    private function getAddContctAPIURL(){
        return config('global.ADD_CONTACT_API');
    }
    private function getAddBeneficiariesAPIURL(){
        return config('global.ADD_BENEFICIARIES_API');
    }

    //Get Beneficiaries
    private function getBeneficiariesAPIURL(){
        return config('global.ADD_BENEFICIARIES_API');
    }


    //Get Beneficiaries
    private function getVerifyAccountAPIURL(){
        return config('global.VERIFY_ACCOUNT_API');
    }

   //Get Beneficiaries
    private function getTRANSFERSINITIATEAPIURL(){
        return config('global.TRANSFERS_INITIATE_API');
    }


    /**
    * Add New Beneficiery Account Number For Contact
    * @param  \Illuminate\Http\Request  $request
    * @return void    *
    */
    public function addWireBeneficiariesAPI(Request $request,$data){
         if ($request->isMethod('post')) {
            $contact_id         = $data['contact_id'];
            $beneficiary_type   = $data['beneficiary_type'];
            $beneficiary_name   = $data['beneficiary_name'];
            $account_number     = $data['account_number'];
            $ifsc               = $data['ifsc'];


            $merchentKey    = $this->getMerchentKey();
            $salt           = $this->getMerchentSalt();
            //SHA-512 hash of string in the format of “[key]|[name]|[email]|[phone]|[salt]”
            $keyStr             = $merchentKey.'|'.$contact_id.'|'.$beneficiary_name.'|'.$account_number.'|'.$ifsc.'||'.$salt; 
            $AuthorizationKey   = hash('sha512', $keyStr);
            $url                = $this->getAddBeneficiariesAPIURL();
             $data = array(
                'key'               => $merchentKey,
                'contact_id'        => $contact_id,
                'beneficiary_name'  => $beneficiary_name,
                'beneficiary_type'  => $beneficiary_type,
                'account_number'    => $account_number,
                'ifsc'              => $ifsc,
            );
            $result = $this->postCurlData($data,$url,$AuthorizationKey);
            return json_decode($result,true);
         }
    }




      /**
    * @param  \Illuminate\Http\Request  $request
    * @return void    *
    */
    public function verifyBankAccountAPI(Request $request, $data){
            $account_no         = $data['account_no'];
            $ifsc               = $data['ifsc'];

            $merchentKey    = $this->getMerchentKey();
            $salt           = $this->getMerchentSalt();

            //SHA-512 hash of string in the format of “[key]|[name]|[email]|[phone]|[salt]”
            $keyStr             = $merchentKey.'|'.$account_no.'|'.$ifsc.'|'.$salt;
            $AuthorizationKey   = hash('sha512', $keyStr);
            $url                = $this->getVerifyAccountAPIURL();
             $data = array(
                'key'        => $merchentKey,
                'account_no' => $account_no,
                'ifsc'       => $ifsc,
            );
            //echo "dasd"; die;
            $result = $this->postCurlData($data,$url,$AuthorizationKey);
            //print_r($result);
            return json_decode($result,true);
    }







     /**
    * @param  \Illuminate\Http\Request  $request
    * @return void    *
    */
    public function getWireBeneficiariesAPI($data){
            $contact_id         = $data['contact_id'];
            $pageSize           = $data['pageSize'];
            $current            = $data['current'];
            

            $merchentKey    = $this->getMerchentKey();
            $salt           = $this->getMerchentSalt();
            //SHA-512 hash of string in the format of “[key]|[name]|[email]|[phone]|[salt]”
            $keyStr             = $merchentKey.'|'.'bene75dc42fe43be9d76e2ca84ee18ca'.'|'.$salt; 
            $AuthorizationKey   = hash('sha512', $keyStr);
            $url                = $this->getBeneficiariesAPIURL().'bene75dc42fe43be9d76e2ca84ee18ca'.'/';
             $data = array(
                'key'        => $merchentKey,
            );
            $result = $this->getCurlData($data,$url,$AuthorizationKey);
            return json_decode($result,true);
    }




    /**
    * @param  \Illuminate\Http\Request  $request
    * @return void    *
    */
    public function quickMoneyTransferInitiateAPI(Request $request,$verify_beneficiaries_bank_accounts_id){
         if ($request->isMethod('post')) {
            $res = VerifyBeneficiariesBankAccount::find($verify_beneficiaries_bank_accounts_id);
            //dd($res);
            $merchentKey    = $this->getMerchentKey();
            $salt           = $this->getMerchentSalt();

            $beneficiary_code       = $res['beneficiary_id'];
            $unique_request_number  = md5(time());
            $payment_mode           = "IMPS";
            $amount                 = "1.00";
            $narration              = "Account Added  with first payment initiated";
            //SHA-512 hash of string in the format of “[key]|[name]|[email]|[phone]|[salt]”
            $keyStr             = $merchentKey.'|'.$beneficiary_code.'|'.$unique_request_number.'|'.$amount.'|'.$salt; 
            $AuthorizationKey   = hash('sha512', $keyStr);
            $url                = $this->getTRANSFERSINITIATEAPIURL();
             $data = array(
                'key'                   => $merchentKey,
                'beneficiary_code'      => $beneficiary_code,
                'unique_request_number' => $unique_request_number,
                'payment_mode'          => $payment_mode,
                'amount'                => 1.00,
                'narration'             => $narration
            );
            $result = $this->postCurlData($data,$url,$AuthorizationKey);
            return $result;
         }
    }




    /**
    * @param  \Illuminate\Http\Request  $request
    * @return void    *
    */
    public function moneyTransferInitiateAPI(Request $request){
         if ($request->isMethod('post')) {
            $verifyBeneficiariesId      = $request->get('beneficiaries_bank_account_id');
            $amount                     = $request->get('amount');
            $remarks                    = $request->get('remarks');
            $payment_mode               = $request->get('payment_mode');

            $result     =   VerifyMobileBeneficiariesBankAccount::with('VerifybeneficiariesBankAccount')->find($verifyBeneficiariesId);
            $verify_beneficiaries_bank_account_id =$result['VerifybeneficiariesBankAccount']['id']; 
            //dd($result);
            $merchentKey    = $this->getMerchentKey();
            $salt           = $this->getMerchentSalt();

            $beneficiary_code       = $result['VerifybeneficiariesBankAccount']['beneficiary_id'];
            $unique_request_number  = md5(time());
            $payment_mode           = $payment_mode;
            $amount                 = "$amount".".00";
            $narration              = $remarks;
            //SHA-512 hash of string in the format of “[key]|[name]|[email]|[phone]|[salt]”
            $keyStr             = $merchentKey.'|'.$beneficiary_code.'|'.$unique_request_number.'|'.$amount.'|'.$salt; 
            $AuthorizationKey   = hash('sha512', $keyStr);
            $url                = $this->getTRANSFERSINITIATEAPIURL();
            $data = array(
                'key'                   => $merchentKey,
                'beneficiary_code'      => $beneficiary_code,
                'unique_request_number' => $unique_request_number,
                'payment_mode'          => $payment_mode,
                'amount'                => (float) $amount,
                'narration'             => $narration
            );
            // dd($data);
            $result = $this->postCurlData($data,$url,$AuthorizationKey);
            return $result;
         }
    }




    




    /**
    * @param  \Illuminate\Http\Request  $request
    * @return void    *
    */
    public function addWireContactAPI(Request $request){
         if ($request->isMethod('post')) {
            $mobile         = $request->get('mobile');
            $sender_name    = $request->get('sender_name');
            $email          = $request->get('email');

            $merchentKey    = $this->getMerchentKey();
            $salt           = $this->getMerchentSalt();
            //SHA-512 hash of string in the format of “[key]|[name]|[email]|[phone]|[salt]”
            $keyStr             = $merchentKey.'|'.$sender_name.'|'.$email.'|'.$mobile.'|'.$salt; 
            $AuthorizationKey   = hash('sha512', $keyStr);
            $url                = $this->getAddContctAPIURL();
             $data = array(
                'key'        => $merchentKey,
                'name'       => $sender_name,
                'email'      => $email,
                'phone'      => $mobile
            );
            $result = $this->postCurlData($data,$url,$AuthorizationKey);
            return $result;
         }
    }



     private function postCurlData($data,$url,$AuthorizationKey){
        $payload = json_encode($data); 
        $ch = curl_init($url);
        $headr = array();
        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization: '.$AuthorizationKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        if ($result === false)
        {
            // throw new Exception('Curl error: ' . curl_error($crl));
            print_r('Curl error: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result; 
    }




     private function getCurlData($data,$url,$AuthorizationKey){
        //$payload = json_encode($data); 
        $ch = curl_init($url);
        $data = http_build_query($data);
        $getUrl = $url."?".$data;
        $headr = array();
        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization: '.$AuthorizationKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result; 
    }



    /*****************************************WIRE API ENDS HERE***********************/
}
