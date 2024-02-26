<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Payment Status</title>

  <link rel="shortcut icon" href="<?= base_url("/assets/images/updated_logo.png"); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url("/assets/css/processing.css"); ?>">
</head>

<body>

  <link href='https://fonts.googleapis.com/css?family=Raleway:600,400' rel='stylesheet' type='text/css'>

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
  <div class="page">
    <div class="panel panel-default fade-in">

      <div class="panel-heading">
        <div class="loader-outer"> <!--<div class="loader"></div> --></div>
        <h1 style="color:white!important;font-weight: 900!important;">Payment Processing</h1>
      </div>
      <div class="panel-body" style="width: 250px;">
        <div class="account-details-wrapper" id="accountDetailsWrapper">

          <td class="sm-w-full sm-inline-block" width="40%">
            <p class="labelname">Reference Number</p>
            <p class="referenceno" id="refnum"></p>

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
              <p class="labelname">Billing Period</p>
            </thead>
            <tbody id="unpaidMonthsTableBody">

            </tbody>
          </table>
          <br>

        </div>
        <hr>



        <p>Hold tight, your payment is currently being processed. Please wait for an email containing your receipt.</p>
        <a href=<?= base_url() ?> class="back-button">
          <i class="fas fa-arrow-left" style="color:black; font-size:12px!important; line-height:0;"></i> Back to payment form
        </a><br>
        <a href="javascript:history.back()" class="back-buton">
          <i class="fas fa-arrow-left" style="color:black; font-size:12px!important; line-height:0;"></i> Back to QR
        </a>
      </div>

    </div>
  </div>

  <script>
     document.addEventListener("DOMContentLoaded", function () {
      const faqBotContainer = document.createElement("div");
      faqBotContainer.innerHTML = `
        <div id="faqBot" style="position: fixed; bottom: 20px; right: 20px; background-color: rgb(44 44 44); padding: 15px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 8px; display: none;">
      <img src="<?= base_url("/assets/images/faqs.jpg"); ?>" alt="Loading..." width="700px" height="500px">
        </div>
       

        <button onclick="toggleFaqBot()" class="open-faq-bot-button">
        <i class="fas fa-comments"></i></i>Open FAQs
</button>
      `;

      document.body.appendChild(faqBotContainer);
      
    });

    function toggleFaqBot() {
      const faqBot = document.getElementById("faqBot");
      faqBot.style.display = faqBot.style.display === "none" ? "block" : "none";
      
    
    }
    function parseAmount(amount) {
      return amount.includes(".") ? `&#x20B1; ${parseFloat(amount.concat("00")).toLocaleString("en-US", {
        minimumFractionDigits: 2
      })}` : `&#x20B1; ${parseFloat(amount.concat(".00")).toLocaleString("en-US", {
        minimumFractionDigits: 2
      })}`
    }


    var myHeaders = new Headers();
    myHeaders.append("Cookie", "ci_session=71fb230fmjce1k61ivj99igsgv68gggc");

    var formdata = new FormData();
    formdata.append("accountNumber", <?= $refnum ?>);

    var requestOptions = {
      method: 'POST',
      headers: myHeaders,
      body: formdata,
      redirect: 'follow'
    };

    fetch("<?= base_url() ?>/receipt/receipt_data", requestOptions)
      .then(response => response.json())
      .then(result => {

        console.log(result)



        document.getElementById('refnum').innerHTML = (result.data.client[0].ReferenceNo)


        var unpaidMonths = result.data["unpaidMonth"];
        // console.log(unpaidMonths);

        // Access the tbody element
        var tbody = document.getElementById('unpaidMonthsTableBody');

        // Loop through the unpaid months and create table rows
        unpaidMonths.forEach(function(item) {
          var row = tbody.insertRow();

          // Create cell and set its innerHTML
          var cell = row.insertCell(0);
          cell.innerHTML = item.UnpaidMonth;
        });
      })


      .catch(error => console.log('error', error));
  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TweenMax.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="<?= base_url("/assets/js/processing.js"); ?>"></script>
</body>

</html>