 <?php
 require_once("dbconnection.php");
if(isset($_POST["btndelete"]))
        {
                $id=$_POST["id"];
                $presid="";


                        $sql3="SELECT id,presid FROM prestb WHERE id='$id'";
                        $result3=mysqli_query($con,$sql3);
                                if(mysqli_num_rows($result3)>0)
                                {
                                	
                                  /*while($row=mysqli_fetch_assoc($result3))
                                    {
                                      $presid=$row["presid"];
                                    }
                                    $sql4="DELETE FROM presstocktb WHERE presid='$presid'";
                                    $result4=mysqli_query($con,$sql4);
                                    $sql2="DELETE FROM prestb WHERE id='$id'";
                                  $return2=mysqli_query($con,$sql);
                                  $sql="DELETE  FROM patienttb WHERE id='$id'";
                                   $return=mysqli_query($con,$sql);

                                   if($return && $return2 && $result4)
                                        {
                                        echo"<div class='msg' role='alert'>
                                        Delete success 
                                                </div>";
                                                

                                        }*/
                                        echo"<div class='invalid' role='alert'>
                                           Can not delete this patient
                                                </div>";

                                }
                                else{
                                        $sql="DELETE  FROM patienttb WHERE id='$id'";
                                        $return=mysqli_query($con,$sql);   
                                        if($return){
                                                echo"<div class='msg' role='alert'>
                                           Delete success 
                                                </div>";
                                        }
                                }
                        
                        
                        
                       
                        
                        

                        //mysqli_close($con);
                        
                

                                
        }

?>

<link rel="stylesheet" type="text/css" href="patientstylenew2.css">
<link rel="stylesheet" type="text/css" href="newpatient.css">
<title>Patients</title>
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
        body {
  background-image: url('image/plant1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; 
}
h1 {
            text-align: center;
            color: dimgrey;
            margin-top: 60px;
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
        <!--<h1 class="heading">Patients</h1>-->
        <h1>Delete Patient</h1>
<form name="patient" method="post" action="#">

 <table>
 	<thead>
 		<tr>
 			
 			<th>Identity Number</th>
 			 <th>Patient Name</th>
                          <th>Age</th>
             <th>Email</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
<?php
require_once("dbconnection.php");
//$con1 = mysqli_connect("localhost","root","");
	//Select DB
	//mysqli_select_db($con1,"ayurveda2");
	$sql="SELECT * FROM patienttb";
	$result = mysqli_query($con,$sql);
	while ($row=$result-> fetch_assoc()) {

		echo"<tr>
          
           <td>$row[id]</td>
           <td>$row[Name]</td>
           <td>$row[age]</td>
           <td>$row[email]</td>
           <td>$row[gender]</td>
           <td>$row[address]</td>
           

           <td>
           <form action='#' method='post'>
           <input type='hidden' name='id' value= '$row[id]'>
          <button class='buttons'  name='btndelete'>Delete</button> <input type='hidden' name='id' value= '$row[id]'>
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
