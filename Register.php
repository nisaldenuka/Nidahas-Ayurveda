<?php
require_once("dbconnection.php");
if(isset($_POST["btnregister"])){
    $Ename=$_POST["txtname"];$uname=$_POST["txtuname"];$date=date('y-m-d',strtotime($_POST["date"]));
    $pw=$_POST["txtpw"];$cpw=$_POST["txtcpw"];
    if($pw==$cpw)
    {
        $hashed_password = password_hash($pw, PASSWORD_DEFAULT);
       
        $sql="SELECT Eid,Name,password FROM employee WHERE Eid='$uname' AND Name='$Ename'";
        $result=mysqli_query($con,$sql);
        if($row=mysqli_fetch_array($result))
        {
			if($row['password']==NULL){
				$sqlinsert="UPDATE employee SET password='$hashed_password',Startdate='$date' WHERE Eid='$uname'";
            
				$return2=mysqli_query($con,$sqlinsert);
				echo"<div class='msg'>
				Register success
					</div>";

			}
			else{
				echo"<div class='invalid'>
                  Already Register
                  </div>";
			}
            
        }
        else
        {
            echo"<div class='invalid'>
           Invalid user
                </div>";
        }
            //disconnect
			$con->close();


    }
    else{
        echo '<script>alert("password and confirm password must be match")</script>';
        

    }

    
}
else{
    
    

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
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
          <input type="text" placeholder="Name"  name="txtname" required>
	      <input type="text" placeholder="Username"  name="txtuname" required>
	      <input type="password" placeholder="Password" name="txtpw" minlength="8" required>
          <input type="password" placeholder="Confirm Password" name="txtcpw"  minlength="8" required>
		  Date<input type="date" name="date" class="form-control" >
	       <!--<button onclick="window.location.href = 'login.php'" class="login-form">Log In</button>-->
	       <button class="login-form" name="btnregister">Register</button>
	       <br><br><br>
		   <p>Already have an account</p><a href="emplogin.php">Login</a>
	    </form>
	  </div>
	</div>
	</form>
	<!--<div class="reset-password-page" id="resetPassword">
	  <div class="form">
	    <form class="reset-password-form">
	      <h2>Reset Password</h2>
	      <input type="email" placeholder="Email address"/>
	      <button>Reset Password</button>
	    </form>
	  </div>
	</div>-->
	<script>
		document.getElementById("forgotPassword").addEventListener("click", function(){
			document.getElementById("resetPassword").style.display = "block";
			document.getElementById("loginPage").style.display = "none";
		});
	</script>
</body>
</html>