<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Import Excel To MySQL</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url("/assets/css/excel.css"); ?>">
</head>


		<div class="container">
		

</style>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>Import Excel To MySQL</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>


	<form class="" action="<?= base_url('/excel/getfile') ?>" method="post" enctype="multipart/form-data">
		<input type="file" name="excel" required value="">
		<button type="submit" name="import">Import</button>
	</form>


	<?php
	if (!empty($result)) {
		echo "<table class='table table-striped table-bordered'>
			  <tr>
			  <thead>
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
				<th>TotalAmountB</th>
				<th>ConsumerType</th>
				<th>PaymentStatus</th>	
				<th>BillNumber</th>	
				</thead>
			  </tr>";

		foreach ($result as $row) {
			echo "<tr>
                     
			<tbody>
			
			<td>" . $row->AccountNumber . "</td>
			<td>" . $row->ConsumerName . "</td>
			<td>" . $row->Address . "</td>
			<td>" . $row->AccountStatus . "</td>
			<td>" . $row->UnpaidMonth . "</td>
			<td>" . $row->Others . "</td>
			<td>" . $row->TranformerRental . "</td>
			<td>" . $row->CapitalShare . "</td>
			<td>" . $row->Surcharges . "</td>
			<td>" . $row->BOMdivagma . "</td>
			<td>" . $row->BillsAndAdjustment . "</td>
			<td>" . $row->TotalAmountB . "</td>
			<td>" . $row->ConsumerType . "</td>
			<td>" . $row->PaymentStatus . "</td>
			<td>" . $row->BillNumber . "</td>
			</tbody>
		</tr>";
		}

		echo "</table>";
	} else {
		echo "No data found";
	}
	?>


	<!-- 
	<table id="example" class="table table-striped table-bordered" cellspacing="0">
		<thead>
			<tr>
				<th>#</th>
				<th>Account No</th>
				<th>Account Name</th>
				<th>Billing Period</th>
				<th>Amount</th>
				<th>Penalties</th>
				<th>Others Fees</th>
				<th>Email</th>
				<th>FirstName</th>
				<th>LastName</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody> -->


	<!-- 
=======
>>>>>>> Stashed changes
<body>
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>

    <div class="container">
        <header>
            <h1>Excel to MySQL Import</h1>
            <p>Upload an Excel file to import data into MySQL</p>
        </header>

        <form class="form-inline mb-4" action="<?= base_url('/excel/getfile') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group mx-sm-3 mb-2">
                <label for="excel" class="sr-only">Choose Excel File:</label>
                <input type="file" class="form-control custom-file-input" name="excel" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2" name="import">Import</button>
        </form>

        <?php
        if (!empty($result)) {
            echo "<div class='table-responsive'>
                    <table class='table table-striped table-bordered table-hover mx-auto' id='dataTables-example'>
                        <thead>
                            <tr>
							<th>#</th>
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
							<th>TotalAmountB</th>
							<th>ConsumerType</th>
							<th>PaymentStatus</th>
							<th>BillNumber</th>
                            </tr>
                        </thead>
                        <tbody>";

            $i = 1;
            foreach ($result as $row) {
                echo "<tr>
                     
                        <td>" . "" . "</td>
						<td>" . $row->AccountNumber . "</td>
						<td>" . $row->ConsumerName . "</td>
						<td>" . $row->Address . "</td>
						<td>" . $row->AccountStatus . "</td>
						<td>" . $row->UnpaidMonth . "</td>
						<td>" . $row->Others . "</td>
						<td>" . $row->TranformerRental . "</td>
						<td>" . $row->CapitalShare . "</td>
						<td>" . $row->Surcharges . "</td>
						<td>" . $row->BOMdivagma . "</td>
						<td>" . $row->BillsAndAdjustment . "</td>
						<td>" . $row->TotalAmountB . "</td>
						<td>" . $row->ConsumerType . "</td>
						<td>" . $row->PaymentStatus . "</td>
						<td>" . $row->BillNumber . "</td>
                    </tr>";
            }

            echo "</tbody></table></div>";
        } else {
            echo "<p>No data found</p>";
        }
        ?>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
        const loader = document.querySelector(".loader-wrapper");
        loader.style.display = "flex";

        setTimeout(function() {
            loader.style.display = "none";
        }, 600);
    </script>
</body>

</html>
