<?php


        // $qr = $records['qr'];
        $qr = "00020101021128840015ph.ppmi.p2micro0111RUGUPHM1XXX032500173110400000000000000010410001010503905030005204731153036085802PH5913Merchant Name6009Test City62790012ph.ppmi.qrph021263912345678905246391234567896391234567890708PTR102670803***88440012ph.ppmi.qrph012403081020231708944184107363046730";
        $ref_num = rand(000, 999) . date('Ymd') . date('His');
        // $ref_num = $records['ReferenceNo'];
        // $originalNumber = $records['TotalAmount'];
        // $amount = number_format($originalNumber, 2, '.', ',');


?>







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>QRPH</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?= base_url("/assets/images/updated_logo.png"); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url("/assets/css/qr.css"); ?>">
</head>

<body>
 
  <div class="container mt-5"> <!-- mt-5 -->
    <div class="payment-form bg-white p-4 rounded shadow-sm mx-auto" style="max-width: 350px; transform: scale(0.9);">
      <h2 class="font-weight-bold text-center mb-4" style="color:#fff!important;">Payment Topup</h2>

      <main class="ticket-system">
   
        <div class="top">
          <div class="printer" />
        </div>
        <div class="receipts-wrapper">
          <div class="receipts">
            <div class="receipt">
              <center>
                <div id="qrcode">

               
                </div>
                <br>
                <div class="reference-info">
    <div class="info-item">
        <span class="left"><i class="fas fa-id-card"></i><strong> Reference &nbsp;No&nbsp;:  </strong></span>
        <span class="right"><?= $ref_num ?></span>
    </div>

    <div class="info-item">
        <!-- <span class="left"><i class="fas fa-money-bill"></i><strong> Amount&nbsp;:</strong></span> -->
        <!-- <span class="right">&#8369;<?= $amount ?></span> -->
    </div>
</div>





               
                </center>
            </div>
            <form method="POST" action="<?= base_url() ?>/receipt">
              <input type="hidden" name="refnumber" value="<?php echo $ref_num  ?>">

              <!-- <button type="submit" class="show-receipt">Show Receipt</button> -->
              <button id="downloadReceiptBtn" class="comic-button">Download QR</button><br>


            </form>



          </div>


        </div>
    </div>
    </main>

  </div>

  <script>

  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/assets/js/qrcode-lib/easy.qrcode.min.js"></script>
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
  <script>

  </script>

  <script>
    // console.log(rawdata);
    var qrcode = new QRCode(document.getElementById("qrcode"), {

      text: "<?php echo $qr; ?>",

      logo: "/assets/images/qr-logo.png",
      logoWidth: 40,
      logoHeight: 40,
      logoBackgroundColor: 'black',
      logoBackgroundTransparent: true,

    });

    function downloadReceiptContent(event) {
      event.preventDefault();

      var receiptContainer = document.querySelector('.receipt');
      html2canvas(receiptContainer).then(function(canvas) {
        var link = document.createElement('a');
        link.href = canvas.toDataURL();
        link.download = 'Iselco-QR.png';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      });
    }


    document.getElementById("downloadReceiptBtn").addEventListener("click", downloadReceiptContent);
  </script>
  <script src="<?= base_url("/assets/js/qr.js"); ?>"></script>
</body>

</html>