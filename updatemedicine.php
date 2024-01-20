 <?php
 $a = "";
$b = "";
$c = "";
$d = "";
$e = "";
$f=  "";

require_once("dbconnection.php");
if(isset($_POST["btnupdate"]))
        {
                $id=$_POST["id"];
				$sid=$_POST["sid"];

        $sql1="SELECT medicinetb.medid,medicinetb.medname,medicinetb.cid,stocktb.quantity,stocktb.price,stocktb.stid FROM medicinetb INNER JOIN stocktb ON medicinetb.medid=stocktb.medid   
        WHERE medicinetb.medid='$id' AND stocktb.stid='$sid'";
        $result1 = mysqli_query($con,$sql1);
        if($row=mysqli_fetch_array($result1))
        {
                $a = $row['medid'];
                $b = $row['medname'];
                $c = $row['cid'];
                $d = $row['quantity'];
                $e = $row['price'];
				$f = $row['stid'];
                
        }

                                
        }
if(isset($_POST["btnadd"]))
{
	$totquantity="";
	$totquantitym="";
	$sid=$_POST["sid"];
	$medid=$_POST["medid"];$catagory=$_POST["catagory"];$medname=$_POST["medname"];
        $quantity=$_POST["txtquantity"];$price=$_POST["txtprice"];$desc=$_POST["txtdesc"];//$date=date('y-m-d',strtotime($_POST["date"]));
		if(is_numeric($quantity)){
			$sqlquantity="SELECT quantity FROM stocktb WHERE medid='$medid'";
			$returnq=mysqli_query($con,$sqlquantity);
			while($rowq=mysqli_fetch_assoc($returnq)){
				$totquantity=$rowq["quantity"];

			}
			if($quantity==$totquantity){
			
        if($desc!="")
        {
        	        if($catagory==0)
		        {
		        	 

		                                //sql query
		                                $sql="UPDATE medicinetb SET medid='$medid',medname='$medname',description='$desc' WHERE medid='$medid'";
		                                $return=mysqli_query($con,$sql);
		                                $sql1="UPDATE stocktb SET medid='$medid',quantity='$quantity',price='$price' WHERE medid='$medid' AND stid='$sid'";
		                                $return1=mysqli_query($con,$sql1);
		                                
		                                echo"<div class='msg'>
		                                   Update medicine success
		                                </div>";

		                               
		        }
		        else
		        {
		        	

		                                //sql query
		                                $sql="UPDATE medicinetb SET medid='$medid',medname='$medname',description='$desc',cid='$catagory' WHERE medid='$medid'";
		                                $return=mysqli_query($con,$sql);
		                                $sql1="UPDATE stocktb SET medid='$medid',quantity='$quantity',price='$price' WHERE medid='$medid' AND stid='$sid'";
		                                $return1=mysqli_query($con,$sql1);
		                                
		                                echo"<div class='msg'>
		                                   Update medicine success
		                                </div>";

									

		        }

        }
        else
        {
        	if($catagory==0)
		        {
		        	 

		                                //sql query
		                                $sql="UPDATE medicinetb SET medid='$medid',medname='$medname'WHERE medid='$medid'";
		                                $return=mysqli_query($con,$sql);
		                                $sql1="UPDATE stocktb SET medid='$medid',quantity='$quantity',price='$price' WHERE medid='$medid' AND stid='$sid'";
		                                $return1=mysqli_query($con,$sql1);
		                                
		                                echo"<div class='msg'>
		                                   Update medicine success
		                                </div>";

		                               
		        }
		        else
		        {
		        	

		                                //sql query
		                                $sql="UPDATE medicinetb SET medid='$medid',medname='$medname',cid='$catagory' WHERE medid='$medid'";
		                                $return=mysqli_query($con,$sql);
		                                $sql1="UPDATE stocktb SET medid='$medid',quantity='$quantity',price='$price' WHERE medid='$medid' AND stid='$sid'";
		                                $return1=mysqli_query($con,$sql1);
		                                
		                                echo"<div class='msg'>
		                                   Update medicine success
		                                </div>";

										

		        }

        }
	}
	elseif($quantity>$totquantity)
	{
		$newquantity=$quantity-$totquantity;
		$sqlquantity1="SELECT totquantity FROM medicinetb WHERE medid='$medid'";
			$returnq1=mysqli_query($con,$sqlquantity1);
			while($rowq1=mysqli_fetch_assoc($returnq1)){
				$totquantitym=$rowq1["totquantity"];

			}
			$newquantitym=$totquantitym+$newquantity;
		if($desc!="")
        {
        	        if($catagory==0)
		        {
		        	 

		                                //sql query
		                                $sql="UPDATE medicinetb SET medid='$medid',medname='$medname',description='$desc',totquantity='$newquantitym' WHERE medid='$medid'";
		                                $return=mysqli_query($con,$sql);
		                                $sql1="UPDATE stocktb SET medid='$medid',quantity='$quantity',price='$price' WHERE medid='$medid' AND stid='$sid'";
		                                $return1=mysqli_query($con,$sql1);
		                                
		                                echo"<div class='msg'>
		                                   Update medicine success
		                                </div>";

		                               
		        }
		        else
		        {
		        	

		                                //sql query
		                                $sql="UPDATE medicinetb SET medid='$medid',medname='$medname',description='$desc',cid='$catagory',totquantity='$newquantitym' WHERE medid='$medid'";
		                                $return=mysqli_query($con,$sql);
		                                $sql1="UPDATE stocktb SET medid='$medid',quantity='$quantity',price='$price' WHERE medid='$medid'AND stid='$sid'";
		                                $return1=mysqli_query($con,$sql1);
		                                
		                                echo"<div class='msg'>
		                                   Update medicine success
		                                </div>";

									

		        }

        }
        else
        {
        	if($catagory==0)
		        {
		        	 

		                                //sql query
		                                $sql="UPDATE medicinetb SET medid='$medid',medname='$medname',totquantity='$newquantitym'WHERE medid='$medid'";
		                                $return=mysqli_query($con,$sql);
		                                $sql1="UPDATE stocktb SET medid='$medid',quantity='$quantity',price='$price' WHERE medid='$medid' AND stid='$sid'";
		                                $return1=mysqli_query($con,$sql1);
		                                
		                                echo"<div class='msg'>
		                                   Update medicine success
		                                </div>";

		                               
		        }
		        else
		        {
		        	

		                                //sql query
		                                $sql="UPDATE medicinetb SET medid='$medid',medname='$medname',cid='$catagory',totquantity='$newquantitym' WHERE medid='$medid'";
		                                $return=mysqli_query($con,$sql);
		                                $sql1="UPDATE stocktb SET medid='$medid',quantity='$quantity',price='$price' WHERE medid='$medid' AND stid='$sid'";
		                                $return1=mysqli_query($con,$sql1);
		                                
		                                echo"<div class='msg'>
		                                   Update medicine success
		                                </div>";

										

		        }

        }
	}
	elseif($quantity<$totquantity){
		$newquantity=$totquantity-$quantity;
		$sqlquantity1="SELECT totquantity FROM medicinetb WHERE medid='$medid'";
			$returnq1=mysqli_query($con,$sqlquantity1);
			while($rowq1=mysqli_fetch_assoc($returnq1)){
				$totquantitym=$rowq1["totquantity"];

			}
			$newquantitym=$totquantitym-$newquantity;
		if($desc!="")
        {
        	        if($catagory==0)
		        {
		        	 

		                                //sql query
		                                $sql="UPDATE medicinetb SET medid='$medid',medname='$medname',description='$desc',totquantity='$newquantitym' WHERE medid='$medid'";
		                                $return=mysqli_query($con,$sql);
		                                $sql1="UPDATE stocktb SET medid='$medid',quantity='$quantity',price='$price' WHERE medid='$medid' AND stid='$sid'";
		                                $return1=mysqli_query($con,$sql1);
		                                
		                                echo"<div class='msg'>
		                                   Update medicine success
		                                </div>";

		                               
		        }
		        else
		        {
		        	

		                                //sql query
		                                $sql="UPDATE medicinetb SET medid='$medid',medname='$medname',description='$desc',cid='$catagory',totquantity='$newquantitym' WHERE medid='$medid'";
		                                $return=mysqli_query($con,$sql);
		                                $sql1="UPDATE stocktb SET medid='$medid',quantity='$quantity',price='$price' WHERE medid='$medid' AND stid='$sid'";
		                                $return1=mysqli_query($con,$sql1);
		                                
		                                echo"<div class='msg'>
		                                   Update medicine success
		                                </div>";

									

		        }

        }
        else
        {
        	if($catagory==0)
		        {
		        	 

		                                //sql query
		                                $sql="UPDATE medicinetb SET medid='$medid',medname='$medname',totquantity='$newquantitym'WHERE medid='$medid'";
		                                $return=mysqli_query($con,$sql);
		                                $sql1="UPDATE stocktb SET medid='$medid',quantity='$quantity',price='$price' WHERE medid='$medid' AND stid='$sid'";
		                                $return1=mysqli_query($con,$sql1);
		                                
		                                echo"<div class='msg'>
		                                   Update medicine success
		                                </div>";

		                               
		        }
		        else
		        {
		        	

		                                //sql query
		                                $sql="UPDATE medicinetb SET medid='$medid',medname='$medname',cid='$catagory',totquantity='$newquantitym' WHERE medid='$medid'";
		                                $return=mysqli_query($con,$sql);
		                                $sql1="UPDATE stocktb SET medid='$medid',quantity='$quantity',price='$price' WHERE medid='$medid' AND stid='$sid'";
		                                $return1=mysqli_query($con,$sql1);
		                                
		                                echo"<div class='msg'>
		                                   Update medicine success
		                                </div>";

										

		        }

        }

	}
	}
	else{
		echo"<div class='invalid'>
		                          Quantity must be numaric
		                                </div>";
	}

}        


?>


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
</style>
<title>Medicine</title>
<div class="patient">
        <!--<h1 class="heading">Patients</h1>-->
        <h1>Update Medicine</h1>
<form name="patient" method="post" action="#">

 <table>
 	<thead>
 		<tr>
 			<th>Medecine Id</th>
 			<th>Medicine Name</th>

            <th>Catagory Id</th>
			<th>Stock ID</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Date</th>
            <th>Action</th>
 		</tr>
 	</thead>
 	<tbody>

<?php

require_once("dbconnection.php");

	$sql="SELECT medicinetb.medid,medicinetb.medname,medicinetb.cid,stocktb.stid,stocktb.quantity,stocktb.price,stocktb.Dateadd FROM medicinetb INNER JOIN stocktb ON medicinetb.medid=stocktb.medid";
	$result = mysqli_query($con,$sql);
	while ($row=$result-> fetch_assoc()) {

		echo"<tr>
          <td>$row[medid]</td>
           <td>$row[medname]</td>
           <td>$row[cid]</td>
		   <td>$row[stid]</td>
           <td>$row[quantity]</td>
           <td>$row[price]</td>
           <td>$row[Dateadd]</td>
           

           <td>
           <form action='#' method='post'>
           <input type='hidden' name='id' value= '$row[medid]'><input type='hidden' name='sid' value= '$row[stid]'>
          <button class='buttons'  name='btnupdate'>Update</button> <input type='hidden' name='id' value= '$row[medid]'><input type='hidden' name='sid' value= '$row[stid]'>
           </form>
           </td>


         </tr>";

	}
        
 		



?>
 	</tbody>
 </table>
 <!DOCTYPE html>
<html>
<head>
	<title>Update Medicine</title>
	<style>
		body {
			background-color: white;
			font-family: Arial, sans-serif;
		}
		
		.update {
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
			max-width: 500px;
			margin: 0 auto;
		}
		
		h1 {
			text-align: center;
			color: dimgrey;
			margin-top: 50px;
		}
		
		label {
			display: block;
			margin-bottom: 10px;
			color: #555;
		}
		
		input[type="text"], select {
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: none;
			margin-bottom: 20px;
			box-shadow: 0 0 5px rgba(0,0,0,0.1);
		}
		input[type="date"], select {
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: none;
			margin-bottom: 20px;
			box-shadow: 0 0 5px rgba(0,0,0,0.1);
		}
		textarea{
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: none;
			margin-bottom: 20px;
			box-shadow: 0 0 5px rgba(0,0,0,0.1);
		}
		
		.button-row {
			display: flex;
			flex-direction: row;
			justify-content: space-between;
			align-items: center;
			margin-top: 20px;
		}
		
		button {
			padding: 10px 20px;
			border-radius: 5px;
			border: none;
			background-color: #3498db;
			color: #fff;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}
		
		button:hover {
			background-color: #2980b9;
		}
		
		.age-field {
			display: none;
		}
		
		.age-label {
			display: block;
			margin-bottom: 10px;
			color: #555;
		}
		
		.age-value {
			font-weight: bold;
		}
		.msg{
			display: flex;
			margin-top: 50px;
			background-color:lightgreen;
			justify-content: space-between;
			border-radius: 5px;
			padding: 10px;
			
		}
	</style>
</head>
<body>
<link rel="stylesheet" type="text/css" href="patientstylenew2.css">
  <h1>Update Medicine</h1>
	<form name="update" action="#" method="post">
		<label for="med-id">Medicine id:</label>
		<input type="text" id="medid" name="medid" placeholder="Enter Medicine id"required value ="<?php  echo $a;?>"readonly>
		
		<input type="hidden" name="sid" value="<?php echo $f; ?>">
		
		<label for="medname">Medicine Name:</label>
		<input type="text" id="medname" name="medname" placeholder="Enter Medicine name"required value ="<?php  echo $b;?>">
		
		<!--<label for="last-name">Contact Number:</label>
		<input type="text" id="last-name" name="last-name" required>-->

		<label for="catagory">Catagory:</label>
		<select id="catagory" name="catagory" required value ="<?php  echo $c;?>">
			
			<option value= 0 selected></option>
			<option value= 1>Leha</option>
			<option value= 2>Kalka</option>
			<option value= 3>Arishta</option>
			<option value= 4>Guli</option>
			<option value= 5>Asawa</option>
			<option value= 6>Pethi</option>
			<option value= 7>Kwatha</option>
			<option value= 8>Choorna</option>
			<option value= 9>Oil</option>
			<option value= 10>Lepa</option>
			
		</select>
		
		<label for="qty">Quantity:</label>
		<input type="text" id="txtquantity"  name="txtquantity" placeholder="Enter product quantity" required value ="<?php  echo $d;?>">
		<label for="price">Unit Price:</label>
		<input type="text" id="txtprice"  name="txtprice" placeholder="Enter unitprice" required value ="<?php  echo $e;?>">
		<label for="desc">Description:</label>
		<textarea name="txtdesc" placeholder="About medicine"></textarea>
		
		
		<div class="button-row">
			<button type="reset">Reset</button>
			<button type="submit" name="btnadd">Update</button>
			<!--<button type="submit" onclick="addPatient(event)">Add Patient</button>
			<script type="text/javascript">
			alert(`The patient ${patient-id} was added successfully.`);
			</script>-->
		</div>
	</form>
	</body>
</html>