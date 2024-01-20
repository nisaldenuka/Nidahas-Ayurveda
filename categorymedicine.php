<link rel="stylesheet" type="text/css" href="patientstylenew2.css">
<link rel="stylesheet" type="text/css" href="newpatient.css">
<title>Medicine Categories</title>
<head>
    <style>
        .msg{
            display: flex;
            margin-top: 50px;
            background-color:lightgreen;
            justify-content: space-between;
            border-radius: 5px;
            padding: 10px;
            
        }
            .patient table tbody tr:hover{
            background-color: #f5f5f5;
            transform: scale(1.02);
            }
        h1 {
            text-align: center;
            color: dimgrey;
            margin-top: 60px;
        }
        body {
            background-image: url('image/plant1.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover; 
            }
            .patient table{
                width: 50%;
                margin-left: auto;
                margin-right: auto;
            }
        .patient table tbody tr:nth-child(even){
                background-color: #eeeeee;

        }
    </style>
</head>
<div class="patient">
        
        <h1>Medicine Categories</h1>
<form name="patient" method="post" action="#">

<table>
 	<thead>
 		<tr>
 			<th>Category Id</th>
 			<th>Category</th>

 		</tr>
 	</thead>
 	<tbody>
<?php

require_once("dbconnection.php");

	$sql="SELECT * FROM catagory";
	$result = mysqli_query($con,$sql);
	while ($row=$result-> fetch_assoc()) {

		echo"<tr>
          <td>$row[cid]</td>
           <td>$row[catagory]</td>

         </tr>";

    }


?>
</tbody>
</table>