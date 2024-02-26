<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Receipt extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Load the model
		$this->load->model('trans_model');
		$this->load->helper('url');
	}
	public function receipt_data()
	{


		$refnum = $this->input->post('accountNumber');

		


		$record = $this->trans_model->reciept_data($refnum);

		$all_fees['capitalshare'] = number_format($record['capitalshare'], 2, '.', ',');
		$all_fees['others'] = number_format($record['others'], 2, '.', ',');
		$all_fees['freeSurcharges'] = number_format($record['freeSurcharges'], 2, '.', ',');
		$all_fees['total_fees'] = number_format($record['total_fees'], 2, '.', ',');
		$all_fees['total_amount'] = number_format($record['total_amount'], 2, '.', ',');
		$all_fees['Convinience_Fee'] = number_format($record['Convinience_Fee'], 2, '.', ',');
		$all_fees['total_txn_amount'] = number_format($record['total_txn_amount'], 2, '.', ',');

		$data['data'] = array(
		

			'records' => $all_fees,
			'client' => $this->trans_model->client_data($refnum),
			'unpaidMonth' => $this->trans_model->unpaidmonth_data($refnum)
		);

		// Output JSON data
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	// public function processing_data()
	// {


	// 	$refnum = $this->input->post('accountNumber');


	// 	$data['data'] = array(
	// 		'records' => $this->trans_model->reciept_data($refnum),
	// 		'client' => $this->trans_model->client_data($refnum),
	// 		'unpaidMonth' => $this->trans_model->unpaidmonth_data($refnum)
	// 	);

	// 	// Output JSON data
	// 	header('Content-Type: application/json');
	// 	echo json_encode($data);
	// }

	public function index()
	{
		// $data['records'] = $this->trans_model->reciept_data();	
		// $data['client'] = $this->trans_model->client_data();
		// $this->load->view('receipt/receipt.php',$data);

		$refnum = $this->input->post('refnumber');


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
	public function alreadypaid(){
		$this->load->view('receipt/alreadypaid.php');

	}

	// public function processing()
	// {
	// 	$this->load->view('receipt/processing.php');
	// }
}
