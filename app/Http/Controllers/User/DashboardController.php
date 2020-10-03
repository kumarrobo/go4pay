<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Session;
use Log;
use Hash;
use App\User;
use App\State;
use App\City;
use App\UserDetail;
use App\DocumentType;
use App\PaymentWallet;
use App\TransactionType;
use App\AgentCommission;
use App\PaymentWalletTransaction;

class DashboardController extends Controller
{
    //


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd("ok");
        return view('user.dashboard');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function commingSoon()
    {
        //dd("ok");
        return view('user.commingSoon');
    }



    public function editUserCommission(Request $request,$id){
        $userId = Crypt::decryptString($id);
        $user = User::find($userId);
        if ($request->isMethod('post')) {
            //dd($request->all());
            $data = $request->all();
            $count = count($data['transaction_type_code']);
       
            $AgentCommissionArr = array();
            AgentCommission::where('user_id','=',$userId)->delete();
            for($i=0;$i<$count;$i++){
              $AgentCommissionArr =   new  AgentCommission();
              $AgentCommissionArr["transaction_type_id"] =    $data['ids'][$i];
              $AgentCommissionArr["user_id"]     =   $user['id'];
              $AgentCommissionArr["role_id" ]    =   $user['role_id'];
              $AgentCommissionArr["commission"]  =   $data['value'][$i];
              $AgentCommissionArr["status"]      =   0;
              $AgentCommissionArr["created_at"]  =   date("Y-m-d H:i:s");
              $AgentCommissionArr->save();
            
            }
            Session::flash('message', 'RO Commission Types List Updated Successfully!');
            return redirect()->route('allretailerlist');
        }
        $transactionTypesList = TransactionType::where('status','=',1)->get();
        $agentCommission = AgentCommission::with('User','TransactionType')
                ->where('user_id','=',$userId)
                ->get();

        //dd($agentCommission);


         $agetCommissionArr = array();
         foreach($transactionTypesList as $item){
            $agetCommissionArr[$item['transaction_type_id']] = AgentCommission::with('TransactionType')
            ->where('user_id','=',$userId)
            ->where('transaction_type_id','=',$item['id'])
            ->first();
        }
        //dd($agetCommissionArr);
        return view('user.editUserCommission',compact('transactionTypesList','agentCommission','user'));
    }





     /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'    => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:25'],
            'email'         => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'mobile'        => ['required', 'string',  'max:10', 'unique:users'],
            'password'      => ['required', 'string', 'min:6'],
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
    protected function validatorAddress(array $data)
    {
        return Validator::make($data, [
            'address_line_1' => ['required', 'string', 'max:255'],
            'state_id' => ['required'],
            'city_id' => ['required'],
        ]);
    }


    /**
     * Add New Retailer By the Distributor
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function retailerPersonalDetails(Request $request, $id)
    {
        $userArr = User::where('parent_user_id','=',$this->getAuthUserID())->where('id','=',$id)->first();
        if(empty($userArr)){
            return redirect('/user/allretailerlist/')
                ->with('error', ['Invalid URL OR Parameters !!']);
        }
        return view('user.Distributor.RO.retailerPersonalDetails',['id'=>$id,'userArr'=>$userArr]);
    }
    



    /**
     * Add New Retailer By the Distributor
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function UpdateROProfile(Request $request)
    {
        $id = $request->get('id');
        $userArr = User::where('parent_user_id','=',$this->getAuthUserID())->where('id','=',$id)->first();
        if(empty($userArr)){
            return redirect('/user/allretailerlist/')
                ->with('error', ['Invalid URL OR Parameters !!']);
        }else{
            $dob        = $request->get('date_of_birth');
            $first_name = $request->get('first_name');
            $last_name  = $request->get('last_name');

            $userObj    = User::find($id);
            $userObj->first_name = $first_name;
            $userObj->last_name  = $last_name;
            if($userObj->save()){
                $userDetailsObj = UserDetail::where('user_id','=',$id)->first();
                $userDetailsObj->date_of_birth = $dob;
                if($userDetailsObj->save()){
                    return redirect('/user/retaileraddress/'.$id)
                            ->with('message', ['Retailer Personal Details Updated!!']);
                }
            }

        }
        return redirect('/user/allretailerlist/')
                ->with('error', ['Invalid URL OR Parameters !!']);
    }
    



    /**
     * Add New Retailer By the Distributor
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewrodetails(Request $request, $id)
    {
      
        return view('user.Distributor.RO.viewrodetails',['id'=>$id]);
    }




     /**
     * Upload Document For Retailer By the Distributor
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function retailerDocumentProof(Request $request, $id)
    {

        $addressProofType   = DocumentType::getAddressTypeDocument();
        $idProofType        = DocumentType::getIDTypeDocument();
        $companyProofType   = DocumentType::getCompanyTypeDocument();

        if ($request->isMethod('post')) {
             //dd('dasd');
            $user = $this->saveCompanyProof($request->all())->toArray();
            //dd($request->all());
            //Save Resume
            Log::channel('userDetails')
                ->info('Request', array('Document'=>"Document Uploaded",'Date'=>$user['created_at'])); 
                return redirect('/user/roprofile/'.$id)
                ->with('message', 'Retailer Details Saved !!');
            
           
        }
        

        return view('user.Distributor.RO.retailerDocumentProof',
            [
                'id'                =>  $id,
                'addressProofType'  =>  $addressProofType,
                'companyProofType'  =>  $companyProofType,
                'idProofType'       =>  $idProofType,
            ]
        );
    }


    /**
     * Save Company Proof and Upload Document By the Distributor.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function saveCompanyProof(array $data)
    {       

        $user_id     = $data['id']; 
        $userDetails = UserDetail::where('user_id','=',$user_id)->first();

        $userDetails['id']                      = $userDetails['id'];
        $userDetails['id_proof_type_id']        = $data['id_proof_file_type'];
        $userDetails['address_proof_type_id']   = $data['address_proof'];
        $userDetails['business_proof_type_id']  = $data['company_proof'];
        // dd($data);
        if(!empty($data['id_proof_file'])){
            $file                               =   $data['id_proof_file'];
            $fileName                           =   $file->getClientOriginalName();
            $fileName                           =   str_replace(" ","_",strtolower($fileName));
            $userDetails['id_proof_document']   =   $fileName;
            $destinationPath                    =   'public/storage/uploads/RO';
            $file->move($destinationPath,$fileName);
        }


        if(!empty($data['address_proof_file'])){
            $file                               =   $data['address_proof_file'];
            $fileName                           =   $file->getClientOriginalName();
            $fileName                           =   str_replace(" ","_",strtolower($fileName));
            $userDetails['address_proof']       =   $fileName;
            $destinationPath                    =   'public/storage/uploads/RO';
            $file->move($destinationPath,$fileName);
        }


        if(!empty($data['company_proof_file'])){
            $file                               =   $data['company_proof_file'];
            $fileName                           =   $file->getClientOriginalName();
            $fileName                           =   str_replace(" ","_",strtolower($fileName));
            $userDetails['business_proof']      =   $fileName;
            $destinationPath                    =   'public/storage/uploads/RO';
            $file->move($destinationPath,$fileName);
        }

        if($userDetails->save()){
            return $userDetails;
        }

    }




    /**
     * Add New Retailer By the Distributor
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addretailer(Request $request)
    {
        //$this->getAuthUserID();  
      
        return view('user.addRetailer');
    }



    /**
     * View Retailer Profile 
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function retailerProfile(Request $request, $id)
    {   
        $userArr = User::where('parent_user_id','=',$this->getAuthUserID())->where('id','=',$id)->first();
        if(empty($userArr)){
            return redirect('/user/allretailerlist/')
                ->with('error', ['Invalid URL OR Parameters !!']);
        }
        $RODetails = User::with('UserDetail')->where('parent_user_id','=',$this->getAuthUserID())->find($id);
        // dd($RODetails);
        return view('user.ROProfile',array(
            'RODetails'=>$RODetails
        ));
    }


    /**
     * View Retailer Profile 
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewUserTransactionList(Request $request, $id)
    {   
        try {
                $userId                 = Crypt::decryptString($id); 
                $paymentWalletDetails   = $this->getPaymentWalletDetails($userId);
                $payment_wallet_id      = $paymentWalletDetails['id'];
                $RODetails = PaymentWalletTransaction::with('PaymentWallet')
                ->where('user_id','=',$userId)
                ->where('payment_wallet_id','=',$payment_wallet_id)
                ->paginate($this->getPageItem());
                //dd($RODetails);
        }catch (DecryptException $e) {
            Session::flash('error', ["Somthing went wrong"]);
            return redirect('user/allretailerlist/')->with(['error'=>['Sorry ! Invalid Url.']]);
        }

        
        return view('user.ROTransactionList',array(
                        'RODetails'=>$RODetails
                    ));
    }

    
    /**
     * View Retailer Profile 
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ROCompanyProfile(Request $request, $id)
    {   
        
        $RODetails = User::with('UserDetail')->where('parent_user_id','=',$this->getAuthUserID())->find($id);
        return view('user.ROCompanyProfile',array(
            'RODetails'=>$RODetails
        ));
    }



    /**
     * Add New Retailer By the Distributor
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function allROList(Request $request)
    {
        $userId = $this->getAuthUserID();
        $ROList = User::with('PaymentWallet','UserDetail')->where('role_id','=',3)->where('parent_user_id','=',$userId)->paginate(15);
        // dd($ROList);
        return view('user.allRetailerList',array('ROList'=>$ROList));
    }




    /**
     * Add New Retailer By the Distributor
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function retailerAddress(Request $request,$id)
    {
        $userArr = User::where('parent_user_id','=',$this->getAuthUserID())->where('id','=',$id)->first();
        if(empty($userArr)){
            return redirect('/user/addretailer/')
                ->with('error', ['Invalid URL !!']);
        }
        $stateList = State::where('status','=',1)->get();
        $cityList = City::where('status','=',1)->get();
        //dd($cityList);
        
        if ($request->isMethod('post')) {
            $validator = $this->validatorAddress($request->all());
            if($validator->fails()) {
                    $error=$validator->errors()->all();
                    Session::flash('error', $error);
                    foreach($request->all() as $k=>$value){
                        Session::flash($k, $request->get($k));
                    }
                    return redirect()->back()
                     ->withErrors($validator)
                     ->withInput();
            }else{
                $user = $this->saveAddress($request->all())->toArray();
                Log::channel('userDetails')
                ->info('Request', array('Name'=>$user['user_id'],'Date'=>$user['created_at'])); 
                return redirect('/user/retailercompany/'.$id)
                ->with('message', 'Retailer Address Details Saved !!');
            }

        }
        $userArrDetails = User::with('UserDetail')->where('id','=',$id)->first();
        $userDetails    = $userArrDetails['UserDetail'];
        return view('user.Distributor.RO.retailerAddress',
            [
                'id'            =>  $id,
                'cityList'      =>  $cityList,
                'stateList'     =>  $stateList,
                'userDetails'   =>  $userDetails
            ]
        );
    }

     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function saveAddress(array $data)
    {       

        $user_id = $data['id']; 
        $userDetails = UserDetail::where('user_id','=',$user_id)->first();
        if($userDetails == null){
            return UserDetail::create([
                    'address_line_1'    => $data['address_line_1'],
                    'address_line_2'    => $data['address_line_2'],
                    'country_id'        => $data['country_id'],
                    'state_id'          => $data['state_id'],
                    'city_id'           => $data['city_id'],
                    'district'          => $data['district'],
                    'pincode'           => $data['pincode'],
                    'user_id'           => $data['id'],
            ]);

        }else{
            $userDetails['address_line_1']  = $data['address_line_1'];
            $userDetails['address_line_2']  = $data['address_line_2'];
            $userDetails['country_id']      = $data['country_id'];
            $userDetails['state_id']        = $data['state_id'];
            $userDetails['city_id']         = $data['city_id'];
            $userDetails['district']        = $data['district'];
            $userDetails['pincode']         = $data['pincode'];
            if($userDetails->save()){
                return $userDetails;
            }
        }

    }


     /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validatorCompany(array $data)
    {
        return Validator::make($data, [
            'company_name'          => ['required', 'string', 'max:255'],
            'company_type'          => ['required'],
            'service_by'            => ['required'],
            'zone'                  => ['required'],
            'identification_type'   => ['required'],
            'is_name_on_pan_card'   => ['required'],
            'pan_card_number'       => ['required'],
        ]);
    }

     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\UserDetail
     */
    protected function saveCompany(array $data)
    {   

        $user_id = $data['id']; 
        $userDetails = UserDetail::where('user_id','=',$user_id)->first();
        if($userDetails == null){
            return UserDetail::create([
                    'company_name'        => $data['company_name'],
                    'company_type'        => $data['company_type'],
                    'service_by'          => $data['service_by'],
                    'zone'                => $data['zone'],
                    'identification_type' => $data['identification_type'],
                    'is_name_on_pan_card' => $data['is_name_on_pan_card'],
                    'pan_card_number'     => $data['pan_card_number'],
                    'user_id'             => $data['id'],
            ]);

        }else{
            $userDetails['company_name']        = $data['company_name'];
            $userDetails['company_type']        = $data['company_type'];
            $userDetails['service_by']          = $data['service_by'];
            $userDetails['zone']                = $data['zone'];
            $userDetails['identification_type'] = $data['identification_type'];
            $userDetails['is_name_on_pan_card'] = $data['is_name_on_pan_card'];
            $userDetails['pan_card_number']     = $data['pan_card_number'];
            if($userDetails->save()){
                //dd($userDetails);
                return $userDetails;
            }
        }

    }


    /**
     * Add New Retailer By the Distributor
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function retailerCompanyProof(Request $request,$id)
    {
        $userArr = User::where('parent_user_id','=',$this->getAuthUserID())->where('id','=',$id)->first();
        if(empty($userArr)){
            return redirect('/user/addretailer/')
                ->with('error', ['Invalid URL !!']);
        }
        if ($request->isMethod('post')) {
            $validator = $this->validatorCompany($request->all());
            if($validator->fails()) {
                    $error=$validator->errors()->all();
                    Session::flash('error', $error);
                    foreach($request->all() as $k=>$value){
                        Session::flash($k, $request->get($k));
                    }
                    return redirect()->back()
                     ->withErrors($validator)
                     ->withInput();
            }else{

                $user = $this->saveCompany($request->all())->toArray();
                Log::channel('userDetails')
                ->info('Request', array('Name'=>$user['company_name'],'Date'=>$user['created_at'])); 
                return redirect('/user/documentproof/'.$id)
                ->with('message', 'Retailer Created Successfully!!');
            }

        }
        $userDetails = UserDetail::where('user_id','=',$id)->first();
        return view('user.Distributor.RO.retailerCompanyProof',[
            'id'=>$id,
            'userDetails'=>$userDetails
        ]);
    }



     /**
     * Add New Retailer By the Distributor
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function postaddretailer(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = $this->validator($request->all());
            if($validator->fails()) {
                    $error=$validator->errors()->all();
                    Session::flash('error', $error);
                    foreach($request->all() as $k=>$value){
                        Session::flash($k, $request->get($k));
                    }
                    return redirect()->back()
                     ->withErrors($validator)
                     ->withInput();
            }else{
                $user           = $this->create($request->all())->toArray();
                $userObj        =   User::find($user['id']);
                $userObj->parent_user_id = $this->getAuthUserID();
                if($userObj->save()){
                    $userDetail     =   UserDetail::create(['user_id'    => $user['id']]);
                    $paymentWallet  =   PaymentWallet::create([
                                    'user_id'       =>  $user['id'],
                                    'total_balance' =>  0.00,
                                    'status'        =>  1,
                                    'created_at'    =>  $this->getNow()
                    ]);   
                    Log::channel('newuser')
                    ->info('Request', array('Name'=>$user['name'],'Date'=>$user['created_at'])); 
                    return redirect('/user/retaileraddress/'.$user['id'])
                    ->with('message', 'We sent a comfirmation email to your email, please click on link inside before login');
                }
                return redirect('/user/retaileraddress/'.$user['id'])
                    ->with('message', 'We sent a comfirmation email to your email, please click on link inside before login'); 
                
            }

        }
        return view('user.addRetailer');
    }




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        $data['parent_user_id'] = $this->getAuthUserID();
        return User::create([
                'first_name'    => $data['first_name'],
                'last_name'     => $data['last_name'],
                'name'          => $data['first_name'].' '.$data['last_name'],
                'email'         => $data['email'],
                'mobile'        => $data['mobile'],
                'password'      => Hash::make($data['password']),
                'password_text' => $data['password'],
                'role_id'       => 3,
                'parent_user_id'=> $data['parent_user_id'],
        ]);


    }



   

}
