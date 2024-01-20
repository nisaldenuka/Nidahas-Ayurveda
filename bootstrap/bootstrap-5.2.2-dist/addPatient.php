<?php
session_start();
$uname=$_SESSION["txtuname"];

if(isset($_POST["btnadd"]))
{
	        $pnum=$_POST["patientno"];$name=$_POST["name"];$id=$_POST["patientid"];
        $address=$_POST["address"];
        $gender=$_POST["sex"];


                                        //connect to the server
                                $con=mysqli_connect("localhost","nuser","nisalwinxclub");

                                //select database
                                mysqli_select_db($con,"ayurveda");

                                //sql query
                                $sql="INSERT INTO patient(Pnumber,id,Name,gender,address) VALUES ('$pnum','$id','$name','$gender','$address')";
                                $return=mysqli_query($con,$sql);
                                $sql1="INSERT INTO patientemployee(Eid,Pnumber) VALUES ('$uname','$pnum')";
                                $return1=mysqli_query($con,$sql1);
                                
                                echo"<div class='alert alert-info'>
                                   Add patient success
                                </div>";

                                mysqli_close($con);
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
	</style>
</head>
<body>
	<h1>Add Patient</h1>
	<form action="#" method="post">
		<label for="patient-id">Patient Number:</label>
		<input type="text" id="patientno" name="patientno" required>
		<label for="patient-id">Patient Identity Number:</label>
		<input type="text" id="patientid" name="patientid" required>
		
		<label for="first-name">Patient Name:</label>
		<input type="text" id="name" name="name" required>
		
		<!--<label for="last-name">Contact Number:</label>
		<input type="text" id="last-name" name="last-name" required>-->

		<label for="sex">Gender:</label>
		<select id="sex" name="sex" required>
			<option value="male">Male</option>
			<option value="female">Female</option>
			
		</select>
		
		<label for="address">Address:</label>
		<input type="text" id="address" name="address" required>
		
		<!--<label for="birthday">Birthday:</label>
		<input type="date" id="birthday" name="birthday" onchange="calculateAge()" required>-->
		

		
		<!--<div class="age-field">
			<label class="age-label">Age:</label>
			<span class="age-value" id="age-value"></span>
		</div>-->
		
		<div class="button-row">
			<button type="reset">Reset</button>
			<button type="submit" name="btnadd">Add Patient</button>
			<!--<button type="submit" onclick="addPatient(event)">Add Patient</button>
			<script type="text/javascript">
			alert(`The patient ${patient-id} was added successfully.`);
			</script>-->
		</div>
	</form>
</body>
</html>