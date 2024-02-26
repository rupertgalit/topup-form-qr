<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>API Data Table</title>
</head>
<body>
  <table id="dataTable">
    <thead>
      <tr>
        <th>Column 1</th>
        <th>Column 2</th>
        <!-- Add more columns as needed -->
      </tr>
    </thead>
    <tbody id="table_body">
      <!-- Table body will be populated dynamically -->
    </tbody>
  </table>
  <pre><?php echo json_encode($rawdata) ?></pre>
 
</body>
</html>
