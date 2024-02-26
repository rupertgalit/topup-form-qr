<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Load the model
		$this->load->model('trans_model');
		$this->load->library('session');
		$this->load->model('model_repo');
		$this->load->model('user');


		// $expiration_time = $this->session->userdata('expiration_time');
		// if ($expiration_time && time() > $expiration_time) {
		// 	// Session has expired, unset userdata and redirect to login
		// 	$this->session->unset_userdata('accountNumber');
		// 	redirect('welcome');
		// }
	}

	public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('form/index.php');
	}


	public function receipt()
	{
		$this->load->view('receipt/receipt.php');
	}

	public function qr_data($qrdata)
	{

		$this->load->view('form/qrph-static.php', $qrdata);
	}

	public function qrph_static($qr = 0)
	{

		$ref_num = $_GET['refnum'];

		$qrdata['records'] = $this->trans_model->get_qrdata($ref_num);
		// $qrdata['records'] = 
		// array (
		// 	'ReferenceNo' => 2134234,
		// 	'qr' => '123123',
		// 	'TotalAmtTxn' => 23
		// ); 
		
		 
		$this->qr_data($qrdata);
	
		
	}
	// public function welcome_display()
	// {
	// 	$this->load->view('welcome_message.php');
	// }
	public function test_api()
	{
		// Call the model function to get data
		header('Content-Type: application/json');
		// $data = $this->GetData->get_data();
		// $kay[ $data[0]['Acc_No']]=$data[0];


		$data = $this->GetData->get_data();
		$kay = array();

		for ($i = 0; $i < count($data); $i++) {
			$accNo = $data[$i]['AccountNumber'];
			$kay[$accNo] = $data[$i];
		}

		// Encode the processed data as JSON
		$json_data = json_encode($kay);

		// Pass the JSON data to the view
		$this->load->view('test-api.php', array('json_data' => $json_data));
	}


	public function dashboard()
	{
		if ($this->is_user_logged_in()) {
			$this->load->view('dashboard/index.php');
		} else {
			// User is not logged in, redirect to login page
			redirect('login');
		}
	}
	public function summary()
	{

		if ($this->is_user_logged_in()) {
			$data['records'] = $this->trans_model->transaction_summary_data();
			$this->load->view('dashboard/transaction-summary.php', $data);
		} else {
			// User is not logged in, redirect to login page
			redirect('login');
		}


	}
	public function test_form()
	{
		$this->load->view('form/test-form.php');
	}

	public function test_date(){
		$start_date = $this->input->post('startDate');
        $end_date = $this->input->post('endDate');

		$converted_start_date = date('Y-m-d', strtotime($start_date));
		$converted_end_date = date('Y-m-d', strtotime($end_date));


		echo $converted_start_date;
		echo $converted_end_date;
	}

	public function upload()
	{

		$this->load->model('model_repo'); // Load the model

		// Fetch data from the model
		$data['result'] = $this->model_repo->get_users();

		// Check if any rows are returned


		if ($this->is_user_logged_in()) {
			if (!empty($data['result'])) {
				// Data found, load the view with the table
				$this->load->view('dashboard/upload.php', $data);
			} else {

				$this->load->view('dashboard/upload.php', $data);
			}
		} else {
			// User is not logged in, redirect to login page
			redirect('login');
		}
	}


	public function transactions()
	{

		if ($this->is_user_logged_in()) {
			$data['records'] = $this->trans_model->transaction_data();
			$this->load->view('dashboard/transactions.php', $data);
		} else {
			// User is not logged in, redirect to login page
			redirect('login');
		}
	}

	public function login()
	{

		if ($this->is_user_logged_in()) {
			redirect('transactions');
		} else {
			// User is not logged in, redirect to login page
			$this->load->view('login/index.php');
		}
		
	}
	public function update(){
		if ($this->is_user_logged_in()) {
			$this->load->view('dashboard/update-form.php');
		} else {			
			redirect('login');
		}
	

	}

	public function receipt_paid($refnum)
	{
	


		if (!$refnum) {
			redirect(base_url());
			exit();
		} else {
			$refnum_data = $this->trans_model->transactionref_data($refnum);
			if ($refnum_data) {
				$data['refnum'] = $refnum;
				$this->load->view('receipt/receipt.php', $data);
			} else {
				$data['refnum'] = $refnum;
				$this->load->view('receipt/processing.php' ,$data);
			}
		}
	}

	public function paymentform()
	{

		$accNo = $this->input->post('accountNumber');
		$meterNo = $this->input->post('meterNumber');

		if (!$accNo) {
			redirect(base_url());
			exit();
		} else {

			$check_unpaid = $this->trans_model->check_unpaid($accNo,$meterNo);
			if(!$check_unpaid) {

				$check_paid = $this->trans_model->check_paid($accNo,$meterNo);

				if($check_paid){

					 $check_paid['ReferenceNo'];


					$this->receipt_paid( $check_paid['ReferenceNo']);
				}
				else{
					$this->payment_for_data($accNo,$meterNo);
				}
			}
			else{

				$this->payment_for_data($accNo,$meterNo);
			}			
		}
	}


	private function payment_for_data($accNo,$meterNo){

		$accountNumber = $this->user->get_consumer($accNo);
		if ($accountNumber && $meterNo === $accountNumber[0]['MeterNumber']) {

			$consumer_data = array(
				'accountNumber' => $accNo,
				'consumer_logged_in' => TRUE,
				'expiration_time' => time() + 5
			);
			$this->session->set_userdata($consumer_data);

			$data['accountnumber'] = $accNo;
			$this->load->view('form/payment-form.php', $data);
		} else {
			// Check if the session has expired
			$expiration_time = $this->session->userdata('expiration_time');
			if ($expiration_time && time() > $expiration_time) {
				// Session has expired, unset userdata and redirect to login
				$this->session->unset_userdata('accountNumber');
				
				redirect(base_url());
				exit();
			} else {
				// Invalid login, redirect to login page with an error message
				$this->session->set_flashdata('error', 'Invalid Account Number or Meter Number!');
				redirect(base_url());
				exit();
			}
		}

	}

	private function is_user_logged_in()
	{
		// Check if the 'logged_in' session variable exists and is set to TRUE
		return $this->session->userdata('logged_in') === TRUE;
	}
	private function is_consumer_logged_in()
	{
		// Check if the 'logged_in' session variable exists and is set to TRUE
		return $this->session->userdata('consumer_logged_in') === TRUE;
	}
	function consumer_logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
		exit();
	}
}
