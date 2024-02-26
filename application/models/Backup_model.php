<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup_model extends CI_Model {
    
    public function migrate_data() {
        $selectQuery = "INSERT INTO tbl_iselco_data_backup (islc_id, AccountNumber,ConsumerName, Address,AccountStatus,UnpaidMonth,Others,TranformerRental,CapitalShare,Surcharges,BOMdivagma,BillsAndAdjustment,TotalAmount,ConsumerType,PaymentStatus,BillNumber,MeterNumber,Created_at) 
                        SELECT islc_id, AccountNumber,ConsumerName, Address,AccountStatus,UnpaidMonth,Others,TranformerRental,CapitalShare,Surcharges,BOMdivagma,BillsAndAdjustment,TotalAmount,ConsumerType,PaymentStatus,BillNumber,MeterNumber,Created_at 
                        FROM tbl_iselco_data";

        $deleteQuery = "DELETE FROM tbl_iselco_data";

        // Step 2: Execute queries
        $this->db->query($selectQuery);
        $this->db->query($deleteQuery);
    }


}
?>