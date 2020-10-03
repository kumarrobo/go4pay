<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\SMSController;
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


class WalletController extends Controller
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
        $this->SMSController = new SMSController();
        $this->middleware('auth:user',['except' => ['walletRechargeSuccess', 'walletRechargeFailed','walletCredited']]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function newBalanceRequest(Request $request)
    {
        //dd("ok");
        $paymentMode = '';
        if ($request->isMethod('post')) {
            $validator = $this->validatorWallet($request->all());
            if($validator->fails()) {
                $error=$validator->errors()->all();
                Session::flash('error', $error);
                foreach($request->all() as $k=>$value){
                    Session::flash($k, $request->get($k));
                }
                return redirect()->back()->withErrors($validator)->withInput();
             }else{

                 //If Payment Mode is Cash In Bank
                 if($request->get('paymentMode') == 1){
                    $paymentMode = 1;

                    $validator = $this->validatorCashInBank($request->all()); 
                     if($validator->fails()) {
                        $error=$validator->errors()->all();
                        Session::flash('paymentMode', '1');
                        Session::flash('error', $error);
                        foreach($request->all() as $k=>$value){
                            Session::flash($k, $request->get($k));
                        }
                        return redirect()->back()->withErrors($validator)->withInput();
                     }else{
                        //dd($request->all());
                         $walletrequest = $this->saveNewBalanceRequest($request->all());
                         if($walletrequest!= null){
                             $id = $walletrequest['id'];
                             return redirect()->back()->withErrors($validator)
                            ->with('message', 'Wallet Balance Requested Successfully!!. Your Request ID: '.$id);
                        }else{
                             return redirect()->back()
                            ->with('message', 'Somthing went wrong, Please try again later!!');
                        }
                     }
                 }
                 //Cash in Bank Ends Hrere




                 //If Payment Mode is Cash In Bank
                 if($request->get('paymentMode') == 2){
                    $paymentMode = 2;

                    $validator = $this->validatorCashInMachine($request->all()); 
                     if($validator->fails()) {
                        $error=$validator->errors()->all();
                        Session::flash('paymentMode', '2');
                        Session::flash('error', $error);
                        foreach($request->all() as $k=>$value){
                            Session::flash($k, $request->get($k));
                        }
                        return redirect()->back()->withErrors($validator)->withInput();
                     }else{
                        //dd($request->all());
                         $walletrequest = $this->saveNewBalanceRequestForCDM($request->all());
                         if($walletrequest!= null){
                             $id = $walletrequest['id'];
                             return redirect()->back()->withErrors($validator)
                            ->with('message', 'Wallet Balance Requested Successfully!!. Your Request ID: '.$id);
                        }else{
                             return redirect()->back()
                            ->with('message', 'Somthing went wrong, Please try again later!!');
                        }
                     }
                 }
                 //Cash in Bank Ends Hrere


                    //If Payment Mode is Cash In Bank
                 if($request->get('paymentMode') == 3){
                    $paymentMode = 3;

                    $validator = $this->validatorCashNEFT($request->all()); 
                     if($validator->fails()) {
                        $error=$validator->errors()->all();
                        Session::flash('paymentMode', '3');
                        Session::flash('error', $error);
                        foreach($request->all() as $k=>$value){
                            Session::flash($k, $request->get($k));
                        }
                        return redirect()->back()->withErrors($validator)->withInput();
                     }else{
                        //dd($request->all());
                         $walletrequest = $this->saveNewBalanceRequestForNEFT($request->all());
                         if($walletrequest!= null){
                             $id = $walletrequest['id'];
                             return redirect()->back()->withErrors($validator)
                            ->with('message', 'Wallet Balance Requested Successfully!!. Your Request ID: '.$id);
                        }else{
                             return redirect()->back()
                            ->with('message', 'Somthing went wrong, Please try again later!!');
                        }
                     }
                 }
                 //Cash in Bank Ends Hrere


                 
             }

        }
        return view('user.DSDashboard',['paymentMode'=>$paymentMode]);
    }




    //Save Balance Request For Machine
    private function saveNewBalanceRequestForNEFT($data){
              $user_id = Auth::user()->id; 
              return DsWalletBalanceRequest::create([
                    'user_id'               => $user_id,
                    'requested_amount'      => $data['request_amount'],
                    'payment_date'          => $this->getFormatDate($data['transfer_date']),
                    'wallet_balance_in'     => $data['request_in'],
                    'payment_mode_type_id'  => $data['paymentMode'],
                    'company_bank_id'       => $data['neft_aes_bank_name'],
                    'neft_transfer_date'    => $this->getFormatDate($data['neft_transfer_date']),
                    'depositer_name'        => $data['neft_sender_name'],
                    'sender_account_number' => $data['sender_account_number'],
                    'neft_via_bank_id'      => $data['neft_bank_name'],
                    'transaction_number'    => $data['transaction_number'],
                    'remarks'               => $data['remarks3'],
                    'created_at'            => $this->getNow()
            ]);

    }



  //Save Balance Request For Machine
    private function saveNewBalanceRequestForCDM($data){
              $user_id = Auth::user()->id; 
              return DsWalletBalanceRequest::create([
                    'user_id'               => $user_id,
                    'requested_amount'      => $data['request_amount'],
                    'payment_date'          => $this->getFormatDate($data['transfer_date']),
                    'wallet_balance_in'     => $data['request_in'],
                    'payment_mode_type_id'  => $data['paymentMode'],

                    'company_bank_id'       => $data['aes_bank_name'],
                    'sender_mobile_number'  => $data['depositer_mobile_number'],
                    'bank_branch_code'      => $data['cdm_branch_name'],
                    'remarks'               => $data['remarks2'],
                    'created_at'            => $this->getNow()
            ]);

    }




    //Save Balance Request For Cash In Bank
    private function saveNewBalanceRequest($data){
              $user_id = Auth::user()->id; 
              return DsWalletBalanceRequest::create([
                    'user_id'               => $user_id,
                    'requested_amount'      => $data['request_amount'],
                    'payment_date'          => $this->getFormatDate($data['payment_date']),
                    'wallet_balance_in'     => $data['request_in'],
                    'payment_mode_type_id'  => $data['paymentMode'],
                    'depositer_name'        => $data['depositer_name'],
                    'company_bank_id'       => $data['aes_bank_name'],
                    'bank_location'         => $data['depositing_location'],
                    'bank_branch_code'      => $data['depositor_branch_code'],
                    'remarks'               => $data['remarks1'],
                    'created_at'            => $this->getNow()
            ]);

    }



    
    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validatorCashInBank(array $data)
    {
        return Validator::make($data, [
            'depositer_name'        => ['required'],
            'aes_bank_name'         => ['required'],
            'depositing_location'   => ['required'],
            
            
        ],[
            'depositer_name.required'   => 'Please enter depositor name.', // custom message
            'aes_bank_name.required'    => 'Choose AES deposite bank name', // custom message
            'depositing_location.required'=> 'Please Enter depositing location deails', // custom message
           ]
       );
       
    }



    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validatorCashInMachine(array $data)
    {
        return Validator::make($data, [
            'transfer_date'          => ['required'],
            'aes_bank_name'          => ['required'],
            'depositer_mobile_number'=> ['required'],
            'cdm_branch_name'        => ['required'],
            'remarks2'               => ['required'],
            
        ],[
            'transfer_date.required'    => 'Please choose transfer date.', // custom message
            'aes_bank_name.required'    => 'Choose AES deposite bank name', // custom message
            'depositer_mobile_number.required'=> 'Please Enter depositer mobile number', // custom message
            'cdm_branch_name.required'=> 'Please Enter branch name', // custom message
            'remarks2.required'=> 'Please Enter remarks' // custom message
           ]
       );
       
    }



     /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validatorCashNEFT(array $data)
    {
        return Validator::make($data, [
            'neft_transfer_date'     => ['required'],
            'neft_sender_name'       => ['required'],
            'sender_account_number'  => ['required'],
            'neft_bank_name'         => ['required'],
            'neft_aes_bank_name'     => ['required'],
            'transaction_number'     => ['required'],
            'remarks3'               => ['required'],
            
        ],[
            'neft_transfer_date.required'   => 'Please choose transfer date.', // custom message
            'neft_bank_name.required'   => 'Choose NEFT/RTGS/FT/IMPS Via Bank Name', // custom message
            'neft_aes_bank_name.required'   => 'Choose NEFT/RTGS/FT/IMPS Sent to Bank Name', // custom message
            'neft_sender_name.required'     => 'Please enter sender name', // custom message
            'sender_account_number.required'=> 'Please enter sender account number', // custom message
            'transaction_number.required'=> 'Please enter transaction number', // custom message
            'remarks3.required'=> 'Please Enter remarks' // custom message
           ]
       );
       
    }




     /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validatorWallet(array $data)
    {
        return Validator::make($data, [
            'request_amount'=> ['required'],
            'payment_date'  => ['required'],
            'paymentMode'   => ['required'],
            
        ],[
            'request_amount.required'=> 'Request Amount Required', // custom message
            'payment_date.required'=> 'Payment Date Required', // custom message
            'paymentMode.required'=> 'Payment Mode  Required' // custom message
           ]
       );
    }



      /**
     * All Balacne  request generated by the DS.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  array
     */
    public function allBalanceRequest(Request $request)
    {
        $user_id = Auth::user()->id;
        $allRequest = DsWalletBalanceRequest::where('user_id','=',$user_id)->paginate(15);
        //dd($allRequest);
        return view('user.allBalanceRequest',['allRequest'=>$allRequest]);
    }





    /**
     * All Balacne  request generated by the DS.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  array
     */
    public function pushBalanceRequest(Request $request)
    {
        $userDetails = array();

        if ($request->isMethod('post')) {
             $validator = $this->validatorPushBalance($request->all()); 
             if($validator->fails()) {
                $error=$validator->errors()->all();
                Session::flash('error', $error);
                foreach($request->all() as $k=>$value){
                    Session::flash($k, $request->get($k));
                }
                return redirect()->back()->withErrors($validator)->withInput();
             }else{

                $agent_id = $request->get('agent_id');
                $mobile = $request->get('mobile');

                $authMobile = Auth::user()->mobile;
                $authId     = Auth::user()->id;

                if($authMobile == $mobile){
                     Session::flash('error', ["You can not transfer balance yourself."]);
                     return redirect()->back()->withErrors($validator)->withInput();
                }

                if($agent_id == $authId){
                     Session::flash('error', ["You can not transfer balance yourself."]);
                     return redirect()->back()->withErrors($validator)->withInput();
                }


                if($agent_id!= null){
                    $userDetails = User::with('UserDetail','PaymentWallet')->where('id','=',$agent_id)->get();

                }
                if($mobile!= null){
                    $userDetails = User::with('UserDetail','PaymentWallet')->where('mobile','=',$mobile)->get();
                }

                if($userDetails->count() == 0){
                    Session::flash('error', ["No Records Found"]);
                    return redirect()->back()->withErrors($validator)->withInput();
                }          
                //dd($userDetails);  
             }
            
        }
        return view('user.pushBalanceRequest',['ROList'=>$userDetails]);
    }





    /**
     * All Balacne  request generated by the DS.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  array
     */
    public function TransferBalanceToUser(Request $request,$id,$tday)
    {
        $userDetails =  array();
        try {
            $userId = Crypt::decryptString($id);
            $tdayStr   = Crypt::decryptString($tday);
            //Get Agent Details
            
            if($tdayStr == date('Ymd')){
                $userDetails = User::with('UserDetail','PaymentWallet')->find($userId);

            }else{
                Session::flash('error', ["Somthing went wrong, please try after sometime."]);
                return redirect('user/pushbalance')->with(['error'=>['Sorry ! Somthing went wrong, please try after sometime.']]);    
            }
        } catch (DecryptException $e) {
            Session::flash('error', ["No Records Found"]);
            return redirect('user/pushbalance')->with(['error'=>['Sorry ! Somthing went wrong OR Invalid Url.']]);
        }
        return view('user.TransferBalanceToDSAndRo',[
                    'userDetails'=>$userDetails,
                    'id'=>$id,
                    'tday'=>$tday
        ]);
    }





     /**
     * Transfer Balance to User Wallet From Distributor 
     * Balance From Distributor To Distributor Or RO 
     * Balance Validation and Transaction happen here 
     * @param  \Illuminate\Http\Request  $request
     * @return  array
     */
    public function TransferBalanceToUserWallet(Request $request,$id,$tday)
    {
        
        $userDetails =  array();
        try {
            $userId         = Crypt::decryptString($id);
            $tdayDate       = Crypt::decryptString($tday);
            $amountRequest  = $request->get('amount'); 
            $remarks        = $request->get('remarks'); 
            $otp            = $request->get('OTP');
            //Verify OTP Here and then return

            //Get Agent Details
            if($tdayDate == date('Ymd')){
                $amount = Crypt::decryptString($amountRequest);
                //get Balance of the User
                $totalBalance = $this->getWalletBalance();
                if($totalBalance>=$amount){

                    //Get the Details of the DS OR RO
                    $userDetails = User::with('UserDetail','PaymentWallet')->find($userId);
                    $user_id     = $userDetails['id'];

                    //Push the Requested Amount to User Wallets
                    $requestData  = $request->all();
                    $lastBalacePush = $this->pushCreditRequestedBalanceAmount($user_id,$amount,$requestData);
                    if($lastBalacePush){
                    $lastId = $lastBalacePush['id'];
                    $enId   = Crypt::encryptString($lastId);
                    return redirect('user/txncreditsuccess/'.$id.'/'.$enId)->with(['success'=>["Balance transfer successfully."]]);
                    }else{
                        Session::flash('error', ["Sorry, Somthing Went Wrong, Please Try After Sometime."]);
                        return redirect('user/pushbalancenow/'.$id.'/'.$tday)->with(['error'=>["Sorry, Somthing Went Wrong, Please Try After Sometime."]]);    
                    }

                }else{
                    Session::flash('error', ["Sorry, you don't have sufficient balance"]);
                    return redirect('user/pushbalancenow/'.$id.'/'.$tday)->with(['error'=>["Sorry, you don't have sufficient balance"]]);
                }

            }
        } catch (DecryptException $e) {
            Session::flash('error', ["No Records Found"]);
            return redirect('user/pushbalancenow/'.$id.'/'.$tday)->with(['error'=>['Sorry ! Invalid Url.']]);
        }
        return view('user.TransferBalanceToDSAndRo',[
                    'userDetails'=>$userDetails
        ]);
    }



     /**
     * Validate  for the Push the Balance for agent id OR Mobile Number.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validatorPushBalance(array $data)
    {
        return Validator::make($data, [
            'agent_id'=> ['required_without:mobile'],
            'mobile'  => ['required_without:agent_id'],
            
        ],[
            'agent_id.required_without:mobile'=> 'Please Enter Agent ID OR Mobile Number', // custom message
            'mobile.required_without.agent_id'=> 'Please Enter Agent ID OR Mobile Number', // custom message
           ]
       );
    }





    /**
    * @param integher
    * @return void
    * @param user_id, requested_amount
    * Distributor and RO as user_id.
    **/
    private function pushCreditRequestedBalanceAmount($user_id,$amount,$requestData){
            $userId         = $user_id;
            $creditAmount   = $amount;
            $remarks        = $requestData['remarks'];
            $newWalletTransaction  = array();          
            // Start transaction!
            DB::beginTransaction();
            try {
                //Call From Main Controller
                if($this->isValidPaymentWallet($userId)){
                    //Get the Wallet Ddetails
                    //Call From Main Controller
                    $getPaymentWalletDetails = $this->getPaymentWalletDetails($userId);
                    // Validate, then create if valid
                    $payment_wallet_id  = $getPaymentWalletDetails['id'];
                    $debit_amount       = '0.00';
                    $credit_amount      = $creditAmount;
                    $transaction_number = $this->getTransactionNumber();
                    $transaction_date   = $this->getNow();
                    $creditByUserId     = Auth::user()->id;
                    $status             = 'Success';
                    $remarks            = $remarks;
                    $created_at         = $this->getTodayDate();
                    
                    $newWalletTransaction = PaymentWalletTransaction::create( 
                        [
                            'payment_wallet_id' => $payment_wallet_id,
                            'debit_amount'      => $debit_amount,
                            'credit_amount'     => $credit_amount,
                            'transaction_number'=> $transaction_number,
                            'transaction_date'  => $transaction_date,
                            'user_id'           => $creditByUserId,
                            'status'            => $status,
                            'remarks'           => $remarks,
                            'created_at'        => $created_at
                        ] );
                    //dd($newWalletTransaction);
                    if($newWalletTransaction){
                        $lastPaymentWalletTransactionId = $newWalletTransaction['id'];
                        //After Created PaymentWalletTransaction, Push this balance to Payment
                        // Wallet and update the new balance into that table
                        $this->creditIntoPaymentWallet($userId,$credit_amount,$lastPaymentWalletTransactionId);

                        //Debit From the Wallet of the User
                        $paymentDebitDetails = $this->getPaymentWalletDetails($creditByUserId);
                        // Validate, then create if valid
                        $payment_wallet_id  = $paymentDebitDetails['id'];
                        $debit_amount       = $credit_amount;
                        $credit_amount      = '0.00';
                        $transaction_number = $this->getTransactionNumber();
                        $transaction_date   = $this->getNow();
                        $debitByUserId      = Auth::user()->id;
                        $status             = 'Success';
                        $remarks            = $remarks;
                        $created_at         = $this->getTodayDate();
                        
                        $debitWalletTransaction = PaymentWalletTransaction::create( 
                            [
                                'payment_wallet_id' => $payment_wallet_id,
                                'debit_amount'      => $debit_amount,
                                'credit_amount'     => $credit_amount,
                                'transaction_number'=> $transaction_number,
                                'transaction_date'  => $transaction_date,
                                'user_id'           => $debitByUserId,
                                'status'            => $status,
                                'remarks'           => $remarks,
                                'created_at'        => $created_at
                            ] );
                        if($debitWalletTransaction!=null){
                            $lastPaymentWalletTransactionId = $debitWalletTransaction['id']; 
                            //Deduct the balance from the Wallet  from the user
                            $this->debitFromPaymentWallet($debit_amount,$lastPaymentWalletTransactionId);
                        }
                    }else{
                        return false;
                    }
                }
            } catch(ValidationException $e){
                // Rollback and then redirect
                // back to form with errors
                DB::rollback();
                return false;
            } catch(\Exception $e){
                DB::rollback();
                throw $e;
            }
            // If we reach here, then
            // data is valid and working.
            // Commit the queries!
            DB::commit();
            return $newWalletTransaction;
    }





    /**
    * @param user_id, as id of Distributor OR Retailers
    * @param credit_amount as Amount to be added into wallet
    * @return boolean , True on sucess, False of Failed
    */
    private function creditIntoPaymentWallet($user_id,$amount,$lastPaymentWalletTransactionId){
        $userId     = $user_id; 
        $newAmount  = $amount;
        if($this->isValidPaymentWallet($user_id)){
            $paymentWalletDetails   = $this->getPaymentWalletDetails($user_id);
            $id                     =  $paymentWalletDetails['id'];
            $paymentWalletArr       = PaymentWallet::with('User')->find($id);
            $mobile                 = $paymentWalletArr['User']['mobile'];
            //Update New amount
            $paymentWalletArr['total_balance'] =  $paymentWalletArr['total_balance'] + $amount;
            if($paymentWalletArr->save()){
                $payWT = PaymentWalletTransaction::find($lastPaymentWalletTransactionId);
                $payWT->updated_wallet_balance = $paymentWalletArr['total_balance'];
                if($payWT->save()){
                    $this->SMSController->sendCreditSMS($mobile,$amount,$userId,$lastPaymentWalletTransactionId);
                }
                return true;
            }else{
                return false;
            }
        }
        
    }


     /**
    * @param user_id, as id of Distributor OR Retailers
    * @param credit_amount as Amount to be added into wallet
    * @return boolean , True on sucess, False of Failed
    */
    private function debitFromPaymentWallet($amount,$lastPaymentWalletTransactionId){
        $userId     = Auth::user()->id;
        $mobile     = Auth::user()->mobile;
        $newAmount  = $amount;
        if($this->isValidPaymentWallet($userId)){
            $paymentWalletDetails = $this->getPaymentWalletDetails($userId);
            $id =  $paymentWalletDetails['id'];
            $paymentWalletArr = PaymentWallet::find($id);
            //Update New amount
            $paymentWalletArr['total_balance'] =  $paymentWalletArr['total_balance'] - $amount;
            if($paymentWalletArr->save()){
                //Send SMS For Deduct Balance
                $payWT = PaymentWalletTransaction::find($lastPaymentWalletTransactionId);
                $payWT->updated_wallet_balance = $paymentWalletArr['total_balance'];
                if($payWT->save()){
                    $this->SMSController->sendDeductSMS($mobile,$amount,$userId,$lastPaymentWalletTransactionId);
                }
                return true;
            }else{
                return false;
            }
        }
        
    }



    /**
    * Method After Transfer the Balance Successfully
    * @param id
    * @param lastid
    * Both id and lastid are encrypted
    * @param  \Illuminate\Http\Request  $request
    * @return void
    * @throws \Illuminate\Validation\ValidationException
    */
    public function balanceTransferSuccessfully(Request $request, $id, $lastid){
        $userDetails = array();
        try {
            $userId                             = Crypt::decryptString($id);
            $lastPaymentWalletTransactionId     = Crypt::decryptString($lastid);

            //Get Last Paymnet Wallet Transaction
            $PaymentWalletTransactionArr = PaymentWalletTransaction::with('PaymentWallet')->find($lastPaymentWalletTransactionId);

            //Get the User Details
            $DSROUserId = $PaymentWalletTransactionArr['PaymentWallet']['user_id'];
            $userArr = User::find($DSROUserId);
            //dd($userArr);
            //dd($PaymentWalletTransactionArr);
        }catch (DecryptException $e) {
            Session::flash('error', ["No Records Found"]);
            return redirect('user/pushbalancenow/'.$id.'/'.$tday)->with(['error'=>['Sorry ! Invalid Url.']]);
        }

        return view('user.balanceTransferSuccessfully',[
                    'userDetails'=>$PaymentWalletTransactionArr,
                    'userArr'=>$userArr
        ]);
    }







    /**
    * Method For Verify OTP
    * @param id
    * @param tday
    * Both id and tday are encrypted
    * @param  \Illuminate\Http\Request  $request
    * @return void
    */
    public function verifyOTPForBalanceTransfer(Request $request, $id, $tday,$amount=null,$remarks=null){
        $userDetails = array();
        $data        = array();

        try {
            $userId         = Crypt::decryptString($id); 
            $tdayDate       = Crypt::decryptString($tday);
            $userDetails    = User::find($userId);
            $requestData    = $request->all();
            $mobile         = Auth::user()->mobile;
            $amount         = $requestData['amount'];
            $remarks        = $requestData['remarks'];

            $enAmountString = Crypt::encryptString($amount);

            //Generate OTP and Save
            $OTPDetails     = $this->SMSController->getNewSMSOTP(Auth::user()->id, $mobile);
            $OTPNumber      = $OTPDetails['OTP'];
            $message ="Your One Time OTP for requesting balance transfer is ".$OTPNumber.'. Please do not share with anyone.';
            //Send Messsage
            if($this->SMSController->sendSMSForVerifyBalanceTransfer($mobile,$message)){
                 Session::flash('message', "One Time Password Sent, Verify OTP Now !!");
            }
            $data['otp']    = '';
            $data['mobile'] = $mobile;
            $mobileNumber   = substr($mobile,0,1).'XXXXXX'.substr($mobile,-2);

        }catch (DecryptException $e) {
            Session::flash('error', ["No Records Found"]);
            return redirect('user/pushbalancenow/'.$id.'/'.$tday)->with(['error'=>['Sorry ! Invalid Url.']]);
        }
        return view('user.verifyOTPForBalanceTransfer',[
                    'userDetails'=> $userDetails,
                    'requestData'=> $requestData,
                    'id'         => $id,
                    'tday'       => $tday,
                    'mobile'     => $mobileNumber,
                    'amount'     => $enAmountString,
                    'remarks'    => $remarks
        ]);
    }






   /**
    * @param  \Illuminate\Http\Request  $request
    * @return void
    * @throws \Illuminate\Validation\ValidationException
    */
   public function tatkalWalletRechargeEaseBuzz(Request $request,$id=null){
    $credit_amount      ='';
    $transaction_number ='';
    if(isset($id)){
        try{
              $id     = Crypt::decryptString($id);
              $WalletRechargePayment = WalletRechargePayment::with('User')->find($id);
              if($WalletRechargePayment){
              //Get Payment Wallet Id 

                $payment_wallet_id = Helper::getPaymentWalletID($this->getUserId());
                $PaymentWalletTransaction =PaymentWalletTransaction::where('user_id','=',$this->getUserId())
                ->where('payment_wallet_id','=',$payment_wallet_id)
                ->where('wallet_recharge_payment_id','=',$id)
                ->first();
                //dd($PaymentWalletTransaction);
                if($PaymentWalletTransaction){
                    $credit_amount      = $this->getAmount($PaymentWalletTransaction['credit_amount']);
                    $transaction_number = $PaymentWalletTransaction['transaction_number'];
                }
              }
        } catch (DecryptException $e) {
            Session::flash('error', ["Invalid Request, Please Try After Sometime."]);
            //return redirect('user/pushbalancenow/'.$id.'/'.$tday)->with(['error'=>['Sorry ! Invalid Url.']]);
        }
    }
    $user_id = Auth::user()->id;
    $userDetails = User::find($user_id);
    //dd($userDetails );
    //Get the Payment Type Lisst
    $TransactionType = TransactionType::where('status','=',1)->get(); 

    //Get AgentCommission
    $AgentCommission = AgentCommission::with('TransactionType')
    ->where('user_id','=',$user_id)
    ->where('status','=',1)
    ->get();
    //dd($AgentCommission);
    return view('user.TatkalWalletRechargeEaseBuzz',array(
        'TransactionType'       =>  $TransactionType,
        'AgentCommission'       =>  $AgentCommission,
        'userDetails'           =>  $userDetails,
        'transaction_number'    =>  $transaction_number,
        'credit_amount'         =>  $credit_amount
    ));
   }




   /**
    * @param  \Illuminate\Http\Request  $request
    * @return void
    * @throws \Illuminate\Validation\ValidationException
    */
   public function confirmRechargeTatkalWalletRechargeEaseBuzz(Request $request){
     //dd($request->all());
     if ($request->isMethod('post')) {
            $validator = $this->validatorForm($request->all());
            if($validator->fails()) {
                $error=$validator->errors()->all();
                Session::flash('error', $error);
                foreach($request->all() as $k=>$value){
                    Session::flash($k, $request->get($k));
                }
                return redirect()->back()->withErrors($validator)->withInput();
             }else{
                //dd($request->all());
                $userDetails        = User::find(Auth::user()->id);
                $agency_name        = $request->get('agency_name');
                $acurrent_balance   = $request->get('acurrent_balance');
                $request_name       = $request->get('request_name');
                $request_amount     = Helper::getAmount($request->get('request_amount'));
                $payment_mode       = Helper::getTransactionType($request->get('payment_mode'));
                $email_address      = $request->get('email_address');
                $mobile             = $request->get('mobile');
                $remarks            = $request->get('remarks');

                //Encrypt Amount 
                $requestAmount      = $request->get('request_amount').'.00';
                $paymentMode        = $request->get('payment_mode');
                $enRequestAmount    = Crypt::encryptString($requestAmount);
                $enEmailAddress     = Crypt::encryptString($email_address);
                $enMobile           = Crypt::encryptString($mobile);
                $enUserID           = Crypt::encryptString($userDetails['id']);

                $txnid              = date('Ymd').$userDetails['id'].time();
                $amount             = $request_amount;
                $firstname          = $userDetails['first_name'];
                $email              = $email_address;
                $phone              = $mobile;
                $productinfo        = $remarks;
                $paymentMethod      = Helper::getTransactionType($payment_mode);

                 //Get All Commission Value
                $payment_mode_type_id = $request->get('payment_mode');

                //Get the Percentage or Flat Value on Payment Mode i.e Credit Card, Debit Card
                $commissionValue      = Helper::getAgentCommissionValue($payment_mode_type_id);

                //Pass Value Amount and Percentage Value of i.e Credit Card, Debit Card
                $afterComissionValue  = Helper::getAmuntAfterCommission($request->get('request_amount'), $commissionValue);
                //dd($request->get('payment_mode'));
             }
    }
     return view('user.ConfirmTatkalWalletRechargeEaseBuzz',array(
        'userDetails'   => $userDetails,
        'request_amount'=> $request_amount,
        'request_name'  => $request_name,
        'payment_mode'  => $payment_mode,
        'email_address' => $email_address,
        'mobile'        => $mobile,
        'productinfo'   => $productinfo,
        'enRequestAmount'=>$enRequestAmount,
        'enEmailAddress'=> $enEmailAddress,
        'enMobile'      => $enMobile,
        'enUserID'      => $enUserID,
        'paymentMode'   => $paymentMode,
        'afterComission'=> $afterComissionValue

    ));
    
   }





     /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validatorForm(array $data)
    {
        return Validator::make($data, [
            'request_amount'        => ['required'],
            'request_name'          => ['required'],
            'payment_mode'          => ['required'],
            'email_address'         => ['required'],
            'mobile'                => ['required'],
            'remarks'               => ['required'],
            
        ],[
            'request_amount.required'       => 'Min 100.00 ruppes request amount required..', // custom message
            'request_name.required'         => 'Enter Requested by name', // custom message
            'payment_mode.required'         => 'Choose payemnt mode', // custom message
            'email_address.required'        => 'Email address required', // custom message
            'mobile.required'               => 'Mobile number required', // custom message
            'remarks3.required'             => 'Please Enter remarks' // custom message
           ]
       );
       
    }




    /**
    * @param Confirmation Order
    * Post the Payment Page
    * Verify all the post valuse here
    */
    public function confirmationOrderPage(Request $request){
         $paymentFormData = [];
         try {
                $paymentMode          = $request->get('paymentMode');
                $enRequestAmount      = $request->get('enRequestAmount');
                $enMobile             = $request->get('enMobile');
                $enEmailAddress       = $request->get('enEmailAddress');
                $enUserID             = $request->get('enUserID');
                $requestedByName      = $request->get('request_name');
                //dd($request->all());
                $requestAmount        = Crypt::decryptString($enRequestAmount);
                $Mobile               = Crypt::decryptString($enMobile);
                $emailAddress         = Crypt::decryptString($enEmailAddress);
                $userID               = Crypt::decryptString($enUserID);
                $enAuthMobile         = Auth::user()->mobile; 
                $enAuthEmail          = Auth::user()->email;

                if($userID == Auth::user()->id){
                    $userDetails = User::find($enUserID);
                    $paymentFormData = array();
                    $paymentFormData['txnid']     = date('Ymd').$userID.time();
                    $paymentFormData['amount']    = $requestAmount;
                    $paymentFormData['firstname'] = $requestedByName;
                    $paymentFormData['email']     = $emailAddress;
                    $paymentFormData['phone']     = $Mobile;
                    $paymentFormData['productinfo'] = 'Wallet Recharge';
                    $paymentFormData['surl']        = url('user/rechargesuccess');
                    $paymentFormData['furl']        = url('user/rechargefailed');
                    $paymentFormData['udf1']        = '';
                    $paymentFormData['udf2']        = $enAuthMobile;
                    $paymentFormData['udf3']        = $enAuthEmail;
                    $paymentFormData['udf4']        = $paymentMode;
                    $paymentFormData['udf5']        = '';
                    $paymentFormData['address1']    = '';
                    $paymentFormData['address2']    = '';
                    $paymentFormData['city']        = '';
                    $paymentFormData['state']       = '';
                    $paymentFormData['country']     = '';
                    $paymentFormData['zipcode']     = '';
                    $paymentFormData['sub_merchant_id'] = '';
                    $paymentFormData['unique_id']   = '';
                    $paymentFormData['split_payments']   = '';
                    $paymentFormData['show_payment_mode']   = '';

                    //Create new order For this 
                    $lastId = $this->CreatePaymentWalletTransactions($paymentFormData);
                    $paymentFormData['udf5']        = $lastId;

                }else{
                    Session::flash('error', ["Invalid Session Request, Please Try After Sometime."]);
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            } catch (DecryptException $e) {
                Session::flash('error', ["Invalid Request, Please Try After Sometime."]);
                return redirect('user/pushbalancenow/'.$id.'/'.$tday)->with(['error'=>['Sorry ! Invalid Url.']]);
            }
        


            return view('user.Distributor.TatkalRecharge.paymentPreProcess',array(
                    'userDetails'   => $userDetails,
                    'paymentFormData' => $paymentFormData
            ));
    }


    /**
    * @param PaymentForm array
    * @return Integer Id of the Payment Wallet Transactions
    */
    private function CreatePaymentWalletTransactions($paymentFormData){
        if(!empty($paymentFormData)){
            $WalletRechargePaymentObj = new WalletRechargePayment();
            $WalletRechargePaymentObj['user_id']    = Auth::user()->id;   
            $WalletRechargePaymentObj['txnid']      = $paymentFormData['txnid'];   
            $WalletRechargePaymentObj['amount']     = $paymentFormData['amount'];   
            $WalletRechargePaymentObj['firstname']  = $paymentFormData['firstname'];   
            $WalletRechargePaymentObj['email']      = $paymentFormData['email'];   
            $WalletRechargePaymentObj['phone']      = $paymentFormData['phone'];   
            $WalletRechargePaymentObj['productinfo']= $paymentFormData['productinfo'];   
            $WalletRechargePaymentObj['payment_mode']= $paymentFormData['udf4'];   
            $WalletRechargePaymentObj['payment_date']= $this->getNow();   
            $WalletRechargePaymentObj['created_at'] = $this->getNow();
            if($WalletRechargePaymentObj->save()){
                return $WalletRechargePaymentObj->id;
            }   
        }
    }


    public function walletRechargeSuccess(Request $request){
        if ($request->isMethod('post')) {

            //dd($request->all());
            $payment_mode       = $request->get('udf4');
            $paymentId          = $request->get('udf5');
            $net_amount_credit  = $request->get('net_amount_debit');
            $payment_source     = $request->get('payment_source');
            $phone              = $request->get('phone');
            $payment_ref_key    = $request->get('easepayid');
            $cash_back_percentage= $request->get('cash_back_percentage');
            $status             = $request->get('status');
            $easepayid          = $request->get('easepayid');
            $addedon            = $request->get('addedon');
            $txnid              = $request->get('txnid');
            $card_type          = $request->get('card_type');
            $cardnum            = $request->get('cardnum');
            $issuing_bank       = $request->get('issuing_bank');
            $cardCategory       = $request->get('cardCategory');
            $amount             = $request->get('amount');
            $error_Message      = $request->get('error_Message');
            $deduction_percentage = $request->get('deduction_percentage');

            if($paymentId>0){
                $paymentObj = WalletRechargePayment::find($paymentId);
                $paymentObj->net_amount_credit  = $net_amount_credit;
                $paymentObj->payment_source     = $payment_source;
                $paymentObj->payment_date       = $addedon;
                $paymentObj->error_Message      = $error_Message;
                $paymentObj->phone              = $phone;
                $paymentObj->payment_ref_key    = $payment_ref_key;
                $paymentObj->cash_back_percentage= $cash_back_percentage;
                $paymentObj->status             = $status;
                $paymentObj->txnid              = $txnid;
                $paymentObj->card_type          = $card_type;
                $paymentObj->cardnum            = $cardnum;
                $paymentObj->issuing_bank       = $issuing_bank;
                $paymentObj->cardCategory       = $cardCategory;
                $paymentObj->amount             = $amount;
                $paymentObj->deduction_percentage = $deduction_percentage;
                $paymentObj->amount_credited    = $amount;
                $paymentObj->more_details       = json_encode($request->all());
                if($paymentObj->save()){
                    //Save Balance to DS Wallet
                    if($this->savePaymentWalletTransactionsForDS($paymentObj->id)){
                        $id        = Crypt::encryptString($paymentObj->id);
                        $this->loginNow($request,$id);
                        //$this->creditAdminPaymentWalletTransactionOnRecharge($paymentObj->id);
                        Session::flash('message', "Wallet Credited Successfully!!");
                        $message ="Wallet Credited Successfully!!";
                       
                        return redirect('user/tatrechargeesybuz/'.$id)->with(['message'=>$message]);
                    }else{
                        $this->loginNow($request,$id);
                        Session::flash('error', ["Somthing Went Wrong, Please contact administrator."]);
                        return redirect('user/tatrechargeesybuz/')->with(['error'=>['Sorry ! Invalid Url.']]);
                    }

                }

            }else{
                Session::flash('error', ["Payment is in progress, Please contact administrator."]);
            }
        }
    }


    private function savePaymentWalletTransactionsForDS($last_payment_id){
        $rechargePaymentId     = WalletRechargePayment::find($last_payment_id);
        //dd($rechargePaymentId);
        $userId                = $rechargePaymentId->user_id; 
        $net_amount_credit     = $rechargePaymentId->net_amount_credit;
        $deduction_percentage  = $rechargePaymentId->deduction_percentage;
        $payment_ref_key       = $rechargePaymentId->payment_ref_key;
        $status                = $rechargePaymentId->status;
        $productinfo           = $rechargePaymentId->productinfo;
        $payment_mode          = $rechargePaymentId->payment_mode;
        // dd($this->getNow());
        //Calculate the Amount After Deduction of Percentage
        $netCreditAmount        = $net_amount_credit;
        $commissionValue        = Helper::getDSAgentCommissions($userId,$payment_mode); 

        $transactionType        = Helper::getTransactionCommissionType($payment_mode);
        //dd($commissionValue); 
        $adminCommissionValue   = Helper::getDefaultTransactionCommission($payment_mode);

        if($transactionType=='Percentage'){
            //Get Admin Wallet Amount After Deduction of Percentage on Total Amount i.e 1
            $adminNetCreditAmount       = Helper::getCommissionDebitedAmount($netCreditAmount,$adminCommissionValue);
            
            //Get DS Wallet Amount
            $netCreditAmountForDS  = Helper::getCommissionDebitedAmount($netCreditAmount,$commissionValue);

             //Get Admin Wallet Amount
            $adminWalletAmount     = $adminNetCreditAmount -  $netCreditAmountForDS; 
            //dd($adminNetCreditAmount.'-'.$netCreditAmount.'-'.$adminWalletAmount);
            
           

            /*Save DS Payment Wallet Transaction For Credit Amount into Wallet */
            $payWTObj               = new PaymentWalletTransaction();
            $payment_wallet_id      = Helper::getPaymentWalletID($userId);


            $paymentWallet = PaymentWallet::find($payment_wallet_id);
            $paymentWallet->total_balance = $paymentWallet->total_balance + $netCreditAmountForDS;
            $newUpdateBalanceOfDS = $paymentWallet->total_balance; 

            $payWTObj['payment_wallet_id']          = $payment_wallet_id;
            $payWTObj['debit_amount']               = '0.00';
            $payWTObj['credit_amount']              = $netCreditAmountForDS;
            $payWTObj['transaction_number']         = $payment_ref_key;
            $payWTObj['transaction_date']           = $this->getNow();
            $payWTObj['user_id']                    = $userId;
            $payWTObj['status']                     = 'Success';
            $payWTObj['ds_wallet_balance_request_id'] = '0';
            $payWTObj['remarks']                    = $productinfo;
            $payWTObj['wallet_recharge_payment_id'] = $last_payment_id;
            $payWTObj['updated_wallet_balance']     = $newUpdateBalanceOfDS;
            //dd($payWTObj);
            if($payWTObj->save()){
                if($paymentWallet->save()){
                    //Save Credit Wallet Amount For Admin as well
                    $payment_wallet_id = Helper::getPaymentWalletID(1);
                    $adminPaymentWallet = PaymentWallet::find($payment_wallet_id);
                    $adminPaymentWallet->total_balance = $adminPaymentWallet->total_balance +  $adminWalletAmount;

                    $newBalance         = $adminPaymentWallet->total_balance +  $adminWalletAmount;
                    $adminPaymentWallet->total_balance = $newBalance;
                    if($adminPaymentWallet->save()){
                        //Save Payment Wallet Trasction Credit Amount
                         $payAWTObj               = new PaymentWalletTransaction();
                         //$payment_wallet_id       = Helper::getPaymentWalletID(1);
                         $payAWTObj['payment_wallet_id']          = $payment_wallet_id;
                         $payAWTObj['debit_amount']               = '0.00';
                         $payAWTObj['credit_amount']              = $adminWalletAmount;
                         $payAWTObj['transaction_number']         = time();
                         $payAWTObj['transaction_date']           = $this->getNow();
                         $payAWTObj['user_id']                    = $userId;
                         $payAWTObj['status']                     = 'Success';
                         $payAWTObj['ds_wallet_balance_request_id'] = '0';
                         $payAWTObj['remarks']                    = $productinfo;
                         $payAWTObj['wallet_recharge_payment_id'] = $last_payment_id;
                         $payAWTObj['updated_wallet_balance']     = $newBalance;
                         if($payAWTObj->save()){
                                return true;
                         }
                    }
                }
            }
        }
    }



    public function walletCredited(Request $request,$id){
        $last_payemnt_id = Crypt::decryptString($id);
        return view('user.WalletCreditedSuccess',array(
                        
        ));
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
            if(Auth::guard('user')->login($user)){
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
            if(Auth::guard('user')->login($user)){
                return true;
            }
        }
    }



    //If Payment is Failed
    public function walletRechargeFailed(Request $request){
        //dd($request->all());
        $status = $request->get('status');
        $this->loginNowForFailed($request);
        return redirect('user/tatrechargeesybuz/')->with(['error'=>['Sorry '.$status.' ! Payment not processed successfully.']]);
        
    }



















}
