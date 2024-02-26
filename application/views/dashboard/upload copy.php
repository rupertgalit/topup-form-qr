<?php $this->load->view('dash-partial/header'); ?>

<body>
<div class="loader-wrapper">
    <div class="loader"></div>
  </div>

   <div id="wrapper">
      <!-- Navigation-->
      <?php $this->load->view('dash-partial/nav'); ?>

      <div id="page-wrapper">
         <div class="row">
            <div class="col-lg-12">
               <div class="welcome-message">
                  <p>Welcome, <?= $this->session->userdata('fullname'); ?></p>
               </div>
               <h1 class="page-header">Upload Data</h1>
            </div> <!-- /.col-lg-12 -->
         </div>
         <div class="row">
            <form class="file-upload-form" action="<?= base_url('/excel/getfile') ?>" method="post" enctype="multipart/form-data">
               <div class="file-container">

                  <label for="excel" class="file-label">
                     <input type="file" id="excel" name="excel" accept="text/csv" required style="display: none;" onchange="displayFileName(this)">
                     <span class="file-button"> <i class="fa fa-upload"></i> Choose File</span>

                  </label>

               </div>
               <button type="submit" name="import" class="import-button"><i class="fa fa-download"></i> Import</button>
               <span id="file-name-display" style="margin-left: 1rem; margin-bottom: 1rem;"></span>
            </form>
         </div>


         <!-- /.row -->
         <div class="row">
            <div class="col-lg-12">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     Table for Uploaded Data
                  </div>
                  <div class="panel-body">
                     <div class="table-container">

                        <form action="<?= base_url('upload') ?>" method="post">
                           <div class="form-group">
                              <label for="startDate" class="date-label">Start Date:</label>
                              <div class="input-group date date-input-group" id="startDatePicker">
                                 <input type="date" class="form-control" name="startDate" id="startDate" style="z-index: 2" placeholder="YYYY / MM / DD" value="<?php echo date('Y-m-d'); ?>" >

                              </div>

                              <label for="endDate" class="date-label">End Date:</label>
                              <div class="input-group date date-input-group" id="endDatePicker">
                                 <input type="date" class="form-control" name="endDate" id="endDate" placeholder="YYYY / MM / DD" value="<?php echo date('Y-m-d'); ?>" >

                              </div>
                              <button type="submit" class="button-select"><i class="fa fa-arrow-right"></i> Select</button>

                           </div>
                        </form>
                     </div>


                     <div class="table-responsive">

                        <div>
                           <?php if (!empty($result)) { ?>
                              <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th>AccountNumber</th>
                                       <th>ConsumerName</th>
                                       <th>Address</th>
                                       <th>AccountStatus</th>
                                       <th>UnpaidMonth</th>
                                       <th>Others</th>
                                       <th>TranformerRental</th>
                                       <th>CapitalShare</th>
                                       <th>Surcharges</th>
                                       <th>BOMdivagma</th>
                                       <th>BillsAndAdjustment</th>
                                       <th>TotalAmount</th>
                                       <th>ConsumerType</th>
                                       <th>PaymentStatus</th>
                                       <th>BillNumber</th>
                                       <th>MeterNumber</th>
                                       <th>UploadDate</th>
                                       <!-- <th>BillNumber </th> -->
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach ($result as $row) : ?>
                                       <tr class="odd">
                                          <td>
                                             <?php echo $row['AccountNumber']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['ConsumerName']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['Address']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['AccountStatus']; ?>
                                          </td>
                                        
                                          <td class="center">
                                             <?php echo $row['UnpaidMonth']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['Others']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['TranformerRental']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['CapitalShare']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['Surcharges']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['BOMdivagma']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['BillsAndAdjustment']; ?>
                                          </td>
                                          
                                          <td>
                                             <?php echo $row['TotalAmount']; ?>
                                          </td>
                                       
                                          <td>
                                             <?php echo $row['ConsumerType']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['PaymentStatus']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['BillNumber']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['MeterNumber']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['Created_at']; ?>
                                          </td>

                                       </tr>

                                    <?php endforeach; ?>
                                 </tbody>
                              </table>

                           <?php } else { ?>
                              <p>No data available</p>
                           <?php } ?>

                        </div>
                     </div>



                  </div>
               </div>
            </div>
         </div>


         <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
         <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.2.0/metisMenu.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/timelinejs/2.36.0/js/timeline-min.js"></script>
         <script src="<?= base_url("/assets/js/datatables.js"); ?>"></script>
         <script src="<?= base_url("/assets/js/table.js"); ?>"></script>
         <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
         <script src="//cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
         <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
         <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

         <script>
            function displayFileName(input) {
               var fileNameDisplay = document.getElementById('file-name-display');

               if (input.files[0].type != "text/csv") {
                  input.value = ""
                  fileNameDisplay.innerHTML = '<span style="color: #dc143c;">Please select a .csv file</span>';
                  return
               }

               fileNameDisplay.innerHTML = input.files[0].name;
            }
         </script>

         <script>
            const loader = document.querySelector(".loader-wrapper");
            loader.style.display = "flex";

            setTimeout(function() {
               loader.style.display = "none";
            }, 800); 
         </script>

            <script>



            </script>

         



</body>

</html>