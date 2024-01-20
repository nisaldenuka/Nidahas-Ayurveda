<?php
require_once("dbconnection.php");


if(isset($_POST["btnadd"]))
{
	        $name=$_POST["name"];$id=$_POST["patientid"];
        $address=$_POST["address"];
        $gender=$_POST["sex"];$age=$_POST["age"];
         if(strlen($id) !== 11){
			echo "<div class='msger'>Patient Identity Number must be exactly 11 characters long.</div>";
		 }
         	 else{
				if(is_numeric($age) && $age<110 && $age>17){

                                $duplicate="SELECT id FROM patienttb WHERE id='$id'";
                                $result2=mysqli_query($con,$duplicate);
                                if(mysqli_num_rows($result2)>0)
                                {
                                	echo"<div class='msger'>
                                   Patient Exist
                                </div>";
                                }
                                else{

                                //sql query
                                $sql="INSERT INTO patienttb(id,Name,age,gender,address) VALUES ('$id','$name','$age','$gender','$address')";
                                $return=mysqli_query($con,$sql);
                               
                                
                                echo"<div class='msg'>
                                   Add patient success
                                </div>";

                                $con->close();
                             }

							}
							else{
								echo"<div class='invalid'>
                                   Age not valid
                                </div>";
							}
							}
         


                                        
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Patient</title>
	<style>
		body {
			background-color: #2ecc71;
			font-family: Arial, sans-serif;
		}
		
		form {
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
			max-width: 500px;
			margin: 0 auto;
		}
		
		h1 {
			text-align: center;
			color: #fff;
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
<body>
	<h1>Add Patient</h1>
	<form action="#" method="post">
		
		<label for="patient-id">Patient Identity Number:</label>
		<input type="text" id="patientid" name="patientid" required>
		
		<label for="first-name">Patient Name:</label>
		<input type="text" id="name" name="name" required>
        <label for="first-name">Age</label>
		<input type="text" id="age" name="age" required>

		<label for="sex">Gender:</label>
		<select id="sex" name="sex" required>
			<option value="male">Male</option>
			<option value="female">Female</option>
			
		</select>
		
		<label for="address">Address:</label>
		<input type="text" id="address" name="address" required>
		

		
		<div class="button-row">
			<button type="reset">Reset</button>
			<button type="submit" name="btnadd">Add Patient</button>

		</div>
	</form>
</body>
</html>