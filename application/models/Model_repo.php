<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_repo extends CI_Model
{

    public function select_all_data()
    {


        $qry = "select * from tbl_iselco_data";
        $Q = $this->db->query($qry);
        return $Q->row_array() ? $Q->result_array() : false;

    }

    public function insert_data($data)
    {
        $this->db->insert('tbl_iselco_data', $data);



    }

    public function valid($data)
    {
        // Insert data into your table
        $this->db->insert('tbl_iselco_data', $data);

        // Get the number of affected rows
        $insertedRows = $this->db->affected_rows();

        return $insertedRows;
    }
 
        public function get_users()
        {
                
            $query = $this->db->get('tbl_iselco_data',100); // Replace 'your_table' with your actual table name
        return $query->result();
        }



    public function validateActNumber($actNumber)
    {
        $sql = "select * from tbl_iselco_data where Acc_No like ?  ";
        $Q = $this->db->query($sql, $actNumber['accountNumber']);
        return $Q->row_array() ? $Q->row_array() : false;

    }
    public function doapilogs($log)
    {

        $this->db->insert('api_logs', $log);
    }

    // public function check_billing_no($column,$Actnum)
    // {
    //     $qry = "select * from tbl_iselco_data where BillNumber like ? and AccountNumber like ?";
    //     $Q = $this->db->query($qry, array($column,$Actnum));
    //     return $Q->row_array() ? $Q->row_array() : false;
    // }

    public function check_billing_no($column)
    {
        // $qry = "SELECT 'BillNumber' FROM tbl_iselco_data WHERE BillNumber LIKE '%$column%' AND AccountNumber LIKE '%$Actnum%'";
        // $Q = $this->db->query($qry);
        // return $Q->row_array() ? $Q->row_array() : false;  22101010015,0101010017

        $query = 'SELECT BillNumber FROM tbl_iselco_data WHERE BillNumber = ? LIMIT 1';
        $data = $this->db->query($query, array($column));
        return $data->row_array() ? true : false;
        // $qry = $this->db
        // ->select('BillNumber')
        // ->from('tbl_iselco_data')
        // ->where('BillNumber', $column)
        // ->where('AccountNumber', $Actnum)
        
        // ->get();
    
    // return $qry->row_array() ?: false;
    }

    public function insert_data2($data){
        // $this->db->insert('tbl_iselco_data',$data);

        $this->db->insert_batch('tbl_iselco_data', $data);
        
    }
}
