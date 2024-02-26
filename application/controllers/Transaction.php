<?php
use Restserver\Libraries\REST_Controller;

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );
require APPPATH . 'libraries/REST_Controller.php';

require APPPATH . 'libraries/Format.php';
require_once ( APPPATH . 'services/ApiService.php' );
require_once ( APPPATH . 'services/MyServices.php' );

class Transaction extends REST_Controller
 {

    public function __construct()
 {
        parent::__construct();
        $this->apiService = new ApiService();
        $this->load->model( 'Trans_model', 'repo' );
        $this->myServices = new MyServices();
 }

    function generateRandomString_get( $length = 16 )
 {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen( $characters );
        $randomString = '';
        for ( $i = 0; $i < $length; $i++ ) {
            $randomString .= $characters[ rand( 0, $charactersLength - 1 ) ];
        }
        return $randomString;
}

    public function totalFee_post()
     {
            $this->form_validation->set_rules( 'accountNumber', 'Account Number', 'required' );
            $this->output->set_content_type( 'application/json' );

            switch ( $_SERVER[ 'CONTENT_TYPE' ] ) {
                case 'application/json':

                $_POST = json_decode( file_get_contents( 'php://input' ), true );
                $chkdata = $_POST;

                break;
                default:

                $chkdata = array(
                    'accountNumber' => $this->input->post( 'accountNumber' ),

                );
            }

            if ( $this->form_validation->run() == FALSE ) {
                

                $errors = str_replace( '\n', '', strip_tags( validation_errors() ) );

                $this->response( [
                    'status' => false,
                    'message' => 'Validation error',
                    'data' =>  $errors,

                ], Rest_Controller::HTTP_UNAUTHORIZED );
            } else {

                $client =  $this->repo->validate_client( $chkdata[ 'accountNumber' ] );
                if ( $client ) {
                    $total=         $this->repo->total_fees( $chkdata[ 'accountNumber' ] );

                    // $formatted_number = number_format($total, 2, '.', ',');
                    $all_fees['Tranformer_Rental'] = number_format($total['Tranformer_Rental'], 2, '.', ',');
                    $all_fees['BOMdivagma'] = number_format($total['BOMdivagma'], 2, '.', ',');
                    $all_fees['BillsAndAdjustment'] = number_format($total['BillsAndAdjustment'], 2, '.', ',');
                    $all_fees['capitalshare'] = number_format($total['capitalshare'], 2, '.', ',');
                    $all_fees['others'] = number_format($total['others'], 2, '.', ',');
                    $all_fees['freeSurcharges'] = number_format($total['freeSurcharges'], 2, '.', ',');
                    $all_fees['total_fees'] = number_format($total['total_fees'], 2, '.', ',');
                    $all_fees['total_amount'] = number_format($total['total_amount'], 2, '.', ',');
                    $all_fees['Convinience_Fee'] = number_format($total['Convinience_Fee'], 2, '.', ',');
                    $all_fees['total_txn_amount'] = number_format($total['total_txn_amount'], 2, '.', ',');


                    $data[ 'all_fees' ] =  $all_fees;
                    
                    $data[ 'unpaid_month' ] = $this->repo-> validateupnpaidmonth( $chkdata );
                    $data[ 'client' ] = $client;

                    $this->response( [
                        'status' => true,
                        'message' =>   'Success',
                        'data' =>   $data,
                    ], Rest_Controller::HTTP_OK );
                } else {
                    $this->response( [
                        'status' => false,
                        'message' => 'Account Number not exist',
                        'data' => 'error',
                    ], Rest_Controller::HTTP_OK );
                }

            }

    }

    public function modify_transaction_post()
    {
 
         $this->form_validation->set_rules( 'Bill_number', 'Bill_number', 'trim|required' );
         $this->form_validation->set_rules( 'Account_number', 'Account_number', 'trim|required' );
         $this->form_validation->set_rules( 'Unpaid_month', 'Unpaid_month', 'trim|required' );

 
                 $datapost = array(
                     'BillNumber' => $this->input->post('Bill_number'),
                     'accountNumber' => $this->input->post('Account_number'),
                     'UnpaidMonth' => $this->input->post( 'Unpaid_month' )
                 
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
                    
                    $refdata=  $datapost['BillNumber'].$datapost['accountNumber'].$datapost['UnpaidMonth'];
                       
               echo json_encode($this->repo->iselco_data($refdata));
                
                     
                 }
 
    } 
  
}

