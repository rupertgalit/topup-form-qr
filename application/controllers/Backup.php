<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Load the model
		$this->load->model('backup_model');
		$this->load->library('session');
	
	}


    public function test_backup(){

        echo "Testing";

    }

    public function migrate() {
        // $this->load->model('backup_model');

        // Call the migrate_data method
        $this->backup_model->migrate_data();
        
        $this->session->set_flashdata('success', 'Data migration completed successfully!');
        echo '<script>alert("Data migration completed successfully!");</script>';
        
        // Redirect after the user dismisses the alert
        redirect('upload');
      
    }







}