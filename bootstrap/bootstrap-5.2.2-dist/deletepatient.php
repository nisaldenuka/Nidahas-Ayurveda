 <?php
if(isset($_POST["btndelete"]))
        {
                $id=$_POST["id"];

                     //connect to the server
                        $con=mysqli_connect("localhost","nuser","nisalwinxclub");

                        //select database
                        mysqli_select_db($con,"ayurveda");

                        //sql query
                        $sql1="DELETE  FROM patientemployee WHERE Pnumber='$id'";
                        $return1=mysqli_query($con,$sql1);
                        $sql="DELETE  FROM patient WHERE Pnumber='$id'";
                        $return=mysqli_query($con,$sql);
                        
                        if($return && $return1)
                        {
                           echo"<div class='alert alert-danger' role='alert'>
                           Delete success 
                                </div>";
                                

                        }
                        
                        

                        mysqli_close($con);
                

                                
        }

?>

<link rel="stylesheet" type="text/css" href="patientstylenew2.css">
<link rel="stylesheet" type="text/css" href="newpatient.css">
<title>Patients</title>
<div class="patient">
        <!--<h1 class="heading">Patients</h1>-->
<form name="patient" method="post" action="#">

 <table>
 	<thead>
 		<tr>
 			<th>Patient Number</th>
 			<th>Identity Number</th>
 			 <th>Patient Name</th>
             <th>Email</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
<?php
$con1 = mysqli_connect("localhost","nuser","nisalwinxclub");
	//Select DB
	mysqli_select_db($con1,"ayurveda");
	$sql="SELECT * FROM patient";
	$result = mysqli_query($con1,$sql);
	while ($row=$result-> fetch_assoc()) {

		echo"<tr>
          <td>$row[Pnumber]</td>
           <td>$row[id]</td>
           <td>$row[Name]</td>
           <td>$row[email]</td>
           <td>$row[gender]</td>
           <td>$row[address]</td>
           

           <td>
           <form action='#' method='post'>
           <input type='hidden' name='id' value= '$row[Pnumber]'>
          <button class='buttons'  name='btndelete'>Delete</button> <input type='hidden' name='id' value= '$row[Pnumber]'>
           </form>
           </td>


         </tr>";
         /*  <button class='buttons'  name='btnpres'>Prescription</button> <input type='hidden' name='id' value= '".$row['patientid']."'>
           <input type='submit' name='btndelete' value ='Delete' class='buttons'>
           <a href='patient.php?delete='".$row['patientid']."'' class='buttons'>Delete</a>
           <a href='prescription.php?prescription='".$row['patientid']."'' class='buttons'>Prescription</a>*/
	}
        
 		


?>
 	</tbody>
 </table>
