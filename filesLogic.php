<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
   <title> Files to download </title>
<link href="css/bootstrap.css" ref="stylesheet"/>
</head>
<body>
<p><br></p>
<div class="container">
<table class="table table-bordered">
<thead>
<tr>
<th>S.No</th>
<th>Item</th>
<th>Date</th>
<th>Amount</th>
<th>Create BY</th>
</tr>
<thead>
<tbody>
<?php
include "dbc.php";
$stmt = $dbc->prepare("select * from employees");
$stmt->execute();
while($row = $stmt->fetch()){
?>
<tr>
<td><? echo $row['id'] ?></td>
<td><? echo $row['name'] ?></td>
<td><? echo $row['date'] ?></td>
<td><? echo $row['amount'] ?></td>
<td><? echo $row['uname'] ?></td>
<td class="text-center"><a href="downloads.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Download</a></td>
</tr>
<?php
 }
 ?>
</tbody>
</table>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>