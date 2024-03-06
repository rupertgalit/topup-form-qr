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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
</head>





<style>
  body{
    overflow-x: hidden; /*hides horizontal scrollbar*/
    overflow-y: hidden; /*hides vertical scrollbar*/
  }

.payment-form{
  background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(142,158,171,0.5047268907563025) 0%);
box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;


}

.button-style{
  background: #00d2ff;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #3a7bd5, #00d2ff);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #3a7bd5, #00d2ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
.drinkcard-cc{

  border-color:gray!important;
  color: #d9d9d9 !important;
  width: 200px !important;
}

.header{
  /* height: 100px; */
  /* margin-bottom: 100px; */
}
.drinkcard-cc{

  width: 200px !important;
}
</style>

<body class="d-flex flex-column">


  <div class="header">
<br><br><br><br><br><br><br>

  </div>



  <div class="container mt-5 d-flex justify-content-center">
    <div class="payment-form p-4 rounded shadow-sm mx-auto" style=" transform: scale(0.85)!important;">
      <h4 class="font-weight-bold text-center mb-4">PAYMENT TOPUP</h4>
      <div id="Message" class="text-danger text-center mt-2 hold-transition  animate__animated animate__zoomIn animate__faster text-bold" style="display: none; font-size: 15px;margin-top:-1.5rem!important;"></div>
      <form action="#" method="post" id="myForm" autocomplete="off">
        <div class="form-group">

          <input type="hidden" id="accountNumber" name="accountNumber" class="accountnumber" value="<?= $external_id ?>" placeholder="9 digits account number" required maxlength="9" style="cursor:pointer;" readonly>
          <label for="accountNumber" class="accountnumberlabel" hidden>Account Number</label>
          <label for="accountNumber" class="input-message">Invalid account number</label>
          <div class="loading-icon" style="display: none;">
            <img src="<?= base_url("/assets/images/loading.gif"); ?>" alt="Loading..." width="20px" height="20px">
          </div>
        </div>


        
        <div class="form-group">
          <input type="text"  class="email" required>
          <label for="email" class="emaillabel">Merchant Name </label>
        </div>

      
        <div class="form-group">
          <hr>
          <h2 class="font-weight-bold text-center mb-4" style="padding:1px; top:5px">Payment Method:</h2>
          <div class="form-group payment-options">
      

          <div class="payment-option selected">
              <input id="qrph" type="radio" name="transaction_type" value="qr" checked />
              <label class="drinkcard-cc qrph active" for="qrph" style="cursor:pointer;"></label>
              <!-- <span>QRPH</span>  -->
            </div>
          </div>
        

          <div class="form-group">
            

            
            <input type="submit"  value="Pay" class="btn button-style text-center" style="margin-bottom:-50px; margin-top:-25px;">
          </div>

        </form>
        
      </div>
    </div>

  </div>

 
  
  <div class="sup-ewallet" style="width:60%;margin-bottom:20px;margin-left:30px">
  <center>
  <img src="assets/images/supported-ewallet.png"  alt="e-wallet">
  </center>
  </div>
  <div class="sup-banks" style="width:60%;margin-left:30px">
  <img src="assets/images/supported-banks.png"  alt="e-wallet">
  
  </div>

  

  <div class="carousel-wrap">
    <div class="owl-carousel">
      <div class="item">
        <img src="/assets/images/logos/Digital Banks (DBS)/SENDER Only/GoTyme_Bank_2022.svg" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER Only/bayad-partners.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER Only/Banana Fintech Services.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER-RECEIVER/DCPay Philippines, Inc..png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER-RECEIVER/Gcash.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER-RECEIVER/GrabPay-header.jpg" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER-RECEIVER/Maya_logo.svg.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER-RECEIVER/PPS-PEPP Financial Services Corporation (PalawanPay).png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER-RECEIVER/ShopeePay Philippines, Inc..png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER-RECEIVER/SpeedyPay, Inc..png" title="SpeedyPay, Inc." />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER-RECEIVER/TayoCash, Inc..png" title="TayoCash, Inc."/>
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER-RECEIVER/Traxion Pay, Inc..png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER-RECEIVER/USSC Money Services, Inc..jpg" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER-RECEIVER/Zybi Tech, Inc..png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Electronic Money Issuers (EMI) - Others/SENDER-RECEIVER/Starpay-logo.jpg" />
      </div>
    </div>
  </div>
  <div class="carousel-wrap">
    <div class="owl-carousel">
      <div class="item">
        <img src="/assets/images/logos/Rural Banks (RBS)/SENDER Only/seabankph_logo.jpg"  title="Sea Bank PH, Inc."/>
      </div>
      <div class="item">
        <img src="/assets/images/logos/Rural Banks (RBS)/SENDER-RECEIVER/Cebuana Lhuillier Rural Bank, Inc..png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Rural Banks (RBS)/SENDER-RECEIVER/Netbank (A Rural Bank), Inc..png" style="object-fit: cover;" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Rural Banks (RBS)/SENDER-RECEIVER/Rural Bank of Guinobatan, Inc..png" style="object-fit: cover;"/>
      </div>
      <div class="item">
        <img src="/assets/images/logos/Thrift Banks (TBS)/SENDER Only/Philippines Savings Bank.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Thrift Banks (TBS)/SENDER-RECEIVER/AllBank (A Thrift Bank), Inc..png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Thrift Banks (TBS)/SENDER-RECEIVER/Card SME Bank Inc., A Thrift Ba.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Thrift Banks (TBS)/SENDER-RECEIVER/Queen City Development Bank, Inc. or Queenbank, A Thrift Bank.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Thrift Banks (TBS)/SENDER-RECEIVER/Sterling Bank of Asia, Inc. (A Savings Bank).png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Universal and Commercial Banks (UKBs)/SENDER Only/Bank of Commerce.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Universal and Commercial Banks (UKBs)/SENDER Only/Chinabank-Logo.jpg" style="object-fit: cover;"/>
      </div>
      <div class="item">
        <img src="/assets/images/logos/Universal and Commercial Banks (UKBs)/SENDER Only/Land Bank of the Philippines.svg" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Universal and Commercial Banks (UKBs)/SENDER-RECEIVER/Asia United Bank Corporation.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Universal and Commercial Banks (UKBs)/SENDER-RECEIVER/Bank of the Philippine Islands.jpg" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Universal and Commercial Banks (UKBs)/SENDER-RECEIVER/BDO Unibank, Inc..png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Universal and Commercial Banks (UKBs)/SENDER-RECEIVER/Metropolitan Bank and Trust Company.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Universal and Commercial Banks (UKBs)/SENDER-RECEIVER/Philippine_National_Bank_logo.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Universal and Commercial Banks (UKBs)/SENDER-RECEIVER/RCBC_logo.svg.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Universal and Commercial Banks (UKBs)/SENDER-RECEIVER/Robinsons Bank Corporation.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Universal and Commercial Banks (UKBs)/SENDER-RECEIVER/The_Security_Bank_Logo_1.svg.png" />
      </div>
      <div class="item">
        <img src="/assets/images/logos/Universal and Commercial Banks (UKBs)/SENDER-RECEIVER/UnionBank_PH_logo.svg.png" />
      </div>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>





  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [
        "<i class='fa fa-caret-left'></i>",
        "<i class='fa fa-caret-right'></i>",
      ],
      autoplay: true,
      autoplayHoverPause: false,
      responsive: {
        0: {
          items: 1,
        },
        700: {
          items: 5 ,
        },
        1000: {
          items: 7,
        },
        1535: {
          items: 6,
        },
        1700: {
          items: 8,
        },
      },
      // itemsDesktop : [1000,5], //5 items between 1000px and 901px
      // itemsDesktopSmall : [900,3], // betweem 900px and 601px
      // itemsTablet: [600,2], //2 items between 600 and 0;
      // itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
    });

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