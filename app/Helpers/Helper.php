<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
use Auth;
use App\MasterBank;
use App\DocumentType;
use App\Country;
use App\State;
use App\City;
use App\PaymentWallet;
use App\TransactionType;
use App\AgentCommission;
use App\VerifiedMobileMonthlyTransaction;
use App\PaymentWalletTransaction;

class Helper {



     /**
     * @param AgetnCommission Arr and TransactionType Id
     * 
     * @return value
     */
    public static function getAllCommission() {
        return self::getAmount('0.00');
    }




     /**
     * @param AgetnCommission Arr and TransactionType Id
     * 
     * @return value
     */
    public static function getCommissionValue($AgentCommission,$TransactionTypeId) {
        //echo $TransactionTypeId."<pre>"; 
        //print_r($AgentCommission);
        if(!empty($AgentCommission)){
            foreach($AgentCommission as $item){
                if($item['transaction_type_id']==$TransactionTypeId){
                    return $item['commission'];
                }
            }
        }
        return '0.00';
    }





     /**
     * @param AgetnCommission Arr and TransactionType Id
     * 
     * @return value
     */
    public static function getCommissionStatusValue($AgentCommission,$TransactionTypeId) {
        //echo $TransactionTypeId."<pre>"; 
        //print_r($AgentCommission);
        if(!empty($AgentCommission)){
            foreach($AgentCommission as $item){
                if($item['transaction_type_id']==$TransactionTypeId){
                    return $item['status'];
                }
            }
        }
        return '0.00';
    }



	
    /**
     * @return string
     */
    public static function getRouteName() {
        return \Request::route()->getName();         
    }


    /****************************API CALL For Frontend**********************/

    public static function getMenu(){
        $apiUrl  = env('API_URL');
        $menuUrl = $apiUrl.'gethomepage';
        $result  = self::getCurlData($menuUrl);
        $resultArr = json_decode($result,true);
        $menuStr = '';
        if(!empty($resultArr['result']['Menu'])){
            foreach($resultArr['result']['Menu'] as $item){
                if(isset($item['pageSlug'])){
                if($item['orderNo']<6){
                //dd($item);
                    $menuStr.="<li class='dropdown'> <a class='dropdown-toggle' href='".url($item['pageSlug'])."''>".$item['title']."</a></li>";
                    }
                }
            }
        }
        return $menuStr;

    }


    public static function getFooterMenu(){
        $apiUrl  = env('API_URL');
        $menuUrl = $apiUrl.'gethomepage';
        $result  = self::getCurlData($menuUrl);
        $resultArr = json_decode($result,true);
        $menuStr = '';
        if(!empty($resultArr['result']['Menu'])){
            foreach($resultArr['result']['Menu'] as $item){
                if(isset($item['pageSlug'])){
                //dd($item);
                $menuStr.="<li class='nav-item'> <a class='nav-link' href='".url($item['pageSlug'])."''>".$item['title']."</a></li>";
                }
            }
        }
        return $menuStr;

    }



    public static function getCurlData($url){
        $payload = "";
        // Prepare new cURL resource
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
         
        // Set HTTP Header for POST request 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload))
        );
         
        // Submit the POST request
        $result = curl_exec($ch);
         
        // Close cURL session handle
        curl_close($ch);
        return $result; 
    }
  


    //Get Title Of the Page
    public static function getTitleOfPage($pageDetails){
        if(!empty($pageDetails)){
            return $pageDetails['MainBody']['Title'];
        }
    }


    //Get Description Of the Page
    public static function getPageDescription($pageDetails){
        if(!empty($pageDetails)){
            return $pageDetails['MainBody']['Description'];
        }
    }


     //Get Description Of the Page
    public static function getPageBanner($pageDetails,$class=null,$width='100%',$height=null){
        if(!empty($pageDetails)){
            $imgStr = "<img src='".$pageDetails['Banner']['Image']."' class='".$class."' width='".$width."' height='".$height."'>";
            return $imgStr;
        }
    }  


    //Get Description Of the Page
    public static function getSettingValue($setting,$type){
        if(!empty($setting)){
            foreach($setting as $item){
                if($item['type']==$type){
                    return $item['value'];
                }
            }
        }
    }


    /****************************API CALL For Frontend Ends Here**********************/

    /**
     * @return string
     */
    public static function getAllBankName(){
        $masterBank = new MasterBank();
        $bankName   = $masterBank->getAllBank();
        $str = "";
        foreach ($bankName as $key => $value) {
            $str.= '<option value="'.$key.'">'.$value.'</option>';
        }
        return $str;
    }





    /**
     * @return string
     */
    public static function getPaymentMode($type=1){
        $paymentMode = array(
            '1'=>'Cash In Bank',
            '2'=>'CDM',
            '3'=>'NEFT/IMPS/RTGS/FT',
        );

        $str = "";
        foreach ($paymentMode as $key => $value) {
            if($type==$key){ 
              $selected='selected';
              $str.= '<option value="'.$key.'" selected="'.$selected.'">'.$value.'</option>';
            }else{
              $str.= '<option value="'.$key.'">'.$value.'</option>';
            }
            
        }
        return $str;
    }




     /**
     * @return string
     */
    public static function getAESBankName($type=1){
        $paymentMode = array(
            '1'=>'Axis Bank',
            '2'=>'HDFC Bank',
            '3'=>'ICICI Bank',
            '4'=>'DBS Bank',
        );

        $str = "";
        foreach ($paymentMode as $key => $value) {
           if($type==$key){ 
              $selected='selected';
              $str.= '<option value="'.$key.'" selected="'.$selected.'">'.$value.'</option>';
            }else{
              $str.= '<option value="'.$key.'">'.$value.'</option>';
            }
        }
        return $str;
    }





    /**
     * @param  string
     * @return string
     */
    public static function getDebitBalance() {

        if(Auth::guard('user')->check()){
            $user_id = Auth::user()->id;
            $PaymentWallet = PaymentWallet::where('user_id','=',$user_id)->first();
            if(!empty($PaymentWallet)){
                return self::getAmount($PaymentWallet['total_balance']);
            }else{

                return '0.00';    
            }
        }

        if(Auth::guard('ro')->check()){
            $user_id = Auth::user()->id;
            $paymentWalletId = self::getPaymentWalletID($user_id);
            $res = PaymentWalletTransaction::where('payment_wallet_id','=',$paymentWalletId)->where('status','=','Success')->get();
            $debitArr = array();
            $debitAmt = '0.00';
            if(!empty($res)){
                foreach ($res as $value) {
                    $debitArr[] = $value['debit_amount'];
                }
                $debitAmt = number_format(array_sum($debitArr),2);
            }
            return self::getAmount($debitAmt);   
        }
    
              
    }




     /**
     * @param  string
     * @return string
     */
    public static function getCreditBalance() {

        $user_id = Auth::user()->id;
        $paymentWalletId = self::getPaymentWalletID($user_id);
        $res = PaymentWalletTransaction::where('payment_wallet_id','=',$paymentWalletId)->where('status','=','Success')->get();
        $creditArr = array();
        $creditAmt = '0.00';
        if(!empty($res)){
            foreach ($res as $value) {
                $creditArr[] = $value['credit_amount'];
            }
            $creditAmt = number_format(array_sum($creditArr),2);
        }
        return self::getAmount($creditAmt);   
    

              
    }


    /**
     * @param  string
     * @return string
     */
    public static function getWalletBalance() {

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
                return number_format($PaymentWallet['total_balance'],2);
            }else{
                return '0.00';    
            }  
        }
    
              
    }



    /**
     * @param  string
     * @return string
     */
    public static function getAmountFormate($number) {
        if($number>0){
            //$number = str_replace(',', '',$number);
            return number_format($number,2);   
        }else{
            return '0.00';
        }
    }


     /**
     * @param  string
     * @return string
     */
    public static function getAmount($number) {
        if($number>0){
            $number = str_replace(',', '',$number);
            return 'Rs '.number_format($number,2);   
        }else{
            return 'Rs '.'0.00';
        }
    }



    /**
     * @param  string
     * @return string
     */
    public static function isActiveMenu($rountName) {
      
        if(self::getRouteName() == $rountName){
            return 'active';
        }         
    }




    /**
     * @param  string
     * @return string
     */
    public static function getLogo() {
        $str ='<table>
              <tr>
                <td>
                    <a href="'.route('home').'" title="'.env('APP_NAME').'">
                      <img src="'.config("global.THEME_PATH").'/images/logo.png" alt="Quickai" width="65" style="vertical-align:middle" />
                    </a>
                </td>
                <td>
                  <a href="'.route('home').'" title="'.env('APP_NAME').'" style="color:#000">
                  <span style="font-size: 22px;display: block; font-weight:500; font-family: "Lucida Console", Courier, monospace;">'.env('APP_NAME').'</span>
                  <small>Smart & Easy Pay</small>
                  </a>
                </td>
              </tr>
            </table>';
        return $str;         
    }



    /**
     * @param Id of the payment mode type
     * Get Payment Mode Type name
     */
    public static function getPaymentModeName($id){
      if($id==1){ return 'Cash In Bank';}
      if($id==2){ return 'CDM';}
      if($id==3){ return 'NEFT/IMPS/RTGS';}
    }




    /**
     * @param Id of the Company Bank Name
     * Get Payment Mode Type name
     */
    public static function getCompanyBankName($id){
         $paymentMode = array(
            '1'=>'Axis Bank',
            '2'=>'HDFC Bank',
            '3'=>'ICICI Bank',
            '4'=>'DBS Bank',
        );
      if($id!=''){
        return $paymentMode[$id];
      }
    }





    /**
     * @param Id of the Company Bank Name
     * Get Payment Mode Type name
     */
    public static function getDateFormate($date){
         return date('d M, Y',strtotime($date));
    }




    /**
     * @param Id Of Document Type
     */
    public static function getDocumentProofType($id){
        $documentType = DocumentType::find($id);
        return $documentType['type_name'];
    }






    /**
     * @return string
     */
    public static function getServiceTypeList($type=1){
        $paymentMode = array(
            '1'=>'Servcice Type-1',
            '2'=>'Servcice Type-2',
            '3'=>'Servcice Type-3',
        );

        if($type>0){
            return $paymentMode[$type];
        }
    }


    /**
     * @return string
     */
    public static function getZoneTypeList($type=1){
        $paymentMode = array(
            '1'=>'Zone Type-1',
            '2'=>'Zone Type-2',
            '3'=>'Zone Type-3',
        );

        if($type>0){
            return $paymentMode[$type];
        }
    }

    

    /**
     * @return string
     */
    public static function getCompanyTypeList($type=1){

        $paymentMode = array(
            '1'=>'Comapny Type-1',
            '2'=>'Comapny Type-2',
            '3'=>'Comapny Type-3',
        );
        if($type>0){
            return $paymentMode[$type];
        }
    }



    /**
     * @return string
     */
    public static function getCountryName($id){
        if($id==1){
            return 'India';
        }
        if($id>1){
            $country = Country::find($id);
            return $country;
        }
    }



    /**
     * @return string
     */
    public static function getStateName($id){
      
        if($id>0){
            $obj = State::find($id);
            return $obj['state_name'];
        }
    }



    /**
     * @return string
     */
    public static function getCityName($id){
      
        if($id>0){
            $obj = City::find($id);
            return $obj['city_name'];
        }
    }





    /**
     * @return string
     */
    public static function getStateOptionListName($id){
        $document_types = State::where('status','=',1)->get();
        $str = "";
        foreach ($document_types as $value) {
           if($id==$value['id']){ 
              $selected='selected';
              $str.= '<option value="'.$value['id'].'" selected="'.$selected.'">'.$value['state_name'].'</option>';
            }else{
              $str.= '<option value="'.$value['id'].'">'.$value['state_name'].'</option>';
            }
        }
        return $str;
    }




    /**
     * @return string
     */
    public static function getCityOptionListName($state_id=null,$id=null){
        $document_types = City::where('status','=',1)->get();
        // /dd($document_types);
        $str = "";
        foreach ($document_types as $value) {
           if($id==$value['id']){ 
              $selected='selected';
              $str.= '<option value="'.$value['id'].'" selected="'.$selected.'">'.$value['city_name'].'</option>';
            }else{
              $str.= '<option value="'.$value['id'].'">'.$value['city_name'].'</option>';
            }
        }
        return $str;
    }





    /**
     * Get the Wallet Payment Id of the user
     * Pramas as user Id of the Distributor OR RO
     * @param integer
     * @return integer
     */
    public static function getPaymentWalletDetails($user_id){
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
    public static function getPaymentWalletID($user_id){
        $paymentWalletDetails = array();

        if($user_id>0){
            $paymentWalletDetails = PaymentWallet::where('status','=',1)->where('user_id','=',$user_id)->first();
            return $paymentWalletDetails['id'];
        }else{
            return $paymentWalletDetails;
        }
    }



    /**
     * Get the Tranaction Type
     * @param integer
     * @return integer
     */
    public static function getTransactionType($id){
        $paymentMethod = '';
        if($id>0){
            $TransactionType = TransactionType::where('status','=',1)->where('id','=',$id)->first();
            return $TransactionType['transaction_type'];
        }
    }




    /**
     * Get the Commission Value
     * @param integer
     * @return integer
     */
    public static function getAgentCommissionValue($id){
        $paymentMethod = '';
        if($id>0){
            $TransactionType = AgentCommission::where('user_id','=',Auth::user()->id)
            ->where('transaction_type_id','=',$id)
            ->where('status','=',1)
            ->first();
            if(!empty($TransactionType)){
                return $TransactionType['commission'];
            }
        }
    }




    /**
     * Get the Tranaction Type
     * @param integer
     * @return integer
     */
    public static function getTransactionTypeName($id){
        $paymentMethod = '';
        if($id>0){
            $TransactionType = TransactionType::where('status','=',1)->where('id','=',$id)->first();
            return $TransactionType['transaction_type'];
        }
    }



    /**
     * Get the Tranaction Type
     * @param integer
     * @return integer
     */
    public static function getTransactionCommissionType($id){
        $paymentMethod = '';
        if($id>0){
            $TransactionType = TransactionType::where('status','=',1)->where('id','=',$id)->first();
            return $TransactionType['commission_type'];
        }
    }





    /**
     * Get the Tranaction Type
     * @param integer
     * @return integer
     */
    public static function getDefaultTransactionCommission($id){
        $paymentMethod = '';
        if($id>0){
            $TransactionType = TransactionType::where('status','=',1)->where('id','=',$id)->first();
            return $TransactionType['value'];
        }
    }






    /**
     * Get the Wallet Payment Id of the user
     * Pramas as user Id of the Distributor OR RO
     * @param integer
     * @return integer
     */
    public static function isValidPaymentWallet($user_id){
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
    public static function getDSAgentCommissions($user_id,$TransactionType){
        $paymentWalletDetails = array();
        if($user_id>0 && $TransactionType>0){
               $AgentCommissionDetails = AgentCommission::where('user_id','=',$user_id)
                ->where('role_id','=',2)
                ->where('transaction_type_id','=',$TransactionType)
                ->first();
                //dd($AgentCommissionDetails);
                if(!empty($AgentCommissionDetails)){
                    return $AgentCommissionDetails['commission'];
                }else{
                    return '0.00';
                }
        }else{
            return '0.00';
        }
    }



     /**
     * Get the Wallet Payment Id of the user
     * Pramas as user Id of the Distributor OR RO
     * @param integer
     * @return integer
     */
    public static function getROAgentCommissions($user_id,$TransactionType){
        $paymentWalletDetails = array();
        if($user_id>0 && $TransactionType>0){
               $AgentCommissionDetails = AgentCommission::where('user_id','=',$user_id)
                ->where('role_id','=',3)
                ->where('transaction_type_id','=',$TransactionType)
                ->first();
                //dd($AgentCommissionDetails);
                if(!empty($AgentCommissionDetails)){
                    return $AgentCommissionDetails['commission'];
                }else{
                    return '0.00';
                }
        }else{
            return '0.00';
        }
    }







     /**
     * Get Agent Name
     * Pramas as user array
     * @param array
     * @return string
     */
    public static function getUserProfileName($userArr){
        $userName = "";
        if(!empty($userArr)){
            return $userArr['name'].'-'.$userArr['AgentCode'];
        }
    }



   /**
     * Get Agent Name
     * Pramas as user array
     * @param array
     * @return string
     */
    public static function getCommissionDebitedAmount($netCreditAmount,$commissionValue){
        $netAmount = "";
        $netCreditAmount =$netCreditAmount - (($netCreditAmount * $commissionValue) / 100);
        return  $netCreditAmount;
    }





   /**
     * Get Tranaction List On Per Mobiile 
     * Pramas verified mobile id 
     * @param verified_mobile_id
     * @return double integer
     */
    public static function getMonthlyBalanceAmount($verify_mobile_number_id){
        $verify_mobile_number_id = $verify_mobile_number_id;
        $user_id = Auth::user()->id;
        $month   = strtoupper(date('M')); 
        $year    = date('Y'); 
        $monthlyTranaction = VerifiedMobileMonthlyTransaction::where('user_id','=',$user_id)
        ->where('verify_mobile_number_id','=',$verify_mobile_number_id)
        ->where('month','=',$month)
        ->where('year','=',$year)
        ->where('transaction_status','=',1)
        ->get();
        $balanceAmount = 0;
        if($monthlyTranaction->count()){
            $usedArr = []; 
            foreach($monthlyTranaction as $item){
                $usedArr[] = $item['used'];
            }
            $perMobileMonthlyLimit = Auth::user()->per_mobile_monthly_limit;
            $totalUsed = array_sum($usedArr);
            $balanceAmount = $perMobileMonthlyLimit - $totalUsed; 
        }
        return  $balanceAmount;
    }






    /**
     * Get Balance Per Mobiile for User 
     * @return integer
     */
    public static function getUserMonthlyBalance(){
        return   Auth::user()->per_mobile_monthly_limit;;
    }





    
     /**
     * Get Balance Per Mobiile for User 
     * @return integer
     */
    public static function getCashback(){
        return   10.00;
    }



    /**
     * Get Balance Per Mobiile for User 
     * @return integer
     */
    public static function getAmuntAfterCommission($amount, $value){
        $total = $amount - (($amount * $value)/(100));
        return   $total;
    }



    

     /**
     * @return string
     */
    public static function getDocumentTypeOptionsList($type=null){
        $document_types = DocumentType::where('status','=',1)->get();

        $str = "";
        foreach ($document_types as $value) {
           if($type==$value['id']){ 
              $selected='selected';
              $str.= '<option value="'.$value['id'].'" selected="'.$selected.'">'.$value['type_name'].'</option>';
            }else{
              $str.= '<option value="'.$value['id'].'">'.$value['type_name'].'</option>';
            }
        }
        return $str;
    }


       /**
     * @return string
     */
    public static function getCompanyOptionsTypeList($type=1){

        $paymentMode = array(
            '1'=>'Comapny Type-1',
            '2'=>'Comapny Type-2',
            '3'=>'Comapny Type-3',
        );

         $str = "";
        foreach ($paymentMode as $key=>$value) {
           if($type==$key){ 
              $selected='selected';
              $str.= '<option value="'.$key.'" selected="'.$selected.'">'.$value.'</option>';
            }else{
              $str.= '<option value="'.$key.'">'.$value.'</option>';
            }
        }
        return $str;

    }



    /**
     * @return string
     */
    public static function getIdentificationTypeOptionList($type=1){
        $paymentMode = array(
            '1'=>'Identification Type-1',
            '2'=>'Identification Type-2',
            '3'=>'Identification Type-3',
        );

           $str = "";
        foreach ($paymentMode as $key=>$value) {
           if($type==$key){ 
              $selected='selected';
              $str.= '<option value="'.$key.'" selected="'.$selected.'">'.$value.'</option>';
            }else{
              $str.= '<option value="'.$key.'">'.$value.'</option>';
            }
        }
        return $str;
        
    }





    
    /**
     * @return string
     */
    public static function getServiceTypeOptionList($type=1){
        $paymentMode = array(
            '1'=>'Servcice Type-1',
            '2'=>'Servcice Type-2',
            '3'=>'Servcice Type-3',
        );

           $str = "";
        foreach ($paymentMode as $key=>$value) {
           if($type==$key){ 
              $selected='selected';
              $str.= '<option value="'.$key.'" selected="'.$selected.'">'.$value.'</option>';
            }else{
              $str.= '<option value="'.$key.'">'.$value.'</option>';
            }
        }
        return $str;
        
    }





    /**
     * @return string
     */
    public static function getZoneTypeOptionList($type=1){
        $paymentMode = array(
            '1'=>'Zone Type-1',
            '2'=>'Zone Type-2',
            '3'=>'Zone Type-3',
        );

           $str = "";
        foreach ($paymentMode as $key=>$value) {
           if($type==$key){ 
              $selected='selected';
              $str.= '<option value="'.$key.'" selected="'.$selected.'">'.$value.'</option>';
            }else{
              $str.= '<option value="'.$key.'">'.$value.'</option>';
            }
        }
        return $str;
        
    }

    

    
    

    



    }