<link rel="stylesheet" type="text/css" href="newpatient.css">
<head>
	<style>
			h1 {
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
.patient table tbody tr:nth-child(even){
        background-color: #eeeeee;

}
        .patient table tbody tr:hover{
  background-color: #f5f5f5;
  transform: scale(1.02);
}
.text-danger{
  
  font-size:20px;
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
<h1>Medicines</h1>
<?php

require_once("dbconnection.php");
if(isset($_POST["txtsk"]))
{
	$sk=$_POST["txtsk"];

	$sql1="SELECT medicinetb.medid,medicinetb.medname,catagory.catagory,stocktb.stid,stocktb.quantity,medicinetb.totquantity,stocktb.price,stocktb.Dateadd FROM medicinetb INNER JOIN stocktb ON medicinetb.medid=stocktb.medid INNER JOIN catagory ON medicinetb.cid=catagory.cid 
        WHERE medicinetb.medid='$sk' OR medicinetb.medname LIKE '$sk%'";
	$result = mysqli_query($con,$sql1);
  if(mysqli_num_rows($result)>0)
  {
     echo"
 <div class='patient'>
   <table>
 	<thead>
 		<tr>
 			<th>Medecine Id</th>
 			<th>Medicine Name</th>

            <th>Catagory</th>
            <th>Stock Id</th>
            <th>Stock quantity</th>
            <th>Total quantity</th>
            <th>Price</th>
            <th>Date</th>
    </tr>
  </thead>";
    while($row=$result-> fetch_assoc()) {
        
 echo"
 
  <tbody>


    <tr>
         <td>$row[medid]</td>
           <td>$row[medname]</td>
           <td>$row[catagory]</td>
           <td>$row[stid]</td>
           <td>$row[quantity]</td>
           <td>$row[totquantity]</td>
           <td>$row[price]</td>
           <td>$row[Dateadd]</td>

         </tr>
            </tbody>
";

  }
  echo" </table>
 </div>";

  }

	else
	{
		echo"<div class=text-danger>No records found....</div>";
	}
  $con->close();
 


}



?>