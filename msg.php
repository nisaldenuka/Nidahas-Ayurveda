<?php

require_once("dbconnection.php");

	 $sql="SELECT * FROM contactus";
     $return=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
 
	<title></title>
	<style>
        *{
            padding: 0;
            margin:0;
            box-sizing:border-box;
        }
       
				h1 {
			text-align: center;
			color: dimgrey;
			margin-top: 50px;
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


.container{
    position: relative;
    display: flex;
    justify-content:center;
    align-items:center;
    flex-wrap:wrap;
    padding:20px;
}
.container .msgbox{
    width:348px;
    position:relative;
    margin:30px 10px;
    height: 350px;
    background:white;
    border-radius:10px;
    padding:20px 15px;
    display:flex;
    flex-direction:column;
    box-shadow:0.5px 10px #03C04A;
    transition:0.3s ease-in-out;
    margin-top:5%;
    
}
.email{
   font-weight:bold;
   font-size:20px
}
.subject{
    margin-top:5px;
   color:gray;
}
.message{
    margin-top:10px;
   
}



	</style>
</head>
<body>
     <h1>Patient messages</h1>
     <?php
        while($row=mysqli_fetch_assoc($return)){

        
     ?><div class="container">
     <div class="msgbox">
        <p class="email"><?php echo $row["email"];?></p><br>
        <p class="name"><?php echo $row["Name"];?></p><br><hr>
        <p class="subject"><?php echo $row["Subject"];?></p><br><hr>
        <p class="message"><?php echo $row["msg"];?></p>
     </div>
        </div>
     <?php
        }
     ?>
</body>
</html>

