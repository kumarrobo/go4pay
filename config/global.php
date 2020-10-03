<?php
$public_path        = public_path();           // /var/www/html/marketadmin/public
$files_path         = $public_path.'/files';
$base_path          = base_path();               // /var/www/html/marketadmin

$public_url         = env('APP_URL');    // http://marketadmin.localhost/

define('THEME_NAME','siddiventures');
define('THEME_PATH','themes/'.THEME_NAME);
define('WIRE_API_URL','https://wire.easebuzz.in');

return [

    /*
    * Theme files Path
    */
    'THEME_PATH'     	=>  $public_url.'/public/'.THEME_PATH,
    'FILE_PATH'      	=>  $public_url.'/public/storage/uploads/RO/',
    
    'SMS_USERNAME'	 	=>	 'Siddhient',
    'SMS_KEY'	 	 	=>	 '2f67b0dccfXX',
    
    'MERCHANT_KEY'   	=>	 "4IQ56U0LII",
    'SALT' 			 	=>   "ONKV4YHGE2",

    'MONEY_MERCHANT_KEY'=>  "BA082604EB",
    'MONEY_SALT' 		=>  "1A50A23589",
    
    'ADD_CONTACT_API'	      =>  WIRE_API_URL."/api/v1/contacts/",
    'ADD_BENEFICIARIES_API'   =>  WIRE_API_URL."/api/v1/beneficiaries/",
    'GET_BENEFICIARIES_API'   =>  WIRE_API_URL."/api/v1/beneficiaries/",
    'VERIFY_ACCOUNT_API'      =>  WIRE_API_URL."/api/v1/beneficiaries/bank_account/verify/",
    'TRANSFERS_INITIATE_API'  =>  WIRE_API_URL."/api/v1/transfers/initiate/"

    
];

?>
