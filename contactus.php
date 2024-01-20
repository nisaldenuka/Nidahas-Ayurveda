<?php
if(isset($_POST["contact"]))
{
	if($name!="" && $email!="" && $subject!="" && $message!=""){
		$name=$_POST["name"];
	$email=$_POST["email"];
	$subject=$_POST["subject"];
	$message=$_POST["message"];

	/*$mailheader="From:".$name."<".$email.">\r\n";

	$recipient="enchantixc@gmail.com";

	ini_set("SMTP", "heliaflora224@gmail.com");
    ini_set("smtp_port", "587");

	mail($recipient,$subject,$message,$mailheader)
	or die("Message not send");*/
    
	require_once("dbconnection.php");

	 $sql="INSERT INTO contactus(email,Name,Subject,msg) VALUES ('$email','$name','$subject','$message')";
     $return=mysqli_query($con,$sql);
	 $con->close();

	echo"<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title></title>
	<style>
				h1 {
			text-align: center;
			color: dimgrey;
			margin-top: 50px;
		}
		a{
			color: gray;
			font-style: italic;
			text-align: center;
		}
		a:hover{
			color: darkgray;
		}
		p{
			text-align: center;
		}
				        body {
  background-image: url('image/plant1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; 
}
	</style>
</head>
<body>
     <h1>Thank you for contacting us</h1>
     <p><a href='homepage.html'>Home Page</a></p>
</body>
</html>";

	}
	else{
		echo"<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title></title>
	<style>
				h1 {
			text-align: center;
			color: dimgrey;
			margin-top: 50px;
		}
		a{
			color: gray;
			font-style: italic;
			text-align: center;
		}
		a:hover{
			color: darkgray;
		}
		p{
			text-align: center;
		}
				        body {
  background-image: url('image/plant1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; 
}
	</style>
</head>
<body>
     <h1>Please enter your message</h1>
     <p><a href='homepage.html'>Home Page</a></p>
</body>
</html>";
	}
	
}

?>
