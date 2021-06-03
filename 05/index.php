<?php

include '../lib/conn.php';



if ($unbuffered){
	$mysqli->real_query("SELECT * FROM customers ORDER BY customerName ASC");
	$result = $mysqli->use_result();
}

else{
	$result = $mysqli->query("SELECT * FROM customers ORDER BY customerName ASC");
}


if ($debug){
	
	if ($reverse){
		if($unbuffered){
			echo "<i><h4>Can't work Unbuffered with Reverse Order. Please off either one.</h4></i>";
		}
		else{
echo "Reverse order...<br>\n";
for ($row_no = $result->num_rows - 1; $row_no >= 0; $row_no--) {
    $result->data_seek($row_no);
    $row = $result->fetch_assoc();
    echo " customerName = " . $row['customerName'] . "<br>\n";
}
		}
	}
	else {


echo "<br><br>Result set order...<br>\n";
foreach ($result as $row) {
    echo " customerName = " . $row['customerName'] . "<br>\n";
}

	}
	
if($native_data_type)
	echo "<i><h4>Native data type with mysqlnd and connection option</h4></i>";


	printf("<br>customerNumber = %s (%s)\n", $row['customerNumber'], gettype($row['customerNumber']));
	printf("<br>customerName = %s (%s)\n", $row['customerName'], gettype($row['customerName']));
	printf("<br>contactLastName = %s (%s)\n", $row['contactLastName'], gettype($row['contactLastName']));
	printf("<br>contactFirstName = %s (%s)\n", $row['contactFirstName'], gettype($row['contactFirstName']));
	printf("<br>phone = %s (%s)\n", $row['phone'], gettype($row['phone']));
	printf("<br>addressLine1 = %s (%s)\n", $row['addressLine1'], gettype($row['addressLine1']));
	printf("<br>addressLine2 = %s (%s)\n", $row['addressLine2'], gettype($row['addressLine2']));
	printf("<br>city = %s (%s)\n", $row['city'], gettype($row['city']));
	printf("<br>state = %s (%s)\n", $row['state'], gettype($row['state']));
	printf("<br>postalCode = %s (%s)\n", $row['postalCode'], gettype($row['postalCode']));
	printf("<br>country = %s (%s)\n", $row['country'], gettype($row['country']));
	printf("<br>salesRepEmployeeNumber = %s (%s)\n", $row['salesRepEmployeeNumber'], gettype($row['salesRepEmployeeNumber']));
	printf("<br>creditLimit = %s (%s)\n", $row['creditLimit'], gettype($row['creditLimit']));

	print "<br>";

}
?>


<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>05 | Maksu</title>
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
		if (($unbuffered) && ($debug)){
			echo "<i><h4>Please off Debug</h4></i>";
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
	}
?>

   </table>
</div>
</body>
</html>