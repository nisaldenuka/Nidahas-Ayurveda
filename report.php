

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
<title>Medicine Report</title>
<div class="patient">
        <!--<h1 class="heading">Patients</h1>-->
        <h1>Medicine Report</h1>
<form name="patient" method="post" action="#">

 <table>
 	<thead>
 		<tr>
 			<th>Medicine</th>
 			<th>Reduced quantity</th>
 			 <th>New quantity</th>
              <th>Reduced date</th>
             
 		</tr>
 	</thead>
 	<tbody>

<?php
 require_once("dbconnection.php");


 $previousMedicine = null;

 $sql = "SELECT medicinetb.medname, presmedtb.dosage, medicinetb.totquantity, prestb.Dateadd FROM medicinetb
 JOIN presmedtb ON medicinetb.medid = presmedtb.medid 
 JOIN prestb ON presmedtb.presid = prestb.presid";
 $result = mysqli_query($con, $sql);

 while ($row = $result->fetch_assoc()) {
	 echo "<tr>
			 <td width='25%'>$row[medname]</td>
			 <td width='5%'>$row[dosage]</td>";

	
	 if ($row['medname'] !== $previousMedicine) {
		 echo "<td width='5%'>$row[totquantity]</td>";
		 $previousMedicine = $row['medname'];
	 } else {
		 echo "<td width='5%'></td>";
	 }

	 echo "<td width='30%'>$row[Dateadd]</td>
		   </tr>";
 }

?>
 	</tbody>
 </table>