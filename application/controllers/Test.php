<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'services/MyServices.php');
class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load the model
        $this->load->model('GetData');
        $this->myServices = new MyServices();
    }


    public function index()
    {
        parent::__construct();
        $this->load->model('model_repo');
    }

    public function get_data()
    {
        // Call the model function to get data
        header('Content-Type: application/json');
        // $data = $this->GetData->get_data();
        // $kay[ $data[0]['Acc_No']]=$data[0];


        $data = $this->GetData->get_data();
        $kay = array();

        for ($i = 0; $i < count($data); $i++) {
            $accNo = $data[$i]['Acc_No'];
            $kay[$accNo] = $data[$i];
        }
        // Pass the processed data to the view
        // $this->load->view('form', $kay);

        echo json_encode($kay);

        // Encode the processed data as JSON
        // $json_data = json_encode($kay);

        // // Pass the JSON data to the view
        // $this->load->view('form/index.php', array('json_data' => $json_data));

        // Send the data as a JSON response
        // $this->output->set_content_type('application/json');
        // $this->output->set_output(json_encode($data));

    }


    public function create_order()
    {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");

        $datapost = array(
            'mobile' => '095223323232',
            'amount' => '1',
            'refNumber' => rand(1, 1000000),
            'act_number' => '4223452342342',
            'first_name' => 'test',
            'last_name' => 'test',
            'remarks' => 'test',
            'email_address' => 'test@example.com',
            'transaction_type' => 'qr'


        );

        // $datapost = array(
        //     'mobile' => '095223323232',
        //     'amount' => $this->input->post( 'amount' ),
        //     'refNumber' => rand(1, 1000000),
        //     'act_number' => $this->input->post( 'accountNumber' ),
        //     'first_name' => $this->input->post( 'accountName' ),
        //     'last_name' => $this->input->post( 'accountName' ),
        //     'remarks' => 'test',
        //     'email_address' => $this->input->post( 'email"' ),
        //     'transaction_type' => 'qr'


        // );


        if ($datapost['transaction_type'] == 'qr') {

            $jsondata = $this->transaction($datapost);
            $decodedata = json_decode($jsondata, true);

            $rawdata =  $decodedata['raw_string'];
            $data['rawdata'] = $rawdata;

            $this->load->view('form/qrph-static.php', $data);
        } else {
            $jsondata = $this->transaction($datapost);
            $decodedata = json_decode($jsondata, true);

            $rawdata =  $decodedata['redirect_url'];
            // $data['rawdata'] = $rawdata;
            echo json_encode($jsondata);

            header("Location: $rawdata");

            exit;
        }
    }
    public function create_post_data()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $amount = $_POST['amount'];
            $accountNumber = $_POST['accountNumber'];
            $accountName = $_POST['accountName'];
            $email = $_POST['email'];

            // Process the data as needed
            // $response = array('status' => 'success', 'message' => 'Form data received')
            $datapost = array(
                'mobile' => '095223323232',
                'amount' => '23',
                'refNumber' => rand(1, 1000000),
                'act_number' => '4223452342342',
                'first_name' => 'test',
                'last_name' => 'test',
                'remarks' => 'test',
                'email_address' => 'test@example.com',
                'transaction_type' => 'qr'
            );
            // echo json_encode($response);
            // echo json_encode($datapost);

            if ($datapost['transaction_type'] == 'qr') {

                $jsondata = $this->transaction($datapost);
                $decodedata = json_decode($jsondata, true);

                $rawdata =  $decodedata['raw_string'];
                $data['rawdata'] = $rawdata;
                // echo json_encode($data);
                $this->load->view('form/qrph-static.php', $data);

            } else {
                $jsondata = $this->transaction($datapost);
                $decodedata = json_decode($jsondata, true);

                $rawdata =  $decodedata['redirect_url'];
                // $data['rawdata'] = $rawdata;
                echo json_encode($jsondata);

                // header("Location: $rawdata");

                exit;
            }
        } else {

            $response = array('status' => 'error', 'message' => 'Form not submitted');
            echo json_encode($response);
        }
    }

    public function transaction($datapost)
    {
        $curl = curl_init();



        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://iselco-web.test/api/trans',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $datapost,
            CURLOPT_HTTPHEADER => array(
                "Access-Control-Allow-Origin: *",
                "Access-Control-Allow-Methods: POST, GET, OPTIONS",
                "Access-Control-Allow-Headers: Content-Type"

            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
