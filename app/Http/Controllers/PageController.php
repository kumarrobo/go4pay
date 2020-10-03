<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\PaymentWalletTransaction;
use App\LoginOtp;
use Auth;

class PageController extends Controller
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

    public function PageDetails($page_slug){
        $apiUrl  = env('API_URL');
        $menuUrl = $apiUrl.'gethomepage'; 
        $result  = $this->getCurlData($menuUrl);
        $resultArr = json_decode($result,true);

        $pageDetailsApi = env('PAGE_DETAILS_API_URL');
        $pageDetails    = $pageDetailsApi.$page_slug;
        $pageResult     = $this->getCurlData($pageDetails);
        $pageDetailsArr = json_decode($pageResult,true);
        // dd($pageDetailsArr);
        if($page_slug == 'contactus'){
            $pageViewFile = 'contactUsPage';
        }else{
            $pageViewFile = 'PageDetails';
        }
        return view('Page.'.$pageViewFile,array(
            'resultArr'     => $resultArr,
            'pageDetails'   => $pageDetailsArr['result']['PageDetails'],
            'Settings'      => $pageDetailsArr['result']['Settings']
            
        ));

    }



    private function getCurlData($url){
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
}
