<?php
require_once("dbconnection.php");
if(isset($_POST["btndelete"]))
        {
                $id=$_POST["id"];


                        $sql2="SELECT medid FROM presmedtb WHERE medid='$id'";
                        $result2=mysqli_query($con,$sql2);
                        if(mysqli_num_rows($result2)>0)
                        {
                                echo"<div class='msg' role='alert'>
                           Can not delete this medicine.This medicine availabale for many prescription 
                                </div>";
                        }
                        else{
                                $sql="DELETE  FROM stocktb WHERE medid='$id'";
                                $return=mysqli_query($con,$sql);
                                $sql1="DELETE  FROM medicinetb WHERE medid='$id'";
                                $return1=mysqli_query($con,$sql1);
                                
                                if($return1 && $return)
                                {
                                   echo"<div class='msg' role='alert'>
                                   Delete success 
                                        </div>";
                                        
        
                                }
                        }

                                
        }

?>
<link rel="stylesheet" type="text/css" href="patientstylenew2.css">
<link rel="stylesheet" type="text/css" href="newpatient.css">
<title>Delete Medicine</title>
<head>
    <style>
        .msg{
            display: flex;
            margin-top: 50px;
            background-color:lightgreen;
            justify-content: space-between;
            border-radius: 5px;
            padding: 10px;
            
        }
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
.patient table{
        width:90%;
        margin-left: auto;
        margin-right: auto;
}
.patient table tbody tr:nth-child(even){
        background-color: #eeeeee;

}
.invalid{
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
<div class="patient">
    
        <h1>Delete Medicine</h1>
<form name="patient" method="post" action="#">

<table>
 	<thead>
 		<tr>
 			<th>Medecine ID</th>
 			<th>Medicine Name</th>

            <th>Catagory Id</th>
            <th>Quantity</th>
            <th>Stock ID</th>
            <th>Price</th>
            
            <th>Date</th>
            <th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
<?php
require_once("dbconnection.php");

	$sql="SELECT medicinetb.medid,medicinetb.medname,medicinetb.cid,medicinetb.totquantity,stocktb.stid,stocktb.price,stocktb.Dateadd FROM medicinetb INNER JOIN stocktb ON medicinetb.medid=stocktb.medid";
	$result = mysqli_query($con,$sql);
	while ($row=$result-> fetch_assoc()) {

		echo"<tr>
          <td>$row[medid]</td>
           <td>$row[medname]</td>
           <td>$row[cid]</td>
           <td>$row[totquantity]</td>
           <td>$row[stid]</td>
           <td>$row[price]</td>
           <td>$row[Dateadd]</td>
           

           <td>
           <form action='#' method='post'>
           <input type='hidden' name='id' value= '$row[medid]'>
          <button class='buttons'  name='btndelete'>Delete</button> <input type='hidden' name='id' value= '$row[medid]'>
           </form>
           </td>


         </tr>";

	}
        
 		



?>
 	</tbody>
 </table>