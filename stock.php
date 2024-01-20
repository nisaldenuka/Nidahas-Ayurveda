<?php

?>
 <!DOCTYPE html>
<html>
<head>
<title>Stock details</title>
<style>
			h1 {
			text-align: center;
			color: dimgrey;
			margin-top: 50px;
		}
                    .patient table tbody tr:hover{
  background-color: #f5f5f5;
  transform: scale(1.02);
}
                        body {
  background-image: url('image/plant1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; 
}
.patient table tbody tr:nth-child(even){
        background-color: #eeeeee;

}
</style>
</head>
<body>
<link rel="stylesheet" type="text/css" href="patientstylenew2.css">

<link rel="stylesheet" type="text/css" href="newpatient.css">
<div class="patient">

        <h1>Stock details</h1>
<form name="patient" method="post" action="#">

 <table>
 	<thead>
 		<tr>
 			<th>Stock ID</th>
 			<th>Medicine ID</th>
 			<th>Stock quantity(for add date)</th>
 			<th>Price</th>
 			<th>Add date</th>
 			

 		</tr>
 	</thead>
 	<tbody>
 		<?php
 
require_once("dbconnection.php");

	$sql="SELECT * FROM stocktb ";
	$result = mysqli_query($con,$sql);
	while ($row=$result-> fetch_assoc()) {

		echo"<tr>
           <td>$row[stid]</td>
           <td>$row[medid]</td>
           <td>$row[quantity]</td>
           <td>$row[price]</td>
           <td>$row[Dateadd]</td>
           


         </tr>";
       
	}
        
 		?>
 	</tbody>
 </table>
     
     </form>
</div>
</body>
</html>
