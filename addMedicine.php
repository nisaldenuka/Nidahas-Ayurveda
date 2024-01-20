<?php
require_once("dbconnection.php");
if(isset($_POST["btnadd"]))
{
	$sid=$_POST["stockid"];$medname=$_POST["medname"];$medid=$_POST["medid"];
        $quantity=$_POST["txtquantity"];$price=$_POST["txtprice"];$desc=$_POST["txtdesc"];;
        $catagory=$_POST["catagory"];
        if(is_numeric($sid) && is_numeric($quantity) && is_numeric($price) )
        {

                                $duplicate="SELECT medid,totquantity,medname FROM medicinetb WHERE medid='$medid'";
                                $result2=mysqli_query($con,$duplicate);
                                if(mysqli_num_rows($result2)>0)
                                {
									while($row1=mysqli_fetch_assoc($result2)){
										$name=$row1["medname"];
										$nowquantity=$row1['totquantity'];
										$newquantity=$nowquantity+$quantity;

									}
                                	
								  

								  if($name==$medname){

									$sql3="UPDATE medicinetb SET totquantity='$newquantity' WHERE medid='$medid'";
									$return3=mysqli_query($con,$sql3);
									$sql2="INSERT INTO stocktb(stid,medid,quantity,price) VALUES ('$sid','$medid','$quantity','$price')";
				                                $return2=mysqli_query($con,$sql2);
									echo"<div class='msg'>			 Medicine Updated
																							</div>";
								  }
								  else{
									echo"<div class='msger'>
                                   Medicine ID Exist
                                </div>";

								  }

								   
                                }
                                else{
									
  
																				//sql query
				                                $sql="INSERT INTO medicinetb(medid,medname,description,totquantity,cid) VALUES ('$medid','$medname','$desc','$quantity','$catagory')";
				                                $return=mysqli_query($con,$sql);
				                                $sql2="INSERT INTO stocktb(stid,medid,quantity,price) VALUES ('$sid','$medid','$quantity','$price')";
				                                $return2=mysqli_query($con,$sql2);
																				if($return2)
																				{

																					echo"<div class='msg'>
																							Add medicine success
																							</div>";
																				}
																				
																			   
																						

																				$con->close();
																				
																			
                                
                                
                                
                              }

        }
        else
        {
        	echo"<div class='msger'>
                                   Stock id , quantity and price must be numeric value
                                </div>";
        }

         
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Medicine</title>
	<style>
		body {
			background-color:lightgray;
			font-family: Arial, sans-serif;
			justify-content: center;
            align-items: center;
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
			text-align: center;
			display: block;
			margin-bottom: 10px;
			color: #555;
		}
		
		input[type="text"], select {
			
			position: relative;
			justify-content: center;
            align-items: center;
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
		.msger{
			display: flex;
			margin-top: 50px;
			background-color:lightyellow;
			justify-content: space-between;
			border-radius: 5px;
			padding: 10px;
			
		}
	</style>
</head>
<body>
<link rel="stylesheet" type="text/css" href="patientstylenew2.css">
  <h1>Add Medicine</h1>
	<form name="add" action="#" method="post">
		<label for="stock-id">Stock id</label>
		<input type="text" id="stockid" name="stockid" placeholder="Enter Stock id" required >
		<label for="med-id">Medicine id</label>
		<input type="text" id="medid" name="medid" placeholder="Enter Medicine id"required>
		
		<label for="medname">Medicine Name</label>
		<input type="text" id="medname" name="medname" placeholder="Enter Medicine name"required>
		
		<!--<label for="last-name">Contact Number:</label>
		<input type="text" id="last-name" name="last-name" required>-->

		<label for="catagory">Catagory</label>
		<select id="catagory" name="catagory" required >
			
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
		
		<label for="qty">Quantity</label>
		<input type="text" id="txtquantity"  name="txtquantity" placeholder="Enter product quantity" required>
		<label for="price">Unit Price</label>
		<input type="text" id="txtprice"  name="txtprice" placeholder="Enter unitprice" required>
		<label for="desc">Description</label>
		<textarea name="txtdesc" placeholder="About medicine"></textarea>
		
		
		
		<div class="button-row">
			<button type="reset">Reset</button>
			<button type="submit" name="btnadd">Add</button>

		</div>
	</form>
	</body>
</html>