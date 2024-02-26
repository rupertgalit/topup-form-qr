<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trans_model extends CI_Model
{

  public function get_data()
  {

    // $query = $this->db->get( 'tbl_iselco_data' );
    // return $query->result();

    $qry = 'select * from tbl_iselco_data';
    $Q = $this->db->query($qry);
    return $Q->row_array() ? $Q->result_array() : false;
  }


  public function get_qrdata($ref_num)
  {

    // $query = $this->db->get( 'tbl_iselco_data' );
    // return $query->result();

    $qry = 'select * from tbl_transaction_summary WHERE ReferenceNo = '.$ref_num.'';
    $Q = $this->db->query($qry);
    return $Q->row_array() ? $Q->row_array() : false;
  }

  public function check_unpaid($accNo,$meterNo){
    
    $qry = $this->db
    ->select('*')
    ->from('tbl_iselco_data')
    ->where('AccountNumber', $accNo)
    ->where('MeterNumber', $meterNo)
    ->where('PaymentStatus', 'UNPAID')
    ->order_by('islc_id', 'DESC')
    ->limit(1)
    ->get();

return $qry->row_array() ?: false;
  }

  public function check_paid($accNo,$meterNo){
    


    $qry = $this->db
    ->select('*')
    ->from('tbl_transaction')
    ->where('AccountNumber', $accNo)
    ->where('MeterNumber', $meterNo)
    ->where('PaymentStatus', 'PAID')
    ->order_by('TransId', 'DESC')
    ->limit(1)
    ->get();

return $qry->row_array() ?: false;
  }

  
  public function transaction_data()
  {
    // $query = $this->db->get( 'tbl_iselco_data' );
    // return $query->result();
    $qry = 'select * from tbl_transaction';
    $Q = $this->db->query($qry);
    return $Q->row_array() ? $Q->result_array() : false;
  }

  public function transaction_summary_data()
  {
    // $query = $this->db->get( 'tbl_iselco_data' );
    // return $query->result();
    $qry = 'select * from tbl_transaction_summary';
    $Q = $this->db->query($qry);
    return $Q->row_array() ? $Q->result_array() : false;
  }

  public function client_data($refnum)
  {
    // $query = $this->db->get( 'tbl_iselco_data' );
    // return $query->result();
    $result = 'SELECT * FROM  tbl_transaction where ReferenceNo= ' . $refnum . '  LIMIT 1';
    $data = $this->db->query($result);
    return $data->row_array() ? $data->result_array() : false;
  }


  
  public function pback_clientdata($refnum)
  {
    // $query = $this->db->get( 'tbl_iselco_data' );
    // return $query->result();
    $result = 'SELECT BillNumber FROM  tbl_transaction where ReferenceNo= ' . $refnum . '';
    $data = $this->db->query($result);
    return $data->row_array() ? $data->result_array() : false;
  }
  public function iselco_data($refdata)
  {
    $result = 'SELECT * FROM  tbl_iselco_data where BillNumber= ' . $refdata . '';
    $data = $this->db->query($result);
    return $data->row_array() ? $data->result_array() : false;
  }


  public function  getClientdata($ref)
  {
    $sql = "select * from tbl_transaction where ReferenceNo like ? LIMIT 1  ";
    $Q = $this->db->query($sql, $ref);
    return $Q->row_array() ? $Q->row_array() : false;
  }


  public function reciept_data($refnum)
  {
    // $query = $this->db->get( 'tbl_iselco_data' );
    // return $query->result();
    // $result = 'SELECT  sum(CapitalShare) as capitalshare ,sum(Others) as others,sum(Surcharges) as freeSurcharges,sum(TranformerRental  + BOMdivagma +BillsAndAdjustment) AS total_fees , sum(TotalAmount) AS total_amount FROM  tbl_transaction where ReferenceNo='.$refnum.'';
    $result = 'SELECT  sum(CapitalShare) as capitalshare ,
    sum(Others) as others,
    sum(Surcharges) as freeSurcharges,
    sum(TranformerRental  + BOMdivagma +BillsAndAdjustment) AS total_fees , 
    sum(TotalAmount) AS total_amount ,
    sum(TotalAmount * 0.018) AS Convinience_Fee, 
    sum(TotalAmount +TotalAmount * 0.018) as total_txn_amount FROM  tbl_transaction where ReferenceNo=' . $refnum . '';


    $data = $this->db->query($result);
    return $data->row_array() ? $data->row_array() : false;
  }

  public function transactionref_data($refnum)
  {
    // $query = $this->db->get( 'tbl_iselco_data' );
    // return $query->result();
    // $qry = 'select * from tbl_transaction WHERE ReferenceNo = '.$refnum.' and PaymentStatus= "PAID" ';
    // $Q = $this->db->query($qry);

    $sql = "select * from tbl_transaction where ReferenceNo like ? and PaymentStatus= 'PAID' ";
    $Q = $this->db->query($sql, $refnum);
    return $Q->row_array() ? $Q->row_array() : false;

    // $result = 'SELECT UnpaidMonth FROM tbl_transaction where ReferenceNo=' . $refnum . ' AND PaymentStatus= "PAID"';
    // $data = $this->db->query($result);
    // return $data->row_array() ? $data->result_array() : false;
    // return $Q->row_array() ? $Q->result_array() : false;
  }

  public function unpaidmonth_data($refnum)
  {
    // $query = $this->db->get( 'tbl_iselco_data' );
    // return $query->result();
    $result = 'SELECT UnpaidMonth FROM tbl_transaction where ReferenceNo=' . $refnum . '';
    $data = $this->db->query($result);
    return $data->row_array() ? $data->result_array() : false;
  }

  public function  validateActNumber($actNumber)
  {
    $sql = "select * from tbl_iselco_data where AccountNumber like ?  ";
    $Q = $this->db->query($sql, $actNumber['accountNumber']);
    return $Q->row_array() ? $Q->row_array() : false;
  }

  public function insert_unpaid_month($unpaid_month, $datapost)
  {
    // Check if the record already exists
    // $this->db->where('UnpaidMonth', $unpaid_month['UnpaidMonth']);
    $this->db->where('AccountNumber', $datapost['external_id']);
    $this->db->where('BillNumber', $unpaid_month['BillNumber']);
    $this->db->where('PaymentStatus', 'PAID');
    $query = $this->db->get('tbl_transaction');

    if ($query->num_rows() == 0) {
      // Record doesn't exist, insert it
            $Conv_Fee=$unpaid_month['TotalAmount'] * 0.018;

            $TotalAmtTxn=$unpaid_month['TotalAmount'] +$Conv_Fee;


              $data = array(
                'UnpaidMonth' => $unpaid_month['UnpaidMonth'],
                'AccountNumber' => $unpaid_month['AccountNumber'],
                'ConsumerName' => $unpaid_month['ConsumerName'],
                'Address' => $unpaid_month['Address'],
                'AccountStatus' => $unpaid_month['AccountStatus'],
                'Others' => $unpaid_month['Others'],
                'TranformerRental' => $unpaid_month['TranformerRental'],
                'CapitalShare' => $unpaid_month['CapitalShare'],
                'Surcharges' => $unpaid_month['Surcharges'],
                'BOMdivagma' => $unpaid_month['BOMdivagma'],
                'BillsAndAdjustment' => $unpaid_month['BillsAndAdjustment'],
                'TotalAmount' => $unpaid_month['TotalAmount'],
                'ConsumerType' => $unpaid_month['ConsumerType'],
                'ReferenceNo' => $datapost['txn_ref'],
                'Email' => $datapost['email_address'],
                'Phone' => $datapost['mobile_number'],
                'PaymentStatus' => "CREATED",
                'DatePaid' => date('Y-m-d H:i:s'),
                'ConvinienceFee' => $Conv_Fee,
                'TotalAmtTxn' => $TotalAmtTxn,
                'BillNumber' => $unpaid_month['BillNumber'],
                'MeterNumber' => $unpaid_month['MeterNumber']
              );



              $this->db->insert('tbl_transaction', $data);
              return false;
    } 
    else {
      return true;
    }
  }



  public function unpaid_client($data)
  {


    $qry = 'select * from tbl_iselco_data where AccountNumber like ? and PaymentStatus = "UNPAID"  ';
    $Q = $this->db->query($qry, $data);
    return $Q->row_array() ? $Q->result_array() : false;
  }






  public function  validateupnpaidmonth($actNumber)
  {
    $sql = 'select UnpaidMonth from tbl_iselco_data where AccountNumber like ? and PaymentStatus = "UNPAID"  ';
    $Q = $this->db->query($sql, $actNumber['accountNumber']);
    return $Q->row_array() ? $Q->result_array() : false;
  }

  public function validateActNumberInIselcoTable($datapost)
  {

    $qry = 'select * from tbl_iselco_data where AccountNumber like ? limit 0,1';
    $Q = $this->db->query($qry, $datapost);
    return $Q->row_array() ? $Q->result_array() : false;
  }
  public function validateActNumberInTransactionTable($data)
  {

    $qry = 'select * from tbl_transaction where AccountNumber like ? limit 0,1';
    $Q = $this->db->query($qry, $data);
    return $Q->row_array() ? $Q->result_array() : false;
  }


  // insert_unpaid_month( $item,  $datapost['external_id'] 

  public function total_amount_fees($data)
  {

    $qry = "SELECT   sum(TotalAmount) AS total_amount FROM  db_iselco.tbl_transaction where AccountNumber='" . $data . "' ";
    $Q = $this->db->query($qry);

    return $Q->row_array() ? $Q->result_array() : false;
  }



  public function total_fees($data)
  {



    $qry = "SELECT  
    sum(TranformerRental) as Tranformer_Rental,
    sum(BOMdivagma) as BOMdivagma,
    sum(BillsAndAdjustment) as BillsAndAdjustment,
    sum(CapitalShare) as capitalshare ,
    sum(Others) as others,
    sum(Surcharges) as freeSurcharges,
    sum(TranformerRental  + BOMdivagma + BillsAndAdjustment) AS total_fees , 
    sum(TotalAmount) AS total_amount ,
    sum(TotalAmount * 0.018) AS Convinience_Fee, 
    sum(TotalAmount +TotalAmount * 0.018) as total_txn_amount
     FROM  db_iselco.tbl_iselco_data where AccountNumber='" . $data . "' AND PaymentStatus='UNPAID'";
    $Q = $this->db->query($qry);

    return $Q->row_array() ? $Q->row_array() : false;
  }


  public function validate_client($data)
  {
    $qry = 'select * from tbl_iselco_data where AccountNumber like ? limit 0,1';
    $Q = $this->db->query($qry, $data);
    return $Q->row_array() ? $Q->row_array() : false;
  }
  public function insertApiLogs($data)
  {
    $lastId = $this->db->insert_id($this->db->insert('api_logs', $data));
    return $lastId;
  }
  public function summaryTransaction($data)
  {
    $lastId = $this->db->insert_id($this->db->insert('tbl_transaction_summary', $data));
    return $lastId;
  }
     public function transaction_log( $data ) 
     {
    
            $lastId = $this->db->insert_id( $this->db->insert( 'transactions', $data ) );
            return $lastId;
        }
    
        public function doUpdateApilogs( $update, $where ) {
    
            $this->db->where( 'api_id', $where )->update( 'api_logs', $update );
            return $this->db->affected_rows();
        }


  /////----------call back

  public function finddata($data)
  {
    $qry = 'select * from tbl_callback where reference_number like ? ';
    $Q = $this->db->query($qry, $data);
    return $Q->row_array() ? $Q->result_array() : false;
  }

  public function doInsertCallback($data)
  {

    $lastId = $this->db->insert_id($this->db->insert('tbl_callback', $data));
    return    $lastId;
  }
  public function updateTransaction($update, $where)
  {

    $this->db->where('ReferenceNo', $where)->update('  tbl_transaction', $update);
    return $this->db->affected_rows();
  }



  function summary_transaction_changes($update, $where){

    $this->db->where('ReferenceNo', $where)->update('tbl_transaction_summary', $update);
    return $this->db->affected_rows();



  }

  public function do_update_iselco_status($where){
    $update['PaymentStatus']='PAID';

    $this->db->where('BillNumber', $where)->update('tbl_iselco_data', $update);
    return $this->db->affected_rows();

  }


}
