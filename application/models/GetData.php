<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GetData extends CI_Model {
    
    public function get_data() {
       
        // $query = $this->db->get('tbl_iselco_data');
        // return $query->result();

        $qry = 'select * from tbl_iselco_data';
        $Q = $this->db->query( $qry);
        return $Q->row_array()?$Q->result_array():false;

        
    }

    public function get_transaction_data() {
       
        // $query = $this->db->get('tbl_iselco_data');
        // return $query->result();

        $qry = 'select * from tbl_transaction';
        $Q = $this->db->query( $qry);
        return $Q->row_array()?$Q->result_array():false;
    }
}
?>