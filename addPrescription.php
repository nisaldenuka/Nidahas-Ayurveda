<?php
if(isset($_POST["btnadd"]))
{
   $id="";
}
else{
     $id=$_POST["id"];
}
?>
<?php
if(isset($_POST["btnadd"]))
{
	$pnumber="";
	$presid="";
    $idnew=$_POST["txtid"];
	$pid=$_POST["txtpid"];
	$mid=$_POST["txtmid"];
	$dosage=$_POST["txtdosage"];
	$date=date('y-m-d',strtotime($_POST["date"]));
	 $con1 = mysqli_connect("localhost","root","");
		        //Select DB
		        mysqli_select_db($con1,"ayurveda");
		        $duplicate="SELECT prescriptionid,Pnumber FROM prescription WHERE prescriptionid='$pid'";
		        $result4=mysqli_query($con1,$duplicate);
                
		        while($row=mysqli_fetch_assoc($result4))
		        {
		        	$pnumber=$row["Pnumber"];
		        	$presid=$row["prescriptionid"];
		        }

		        	
				
				
				if($pnumber!=$idnew && $pid==$presid)
		        	{
		        	echo"<div class='msger'>
                                   Prescription ID Exist
                                </div>";
                                }
								else
		        {
		        	if($pid!="" && $mid!="" &&$dosage!=""&& $idnew!=""){

		if( is_numeric($pid))

		{
			if( is_numeric($dosage))
			{
		            $con1 = mysqli_connect("localhost","root","");
		        //Select DB
		        mysqli_select_db($con1,"ayurveda");
	                 $sql3="SELECT quantity,price FROM stockmedicine WHERE medid='$mid'";
	                 $result3=mysqli_query($con1,$sql3);
                 while($row=mysqli_fetch_assoc($result3))
                 {
                 	$quantity=$row["quantity"];
                 	$price=$row["price"];
                 }
                 if($quantity>$dosage)
                 {
                 	$newquantity=$quantity-$dosage;
                 	$lessprice=$dosage*$price;

                 	$sql4="UPDATE stockmedicine SET quantity='$newquantity' WHERE medid='$mid'";
                 	$result4=mysqli_query($con1,$sql4);
                 	//$sql5="INSERT INTO medreport(medid,finishquantity,dateadd,cost) VALUES('$mid','$dosage','$date','$lessprice')";
                 	//$result5=mysqli_query($con1,$sql5);
                 	$sql2="SELECT *FROM prescription WHERE prescriptionid='$pid'AND Pnumber='$idnew'";
		    $result=mysqli_query($con1,$sql2);
		    if($row=mysqli_fetch_array($result))
			{
				$sql2="INSERT INTO prescriptionmedicine(prescriptionid,medid,dosage) VALUES('$pid','$mid','$dosage')";
		        $return2=mysqli_query($con1,$sql2);
		        echo"<div class='msg'>
		                                    success
		                                </div>";

		               mysqli_close($con1);

			}
			else{
		          $sql1="INSERT INTO prescription (prescriptionid,Pnumber) VALUES('$pid','$idnew')";
		        $return1=mysqli_query($con1,$sql1);
		        $sql2="INSERT INTO prescriptionmedicine(prescriptionid,medid,dosage) VALUES('$pid','$mid','$dosage')";
		        $return2=mysqli_query($con1,$sql2);
		        echo"<div class='msg'>
		                                    success
		                                </div>";

		               mysqli_close($con1);
			}

                 }
                 else
                 {
                     echo"<div class='msger'>
                                   Medicine not enough for dosage
                                </div>"; 
                 }


	        
        
		}
		else
		{
			echo"<div class='msger'>
                                   Please enter value dosage
                                </div>";
		}

		}
		else
		{
			echo"<div class='msger'>Prescription id must be numeric
		                                </div>";
		}
	
			
        
	}
	else{
		echo"<div class='msger'>
                                   Please enter details
                                </div>";

	}

		        }


	

}
?>
<head>
<title>Prescription</title>
<style>
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
		    .patient table tbody tr:hover{
  background-color: #f5f5f5;
  transform: scale(1.02);
}
.patient table tbody tr:nth-child(even){
        background-color: #eeeeee;

}
        body {
  background-image: url('image/plant1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; 
}
</style>
</head>
<link rel="stylesheet" type="text/css" href="patientstylenew2.css">
<link rel="stylesheet" type="text/css" href="newpatient.css">
<div class="patient">

        <h1>Prescription details</h1>
<form name="patient" method="post" action="prescription.php">

 <table>
 	<thead>
 		<tr>
 			<th>Patient ID</th>
 			<th>Prescription ID</th>
 			<th>Medicine ID</th>
 			<th>Medicine dosage</th>

 		</tr>
 	</thead>
 	<tbody>
 		<?php
 		if(isset($_POST["btnadd"]))
 		{
 			$id=$_POST["txtid"];
 		}
 		else
 		{
           $id=$_POST["id"];
 		}
 		
 		$con1 = mysqli_connect("localhost","root","");
	//Select DB
	mysqli_select_db($con1,"ayurveda");
	$sql="SELECT  prescription.Pnumber,prescription.prescriptionid,prescriptionmedicine.medid,prescriptionmedicine.dosage FROM prescription INNER JOIN prescriptionmedicine ON prescription.prescriptionid=prescriptionmedicine.prescriptionid WHERE Pnumber='$id'";
	$result = mysqli_query($con1,$sql);
	while ($row=$result-> fetch_assoc()) {

		echo"<tr>
           <td>$row[Pnumber]</td>
           <td>$row[prescriptionid]</td>
           <td>$row[medid]</td>
           <td>$row[dosage]</td>


         </tr>";
         
	}
        
 		?>
 	</tbody>
 </table>
         <!--<button class='buttons1'  name='btnadd'>Add and Update Patient</button>-->
     </form>
</div>
        <section class="catagory">

        <div class="box-container">
        <div class="box">
                <!--<form name="frmsearch" method="post" action="#">
                  <input type="text" name="txtSK" class="srch" placeholder="Enter patient id">
                  <input type="submit" name="btnSearch" value="Search" class="btnsearch1">
                 </form>-->

     <div class="addproduct content-wrapper" >
        <div class ="row">
                <div class ="col"> </div>
                <div class="col-20 ">
                	<h1>Patient ID - <?php  echo $id;?></h1>
               <form name="frmaddproduct" method="post" action="#" enctype="multipart/form-data">
               	<!--Patient ID--> <input type="hidden" id="txtid"  name="txtid" class="form-control" value ="<?php  echo $id;?>" >
Prescription ID <input type="text" id="txtid"  name="txtpid" class="form-control" placeholder="Enter prescription id" required>
Medicine ID <input type="text" id="txtid"  name="txtmid" class="form-control" placeholder="Enter medicine id" required>
Dosage<input type="text" id="txtdosage"  name="txtdosage" class="form-control" placeholder="Enter medicine dosage" required>
Date<input type="date" name="date" class="form-control" >
<button class="buttons"  name="btnadd">Add</button>
        </form>
        </div>
        <div class="col"> </div>
        </div>
</div>  


        </div>
</div>
</section>