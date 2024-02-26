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
          <h1 class="page-header">Transaction Summary</h1>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              Summary of Transactions
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





              </div>


              <div>
                <?php if (!empty($records)) { ?>
                  <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Account No</th>
                        <th>Account Name </th>
                        <th>Address </th>
                        <th>Mobile No </th>
                        <th>Email </th>

                        <th>Unpaid Month</th>
                        <th>AccountStatus</th>
                        <th>ConsumerType</th>
                        <th>Fees</th>

                        <th>CapitalShare</th>
                        <th>Penalties</th>
                        <th>Other Charges</th>

                        <!-- <th>TotalAmount</th>                -->
                        <th>ConvinienceFee</th>
                        <th>TotalAmtTxn</th>
                        <th>ReferenceNo</th>
                        <th>PaymentStatus</th>
                        <th>Date Paid</th>

                        <th>BillNumber</th>
                        <th>MeterNumber</th>
                        <th>TxId</th>


                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($records as $row) : ?>
                        <tr class="odd">
                          <td>
                            <?php echo $row['smry_id']; ?>
                          </td>
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
                            <?php echo $row['Phone']; ?>
                          </td>
                          <td>
                            <?php echo $row['Email']; ?>
                          </td>


                          <td>
                            <?php echo $row['UnpaidMonth']; ?>
                          </td>
                          <td class="center">
                            <?php echo $row['AccountStatus']; ?>
                          </td>
                          <td class="center">
                            <?php echo $row['ConsumerType']; ?>
                          </td>
                          <td>
                            <?php echo $row['fees']; ?>
                          </td>

                          <td>
                            <?php echo $row['CapitalShare']; ?>
                          </td>
                          <td>
                            <?php echo $row['Surcharges']; ?>
                          </td>
                          <td>
                            <?php echo $row['Others']; ?>
                          </td>

                          <td>
                            <?php echo $row['ConvinienceFee']; ?>
                          </td>
                          <td>
                            <?php echo $row['TotalAmtTxn']; ?>
                          </td>
                          <td>

                            <?php echo $row['ReferenceNo']; ?>
                          </td>
                          <td>
                            <?php echo $row['PaymentStatus']; ?>
                          </td>
                          <td>
                            <?php echo $row['DatePaid']; ?>
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
          var dateColumnIndex = 17;
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

  <script>
    const loader = document.querySelector(".loader-wrapper");
    loader.style.display = "flex";

    setTimeout(function() {
      loader.style.display = "none";
    }, 800);
  </script>





</body>

</html>