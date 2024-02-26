<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{

	public function get_user($username) {
        // Query the database to get user details by username
        // $query = $this->db->get_where('users', array('username' => $username));

		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('UserName', $username);
		$query = $this->db->get();

		// $qry="select * from tbl_iselco_data";
        // $Q= $this->db->query($qry);
        // return $Q->row_array()?$Q->result_array():false;
        
        // Return the user row as an array
        return $query->row_array();
	}

	public function get_consumer($accNo) {
        // Query the database to get user details by username
        // $query = $this->db->get_where('users', array('username' => $username));

		// $this->db->select('*');
		// $this->db->from('tbl_user');
		// $this->db->where('UserName', $accNo);
		// $query = $this->db->get();

		$query='SELECT * from tbl_iselco_data WHERE AccountNumber =	'.$accNo.' LIMIT 1';
        $result= $this->db->query($query);
        return $result->row_array()?$result->result_array():false;
        
        // Return the user row as an array
        // return $query->row_array();
	}


	/**
     * NOTE: Original Code
     * @param string $username
     * @param string $password
     */
	// public function authenticate_user($username, $password)
	// {
	// 	// $query = $this->db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' AND user_type_id = 2;");

	// 	$query = $this->db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password';");

	// 	if ($query->num_rows() == 1) {
	// 		// User found, return the user data
	// 		return $query->row_array();
	// 	} else {
	// 		// User not found
	// 		return false;
	// 	}
	// }

	// Add other functions as needed for user-related operations (e.g., insert_user, update_user, etc.)
}
