<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Payment Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?= base_url("assets/images/updated_logo.png"); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/css/form.css"); ?>">
</head>

<body>
  <div class="sidebar-contact">
    <div class="toggle" style="transition:all 800ms;"></div>
    <h2 class="fas fa-comments"> Contact Us</h2>
    <div class="scroll">
      <div>
        <strong>Mobile #/ Viber:</strong> <br>
        09171486979<br>
        09171793481<br>
        09173126960
      </div>
      <div>
        <strong>Landline:</strong> <br>
        +632 89526925
      </div>
      <div>
        <strong>Facebook Page & Messenger:</strong> <br>
        <a href="https://www.facebook.com/netglobalsolutionsinc" target="_blank">netglobalsolutionsinc</a>
      </div>
      <div>
        <strong>Email:</strong> <br>
        Support@netglobalsolutions.net
      </div>
    </div>
  </div>
  <div class="container mt-5 d-flex justify-content-center">
    <div class="payment-form bg-white p-4 rounded shadow-sm mx-auto" style="max-width: 350px; transform: scale(0.9);">
      <h2 class="font-weight-bold text-center mb-4">ISELCO II Online Web Payment</h2>
      <div id="Message" class="text-danger text-center mt-2 hold-transition  animate__animated animate__zoomIn animate__faster text-bold" style="display: none; font-size: 15px;"></div>
      <form action="#" method="post" id="myForm" autocomplete="off">
        <div class="form-group">
          <input type="text" id="accountNumber" name="accountNumber" class="accountnumber" value="<?= $accountnumber ?>" placeholder="9 digits account number" required maxlength="9" style="cursor:pointer;">
          <label for="accountNumber" class="accountnumberlabel">Account Number</label>
          <label for="accountNumber" class="input-message">Invalid account number</label>
          <div class="loading-icon" style="display: none;">
            <img src="<?= base_url("assets/images/loading.gif"); ?>" alt="Loading..." width="20px" height="20px">
          </div>
        </div>


        </button>
        <div class="form-group">
          <input type="email" id="email" name="email" class="email" style="cursor: not-allowed;" disabled required>
          <label for="email" class="emaillabel">Email</label>
        </div>
        <div class="form-group">
          <input type="tel" id="phone" name="phone" class="phone" pattern="[0-9]+" title="Please enter only numeric values" minlength="10" maxlength="15" style="cursor: not-allowed;" disabled required>
          <label for="phone" class="phonelabel">Phone Number</label>
        </div>
        <!-- <div class="form-group">
          <input type="text" id="accountName" name="accountName" class="form-control" style="cursor: not-allowed;"
            required disabled>
          <label for="accountName">Account Name</label>
        </div> -->

        <div class="account-details-wrapper" id="accountDetailsWrapper">

          <td class="sm-w-full sm-inline-block" width="40%">
            <p class="all-font-roboto" style="margin: 0; margin-bottom: 0; color: #a0aec0; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">account name</p>
            <p class="all-font-roboto" id="accountname" style="font-weight: 600; margin: 0; color: #000000; text-transform: uppercase; font-size: 20px;"></p>
          </td>

          <table style="font-size: 14px;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <!-- <tr>
              <td class="sm-w-full sm-inline-block" width="40%">
                <p class="all-font-roboto" style="margin: 0; margin-bottom: 4px; color: #a0aec0; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Billing Period</p>
                <p class="all-font-roboto" style="font-weight: 600; margin: 2; color: #000000;">29 NOV 2018</p>
                <p class="all-font-roboto" style="font-weight: 600; margin: 2; color: #000000;">29 JAN 2018</p>
                <p class="all-font-roboto" style="font-weight: 600; margin: 2; color: #000000;">29 FEB 2018</p>
              </td>

            </tr> -->
            <thead>
              <p class="all-font-roboto" style="margin: 0; margin-bottom: 4px; color: #a0aec0; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Billing Period</p>
            </thead>
            <tbody id="unpaidMonthsTableBody">
              <!-- Data will be populated here -->
            </tbody>
          </table>
          <hr style="margin-bottom: -10px;">
          <br>
          <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
            <tr>
              <td style="color: #718096;" width="50%">Fees</td>
              <td id="fees" style="font-weight: 600; text-align: right;" width="50%" align="right"></td>
            </tr>
            <tr>
              <td style="color: #718096;" width="50%">Penalties</td>
              <td id="penalties" style="font-weight: 600; text-align: right;" width="50%" align="right"></td>
            </tr>
            <tr>
              <td style="color: #718096;" width="50%">Capital Share</td>
              <td id="capital_share" style="font-weight: 600; text-align: right;" width="50%" align="right"></td>
            </tr>
            <tr>
              <td style="color: #718096;" width="50%">Other Fees</td>
              <td id="other_fees" style="font-weight: 600; text-align: right;" width="50%" align="right"></td>
            </tr>
            <!-- <tr>
              <td style="color: #718096;" width="50%">Penalties</td>
              <td id  ="penalties" style="font-weight: 600; text-align: right;" width="50%" align="right"></td>
            </tr> -->


            </tr>

          </table>
          <hr style="margin-bottom: -10px;">
          <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>

            </tr>
          </table>
          <table style="line-height: 28px; font-size: 14px;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
              <td style="font-weight: 600; padding-top: 32px; color: #000000; font-size: 20px; text-transform: uppercase;" width="50%">Total</td>
              <td id="total" style="font-weight: 600; padding-top: 32px; text-align: right; color: #68d391; font-size: 20px;" width="50%" align="right">₱454.96</td>
            </tr>
          </table>
          </td>
          </tr>
          </table>
          </td>
          </tr>
          </table>
        </div>

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
          <h2 class="font-weight-bold text-center mb-4" style="padding:1px; top:5px">Select Payment Method:</h2>
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

            <div class="payment-option">
              <input id="qrph" type="radio" name="transaction_type" value="qr" />
              <label class="drinkcard-cc qrph" for="qrph" style="cursor:pointer;"></label>
              <!-- <span>QRPH</span>  -->
            </div>
          </div>

          <div class="form-group">
            <!-- <button type="submit" value="Submit" class="btn btn-primary text-center"> SUBMIT</button> -->

            <input type="submit" value="Submit" class="btn btn-primary text-center" style="margin-bottom:-30px; margin-top:-25px;">
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






  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
              // $("#btnSubmit").css('display', 'block');
            }
          },
        });
      });
    });
  </script>

  <script>
    let timeoutId = null;
    const debounce = (callback, wait) => {

      window.clearTimeout(timeoutId);
      timeoutId = window.setTimeout(async () => {
        await callback.apply();
      }, wait);

    };

    function hideAccountDetails() {
      $('#accountDetailsWrapper').hide();
    }

    function showLoadingIcon() {
      $('.loading-icon').show();
    }

    function hideLoadingIcon() {
      $('.loading-icon').hide();
    }

    function showAccountDetails() {
      $('#accountDetailsWrapper').show();
    }

    function hideAccountDetailsWithDelay() {

      setTimeout(() => {
        $('#accountDetailsWrapper').hide();
      }, 1200);
    }

    // function hideAccountDetails() {
    //   hideAccountDetailsWithDelay();
    // }
  </script>


  <script>
    function censorAccountDetails(accountDetails) {
      const censoredAccountDetails = {
        ...accountDetails
      };
      censoredAccountDetails.account_name = censorText(accountDetails.account_name);
      censoredAccountDetails.email = censorEmail(accountDetails.email);
      // Modify other properties accordingly
      return censoredAccountDetails;
    }



    function censorText(text) {
      const words = text.split(' ');
      const censoredWords = words.map(word => {
        const firstLetter = word.charAt(0);
        return firstLetter + '*'.repeat(word.length - 1);
      });
      return censoredWords.join(' ');
    }

    function censorEmail(email) {
      const atIndex = email.indexOf('@');
      if (atIndex !== -1) {
        const prefix = email.substring(0, atIndex);
        const censoredPrefix = censorText(prefix);
        return censoredPrefix + email.substring(atIndex);
      } else {
        return email;
      }
    }
    // Disable radio buttons on page load
    // $('.payment-options input').prop('disabled', true);
    // $('.payment-options label').css('cursor', 'not-allowed');

    async function updateAccountDetails(details) {

      const censoredDetails = censorAccountDetails(details);

      $('#accountName').val(censoredDetails.account_name).prop('disabled', true);
      $('#billingPeriod').val(censoredDetails.billing_period).prop('disabled', true);
      $('#amount').val(censoredDetails.amount).prop('disabled', true);
      $('#penalties').val(censoredDetails.penalties).prop('disabled', true);
      $('#otherFees').val(censoredDetails.others).prop('disabled', true);


      // Check if the input fields are filled and add the 'active' class to labels
      $('.form-group input').each(function() {
        if ($(this).val() !== '') {
          $(this).siblings('label').addClass('active');
        } else {
          $(this).siblings('label').removeClass('active');
        }
      });

      // clear form data when leaving the page
      $(window).on('unload', function() {
        $('#accountNumber').val('');
        $('#accountName, #billingPeriod, #amount, #penalties, #otherFees, #email, #phone').val('').prop('disabled', true);
        $('.form-group label').removeClass('active');
        hideAccountDetails();
      });

      // Enable radio buttons when there's data available
      $('.payment-options input').prop('disabled', false);
      $('.payment-options label').css('cursor', 'pointer');
    }

    // function enableRadioButtons() {
    //   $('.payment-options input').prop('disabled', false);
    //   $('.payment-options label').css('cursor', 'pointer');
    // }

    // function disablePaymentOptions() {
    //   $('.payment-options input').prop('disabled', true);
    //   $('.payment-options label').css('cursor', 'not-allowed');
    //   $("input[name='transaction_type']").prop('checked', false);
    //   $("input[type='submit']").prop('disabled', true);
    // }

    function enablePaymentOptions() {
      $('.payment-options input').prop('disabled', false);
      $('.payment-options label').css('cursor', 'pointer');
      $("input[type='submit']").prop('disabled', false);
    }

    function parseAmount(amount) {
      return amount.includes(".") ? `&#x20B1; ${parseFloat(amount.concat("00")).toLocaleString("en-US", {
        minimumFractionDigits: 2
      })}` : `&#x20B1; ${parseFloat(amount.concat(".00")).toLocaleString("en-US", {
        minimumFractionDigits: 2
      })}`
    }

    $('#accountNumber').on('input', async function() {
      // Reset form fields and hide account details
      // $('#accountName, #billingPeriod, #amount, #penalties, #otherFees, #email,#phone').val('').prop('disabled', true);
      $('.form-group label').removeClass('active');
      $('label.input-message[for=accountNumber]').removeClass("error");
      $("#email").prop('disabled', true).val("");
      $("#phone").prop('disabled', true).val("");
      $(this).removeClass("error");
      hideAccountDetails();

      const inputAccountNumber = $(this).val();
      debounce(async () => {

        if (!inputAccountNumber.length || inputAccountNumber.length != 9) return;

        showLoadingIcon();


        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
          "accountNumber": inputAccountNumber
        });

        var requestOptions = {
          method: 'POST',
          headers: myHeaders,
          body: raw,
          redirect: 'follow'
        };
        const accountDetails =
          await fetch("<?= base_url()?>/transaction/totalFee", requestOptions)
          .then(response => response.json())
          .then(result => {
            console.log(result)
            // console.log(result.data.all_fees[0].others)
            console.log(result.message)
            console.log(result.status)

            if (result.status == true) {
              $("#email").prop('disabled', false);
              $("#phone").prop('disabled', false);
              enablePaymentOptions();
              showAccountDetails();
              // enableRadioButtons();
              $('.payment-options input').prop('disabled', false);
              $('.payment-options label').css('cursor', 'pointer');


              // document.getElementById('email').value = result.message;
              console.log(parseAmount(result.data.all_fees[0].total_fees))
              document.getElementById('accountname').innerHTML = result.data.client[0].ConsumerName;
              document.getElementById('fees').innerHTML = parseAmount(result.data.all_fees[0].total_fees);
              document.getElementById('penalties').innerHTML = parseAmount(result.data.all_fees[0].freeSurcharges)
              document.getElementById('other_fees').innerHTML = parseAmount(result.data.all_fees[0].others)
              document.getElementById('capital_share').innerHTML = parseAmount(result.data.all_fees[0].capitalshare)

              document.getElementById('total').innerHTML = parseAmount(result.data.all_fees[0].total_amount)

              var unpaidMonths = result.data["unpaid_month"];
              // console.log(unpaidMonths);

              // Access the tbody element
              var tbody = document.getElementById('unpaidMonthsTableBody');

              tbody.innerHTML = '';
              // Loop through the unpaid months and create table rows
              unpaidMonths.forEach(function(item) {
                var row = tbody.insertRow();

                // Create cell and set its innerHTML
                var cell = row.insertCell(0);
                cell.innerHTML = item.UnpaidMonth;
              });



            } else {
              hideAccountDetails()
              throw result
              // $('.payment-options input').prop('disabled', true);
              // $('.payment-options label').css('cursor', 'not-allowed');
            }



          })
          .catch(error => {
            hideAccountDetails()
            $(this).addClass("error")
            $('label.input-message[for=accountNumber]').addClass("error").text(error.message)
            console.log('error', error)
          });
        // const accountDetails = await fetch("url endpoint",
        //  {
        //   body: JSON.stringify({accountNumber})
        // });
        // const accountDetails = accountData2[inputAccountNumber];

        if (!accountDetails) {
          // Disable radio buttons when there's no data
          $('.payment-options input').prop('disabled', false);
          $('.payment-options label').css('cursor', 'pointer');

          $(this).prop('disabled', false)
          $(this).focus()
          hideLoadingIcon()
          return
        }

        updateAccountDetails(accountDetails);
        hideLoadingIcon();

        // Show account details and enable the email input field
        showAccountDetails();
        $("#email").prop('disabled', false);
        enablePaymentOptions();

      }, 800);
    });



    $('.form-group input').on('input', function() {
      if ($(this).val() !== '') {
        $(this).siblings('label').addClass('active');
      } else {
        $(this).siblings('label').removeClass('active');
      }
    });


    // $(function() {
    //   $("#myForm").submit(function(e) {
    //     e.preventDefault();
    //     $("#Message").html('');

    //     // Check if a payment option is selected
    //     if (!$("input[name='transaction_type']:checked").val()) {
    //       $("#Message").css('display', 'block');
    //       $("#Message").html("Please select a payment option.");
    //       return;
    //     }

    //     // Continue with form submission
    //     $.ajax({
    //       url: "<?= site_url('api/doTransact') ?>",
    //       data: $(this).serialize(),
    //       dataType: "json",
    //       type: "post",
    //       success: function(data) {
    //         console.log(data);

    //         if (data.status === "success") {
    //           $("#Message").css('display', 'block');
    //           $("#Message").html(data.message);
    //           window.location.href = data.redirect_url;

    //           // Enable the email input field
    //           $("#email").prop('disabled', false);
    //           $("phone").prop('disabled,false');
    //         } else {
    //           $("#Message").css('display', 'block');
    //           $("#Message").html(data.message);
    //         }
    //       },
    //     });
    //   });

    //   // Disable/enable submit button based on payment option selection
    //   $(".payment-options input").change(function() {
    //     const paymentOptionSelected = $("input[name='transaction_type']:checked").val();
    //     const submitButton = $("input[type='submit']");

    //     if (paymentOptionSelected) {
    //       submitButton.prop("disabled", false);
    //     } else {
    //       submitButton.prop("disabled", true);
    //     }
    //   });

    //   // Disable submit button initially
    //   $("input[type='submit']").prop("disabled", true);

    //   // Trigger click event on the submit button
    //   $("#submitBtn").click(function() {
    //     // Check if the submit button is enabled before triggering click
    //     if (!$("input[type='submit']").prop("disabled")) {
    //       $("input[type='submit']").click();
    //     }
    //   });
    // });
    // Trigger click event on the submit button
    //   $("#submitBtn").click(function() {
    //     // Check if the submit button is enabled before triggering click
    //     if (!$("input[type='submit']").prop("disabled")) {
    //       $("input[type='submit']").click();
    //     }
    //   });
    // });

    function populateTable(data) {
      // Get the tbody element
      var tbody = document.querySelector('#data-table tbody');

      // Clear existing rows
      tbody.innerHTML = '';

      // Loop through the data and create table rows
      data.forEach(function(item) {
        var row = tbody.insertRow();

        // Create cells and set their innerHTML
        var cell1 = row.insertCell(0);
        cell1.innerHTML = item.id;

      });
    }
  </script>
  <script src="<?= base_url("assets/js/form.js"); ?>"></script>
</body>


</html>