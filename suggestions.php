<?php
$con1 = mysqli_connect("localhost","root","");
//Select DB
mysqli_select_db($con1,"ayurvedadb");

if (isset($_POST["medicine"])) {
    $medicineInput = $_POST["medicine"];

    
    $sql = "SELECT medname FROM medicinetb WHERE medname LIKE '%$medicineInput%'";
    $result=mysqli_query($con1,$sql);
    $output="<ul class='list-unstyled'>";

    if (mysqli_num_rows($result)>0) {
      
        while ($row = $result->fetch_assoc()) {
            $output.='<li>'. $row["medname"] .'</li>';
        }
    } else {
        $output .= "<li>No suggestions found</li>";
    }
    $output .='</ul>';
    echo $output;
    mysqli_close($con1);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add prescription</title>
	<style>

        ul{
            background-color:#eee;
        }
        li{
            padding:12px;
        }
        .list-unstyled{
            list-style: none;
        }
	</style>

</head>
<body>
	




</body>
</html>