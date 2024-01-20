<?php
require_once("dbconnection.php");
session_start();
       $uname=$_SESSION["username"];
	   
	$sql1="SELECT id,Name from patienttb where email='$uname'";
	$result1=mysqli_query($con,$sql1);
	if(mysqli_num_rows($result1)>0)
  {
	while($row=mysqli_fetch_assoc($result1))
		        {
		        	$id=$row["id"];
		        	$name=$row["Name"];
		        }
  }
  else
	{
		echo"<div class=text-danger>No records found....</div>";
	}

		        



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		h1,h2{
			text-align: center;
			color: dimgrey;
			margin-top: 50px;
		}
		body {
  background-image: url('image/plant1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; 
}
.patient table{
	width: 100%;
	margin: 15px;
}
.patient table thead td {
	padding: 30px 0;
	border-bottom: 1px solid #EEEEEE;
	font-weight: 600;

	
}
.patient table thead{
	background-color: lightgreen;
	padding: 30px 0;
}
.patient table tbody tr:nth-child(even){
        background-color: #eeeeee;

}
.patient table tbody tr:nth-child(odd){
        background-color: #eeeeee;

}
.patient table tbody td{
	margin: 10px;
	padding: 12px 15px;
}
.patient table tbody tr:hover{
	background-color: #f5f5f5;
	transform: scale(1.02);
}
.text-danger{
  
  font-size:23px;
  display: flex;
  margin-top: 50px;
	background-color:#ffb3b3;
	justify-content: space-between;
	border-radius: 5px;
	padding: 10px;
	color:red;
}

	</style>

</head>


<body>
	<div class="patient">
	<h1>Patient Name - <?php  echo $name;?></h1>
	<h2>Patient Identity Number - <?php  echo $id;?></h2>
	 <table>
 	<thead>
 		<tr>
 			
 			<th>Prescription ID</th>
 			<th>Medicine</th>
 			<th>Medicine dosage</th>
 			<th>Date</th>

 		</tr>
 	</thead>
 	<tbody>
 		<?php

		 require_once("dbconnection.php");
	$sql="SELECT  prestb.id,prestb.presid,medicinetb.medname,presmedtb.dosage,prestb.Dateadd FROM prestb INNER JOIN presmedtb ON prestb.presid=presmedtb.presid INNER JOIN medicinetb ON presmedtb.medid=medicinetb.medid WHERE id='$id'ORDER BY prestb.presid ASC";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
		{
			while ($row=$result-> fetch_assoc()) {

				echo"<tr>
				   
				   <td>$row[presid]</td>
				   <td>$row[medname]</td>
				   <td>$row[dosage]</td>
				   <td>$row[Dateadd]</td>
		
		
				 </tr>";
				 /*  <button class='buttons'  name='btnpres'>Prescription</button> <input type='hidden' name='id' value= '".$row['patientid']."'>
				   <input type='submit' name='btndelete' value ='Delete' class='buttons'>
				   <a href='patient.php?delete='".$row['patientid']."'' class='buttons'>Delete</a>
				   <a href='prescription.php?prescription='".$row['patientid']."'' class='buttons'>Prescription</a>*/
			}
		}
		else
	{
		echo"<div class=text-danger>No records found....</div>";
	}
	
        
 		?>
 	</tbody>
 </table>
</div>
</body>
</html>