<?php
require_once("dbconnection.php");
session_start();
$uname=$_SESSION["txtuname"];
$sql="UPDATE employee SET leavedate=CURDATE(),password = NULL,Name=NULL WHERE Eid='$uname'";
$result=mysqli_query($con,$sql);

if($result){
    echo '<script>alert("Leave from system sucessful")</script>';
    echo"<div class='invalid'>
    Leave from system sucessful
                  </div>";
   header("Location:homepage.html");

}



$con->close();


?>