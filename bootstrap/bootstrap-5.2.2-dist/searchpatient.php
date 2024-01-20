
<link rel="stylesheet" type="text/css" href="newpatient.css">
 		<?php


if(isset($_POST["txtsk"]))
{
	$sk=$_POST["txtsk"];


  	$con1 = mysqli_connect("localhost","nuser","nisalwinxclub");
	//Select DB
	mysqli_select_db($con1,"ayurveda");

	$sql="SELECT Pnumber,id,Name,email,gender,address FROM patient WHERE Pnumber='$sk' OR Name LIKE '$sk%'";
	$result = mysqli_query($con1,$sql);
  if(mysqli_num_rows($result)>0)
  {
     echo"
 <div class='patient'><table>
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
  </thead>";
    while($row=$result-> fetch_assoc()) {
        
 echo"
 
  <tbody>


    <tr>
           <td>$row[Pnumber]</td>
           <td>$row[id]</td>
           <td>$row[Name]</td>
           <td>$row[email]</td>
           <td>$row[gender]</td>
           <td>$row[address]</td>
           

           <td>
           <form action='Prescription.php' method='post'>
           <input type='hidden' name='id' value= '$row[Pnumber]'>
          <button class='buttons'  name='btnpres'>Prescription</button> <input type='hidden' name='id' value= '$row[Pnumber]'>
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
	mysqli_close($con1);
 


}


 		//$sk=$_POST["txtsk"];

        
 		?>
