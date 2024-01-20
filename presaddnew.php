
<?php
require_once("dbconnection.php");
if (isset($_POST["id"])){


 $id=$_POST["id"];


if (isset($_POST["btnadd"])) {
    $medicine = $_POST["txtmedicine"];
    $dosage = $_POST["txtdosage"];
 if($medicine!="" && $dosage!="" && is_numeric($dosage)){
    
    $sql = "SELECT medid, medname FROM medicinetb WHERE medname LIKE '%$medicine%'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $medicineData = mysqli_fetch_assoc($result);
        
    
        $medid = $medicineData["medid"];
        

        $insertQuery = "INSERT INTO temppres2 (medid, dosage) VALUES ('$medid', '$dosage')";
        if (mysqli_query($con, $insertQuery)) {
           
            
            //echo "Medicine added to 'temppres2' table.";
        } else {
            
            echo "Error inserting data into 'temppres' table: " . $con->close();
        }
    }
    else{
        echo "<div class='invalid'>This medicine not available</div>";
    }
}
else{
    echo "<div class='invalid'>Enter medicine and dosage</div>";
}
}
if (isset($_POST["btnproceed"])) {
    $sql9 = "SELECT * FROM temppres2";
    $result9 = mysqli_query($con, $sql9);
    if(mysqli_num_rows($result9)>0){

    //echo "winx club";


$sql20 = "INSERT INTO prestb(Dateadd,id) VALUES (CURDATE(),'$id')"; 
$result20 = mysqli_query($con, $sql20);

if ($result20) {
    $lastInsertID = mysqli_insert_id($con);
    //echo "Prescription added to 'pres' table with ID: $lastInsertID";
     
    

    while ($row3 = $result9->fetch_assoc()) {
        $medid = $row3["medid"];
        $dosage = $row3["dosage"];

        $sqls = "SELECT medid, medname, totquantity FROM medicinetb WHERE medid = '$medid'"; 
        $results = mysqli_query($con, $sqls);

        if (mysqli_num_rows($results) > 0) {
            $medicineData = mysqli_fetch_assoc($results);
            
       
            $medid = $medicineData["medid"];
            $tot = $medicineData["totquantity"];
            if ($tot >= $dosage) { 
                $newtot = $tot - $dosage;
                $updateq = "UPDATE medicinetb SET totquantity='$newtot' WHERE medid='$medid'";
                $result4 = mysqli_query($con, $updateq);

                $sql10 = "INSERT INTO presmedtb(presid, medid, dosage) VALUES ('$lastInsertID', '$medid', '$dosage')";
                if (mysqli_query($con, $sql10)) {
                    
                    $sql11 = "DELETE FROM temppres2 WHERE medid='$medid'";
                    $result11 = mysqli_query($con, $sql11);
                } else {
                    echo "Error inserting data into 'presstock' table: " . mysqli_error($con);
                }
            } else {
                echo "<div class='invalid'>Medicine quantity not sufficient $medid </div>";
            }
        }
    }
    echo "<div class='msg'>Prescription successfuly created</div>";
}
}
else{
    echo "<div class='invalid'>Add medicines before proceed the prescription</div>";
}

}
if (isset($_POST["btndelete"])){
    $tempid=$_POST["tempid"];
    $sql1="DELETE  FROM temppres2 WHERE tempid='$tempid'";
    $return1=mysqli_query($con,$sql1);
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add prescription</title>
	<style>
		.msg{
			display: flex;
			margin-top: 50px;
			background-color:lightgreen;
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
        ul{
            background-color:#eee;
        }
        li{
            
            padding: 5px;
            margin-bottom: 5px;
            background-color: #eee;
            border-radius: 5px;
        }
        .selected-medicines ul {
    list-style: none;
    padding: 0;
}
table tbody tr:hover{
  background-color: #f5f5f5;
  transform: scale(1.02);
}
table tbody tr:nth-child(even){
        background-color: #eeeeee;

}
h1,h2{
    
    text-align: center;
    color:#666666;
    margin-bottom: 0px;
}
.inputbox{
    display:relative;
    
    width: 310px;
    
    
}
input[type=text]{
width: 100%;

box-sizing: border-box;
display: block;

  text-align: center;
}
.selected-medicines ul li {
    margin-bottom: 5px;
    background-color: #eee;
    padding: 5px;
    border-radius: 5px;
}
.buttons{
	border: none;
    font-size: 20px;
	padding: 10px 16px;
	border-radius: 6px;
	color: #FFF;
	background: linear-gradient(135deg, #c5f25c, #2fd43a);
    text-align:center;
	
	position: relative;
	margin: 10px;
	width: 10rem;	
}
.buttons:hover{
	background: springgreen;
}
table{
	width: 100%;
	margin: 15px;
}
table thead td {
	padding: 30px 0;
	border-bottom: 1px solid #EEEEEE;

	
}
table thead{
	background-color: lightgreen;
	padding: 20px 0;
}
table tbody td{
	margin: 10px;
	padding: 12px 15px;
    align-items:center;
}
body{
    background-image: url('image/plant1.jpg');
}
.container {
    position: relative;
    
}

.div1{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
}
.div2{
    position: relative;
    z-index: 1;
    background: #FFFFFF;
    max-width: 360px;
    margin: 0 auto 60px;
    padding: 30px;
    text-align: center;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1), 0 5px 5px rgba(0, 0, 0, 0.2);
}
.div2 input{
    font-family: "Roboto", sans-serif;
    outline: 0;
    background: #f2f2f2;
    width: 100%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
    border-radius: 5px;
}
#suggestions{

    position: absolute;
        width: 100%;
        max-height: 150px;
        overflow-y: auto;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 5px;
        display: none; 
        z-index: 1000; 
}
#suggestions ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #suggestions li {
        padding: 5px;
        cursor: pointer;
    }

    #suggestions li:hover {
        background-color: white;
    }


	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style1.css">
   
</head>
<body>
<h1>Patient ID - <?php  echo $id;?></h1>
<form action="#" method="post">

    <h2>Add prescription</h2>
    <div class="div1">
	  <div class="div2">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="inputbox"><input type="text" placeholder="Medicine" name="txtmedicine" id="txtmedicine"autocomplete="none" ><div id="suggestions"></div>
    <input type="text" placeholder="Enter dosage" name="txtdosage" id="txtdosage"></div>
    <button  class="buttons" name="btnadd">Add</button><br><br>
</div>
</div>
    
    <div class="container">
    <table>
        <thead>
            <tr>
                <th>Medicine ID</th>
                <th>Medicine dosage</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once("dbconnection.php");
            
            $sql3 = "SELECT * FROM temppres2";
            $result3 = mysqli_query($con, $sql3);
            while ($row3 = $result3->fetch_assoc()) {
                echo "<tr>
                        <td>$row3[medid]</td>
                        <td>$row3[dosage]</td>
                        <td>
           <form action='#' method='post'>
           <input type='hidden' name='tempid' value= '$row3[tempid]'>
           <input type='hidden' name='id' value= '$id'>
          <button class='buttons'  name='btndelete'>Delete</button> <input type='hidden' name='tempid' value= '$row3[tempid]'>
           </form>
           </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    <button class="buttons proceed-button" name="btnproceed">Proceed Prescription</button>
    </div>
</form>
    <script>
        $(document).ready(function() {

            var selectedMedicines = [];
            $("#txtmedicine").keyup(function() {
               
                var medicineInput = $(this).val();
                if(medicineInput !=''){

                    
                $.ajax({
                    url: "suggestions.php",
                    method: "POST",
                    data: { medicine: medicineInput },
                    success: function(response) {
                       
                        $("#suggestions").fadeIn();
                        $("#suggestions").html(response);
                    }
                });

                }
                else{
                    $("#suggestions").fadeOut();
                    $("#suggestions").html("");
                }
   
            });
            $(document).on('click','li',function(){
                $("#txtmedicine").val($(this).text());
                $("#suggestions").fadeOut();
            });

             // Handle adding medicines to the list
        /*$("button[name='btnadd']").click(function() {
            var medicine = $("#txtmedicine").val();
            var dosage = $("#txtdosage").val();
            var selectedMedicinesList = $("#selectedMedicinesList");

            // Create a list item to display the selected medicine and dosage
            var listItem = "<li>" + medicine + " - Dosage: " + dosage + "</li>";

            // Append the list item to the selected medicines list
            selectedMedicinesList.append(listItem);

            // Clear the input fields
            $("#txtmedicine").val("");
            $("#txtdosage").val("");
        });*/
        

        // Handle form submission
        
            
            });
      
    </script>
</body>
</html> 