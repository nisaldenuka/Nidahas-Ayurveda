<?php
if(isset($_POST["btnlogin"]))
{
	$uname=$_POST["txtuname"]; $pw=$_POST["txtpw"];
	if(isset($_POST["txtuname"]) && $_POST["txtpw"])
	{
		//connect database
	$con=mysqli_connect("localhost","nuser","nisalwinxclub");
	//select table
	mysqli_select_db($con,"ayurveda");

	//sql query
	$sql="SELECT Eid,password FROM employee WHERE Eid='$uname' AND password ='$pw'";
	$result=mysqli_query($con,$sql);
	
	if($row=mysqli_fetch_array($result))
	{
		//session_start();
		//$_SESSION["username"]=$uname;
		session_start();
		$_SESSION["txtuname"]=$uname;
		
		//$_SESSION["logtime"]=time();

		
		//echo"<div class='alert alert-info'>
          // Login success
        //</div>";
        header("Location:home.html");
	}
	else
	{
		echo"<div class='alert alert-danger'>
           Invalid username or password
        </div>";
	}
		//disconnect
   mysqli_close($con);
   }
   else
   {
   	echo"<div class='alert alert-warning'>
           Please enter username and password
        </div>";
   }


}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="#" method="post">
	<div class="login-page">
	  <div class="form">
	    <form class="login-form">
	      <input type="text" placeholder="Username"  name="txtuname" required>
	      <input type="password" placeholder="Password" name="txtpw" required>
	       <!--<button onclick="window.location.href = 'login.php'" class="login-form">Log In</button>-->
	       <button class="login-form" name="btnlogin">Login</button>
	      <p class="message">Not registered? <a href="signIn.html">Create an account</a></p>
	      
	      <p class="forgot-password"><a href="reset.html" id="forgotPassword">Forgot Password?</a></p>
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