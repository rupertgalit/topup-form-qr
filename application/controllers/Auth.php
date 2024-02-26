<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'services/ApiService.php');

class Auth extends CI_Controller
{
	public $apiService;

	public function __construct()
	{
		parent::__construct();

		$this->apiService = new ApiService();
		$this->load->library('session');
        $this->load->model('user');

		// if($this->session->userdata('user_id') !== TRUE){
		//     redirect('login');
	
	}

	public function login(){

		$username = $this->input->post('username');
        $password = $this->input->post('password');
		

        // Validate against the database
        $user = $this->user->get_user($username);
		$user_type = $user['UserType'];
		$fullname = $user['Fullname'];

        if ($user && $password === $user['Password']) {
            // Set user data in session
            $user_data = array(
                'username' => $username,
                'logged_in' => TRUE,
				'user_type' => $user_type,
				'fullname' => $fullname
            );

            $this->session->set_userdata($user_data);
			echo "success";
			if ($this->session->userdata('user_type') == 'TECH'){
				redirect('upload');
			}
			else{
				redirect('transactions');
			}

             // Redirect to the dashboard or any other page after successful login
        } else {
            // Invalid login, redirect to login page with an error message
            // $this->session->set_flashdata('error', 'Invalid username or password');
			$this->session->set_flashdata('error_message', 'Invalid Username or Password!');
            redirect('login');
			// echo "failed";
        }


	}

	function logout()
	{
		$this->session->sess_destroy();

		redirect('login');
	}


	// public function login()
	// {
	// 	$data =  json_decode(file_get_contents('php://input'), true);
	// 	$this->output->set_content_type('application/json');
	// 	// $data = [
	// 	// 	'endpoint' => 'login',
	// 	// 	'data' => [
	// 	// 		'mobile_number' => '09123456789',
	// 	// 		'password' => '123456',
	// 	// 	]
	// 	// ];
	// 	$response = $this->call_external_api($data);

	// 	$jdata = json_decode($response, true);

	// 	if ($jdata['status_code'] == 200) {
	// 		$sesdata = array(

	// 			'user_id' => $jdata['data']['set_session']['user_id'],
	// 			'user_type_id' =>  $jdata['data']['set_session']['user_type_id'],
	// 			'user_name' =>  $jdata['data']['set_session']['user_name'],
	// 			'Active' => TRUE

	// 		);

	// 		$this->session->set_userdata($sesdata);

	// 		// status=200
	// 		// data =

	// 		// $repData['redirect_url']=base_url( $this->redirect($sesdata['user_type_id']));
	// 		// $repData['response']=	$jdata; 

	// 		if (isset($jdata['data']['user_details'])) {
	// 			unset($jdata['data']['user_details']);
	// 		}

	// 		$jdata['redirect_url'] = base_url($this->redirect($sesdata['user_type_id']));
	// 		echo json_encode($jdata);

	// 		//  redirect(base_url( $this->redirect($sesdata['user_type_id'])));
	// 	} else {
	// 		echo $response;
	// 	}
	// }

	function redirect($type)
	{
		$caffeine = '';
		$map = [
			'4' => 'marketmanager',
			'5' => 'declarator',

		];
		// $caffeine = $map[$type] ?? 'Not found';
		$caffeine = $map[$type];
		return $caffeine;
	}

	public function info(){

		echo phpinfo();
		
		// echo rand(000, 999).date('Ymd'). date('His');
	}

	
}




/* End of file Player.php */
/* Location: ./application/controllers/Player.php */
