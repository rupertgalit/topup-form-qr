<?php
$external_id = rand(000, 999) . date('Ymd') . date('His');

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Payment Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?= base_url("/assets/images/updated_logo.png"); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url("/assets/css/form.css"); ?>">
</head>

<body>

 
 



  <div class="container mt-5 d-flex justify-content-center">
    <div class="payment-form bg-white p-4 rounded shadow-sm mx-auto" style=" transform: scale(0.85)!important;">
      <h4 class="font-weight-bold text-center mb-4">PAYMENT TOPUP</h4>
      <div id="Message" class="text-danger text-center mt-2 hold-transition  animate__animated animate__zoomIn animate__faster text-bold" style="display: none; font-size: 15px;margin-top:-1.5rem!important;"></div>
      <form action="#" method="post" id="myForm" autocomplete="off">
        <div class="form-group">

          <input type="hidden" id="accountNumber" name="accountNumber" class="accountnumber" value="<? $external_id ?>" placeholder="9 digits account number" required maxlength="9" style="cursor:pointer;" readonly>
          <label for="accountNumber" class="accountnumberlabel" hidden>Account Number</label>
          <label for="accountNumber" class="input-message">Invalid account number</label>
          <div class="loading-icon" style="display: none;">
            <img src="<?= base_url("/assets/images/loading.gif"); ?>" alt="Loading..." width="20px" height="20px">
          </div>
        </div>


        </button>
        <div class="form-group">
          <input type="text" id="email" name="email" class="email"  required>
          <label for="email" class="emaillabel">Merchant Name </label>
        </div>
        <!-- <div class="form-group">
          <input type="number" id="phone" name="amount" class="phone" title="Please enter only numeric values" required>
          <label for="phone" class="phonelabel">Amount</label>
        </div> -->
        <!-- <div class="form-group">
          <input type="tel" id="phone" name="phone" class="phone" pattern="[0-9]+" title="Please enter only numeric values" minlength="10" maxlength="15" style="cursor: not-allowed;" required>
          <label for="phone" class="phonelabel">Phone Number</label>
        </div> -->
        <!-- <div class="form-group">
          <input type="text" id="accountName" name="accountName" class="form-control" style="cursor: not-allowed;"
            required disabled>
          <label for="accountName">Account Name</label>
        </div> -->

     

        <!-- <div class="form-group">
          <input type="text" id="billingPeriod" name="billingPeriod" class="form-control" style="cursor: not-allowed;"
            required disabled>
          <label for="billingPeriod">Billing Period</label>
        </div>
        <div class="form-group">
          <input type="number" id="amount" name="amount" class="form-control" style="cursor: not-allowed;" required
            disabled>
          <label for="amount">Amount</label>
        </div>

        <div class="form-group">
          <input type="number" id="penalties" name="penalties" class="form-control" style="cursor: not-allowed;"
            disabled>
          <label for="penalties">Penalties</label>
        </div>
        <div class="form-group">
          <input type="number" id="otherFees" name="otherFees" class="form-control" style="cursor: not-allowed;"
            disabled>
          <label for="otherFees">Other Fees</label>
        </div> -->
        <div class="form-group">
          <hr>
          <h2 class="font-weight-bold text-center mb-4" style="padding:1px; top:5px">Payment Method:</h2>
          <div class="form-group payment-options">
            <!-- <div class="payment-option">
        <input id="ewallet" type="radio" name="transaction_type" value="ewallet" />
        <label class="drinkcard-cc ewallet" for="ewallet"></label>
        <span>E-Wallet</span> 
          <span class="text-danger"style="font-size:10px;text-align:center;" >Currently unavailable</span>
        
    </div>

    <div class="payment-option">
        <input id="mastercard" type="radio" name="transaction_type" value="card" />
        <label class="drinkcard-cc mastercard" for="mastercard"></label>
        <span>Mastercard</span> 
        <span class="text-danger"style="font-size:10px;text-align:center;" >Currently unavailable</span>
    </div> -->

            <div class="payment-option selected">
              <input id="qrph" type="radio" name="transaction_type" value="qr" checked />
              <label class="drinkcard-cc qrph active" for="qrph" style="cursor:pointer;"></label>
              <!-- <span>QRPH</span>  -->
            </div>
          </div>
          <!-- <div class="tacbox">
            <input id="checkbox" type="checkbox" required />
            <span style="margin-left:15px;">Check if correct email and number.</a></span>
          </div> -->

          <div class="form-group">
            <!-- <button type="submit" value="Submit" class="btn btn-primary text-center"> SUBMIT</button> -->

            <input type="submit" value="Pay" class="btn btn-primary text-center" style="margin-bottom:-50px; margin-top:-25px;">
          </div>

        </div>
    </div>

  </div>



  </div>
  </div>
  </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>





  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    function changeLanguage(selectElement) {
      var selectedLanguage = selectElement.value;
      var messageElement = document.querySelector('.pop h4');

      if (selectedLanguage === 'tagalog') {
        messageElement.innerHTML = 'Kung nakapagbayad ka na sa aming sangay o over-the-counter, Maaaring huwag pansinin ang form. Maa-update ang iyong bayad sa susunod na araw. <br><br>At Kung nagbayad ka sa pamamagitan ng mga payment center, maaaring makipag-ugnayan sa aming Customer Service Representative (CSR) upang i-update ang status ng iyong pagbabayad sa pamamagitan ng pag-click sa Icon ng telepono o "Contact Us".';
      } else {
        messageElement.innerHTML = 'If you have made a payment over the counter, please disregard this payment form. Thank you very much!<br><br>And If you have made payment through payment centers, please reach out to our Customer Service Representative (CSR) to update the status of your payment by clicking the telephone Icon or "Contact Us".';
      }
    }
  </script>

  </script>
  <script>
    $(document).ready(function() {
      $(".dark").click(function() {
        return false;
      });

      $(".pop>h3>span").click(function() {
        return false;
      });

      $(".pop>span").click(function() {
        return false;
      });

      $(".continue-button").click(function() {
        $("p").css("filter", "blur(0)");
        $(".dark").fadeOut(500);
        $(".pop").fadeOut(500);
      });
    });
  </script>
  <script>
   


  </script>
  <script>
    $('.form-group input').on('input', function() {
      if ($(this).val() !== '') {
        $(this).siblings('label').addClass('active');
      } else {
        $(this).siblings('label').removeClass('active');
      }
    });
    $(document).ready(function() {
      $('.form-group input').on('input', function() {
        if ($(this).val() !== '') {
          $(this).siblings('label').addClass('active');
        } else {
          $(this).siblings('label').removeClass('active');
        }
      });
    });
  </script>
  <script>
    $(function() {
      $("#myForm").submit(function(e) { // Corrected the form ID
        e.preventDefault();
        // $("#btnSubmit").css('display', 'none');
        $("#Message").html('');
        console.log("Form Data:", $(this).serialize());
        $.ajax({
          url: "<?= site_url('api/doTransact') ?>",
          data: $(this).serialize(),
          dataType: "json",
          type: "post",
          success: function(data) {

            // console.log(data);

            if (data.status === true) {
              console.log(data);

              $("#Message").css('display', 'block');
              $("#Message").html(data.message);


              window.location.href = data.redirect_url;

            } else {
              // console.log(data);
              $("#Message").css('display', 'block');
              $("#Message").html(data.message);
              console.log(data.message);
              // $("#btnSubmit").css('display', 'block');
            }
          },
        });
      });
    });
  </script>



  <script src="<?= base_url("/assets/js/form.js"); ?>"></script>
</body>


</html>