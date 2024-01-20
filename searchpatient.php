<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
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
<body>
<h1>Search</h1>
</body>
</html>

 		<?php

require_once("dbconnection.php");
if(isset($_POST["txtsk"]))
{
	$sk=$_POST["txtsk"];


	$sql="SELECT id,Name,email,gender,address,age FROM patienttb WHERE id='$sk'";
	$result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
  {
     echo"
 <div class='patient'><table>
  <thead>
    <tr>
      
      <th>Identity Number</th>
      <th>Patient Name</th>
      <th>Email</th>
            <th>Gender</th>
      <th>Address</th>
      <th>Age</th>
      <th>Action</th>
    </tr>
  </thead>";
    while($row=$result-> fetch_assoc()) {
        
 echo"
 
  <tbody>


    <tr>
           
           <td>$row[id]</td>
           <td>$row[Name]</td>
           <td>$row[email]</td>
           <td>$row[gender]</td>
           <td>$row[address]</td>
           <td>$row[age]</td>
           

           <td>
           <form action='presaddnew.php' method='post'>
           <input type='hidden' name='id' value= '$row[id]'>
          <button class='buttons'  name='btnpres'>Prescription</button> <input type='hidden' name='id' value= '$row[id]'>
           </form>
           </td>


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


 		//$sk=$_POST["txtsk"];

        
 		?>
