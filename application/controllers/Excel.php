<?php

use PHPUnit\Framework\Constraint\IsEmpty;

defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'excelReader/SpreadsheetReader.php');

class Excel extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('model_repo');
  }

  public function index()
  {
    date_default_timezone_set('Asia/Manila');
    $data['rows'] = $this->model_repo->select_all_data();

    $this->load->model('model_repo');
    // Load the model

    // Fetch data from the model
    $data['result'] = $this->model_repo->get_users();

    // Check if any rows are returned
    if (!empty($data['result'])) {
      // Data found, load the view with the table
      $this->load->view('excel', $data);
    } else {

      $this->load->view('excel', $data);
    }
  }

  public function getfile()
  {

    // inser missing rows

    $fileName = $_FILES['excel']['name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $newFileName = date('Y.m.d') . ' - ' . date('h.i.sa') . '.' . $fileExtension;
    $targetDirectory = 'uploads/' . $newFileName;
    if (strtolower($fileExtension) == 'csv') {

      echo "
        <html>
            <head>
              <title>Iselco daily upload</title>
              <style>
                * {
                  box-sizing: border-box;
                }
                body {
                  margin: 0;
                  padding: 0;
                }
                body > div {
                  color: #fff;
                  backdrop-filter: brightness(0.5);
                  height: 100%;
                  width: 100%;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  border: 1px #000 solid;
                }
                body > div > div {
                  height: max-content;
                  width: 30rem;
                  display: flex;
                  flex-direction: column;
                  justify-content: center;
                  align-items: center;
                  font-size: 1.2rem;
                  padding: 1rem 1.2rem;
                }

                    body > div > div > spinner {
                  width: 5rem;
                  height: 5rem;
                  border-radius: 6rem;
                  border: 0.15rem #fff solid;
                  border-bottom: 0;
                  border-right: 0;
                  margin-bottom: 1rem;
                  animation: infinite loader 1s;
                }

                    body > div > div > progressBar {
                  width: 70%;
                  height: 1.2rem;
                  border: 1px #fff solid;
                }

                    body > div > div > progressBar > process {
                  display: block;
                  width: 0;
                  height: 100%;
                  background-color: aqua;
                  transition: all 300ms;
                }

                    body > div > div > p > span:last-child {
                  opacity: 0.6;
                  transition: all 5 00ms;
                  animation: infinite breathing-1 800ms;
                }

                    body > div > div > p > span:nth-child(2) {
                  opacity: 0.4;
                  transition: all 5 00ms;
                  animation: infinite breathing-2 800ms;
                }

                    body > div > div > p > span:first-child {
                  opacity: 0.2;
                  transition: all 5 00ms;
                  animation: infinite breathing-3 800ms;
                }

                    @keyframes breathing-1 {
                  20% {
                    opacity: 0.4;
                  }
                  40% {
                    opacity: 0.6;
                  }
                  60% {
                    opacity: 0.8;
                  }
                  80% {
                    opacity: 1;
                  }
                  100% {
                    opacity: 0.2;
                  }
                }
                @keyframes breathing-2 {
                  20% {
                    opacity: 0.6;
                  }
                  40% {
                    opacity: 0.8;
                  }
                  60% {
                    opacity: 1;
                  }
                  80% {
                    opacity: 0.2;
                  }
                  100% {
                    opacity: 0.4;
                  }
                }
                @keyframes breathing-3 {
                  20% {
                    opacity: 0.8;
                  }
                  40% {
                    opacity: 1;
                  }
                  60% {
                    opacity: 0.2;
                  }
                  80% {
                    opacity: 0.4;
                  }
                  100% {
                    opacity: 0.6;
                  }
                }

                    @keyframes loader {
                  12.5% {
                    transform: rotate(45deg);
                  }
                  25% {
                    transform: rotate(90deg);
                  }
                  37.5% {
                    transform: rotate(135deg);
                  }
                  50% {
                    transform: rotate(180deg);
                  }
                  62.5% {
                    transform: rotate(225deg);
                  }
                  75% {
                    transform: rotate(270deg);
                  }
                  87.5% {
                    transform: rotate(315deg);
                  }
                  100% {
                    transform: rotate(360deg);
                  }
                }
              </style>
            </head>
            <body>
              <div>
                <div>
                  <spinner style='display:none;'></spinner>
                  <progressBar><process></process></progressBar>
                  <p>Inserting data by batch, please be patient <span>.</span><span>.</span><span>.</span></p>
                  <!-- <p>Reading excel data <span>.</span><span>.</span><span>.</span></p>
                  <p>Uploading data by batch into database, please be patient <span>.</span><span>.</span><span>.</span></p>
                  <p>Uploading data by batch into database, please be patient <span>.</span><span>.</span><span>.</span></p> -->
                </div>
              </div>
            </body>
        </html>
                  ";

      // Valid CSV file, process the upload

      move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);
      echo "<script>console.log('entered')</script>";

      $csv_file = fopen($targetDirectory, 'r');
      $header = fgetcsv($csv_file);
      $rows = explode("\n", file_get_contents($targetDirectory));
      $insert_data = array();

      if ($csv_file !== false) {
        $temp_count = 0;
        $insert_data = array();

        while (($read_data = fgetcsv($csv_file, 100000, ',')) !== false) {          
          $temp_count++;

          if ($read_data[3] != 'ACTIVE') {
            continue;
          }
          $chkb = $this->model_repo->check_billing_no(str_replace(' ', '', $read_data[14].$read_data[0].$read_data[4]));

          //  echo $read_data[ 14 ].','. $read_data[ 0 ].json_encode($chkb).'<br>'; 

          if ($chkb == true) {
           
            $log = array(
              'AccountNumber' => $read_data[0],
              'ConsumerName' => $read_data[1],
              'Address' => $read_data[2],
              'AccountStatus' => $read_data[3],
              'UnpaidMonth' => $read_data[4],
              'Others' => $read_data[5],
              'TranformerRental' => $read_data[6],
              'CapitalShare' => $read_data[7],
              'Surcharges' => $read_data[8],
              'BOMdivagma' => $read_data[9],
              'BillsAndAdjustment' => $read_data[10],
              'TotalAmount' => $read_data[11],
              'ConsumerType' => $read_data[12],
              'PaymentStatus' => $read_data[13],              
              'BillNumber' => str_replace(' ', '', $read_data[14].$read_data[0].$read_data[4]),
              'MeterNumber' => $read_data[15],
              'Created_At' => date('Y-m-d')
            );
           
            $this->db->insert('duplicate_iselco_data', $log);
            continue;
          } else {


            $insert_row = array(
              'AccountNumber' => $read_data[0],
              'ConsumerName' => $read_data[1],
              'Address' => $read_data[2],
              'AccountStatus' => $read_data[3],
              'UnpaidMonth' => $read_data[4],
              'Others' => $read_data[5],
              'TranformerRental' => $read_data[6],
              'CapitalShare' => $read_data[7],
              'Surcharges' => $read_data[8],
              'BOMdivagma' => $read_data[9],
              'BillsAndAdjustment' => $read_data[10],
              'TotalAmount' => $read_data[11],
              'ConsumerType' => $read_data[12],
              'PaymentStatus' => $read_data[13],              
              'BillNumber' => str_replace(' ', '', $read_data[14].$read_data[0].$read_data[4]),
              'MeterNumber' => $read_data[15],
              'Created_At' => date('Y-m-d')
            );
            array_push($insert_data, $insert_row);

            echo "<script>document.querySelector('process').style.width = '" . (($temp_count / count($rows)) * 100) . "%';</script>";
            if ($temp_count % 1000 == 0 || $temp_count == (count($rows) - 3)) {
              // Check for errors
              $this->db->insert_batch('tbl_iselco_data', $insert_data);
              if ($this->db->affected_rows() > 0) {
                //  echo "<br>New records created successfully - " . $temp_count;
                $insert_data = array();
              } else {
                echo "Error: " . $this->db->error();
              }
            }
          }
        }
        echo "<script>document.querySelector('process').style.width = '100%';</script>";
        sleep(5);
        fclose($csv_file);
        $this->db->close();
      }
      

      if ($temp_count)
        $alert = "alert('Successfully Imported.')";
      else
        $alert = "alert('All date already exist.')";


      echo "
        <script>
        setTimeout(()=> {
        document.querySelector('progressBar').setAttribute('style','display:none;')
        document.querySelector('spinner').removeAttribute('style')
        document.querySelector('p').innerHTML = 'Redirecting to " . base_url('/upload') . " <span>.</span><span>.</span><span>.</span>'
        setTimeout(()=>{
            $alert;
            window.location.href = '" . base_url('/upload') . "';
          }
          ,2000)
        },2000);
        </script>
      ";








      //   error_reporting(0);
      //   ini_set('display_errors', 0);
      //   $per_batch = 3000;

      //   try {
      //     $reader = new SpreadsheetReader($targetDirectory);
      //   } catch (Exception $e) {
      //     show_error('Error loading the Excel file: ' . $e->getMessage());
      //   }



      //   // Count the number of rows
      //   $rows = iterator_count($reader);
      //   $total_batch = ($rows / $per_batch);
      //   $per_batch_excess = ($rows % $per_batch) - 1;

      //   // Display the count
      //   // echo 'Number of rows in the Excel file: ' . $rowCount;

      //   $batch_collection = array();
      //   $data_inserted = false;
      //   $batch_done = 0;

      //   /// target disco dont insert
      //   foreach ($reader as $key => $row) {
      //     if ($key == 0) {
      //       continue;
      //     }

      //     $billNo = $this->model_repo->check_billing_no($row[14]);

      //     $data['AccountNumber'] = $row[0];
      //     $data['ConsumerName'] = $row[1];
      //     $data['Address'] = $row[2];
      //     $data['AccountStatus'] = $row[3];
      //     $data['UnpaidMonth'] = $row[4];
      //     $data['Others'] = $row[5];
      //     $data['TranformerRental'] = $row[6];
      //     $data['CapitalShare'] = $row[7];
      //     $data['Surcharges'] = $row[8];
      //     $data['BOMdivagma'] = $row[9];
      //     $data['BillsAndAdjustment'] = $row[10];
      //     $data['TotalAmount'] = $row[11];
      //     $data['ConsumerType'] = $row[12];
      //     $data['PaymentStatus'] = $row[13];
      //     $data['BillNumber'] = $row[14];
      //     $data['MeterNumber'] = $row[15];


      //     if (!$billNo && $row[3] == "ACTIVE" && $row[13] != "PAID") {
      //       $data_inserted = true;
      //       array_push($batch_collection, $data);

      //       if ($batch_collection == $per_batch) {
      //         $this->db->insert_batch('tbl_iselco_data', $batch_collection, $per_batch);
      //         $batch_collection = array();
      //       }
      //     }

      //     if (count($batch_collection) > 0 && $key == $rows - 2) {
      //       $this->db->insert_batch('tbl_iselco_data', $batch_collection, $per_batch);
      //       break;
      //     }


      //     if ($row[0] == "")
      //       break;
      //   }


      //   if ($data_inserted)
      //     echo "
      //                <script>
      //                    alert('Successfully Imported.');
      //                    window.location.href = '" . base_url('/upload') . "';
      //                </script>
      //            ";
      //   else
      //     echo "
      //      <script>
      //          alert('All data already exist.');
      //          window.location.href = '" . base_url('/upload') . "';
      //      </script>
      //  ";


      // }
      //  else {

      //   echo " 
      //      <script>
      //          alert('Invalid file type. Please upload a CSV file." . $targetDirectory . "');
      //          window.location.href = '" . base_url('/upload') . "';
      //      </script>
      //  ";

    }
  }
}
