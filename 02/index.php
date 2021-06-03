<?php

include '../lib/conn.php';
include '../lib/config.php';


$result = $mysqli->query("SELECT customerName, country, phone, creditLimit FROM customers ORDER BY customerName ASC");



if ($debug){
	
	if ($reverse){
echo "Reverse order...<br>\n";
for ($row_no = $result->num_rows - 1; $row_no >= 0; $row_no--) {
    $result->data_seek($row_no);
    $row = $result->fetch_assoc();
    echo " customerName = " . $row['customerName'] . "<br>\n";
}
	}
	else {

echo "<br><br>Result set order...<br>\n";
foreach ($result as $row) {
    echo " customerName = " . $row['customerName'] . "<br>\n";
}
	}
}
?>


<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>02 | Maksu</title>
  <meta name="description" content="Sir Try PHP Sir">
  <meta name="author" content="Kelassir">

  <link rel="stylesheet" href="../lib/css/vilamil.css">

</head>

<body>
<!--  <script src="js/scripts.js"></script> -->

<div class="table-users">
   <div class="header">Users</div>
   
   <table cellspacing="0">
      <tr>
         <th>&nbsp;</th>
         <th style="text-align:left">Name</th>
         <th>Country</th>
         <th>Phone</th>
         <th width="230">Credit Limit</th>
      </tr>
	  
<?
	if ($reverse){

for ($row_no = $result->num_rows - 1; $row_no >= 0; $row_no--) {
    $result->data_seek($row_no);
    $row = $result->fetch_assoc();

?>
      <tr>
         <td><img src="https://cdn.iconscout.com/icon/free/png-256/gear-363-866275.png" alt="" /></td>
         <td style="text-align:left"><?=$row['customerName']?></td>
         <td><?=$row['country']?></td>
         <td><?=$row['phone']?></td>
         <td><?=$row['creditLimit']?></td>
      </tr>
<?
}
	}
	else{
		foreach ($result as $row) {
		?>
      <tr>
         <td><img src="https://cdn.iconscout.com/icon/free/png-256/gear-363-866275.png" alt="" /></td>
         <td style="text-align:left"><?=$row['customerName']?></td>
         <td><?=$row['country']?></td>
         <td><?=$row['phone']?></td>
         <td><?=$row['creditLimit']?></td>
      </tr>	
<?
		}
	}
?>

   </table>
</div>
</body>
</html>