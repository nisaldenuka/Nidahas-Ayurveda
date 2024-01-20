<link rel="stylesheet" type="text/css" href="patientstylenew2.css">
<link rel="stylesheet" type="text/css" href="newpatient.css">
<style type="text/css">
	    .patient table tbody tr:hover{
  background-color: #f5f5f5;
  transform: scale(1.02);
}
		h1 {
			text-align: center;
			color: dimgrey;
			margin-top: 60px;
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
<title>Add Patients History</title>
<div class="patient">
        <!--<h1 class="heading">Patients</h1>-->
        <h1>Add Patients History</h1>
<form name="patient" method="post" action="#">

 <table>
 	<thead>
 		<tr>
 			<th>Date add</th>
 			<th>Patient Number</th>
 			 <th>Patient Name</th>
             

 		</tr>
 	</thead>
 	<tbody>
<?php
require_once("dbconnection.php");

	$sql="SELECT Dateadd,id,Name FROM patienttb";
	$result = mysqli_query($con,$sql);
	while ($row=$result-> fetch_assoc()) {

		echo"<tr>
          <td>$row[Dateadd]</td>
           <td>$row[id]</td>
           <td>$row[Name]</td>
           



         </tr>";

	}
        
 		



?>