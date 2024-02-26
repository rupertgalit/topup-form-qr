<?php $this->load->view('dash-partial/header'); ?>

<body>
   <div class="loader-wrapper">
      <div class="loader"></div><br>
      <span class="message" hidden>Uploading file ...</span>
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

         <div >
            <h5 class="alert alert-success">Take note! Backup first before uploading!</h5>
         <form class="file-upload-form" action="<?= base_url('/backup/migrate') ?>" method="post" enctype="multipart/form-data">
              
              <button type="submit" name="import" class="import-button"><i class="fa fa-download"></i> Backup</button>
              <span  style="margin-left: 1rem; margin-bottom: 1rem;color:darkred"><?= $this->session->flashdata('success');?></span>
           </form>
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
                        <div class="form-group">
                           <label for="startDate" class="date-label">Start Date:</label>
                           <div class="input-group date date-input-group" id="startDatePicker">
                              <input type="text" class="form-control" name="startDate" id="startDate" style="z-index: 2" readonly placeholder="YYYY / MM / DD">
                              <span class="input-group-addon" id="startDateIcon">
                                 <i class="glyphicon glyphicon-calendar"></i>
                              </span>
                           </div>

                           <label for="endDate" class="date-label">End Date:</label>
                           <div class="input-group date date-input-group" id="endDatePicker">
                              <input type="text" class="form-control" name="endDate" id="endDate" readonly placeholder="YYYY / MM / DD">
                              <span class="input-group-addon" id="endDateIcon">
                                 <i class="glyphicon glyphicon-calendar"></i>
                              </span>
                           </div>
                        </div>
                        <table id='dataTables-example' class='table table-striped table-bordered table-hover'>
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
                              </tr>
                           </thead>
                           <tbody>
                              <!-- <tr>
                                 <td colspan='16'>Collecting data ...</td>
                              </tr> -->
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>






         <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
         <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
         <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
         <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.2.0/metisMenu.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/timelinejs/2.36.0/js/timeline-min.js"></script>
         <script src="<?= base_url("/assets/js/datatables.js"); ?>"></script>
         <script src="<?= base_url("/assets/js/table.js"); ?>"></script>
         <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
         <!-- <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
         <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script> -->
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

            $("form").on('submit', (e) => {
               $('.loader-wrapper .message').prop("hidden", false);
               loader.style.display = "flex";
            })
            const loader = document.querySelector(".loader-wrapper");
            loader.style.display = "flex";

            // setTimeout(function () {
            //    loader.style.display = "none";
            // }, 800); // 
         </script>
         <script>
            $(document).ready(async function() {
               const start = new Date();
               console.log("Start: ", start);

               // Fetch data using AJAX
               const {
                  data
               } = await fetch("<?= base_url() ?>/api/all_iselco_data")
                  .then(async (res) => res.json())
                  .catch((e) => {
                     console.log(e);
                     return [];
                  });
               console.log(data);

               // Set default values for start and end date
               function getCurrentDate() {
                  const today = new Date();
                  const year = today.getFullYear();
                  const month = (today.getMonth() + 1).toString().padStart(2, '0');
                  const day = today.getDate().toString().padStart(2, '0');
                  return `${year}-${month}-${day}`;
               }

               // Set default values for start and end date
               $('#startDate').val(getCurrentDate());
               $('#endDate').val(getCurrentDate());

               // Initialize datepicker
               $('#startDate, #endDate').datepicker({
                  format: 'yyyy-mm-dd',
                  autoclose: true,
                  todayHighlight: true,
                  clearBtn: true,
                  orientation: 'bottom',
               });

               // Initialize DataTable with initial filtering
               var table = await $('#dataTables-example').DataTable({
                  dom: '<"pull-left"b><"pull-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
                  scrollX: '300px',
                  scrollCollapse: true,
                  columns: [{
                        "data": "AccountNumber"
                     },
                     {
                        "data": "ConsumerName"
                     },
                     {
                        "data": "Address"
                     },
                     {
                        "data": "AccountStatus"
                     },
                     {
                        "data": "UnpaidMonth"
                     },
                     {
                        "data": "Others"
                     },
                     {
                        "data": "TranformerRental"
                     },
                     {
                        "data": "CapitalShare"
                     },
                     {
                        "data": "Surcharges"
                     },
                     {
                        "data": "BOMdivagma"
                     },
                     {
                        "data": "BillsAndAdjustment"
                     },
                     {
                        "data": "TotalAmount"
                     },
                     {
                        "data": "ConsumerType"
                     },
                     {
                        "data": "PaymentStatus"
                     },
                     {
                        "data": "BillNumber"
                     },
                     {
                        "data": "MeterNumber"
                     },
                     {
                        "data": "Created_at"
                     },
                  ],
                  data,
               });

               $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                  var startDate = $('#startDate').val();
                  var endDate = $('#endDate').val();
                  var dateColumnIndex = 16; 
                  var currentDate = data[dateColumnIndex];

                  if (
                     (startDate === '' && endDate === '') ||
                     (startDate === '' && currentDate <= endDate) ||
                     (startDate <= currentDate && endDate === '') ||
                     (startDate <= currentDate && currentDate <= endDate)
                  ) {
                     return true;
                  }

                  return false;
               });

               table.draw();

               $('#startDate, #endDate').on('change', function() {
                  table.draw();
               });

               loader.style.display = "none";
               const end = new Date();
               console.log("End: ", end);
               console.log(
                  "rows ",
                  data?.length.toLocaleString(),
                  ", interval: ",
                  (end.getTime() - start.getTime()) / 1000
               );
            });
         </script>
         <script>
            $(document).ready(function() {
               $("#startDateIcon").click(function() {
                  $("#startDate").focus();
               });

               $("#endDateIcon").click(function() {
                  $("#endDate").focus();
               });
            });
         </script>

</body>

</html>