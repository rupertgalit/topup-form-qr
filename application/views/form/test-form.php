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
      <div id="Message"
					class="text-danger text-center mt-2 hold-transition  animate__animated animate__zoomIn animate__faster text-bold"
					style="display: none; font-size: 15px;"></div>
      <form action="#" method="post" id="myForm">
        <div class="form-group">
          <input type="text" id="accountNumber" name="accountNumber" class="accountnumber" required maxlength="20"  style="cursor:pointer;">
          <label for="accountNumber" class="accountnumberlabel">Account Number</label>
          <div class="loading-icon" style="display: none;">
            <img src="<?= base_url("/assets/images/loading.gif"); ?>" alt="Loading..." width="20px" height="20px">
          </div>
        </div>
        <div class="form-group">
        <input type="email" id="email" name="email" class="email" style="cursor: not-allowed;"  require>
          <label for="email" class="emaillabel">Email</label>
        </div>
        <div class="form-group">
        <input type="tel" id="phone" name="phone" class="phone" pattern="[0-9]+" title="Please enter only numeric values" minlength="10" maxlength="15"  style="cursor: not-allowed;"  required>
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
   <p class="all-font-roboto" style="font-weight: 600; margin: 0; color: #000000; text-transform: uppercase; font-size: 20px;">j*** D**a C**z</p>
</td>

<table style="font-size: 14px;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td class="sm-w-full sm-inline-block" width="40%">
                    <p class="all-font-roboto" style="margin: 0; margin-bottom: 4px; color: #a0aec0; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Billing Period</p>
                    <p class="all-font-roboto" style="font-weight: 600; margin: 2; color: #000000;">29 NOV 2018</p>
                    <p class="all-font-roboto" style="font-weight: 600; margin: 2; color: #000000;">29 JAN 2018</p>
                    <p class="all-font-roboto" style="font-weight: 600; margin: 2; color: #000000;">29 FEB 2018</p>
                  </td>                  
                 
                </tr>
              </table>
              <hr style="margin-bottom: -10px;">
              <br>
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <tr>
                        <td style="color: #718096;" width="50%">Fees</td>
                        <td style="font-weight: 600; text-align: right;" width="50%" align="right">₱19.99</td>
                      </tr>
                    <tr>
                        <td style="color: #718096;" width="50%">Surges</td>
                        <td style="font-weight: 600; text-align: right;" width="50%" align="right">₱144.99</td>
                      </tr>
                      <tr>
                        <td style="color: #718096;" width="50%">Capital Share</td>
                        <td style="font-weight: 600; text-align: right;" width="50%" align="right">₱144.99</td>
                      </tr>
                      <tr>
                        <td style="color: #718096;" width="50%">Penalties</td>
                        <td style="font-weight: 600; text-align: right;" width="50%" align="right">₱144.99</td>
                      </tr>
                
                  
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
                  <td style="font-weight: 600; padding-top: 32px; text-align: right; color: #68d391; font-size: 20px;" width="50%" align="right">₱454.96</td>
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
        <label class="drinkcard-cc qrph" for="qrph"></label>
        <span>QRPH</span> 
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
            console.log( data);
     
            $("#Message").css('display', 'block');
            $("#Message").html(data.message);

         
            window.location.href =  data.redirect_url;  
          
          }else{
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

//     let timeoutId = null;
//     const debounce = (callback, wait) => {

//       window.clearTimeout(timeoutId);
//       timeoutId = window.setTimeout(async () => {
//         await callback.apply();
//       }, wait);

//     };
//     function hideAccountDetails() {
//       $('#accountDetailsWrapper').hide();
//     }

//     function showLoadingIcon() {
//       $('.loading-icon').show();
//     }

//     function hideLoadingIcon() {
//       $('.loading-icon').hide();
//     }

//     function showAccountDetails() {
//       $('#accountDetailsWrapper').show();
//     }
//     function hideAccountDetailsWithDelay() {

//     setTimeout(() => {
//       $('#accountDetailsWrapper').hide();
//     }, 1200);
//   }

// function hideAccountDetails() {
//   hideAccountDetailsWithDelay();
// }
    // function submitForm() {
    //   // Get form data
    //   var formData = new FormData(document.getElementById("myForm"));

    //   // Perform the asynchronous form submission
    //   fetch('http://iselco-web.test/test/create_order', {
    //     method: 'POST',
    //     body: formData
    //   })
    //     .then(response => response.json())
    //     .then(data => {
    //       // Handle the response from the server
    //       console.log('Success:', data);
    //     })
    //     .catch(error => {
    //       // Handle errors
    //       console.error('Error:', error);
    //     });
    // }
  </script>


  <script>





    // console.log(accountData2);
    //  const accountData2 = {
    //   "2147483647":{
    //     "islc_id":"1",
    //     "Acc_No":"2147483647",
    //     "account_name":"Test Asdasd",
    //     "Billing_Per":"2024-01-08 23:25:45",
    //     "Amt":"1",
    //     "Penalties":"2",
    //     "Others":"3",
    //     "Email":"e@gmail.com"
    //     },
    //     "123456":{
    //       "islc_id":"3",
    //       "Acc_No":"123456",
    //       "account_name":"test",
    //       "Billing_Per":"2024-01-08 23:58:52",
    //       "Amt":"2",
    //       "Penalties":"3",
    //       "Others":"5",
    //       "Email":"e@gmail.com"
    //     }
    //   };

    //  const accountData = {
    //       "12345678901": {
    //         "accountName": "Juan Dela Cruz",
    //         "billingPeriod": "7 Sept 2021 to 6 Oct 2021",
    //         "amount": "3200",
    //         "penalties": "0",
    //         "otherFees": "112",
    //         "email": "juandelacruz@gmail.com"
    //       },
    //       "0987654321": {
    //         "accountName": "Michael Angelo Garcia",
    //         "billingPeriod": "7 Sept 2021 to 6 Oct 2021",
    //         "amount": "4000",
    //         "penalties": "35",
    //         "otherFees": "200",
    //         "email": "garciacruzmichaelangelo@gmail.com"
    //       }
    //     };

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
// $('.payment-options input').prop('disabled', false);
// $('.payment-options label').css('cursor', 'not-allowed');

    async function updateAccountDetails(details) {

      const censoredDetails = censorAccountDetails(details);

      $('#accountName').val(censoredDetails.account_name).prop('disabled', true);
      $('#billingPeriod').val(censoredDetails.billing_period).prop('disabled', true);
      $('#amount').val(censoredDetails.amount).prop('disabled', true);
      $('#penalties').val(censoredDetails.penalties).prop('disabled', true);
      $('#otherFees').val(censoredDetails.others).prop('disabled', true);
     

      // Check if the input fields are filled and add the 'active' class to labels
      $('.form-group input').each(function () {
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
function disablePaymentOptions() {
      $('.payment-options input').prop('disabled', true);
      $('.payment-options label').css('cursor', 'not-allowed');
      $("input[name='transaction_type']").prop('checked', false);
      $("input[type='submit']").prop('disabled', true);
    }

    function enablePaymentOptions() {
      $('.payment-options input').prop('disabled', false);
      $('.payment-options label').css('cursor', 'pointer');
      $("input[type='submit']").prop('disabled', false);
    }

    // $('#accountNumber').on('input', async function() {
    //   // Reset form fields and hide account details
    //   // $('#accountName, #billingPeriod, #amount, #penalties, #otherFees, #email,#phone').val('').prop('disabled', true);
    //   // $('.form-group label').removeClass('active');
    //   hideAccountDetails();

    //   const inputAccountNumber = $(this).val();
    //   debounce(async () => {
    //     showLoadingIcon();
    //     const accountDetails = accountData2[inputAccountNumber];

    //     if (!accountDetails) {
    //       setTimeout(() => {
    //         disablePaymentOptions();
    //         hideLoadingIcon();
    //       }, 500);
    //       return;
    //     }

    //     setTimeout(async () => {
    //       updateAccountDetails(accountDetails);
    //       hideLoadingIcon();

    //       // Show account details and enable the email input field
    //       showAccountDetails();
    //       $("#email").prop('disabled', false);
    //       $("#phone").prop('disabled',false);
    //       enablePaymentOptions();
    //     }, 500);
    //   }, 800);
    // });



$('.form-group input').on('input', function () {
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
//   $(".payment-options input").change(function () {
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
//   $("#submitBtn").click(function () {
//     // Check if the submit button is enabled before triggering click
//     if (!$("input[type='submit']").prop("disabled")) {
//       $("input[type='submit']").click();
//     }
//   });
// });

  </script>
  <script src="<?= base_url("/assets/js/form.js"); ?>"></script>
</body>


</html>