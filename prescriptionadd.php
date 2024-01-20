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

.selected-medicines ul li {
    margin-bottom: 5px;
    background-color: #eee;
    padding: 5px;
    border-radius: 5px;
}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="#" method="post">
	<div class="login-page">
	  <div class="form">
	    
			<h2>Add prescription</h2>
	      <input type="text" placeholder="Medicine"  name="txtmedicine" id="txtmedicine" required><div id="suggestions"></div>
          <input type="text" placeholder="Enter dosage" name="txtdosage" id="txtdosage" required>
	      <button name="btnadd">Add</button><br><br>
          </form>
        <form action="#" method="post">
        <button   name="btnproceed">Proceed</button>
        </form>
	  </div>
	</div>
	
	
	<div class="selected-medicines">
        <h3>Selected Medicines:</h3>
        <ul id="selectedMedicinesList"></ul> <!-- Create an unordered list to display selected medicines -->
    </div>



    <script>
        $(document).ready(function() {

            var selectedMedicines = [];
            $("#txtmedicine").keyup(function() {
                // Get the user input
                var medicineInput = $(this).val();
                if(medicineInput !=''){

                    // Send an AJAX request to suggestions.php
                $.ajax({
                    url: "suggestions.php",
                    method: "POST",
                    data: { medicine: medicineInput },
                    success: function(response) {
                        // Display the suggestions in the 'suggestions' div
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
<?php
// Start the session to store selected medicines temporarily

session_start();
// Database connection

if (!isset($_SESSION["selectedMedicines"])) {
    $_SESSION["selectedMedicines"] = array();
}
$con1 = mysqli_connect("localhost", "root", "", "ayurveda2");

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle adding medicines to temporary storage
if (isset($_POST["btnadd"])) {
    $medicine = $_POST["txtmedicine"];
    $dosage = $_POST["txtdosage"]; // Retrieve dosage from the form

    // Retrieve medicine details from the database based on user input
    $sql = "SELECT medid, medname FROM medicine WHERE medname LIKE '%$medicine%'";
    $result = mysqli_query($con1, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $medicineData = mysqli_fetch_assoc($result);
        
        // Use the retrieved medid value
        $medid = $medicineData["medid"];

        $insertQuery = "INSERT INTO temppres (medid, dosage) VALUES ('$medid', '$dosage')";
        if (mysqli_query($con1, $insertQuery)) {
            // Insertion was successful
            echo "Medicine added to 'temppres' table.";
        } else {
            // Error occurred during insertion
            echo "Error inserting data into 'temppres' table: " . mysqli_error($con1);
        }
    }
}

if (isset($_POST["btnproceed"])) {
    // Insert data into the 'pres' table with today's date
    $sql1 = "INSERT INTO pres(Dateadd) VALUES (CURDATE())"; 
    $result1 = mysqli_query($con1, $sql1);

    if ($result1) {
        $lastInsertID = mysqli_insert_id($con1);
        echo "Prescription added to 'pres' table with ID: $lastInsertID";
         // Debugging message
    }
     // Debugging statement
     echo "Selected Medicines: ";
     print_r($_SESSION["selectedMedicines"]);
    // Insert selected medicines into the 'presstock' table
    if (!empty($_SESSION["selectedMedicines"])) {
        foreach ($_SESSION["selectedMedicines"] as $medicineData) {
            $medicineId = $medicineData["medid"];
            $dosage = $medicineData["dosage"];
            echo "$$$$$$$$$$$$$$2";
            // Insert into the 'presstock' table with the 'presid' of the newly inserted record in 'pres'
            $sql = "INSERT INTO presstock(presid,medid,dosage) VALUES ('$lastInsertID','$medicineId', '$dosage')";
            
            if (mysqli_query($con1, $sql)) {
               // echo"<div class='msg'>
                                  // Prescription create
                               // </div>"; // Debugging message
            } else {
                echo "Error inserting data into 'presstock' table: " . mysqli_error($con1); // Debugging message
            }
        }
        echo"<div class='msg'>
                        Prescription create
                        </div>";
        
        // Clear the temporary storage after creating the prescription
        unset($_SESSION["selectedMedicines"]);
    }
    else{
        echo"<div class='invalid'>
                   Not select any medicines
                        </div>";

    }
    
     
}
mysqli_close($con1);

?>