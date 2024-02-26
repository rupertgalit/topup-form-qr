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
          <h1 class="page-header">Transactions</h1>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              List of Transactions
            </div>
            <!-- /.panel-heading -->

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

                <div class="table-container">

                  <div>
                    <?php if (!empty($records)) { ?>
                      <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Reference No</th>
                            <th>Account No </th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Unpaid Month</th>
                            <th>Account Status</th>
                            <th>Consumer Type</th>
                            <th>Other Fees</th>
                            <th>Tranformer Rental</th>
                            <th>Surcharges</th>
                            <th>BOMdivagma</th>
                            <th>Bills And Adjustment</th>
                            <th>Total</th>
                            <th>Date Paid</th>
                            <th>Status</th>
                            <th>Bill Number</th>
                            <th>Meter Number</th>
                            <th>TxId</th>
                            <!-- <th>BillNumber </th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($records as $row) : ?>
                            <tr class="odd">
                              <td>
                                <?php echo $row['TransId']; ?>
                              </td>
                              <td>
                                <?php echo $row['ReferenceNo']; ?>
                              </td>
                              <td>
                                <?php echo $row['AccountNumber']; ?>
                              </td>
                              <td>
                                <?php echo $row['ConsumerName']; ?>
                              </td>
                              <td class="center">
                                <?php echo $row['Address']; ?>
                              </td>
                              <td class="center">
                                <?php echo $row['UnpaidMonth']; ?>
                              </td>
                              <td>
                                <?php echo $row['AccountStatus']; ?>
                              </td>
                              <td>
                                <?php echo $row['ConsumerType']; ?>
                              </td>
                              <td>
                                <?php echo $row['Others']; ?>
                              </td>
                              <td>
                                <?php echo $row['TranformerRental']; ?>
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
                                <?php echo $row['DatePaid']; ?>
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
                                <?php echo $row['TxId']; ?>
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
                <!-- /.table-responsive -->
              </div>
              <!-- /.panel -->
            </div>
            <!-- /.panel-body-->
          </div>

          <!-- /.panel-footer-->
        </div>
        <!-- /.panel .chat-panel-->
      </div>
      <!-- /.col-lg-4-->
    </div>
    <!-- /.row-->
  </div>
  <!-- /#page-wrapper-->
  </div>
  <!-- /#wrapper-->



  <?php $this->load->view('dash-partial/footer'); ?>




  <script>
    $(document).ready(function() {
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
      var table = $('#dataTables-example').DataTable({
        scrollX: '90%',
        scrollCollapse: true,
        dom: 'Bfrtip',
        buttons: [{
          extend: 'excelHtml5',
          text: '<i class="fa fa-download"></i> Export',
          className: 'export-button',
        }]
      });

      $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
          var startDate = $('#startDate').val();
          var endDate = $('#endDate').val();
          var dateColumnIndex = 14;
          var currentDate = data[dateColumnIndex].split(' ')[0];

          if ((startDate === '' && endDate === '') ||
            (startDate === '' && currentDate <= endDate) ||
            (startDate <= currentDate && endDate === '') ||
            (startDate <= currentDate && currentDate <= endDate)) {
            return true;
          }

          return false;
        }
      );

      // Trigger initial table draw
      table.draw();

      // Update table on date change
      $('#startDate, #endDate').on('change', function() {
        table.draw();
      });
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


  </script>

  <script>
    const loader = document.querySelector(".loader-wrapper");
    loader.style.display = "flex";

    setTimeout(function() {
      loader.style.display = "none";
    }, 800); // 
  </script>





</body>

</html>