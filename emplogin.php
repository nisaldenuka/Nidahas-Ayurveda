<?php
require_once("dbconnection.php");
if(isset($_POST["btnlogin"]))
{
	$uname=$_POST["txtuname"]; $pw=$_POST["txtpw"];
	if(isset($_POST["txtuname"]) && $_POST["txtpw"])
	{

	$sql="SELECT Eid,password FROM employee WHERE Eid='$uname'";


	$result=mysqli_query($con,$sql);
	if($row=mysqli_fetch_array($result)){
		if(password_verify($pw,$row['password']))
		{
	
			session_start();
			$_SESSION["txtuname"]=$uname;
			header("Location:home.html");
			
		}
		
			
		else
		{
			echo"<div class='invalid'>
			Invalid username or password
		 </div>";
		}
		
			//disconnect
	       $con->close();
	}
	else{
		echo"<div class='invalid'>
           Please enter valid username and password
        </div>";
	}
	
	
   }
   else
   {
   	echo"<div class='invalid'>
           Please enter username and password
        </div>";
   }


}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
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
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="#" method="post">
	<div class="login-page">
	  <div class="form">
	    <form class="login-form">
			<h2>Admin</h2>
	      <input type="text" placeholder="Username"  name="txtuname" required>
	      <input type="password" placeholder="Password" name="txtpw" required>
	       <!--<button onclick="window.location.href = 'login.php'" class="login-form">Log In</button>-->
	       <button class="login-form" name="btnlogin">Login</button>
	       <br><br>
		   <p>Create an account </p><a href="Register.php">Register</a>
	    </form>
	  </div>
	</div>
	</form>
	<div class="reset-password-page" id="resetPassword">
	  <div class="form">
	    <form class="reset-password-form">
	      <h2>Reset Password</h2>
	      <input type="email" placeholder="Email address"/>
	      <button>Reset Password</button>
	    </form>
	  </div>
	</div>
	<script>
		document.getElementById("forgotPassword").addEventListener("click", function(){
			document.getElementById("resetPassword").style.display = "block";
			document.getElementById("loginPage").style.display = "none";
		});
	</script>
</body>
</html>