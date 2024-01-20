 <?php
 $a = "";
$b = "";
$c = "";
$d = "";
$e = "";
require_once("dbconnection.php");
if(isset($_POST["btnupdate"]))
        {
                $id=$_POST["id"];

 
        $sql1 = "SELECT id,Name,age,gender,address FROM patienttb WHERE id='$id'";
        $result1 = mysqli_query($con,$sql1);
        if($row=mysqli_fetch_array($result1))
        {
                $a = $row[0];
                $b = $row[1];
                
				$c = $row['age'];
                $d = $row['gender'];
                $e = $row['address'];
                  
                
        }
                       
        }
if(isset($_POST["btnadd"]))
{

	$idno=$_POST["patientid"];$name=$_POST["name"];
        $address=$_POST["address"];$gender=$_POST["sex"];$age=$_POST["age"];

        if($gender=="none")
        {
        	
                                $sql="UPDATE patienttb SET id='$idno',Name='$name',address='$address',age='$age' WHERE id='$idno'";
                                $return=mysqli_query($con,$sql);
								
                                
                                echo"<div class='msg'>
                                   Update patient success
                                </div>";

                                
        }
        else
        {

                                $sql="UPDATE patienttb SET id='$idno',Name='$name',gender='$gender',address='$address',age='$age' WHERE id='$idno'";
                                $return=mysqli_query($con,$sql);
                                
                                echo"<div class='msg'>
                                   Update patient success
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
<title>Patients</title>
<div class="patient">
        <!--<h1 class="heading">Patients</h1>-->
        <h1>Update Patient</h1>
<form name="patient" method="post" action="#">

 <table>
 	<thead>
 		<tr>
 			
 			<th>Identity Number</th>
 			 <th>Patient Name</th>
             <th>Email</th>
			 <th>Age</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Action</th>
 		</tr>
 	</thead>
 	<tbody>

<?php
require_once("dbconnection.php");

	$sql="SELECT * FROM patienttb";
	$result = mysqli_query($con,$sql);
	while ($row=$result-> fetch_assoc()) {

		echo"<tr>
          
           <td>$row[id]</td>
           <td>$row[Name]</td>
           <td>$row[email]</td>
		   <td>$row[age]</td>
           <td>$row[gender]</td>
           <td>$row[address]</td>
           

           <td>
           <form action='#' method='post'>
           <input type='hidden' name='id' value= '$row[id]'>
          <button class='buttons'  name='btnupdate'>Update</button> <input type='hidden' name='id' value= '$row[id]'>
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
	<title>Add Patient</title>
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
<div id='update'>
  <h1>Update Patient</h1>
	<form name="update" action="#" method="post">
		
		<label for="patient-id">Patient Identity Number:</label>
		<input type="text" id="patientid" name="patientid" value ="<?php  echo $a;?>" required readonly>
		
		<label for="first-name">Patient Name:</label>
		<input type="text" id="name" name="name"  value ="<?php  echo $b;?>" required>
		<label for="first-name">Age:</label>
		<input type="text" id="age" name="age"  value ="<?php  echo $c;?>" required>

		<label for="sex">Gender:</label>
		<select id="sex" name="sex" required value ="<?php  echo $d;?>">
			<option value="none" selected></option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			
		</select>
		
		<label for="address">Address:</label>
		<input type="text" id="address" name="address"  value ="<?php  echo $e;?>" required>
		

		
		<div class="button-row">
			<button type="reset">Reset</button>
			<button type="submit" name="btnadd">Update</button>

		</div>
	</form>
	</div>
	</body>
</html>
