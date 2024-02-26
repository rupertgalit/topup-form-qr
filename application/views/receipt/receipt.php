<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Receipt</title>

	<link rel="shortcut icon" href="<?= base_url("/assets/images/updated_logo.png"); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url("/assets/css/receipt.css"); ?>">
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
	<div class="receipt" id="receiptContent">

		<header class="header">
			<div class="header__top">
				<div class="header__logo">
					<img src="<?= base_url("assets/images/updated_logo.png"); ?>">
				</div>
				<div class="header__meta">
					<span class="header__date" id="datepaid"></span>
					<span class="header__serial">0f-113</span>

				</div>
			</div>
			<div class="header__greeting">
				<hr class="header__hr" />
				<span class="header__name" id="paymentstatus"></span>
				<span class="header__count"><b>REF #:</span></b> <span class="header__count" id="refno"></span>
				<span class="header__border"></span>
			</div>
			<!-- <div class="header__spacing"></div> -->
		</header>

		<section class="cart">
			<h2 class="cart__header" style="margin-top:5px;">ISELCO II Online Web Payment</h2>
			<div clas="acountdetails">
				<span><b>Account Number:</b></span>
				<span id="accountnumber"></span>
				<br>
				<span><b>Meter Number:</b></span>
				<span id="meternumber"></span>
				<br>
				<span><b>Account Name:</b></span>
				<span id="accountname"></span>
				<br>
				<span><b>Email:</b></span>
				<span id="email"></span>
				<br>
				<table style="font-size: 14px;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
					<thead>
						<span><b>Billing Months:</b></span><br>
					</thead>

					<tbody id="unpaidMonthsTableBody">
						<!-- Data will be populated here -->
					</tbody>

				</table>

				<br>


			</div>

			<ol class="list">
				<li class="list__item">
					<span class="list__name">Fees</span>
					<span class="list__price" id="fees"></span>
				</li>
				<li class="list__item">
					<span class="list__name">Penalties:</span>
					<span class="list__price" id="penalties"></span>
				</li>
				<li class="list__item">
					<span class="list__name">Capital Share:</span>
					<span class="list__price" id="capitalshare"></span>
				</li>
				<li class="list__item">
					<span class="list__name">Other Fees</span>
					<span class="list__price" id="otherfees"></span>
				</li>
				<li class="list__item">
					<span class="list__name">Convenience Fee</span>
					<span class="list__price" id="conveniencefees"></span>
				</li>
			</ol>
			<hr class="cart__hr" />
			<footer class="cart__total">
				<h3 class="cart__total-label">Total</h3>
				<span class="cart__total-price" id="total"></span>
			</footer>

		</section>

		<footer class="bar-code">
		<div>
        <!-- Powered by section -->
        <div style="text-align: center;">
            <span style="font-size: 12px;color:black!important;font-weight:900;">Powered by:</span><br>
            <img src="/assets/images/ngsi_logo.png" alt="Powered by Logo" style="width: 130px; height: auto;">
        </div>
    </div>
			<center>
				<button id="downloadReceiptBtn" style="display: inline-block!important;" class="comic-button" onclick="downloadReceiptAsPDF()">Download Receipt</button>
				<a href="<?= base_url() ?>"> <button type="submit" style="display: inline-block!important;" class="back">Back to Home</button></a>
			</center>


	</div>


	</footer>

	</div>

	<div>




		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TweenMax.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="<?= base_url("/assets/js/receipt.js"); ?>"></script>


		<script>
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
					// console.log(parseAmount(result.data.records[0].total_fees));


					//   document.getElementById('accountname').innerHTML = result.data.client[0].ConsumerName;
					document.getElementById('fees').innerHTML = result.data.records.total_fees;
					document.getElementById('penalties').innerHTML = result.data.records.freeSurcharges
					document.getElementById('otherfees').innerHTML = result.data.records.others
					document.getElementById('capitalshare').innerHTML = result.data.records.capitalshare
					document.getElementById('conveniencefees').innerHTML = result.data.records.Convinience_Fee
					document.getElementById('total').innerHTML = result.data.records.total_txn_amount



					document.getElementById('datepaid').innerHTML = (result.data.client[0].DatePaid);
					document.getElementById('accountnumber').innerHTML = (result.data.client[0].AccountNumber)
					document.getElementById('accountname').innerHTML = (result.data.client[0].ConsumerName)
					document.getElementById('email').innerHTML = (result.data.client[0].Email)
					document.getElementById('refno').innerHTML = (result.data.client[0].ReferenceNo)
					document.getElementById('paymentstatus').innerHTML = (result.data.client[0].PaymentStatus);
					document.getElementById('meternumber').innerHTML = (result.data.client[0].MeterNumber);

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




			function qsa(el) {
				return document.querySelectorAll(el);
			}


			function restart() {
				tl.restart();
			}

			var tl = new TimelineMax({
				repeat: 0
			});


			var receipt = qsa('.receipt');
			var greetingBorder = qsa('.header__border');
			var greetingName = qsa('.header__name');
			var greetingCount = qsa('.header__count');
			var cart = qsa('.cart');
			var barCode = qsa('.bar-code');
			var cartHeader = qsa('.cart__header');
			var listItems = qsa('.list__item');
			var cartBorder = qsa('.cart__hr');
			var total = qsa('.cart__total');


			tl.fromTo(receipt, .5, {
					scale: 0,
					alpha: 0,
					transformOrigin: "50% 20%"
				}, {
					scale: 1,
					alpha: 1,
				})
				.from(greetingBorder, .5, {
					x: 15,
					autoAlpha: 0
				})
				.from(greetingName, .5, {
					y: 15,
					autoAlpha: 0
				}, '-=0.5')
				.from(greetingCount, .3, {
					y: 15,
					autoAlpha: 0
				}, '-=0.2')
				.addLabel('header')
				.fromTo(cart, .3, {
					rotationX: "-90deg",
					transformPerspective: 500,
					force3D: true,
					transformOrigin: "top center",
					transformStyle: "preserve-3d"
				}, {
					transformPerspective: 500,
					rotationX: '0deg'
				})
				.fromTo(barCode, .3, {
					rotationX: "-90deg",
					transformPerspective: 500,
					force3D: true,
					transformOrigin: "top center",
					transformStyle: "preserve-3d"
				}, {
					transformPerspective: 500,
					rotationX: '0deg'
				})
				.to(receipt, .5, {
					css: {
						className: '+=receipt_hoverable'
					}
				})
				.from(cartHeader, .5, {
					y: 10,
					autoAlpha: 0
				}, '-=0.4')
				.staggerFrom(listItems, .5, {
					x: -10,
					autoAlpha: 0,
					ease: Power2.easeOut
				}, 0.3)
				.from(cartBorder, .5, {
					y: 25,
					autoAlpha: 0
				}, '-=0.3')
				.from(total, .5, {
					y: 50,
					autoAlpha: 0
				}, '-=.4');
		</script>
</body>

</html>