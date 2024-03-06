<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class ApiService
 {
    protected $CI;
    protected $secret_key;
    protected $endpoint_base_url;

    public function __construct()
 {
        $this->CI = &get_instance();
        $this->CI->load->database();

        // Key for encryption ( must be the same on both ends )
        // $this->secret_key = $_ENV[ 'SECRET_KEY' ];
        $this->endpoint_base_url = $_ENV[ 'ENDPOINT_BASE_URL' ];
    }

    // Generation of Token were developed here as well to lessen the steps
    // This will ommit the step of getting token from the External API

    private function generate_token()
 {
        $curl = curl_init();
       
        curl_setopt_array( $curl, array(
            CURLOPT_URL =>  $this->endpoint_base_url . '/pgw/api/v1/auth/obtain-token/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
		  "username": "'.  $_ENV[ 'API_USER_NAME' ].'",
		  "secret": "'.  $_ENV[ 'API_SECRET' ].'",
		  "app_uuid": "'.  $_ENV[ 'API_UUID' ].'"
		}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'

            ),
        ) );
      
// API_USER_NAME ="netglobalpay"
// API_SECRET ="wlq5fk#sv$3g75lejj4=&zyv8d&9b_x47!zq=ib35i&(elpqsb"
// API_UUID ="0aa91257-2baa-437e-886c-d3cfce9552ce"


        $response = curl_exec( $curl );
        $http_status_code = curl_getinfo( $curl, CURLINFO_HTTP_CODE );
        curl_close( $curl );

        $jdata = 	json_decode( $response, true );
        // // $jdata['httpstatus']=$http_status_code;
        // return $jdata[ 'data' ][ 'token' ];

        $resp[ 'response' ] =  $jdata;
        $resp[ 'status_code' ] = $http_status_code;

return $resp;

    }

    public function call_external_api( $v )
 {
        $generated_token = $this->generate_token();

        $endpoint = $this->endpoint_base_url . '/pgw/api/v1/transactions/new/';
        $curl = curl_init();

        curl_setopt_array( $curl, array(
            CURLOPT_URL =>  $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode( $v ),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '. $generated_token
            ),
        ) );

        $response = curl_exec( $curl );

        curl_close( $curl );

        // expecting to be a json encoded response
        $resp[ 'response' ] =  json_decode( $response, true );
        // $resp[ 'status_code' ] = $generated_token;

        return $resp;
    
}

    public function generate_qr_api( $data )
 {
     
    // pgw/api/v1/transactions/qr-codes/generate/'Authorization: Bearer '. $generated_token['response'][ 'data' ][ 'token' ],
        $endpoint = $this->endpoint_base_url . '/pgw/api/v1/transactions/qr-codes/generate/';
        $generated_token = $this->generate_token();
        // $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbl90eXBlIjoiYWNjZXNzIiwiZXhwIjoxNzQwNDYzODE5LCJpYXQiOjE3MDg5Mjc4MTksImp0aSI6IjM5MjQwZWM4NTQ5MzQ4Yjc4ZTMzZTBlOGZjODdiZDBlIiwidXNlcl9pZCI6MX0.6ZRk4Tun1dEh_Hx6BvVRHPVVbRdMPVr5z7YTiHOiqnE";
        // $generated_token['status_code'] = 200;
        $dataToSend = $data;
        if($generated_token['status_code']==200 ||$generated_token['status_code']==201){
            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_URL, $endpoint );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, [
                
                // 'Authorization: Bearer '. $token,
                'Authorization: Bearer '. $generated_token['response'][ 'data' ][ 'token' ],
                'Content-Type: application/json'
            ] );
            curl_setopt( $ch, CURLOPT_POST, true );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $dataToSend, JSON_PRESERVE_ZERO_FRACTION ) );
    
            $response = curl_exec( $ch );
            $http_status_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
    
            curl_close( $ch );
    
            // expecting to be a json encoded response
            $resp[ 'response' ] =  json_decode( $response, true );
          
            $resp[ 'status_code' ] = $http_status_code;


        }else{

          
            $resp[ 'response' ]= $generated_token ;
            $resp[ 'status_code' ] = $generated_token['status_code'];

        }
      

        return $resp;

    }
}
