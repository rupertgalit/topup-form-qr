<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

require APPPATH . 'libraries/Format.php';
require_once(APPPATH . 'services/ApiService.php');
require_once(APPPATH . 'services/MyServices.php');

class Api extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->apiService = new ApiService();
        $this->load->model('Model_repo', 'repo');
        $this->load->model('trans_model', 'model');
        $this->myServices = new MyServices();
        date_default_timezone_set('Asia/Manila');
        $this->load->library('encryption');

        $this->load->helper('email');
    }

    public function decimal_get()
    {

        $number = 434545.43434;

        echo number_format($number, 2, '.', ' ,');
    }

    public function email_get($request, $fee)
    {



        $data['email']  =  $request['Email'];

        $data['subject'] = ' Payment Confirmation - Ref: ' . $request['ReferenceNo'];
        $data['message'] = '
        <body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #fff;">
        <div dir="ltr" style="background: #fff!important;"><div class="adM"> 
    </div>
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%"
               style="max-width: 800px; border: 1px solid #000; padding: 40px; box-shadow: 5px 10px 18px #888888;">
            <tr>
                <td>
                    <div style="padding: 20px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
                            <tr>
                            <td style="vertical-align: middle;">
                            <img src=https://iselco-dev.netglobalsolutions.net/assets/images/updated_logo.png
                                          height="100px" style="display: inline-block; vertical-align: middle;">
                        </td>
                                <td style="text-align: right;">
                                    <span>01-Mar-2022 02:14:22 PM </span><br>
                                    <span>Transaction Receipt </span>
                                </td>
                            </tr>
                        </table>
    
                        <h3>Dear Sir/Madam:</h3>
                        <h2 style="color:#006293; font-size: 16px;">I hope this email finds you well. We are writing to inform you that your recent payment for ISELCO II Online Web Payment has been successfully processed.
                            Please find the payment details below:
                        </h2>
                        <hr style=" height: 2px; border-width: 0; color: gray; background-color: gray;">
                        <span><b>Reference Number:</b> ' . $request['ReferenceNo'] . '</span><br>
                 
                        <span><b>Account Number:</b>' . $request['AccountNumber'] . '</span><br>
                        <span><b>Account Name:</b> ' . $request['ConsumerName'] . '</span><br>
                        <span><b>Mobile Number:</b>' . $request['Phone'] . '</span> 
                        <hr>
               
    
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
                            <tr>
                                <td>
                                    <h3>Description</h3>
                                </td>
                                <td style="text-align: right;">
                                    <h3>Amount</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <b><span>Fees: </span></b>
                                </td>
                                <td style="text-align: right;font-weight: 700;">
                                    <span>' . $fee['total_fees'] . ' PHP</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <b><span>Penalties: </span></b>
                                </td>
                                <td style="text-align: right;font-weight: 700;">
                                    <span>' . $fee['freeSurcharges'] . ' PHP</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <b><span>Capital Share: </span></b>
                                </td>
                                <td style="text-align: right;font-weight: 700;">
                                    <span>' . $fee['capitalshare'] . ' PHP</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <b><span>Other Fees: </span></b>
                                </td>
                                <td style="text-align: right;font-weight: 700;">
                                    <span>' . $fee['others'] . ' PHP</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <b><span>Convenience Fee: </span></b>
                                </td>
                                <td style="text-align: right;font-weight: 700;">
                                    <span>' .
            number_format($fee['Convinience_Fee'], 2, '.', ' ,') . ' PHP</span>
                                </td>
                            </tr>
                        </table>
    
                        <hr>
    
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
                            <tr>
                                <td>
                                    <b>Total</b>
                                </td>
                                <td style="text-align: right; font-weight: 900;">
                                    <span>' .
            number_format($fee['total_txn_amount'], 2, '.', ' ,') .
            ' PHP </span>
                                </td>
                            </tr>
                        </table>
    
                        <hr>
                        Your prompt payment is greatly appreciated, and it ensures the uninterrupted provision of our services.
                        If you have any questions or concerns regarding your payment or account,
                        please do not hesitate to contact our customer service team at
                        Mobile / Viber:
                        <br>  
                        <div style="text-align: left;">
                            <span><br>09171486979<br>
                            09171793481<br>
                            09173126960</span>
                            <hr>
                        </div>
    
                        <span><b>For further information and assistance please contact:</b></span><br>
                        <span>NetGlobal Solutions Inc.</span><br>
                        <span>Email: Support@netglobalsolutions.net</span>
                        <hr>
                        <center><span>Please do not reply to this email. This mailbox is not monitored and you will not receive a response. For assistance, please use details as mentioned above.</span></center>
                    </div>
                </td>
            </tr>
            <td style="vertical-align: middle; text-align:center;">
            Powered by:
            <img src=https://iselco-dev.netglobalsolutions.net/assets/images/ngsi_logo.png
                     height="40px" style="display: inline-block; vertical-align: middle;">
            </td>
        </table>
    </body>';
        $data['name'] = 'ISELCO II';

        $email = sendemail($data);

        return true;
    }

    private function call_external_api($data)
    {

        $response = $this->apiService->call_external_api($data);
        return $response;
    }

    public function index_post()
    {
        echo 'Forbidden';
    }

    public function index_get()
    {
        echo 'Forbidden';
    }
    public   function uuid_get()
    {
        return     sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),

            mt_rand(0, 0xffff),

            mt_rand(0, 0x0fff) | 0x4000,

            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for 'node'
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    public function doTransact_post()
    {

        // $this->form_validation->set_rules( 'mobile', 'mobile', 'trim|required' );
        // $this->form_validation->set_rules( 'amount', 'amount', 'trim|required' );
        // $this->form_validation->set_rules( 'refNumber', 'refNumber', 'trim|required' );
        $this->form_validation->set_rules('accountNumber', 'accountNumber', 'trim|required');
        // $this->form_validation->set_rules( 'first_name', 'first_name', 'trim|required' );
        // $this->form_validation->set_rules( 'last_name', 'last_name', 'trim|required' );

        // $this->form_validation->set_rules( 'remarks', 'remarks', 'trim|required' );
        // $this->form_validation->set_rules('email', 'email_address', 'trim|required');
        // $this->form_validation->set_rules( 'transaction_type', 'transaction_type', 'trim|required' );

        $datapost = array(
            'mobile_number' => $this->input->post('phone'),

            // 'txn_amount' => $this->input->post('amount'),
            'txn_ref' =>  rand(000, 999) . date('Ymd') . date('His'),
            'external_id' => $this->input->post('accountNumber'),
            // 'first_name' => $this->input->post( 'first_name' ),
            // 'last_name' => $this->input->post( 'last_name' ),
            // 'particulars' => $this->input->post( 'remarks' ),
            'email_address' => 'dev@netglobalsolutions.net',
            'transaction_type' => 'qr'
            // 'transaction_type' => $this->input->post( 'transaction_type' )
        );
        if ($this->form_validation->run() == FALSE) {
            ///form validation
            $FVE = $this->form_validation->error_array();
            $this->response([
                'status' => false,
                'message' => 'Error validation',
                'data' => $FVE
            ], Rest_Controller::HTTP_UNAUTHORIZED);
        } else {



            $total_amount = true;
            if ($total_amount) {

                // $datapost['txn_amount'] = $total_amount['total_txn_amount'];
                $ins_data['params'] =   json_encode($_REQUEST);

                $ins_data['request_at'] = date('Y-m-d H:i:s');

                $ins_data['method'] = $_SERVER['REQUEST_METHOD'];

                $get_id =   $this->model->insertApiLogs($ins_data);

                if ($datapost['transaction_type'] === 'qr') {

                    $response = $this->trans_qr($datapost);

                    

                    if ($response['status_code'] == 200 ||  $response['status_code'] == 201) {
                        $log['api_response'] = json_encode($response['response']);
                        $status =  $response['status_code'];


                        $summary_data['qr'] = $response['response']['data']['raw_string'];
                        $jresponse =     [
                            'status' => true,
                            'message' => 'Success',
                            'data' => $response['response'],

                            'redirect_url' => base_url() . '/welcome/qrph_static?refnum=' . $datapost['txn_ref']
                        ];
                    } else {
                        $status = 200;
                        $jresponse =     [
                            'status' => true,
                            'message' => 'FAILD',
                            'data' => $response['response'],
                            'redirect_url' => base_url()
                        ];
                        // 'raw_string'=>$response[ 'response' ][ 'data' ][ 'raw_string' ] ];$this->encryption->encrypt($ciphertext);
                        // 'raw_string'=>$response[ 'response' ][ 'data' ][ 'raw_string' ] ];$this->encryption->encrypt($ciphertext);

                    }
                } else {


                    $response = $this->trans_card($datapost);

                    $jresponse =     [
                        'status' => true,
                        'message' => 'successss'
                        // 'redirect_url'=>$response[ 'response' ][ 'data' ][ 'callback_uri' ]
                    ];
                }
            } else {
                $status = 401;
                $jresponse =     [
                    'status' => false,
                    'message' => 'account number is not exist.',

                ];
            }

            ///insert summary report
            // $summaryTransaction = true;

           
            // $summary_data['TotalAmount'] = $datapost['txn_amount'];
            $summary_data['ReferenceNo'] = $datapost['txn_ref'];
            $summaryTransaction = $this->model->summaryTransaction($summary_data);
            if ($summaryTransaction) {
                $update['response_at'] = date('Y-m-d H:i:s');

                $update['status'] = $response['status_code'];

                $update['api_response'] = json_encode($response['response']);


                $this->model->doUpdateApilogs($update, $get_id);
            }



            $this->response($jresponse, $status);
        }
    }






    public function trans_card($datapost)
    {

        $jayParsedAry = [
            'app_uuid' =>  $_ENV['API_UUID'],
            'paygate' => 2,
            'txn_ref' =>   $datapost['txn_ref'],
            'endpoint' => 'create-order',
            'particulars' => [
                'test' => 'test'
            ],
            'callback_uri' => 'http://test.com',
            'merchant_details' => [
                'external_id' => $datapost['external_id'],
                'first_name' => $datapost['first_name'],
                'last_name' => $datapost['last_name'],
                'txn_amount' => $datapost['txn_amount'],
                'mobile_number' => $datapost['mobile_number'],
                'email_address' => $datapost['email_address'],
                'currency' => 'PHP',
                'locale' => 'en',
                'return_url' => 'http://iselco.test/'
            ]
        ];

        $response = $this->call_external_api($jayParsedAry);
        return    $response;
    }

    public function   trans_qr($datapost)
    {

        // $jayParsedAry = [

        //     'app_uuid' =>  $_ENV['API_UUID'],
        //     'reference_number' => $datapost['txn_ref'],
        //     'endpoint' => 'p2m-generateQR',
        //     'callback_uri' => base_url() . '/api/postback/?ref=' . $datapost['txn_ref'],
        //     'merchant_details' => [
        //         'method' => 'dynamic',
        //         'txn_type' => 44,
        //         'scanner_mobile_number' => $datapost['mobile_number'],
        //         'txn_amount' => $datapost['txn_amount']
        //     ]
        // ];

        $jayParsedAry = [

            'app_uuid' =>  $_ENV['API_UUID'],
            'reference_number' => $datapost['txn_ref'],
            'endpoint' => 'p2m-generateQR',
            'callback_uri' => base_url() . '/api/postback/?ref=' . $datapost['txn_ref'],
            'merchant_details' => [
                'method' => 'static',
                'txn_type' => 44,
                'scanner_mobile_number' => '09511223438',
                'txn_amount' =>0.00
            ]
        ];

     

        $response = $this->apiService->generate_qr_api($jayParsedAry);

        //    $response = $this->generate_qr_api( $jayParsedAry );
        return    $response;
    }

    public function postback_post($ref_number = 0)
    {
        $ref_number = $_GET['ref'];

        $this->output->set_content_type('application/json');

        $data = json_decode(file_get_contents('php://input'), true);

        $data_exist = $this->model->finddata($ref_number);

        $call_back_data['reference_number'] = $ref_number;

        $call_back_data['callback_data'] = json_encode($data);

        $call_back_data['tbl_date'] = date('Y-m-d H:i:s');

        $call_back_data['TxId'] = $data['TxId'];

        $call_back_data['referenceNumber'] = $data['referenceNumber'];

        $call_back_data['callback_status'] = $data['status'];

        $call =     $this->model->getClientdata($ref_number);
        $all_fee =   $this->model->total_fees($call['AccountNumber']);
        $clntBillnumbers =    $this->model->pback_clientdata($ref_number);
        if ($data_exist != false) {

            $this->model->doInsertCallback($call_back_data);
            $this->response([
                'messege' => 'Failed',
                'error0' => 'already transact',
                'data' => $all_fee['total_fees']
            ], Rest_Controller::HTTP_UNAUTHORIZED);
        } else {

            // / insert data to tbl_callback
            $do_cback_data = $this->model->doInsertCallback($call_back_data);

            if ($do_cback_data) {

                if ($data['status'] == '4') {

                    // $call =     $this->model->getClientdata($ref_number);


                    $this->email_get($call, $all_fee);
                }

                $transData['PaymentStatus'] = $this->status_get($data['status']);
                $transData['TxId'] = $call_back_data['TxId'];
                // $transData[ 'referenceNumber' ] = $call_back_data[ 'referenceNumber' ];
                $transData['LastModified'] = date('Y-m-d H:i:s');
                $trans_updated = $this->model->updateTransaction($transData, $ref_number);

                if ($trans_updated) {

                    $updt_summary_data['TxId'] = $call_back_data['TxId'];
                    $updt_summary_data['PaymentStatus'] =     $transData['PaymentStatus'];
                    $updt_summary_data['DatePaid'] = $call_back_data['tbl_date'];

                    $this->model->summary_transaction_changes($updt_summary_data, $ref_number);
                }

                foreach ($clntBillnumbers as $clntBillnumber) {
                    // $this->db->where('BillNumber', $billNumber['BillNumber']);
                    // $this->db->update('your_table', $dataToUpdate);


                    $this->model->do_update_iselco_status($clntBillnumber['BillNumber']);
                }

                // $this->model->summary_transaction_changes($updt_summary_data,$ref_number);


                $this->response([
                    'messege0' => 'Success',
                    'error' => 'true',
                    'data' => $all_fee

                ], Rest_Controller::HTTP_OK);
            }
        }
    }

    function status_get($type)
    {
        $caffeine = '';
        $map = [
            '1' => 'STARTED ',
            '2' => 'PENDING',
            '3' => 'FAILED',
            '4' => 'PAID'
        ];

        $caffeine = $map[$type];
        return $caffeine;
    }
    function all_iselco_data_get()
    {

        $result =   $this->model->get_data();

        if ($result) {

            $this->response([
                'messege0' => 'Success',
                'error' => 'false',
                'data' => $result

            ], Rest_Controller::HTTP_OK);
        } else

            $this->response([
                'messege0' => 'No data found.',
                'error' => 'true',
                'data' => array()

            ], Rest_Controller::HTTP_OK);
    }



    public function test_api_get(){

        
// $curl = curl_init();

//     curl_setopt_array($curl, array(
//     CURLOPT_URL => 'https://topup-demo.netglobalsolutions.net/api/doTransact',
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => '',
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 0,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => 'POST',
//     CURLOPT_POSTFIELDS => array('email' => 'test@gmail.com'),
//     CURLOPT_HTTPHEADER => array(
//         'Cookie: ci_session=v0uod71dtc2s3mahadoiagss2lk9ccuc'
//     ),
//     ));

//     $response = curl_exec($curl);

//     curl_close($curl);
    // echo $response;


    

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.dev.ngsiwallet.net/pgw/api/v1/transactions/qr-codes/generate/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "app_uuid": "0aa91257-2baa-437e-886c-d3cfce9552ce",
  "reference_number": "11112311",
  "endpoint": "p2m-generateQR",
  "callback_uri": "test.com",
  "merchant_details": {
    "txn_type": 44,
    "method": "static",
    "txn_amount": "1.00",
    "scanner_mobile_number":"09511223438" 
  }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbl90eXBlIjoiYWNjZXNzIiwiZXhwIjoxNzQwNDYzODE5LCJpYXQiOjE3MDg5Mjc4MTksImp0aSI6IjM5MjQwZWM4NTQ5MzQ4Yjc4ZTMzZTBlOGZjODdiZDBlIiwidXNlcl9pZCI6MX0.6ZRk4Tun1dEh_Hx6BvVRHPVVbRdMPVr5z7YTiHOiqnE'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;


    $this->load->view('form/qrph-static.php');
    
    }
}


