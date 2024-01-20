<?php
session_start();
$uname=$_SESSION["txtuname"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
	<div class="login-page">
	  <div class="form">
	    <h2>Welcome to our system !!!</h2>
	    <br>
	    <button onclick="window.location.href = 'patient.html'" class="home-button">Patients</button>
	    <button onclick="window.location.href = 'medicine.html'" class="home-button">Medicine</button>
	    <button onclick="window.location.href = 'report.html'" class="home-button">Reports</button>

	    
	    <br>
	    <br>
	    <button onclick="window.location.href = 'login.html'" class="logout-button">Log Out</button>
	  </div>
	</div>

	<form class="form">
  <label for="doctor-id">Doctor ID:</label>
  <input type="text" id="doctor-id" name="doctor-id" class="input-field" required>
  
  <label for="patient-id">Patient ID:</label>
  <input type="text" id="patient-id" name="patient-id" class="input-field" required>
  
  <label for="search-medicine">Search Medicine:</label>
  <div class="search-box">
    <input type="text" id="search-medicine" name="search-medicine" placeholder="Enter a medicine name" class="input-field" required>
    <select id="medicine-type" name="medicine-type" required>
      <option value="">Select Medicine Type</option>
      <option value="oils">Oils</option>
      <option value="tablets">Tablets</option>
      <option value="packets">Packets</option>
    </select>
    <input type="number" id="medicine-amount" name="medicine-amount" placeholder="Enter amount" class="input-field" required>
    <button type="button" onclick="addMedicine()" class="add-btn">Add Medicine</button>
  </div>
  
  <label for="prescription-medicines">Prescription Medicines:</label>
  <div class="medicine-list">
    <ul id="prescription-medicines"></ul>
  </div>
  
  <button type="submit" class="submit-btn">Print Prescription</button>
</form>

<script type="text/javascript">
function addMedicine() {
  const medicineInput = document.getElementById('search-medicine');
  const medicineName = medicineInput.value;
  const medicineType = document.getElementById('medicine-type').value;
  const medicineAmount = document.getElementById('medicine-amount').value;
  
  if (medicineName && medicineType && medicineAmount) {
    const medicineList = document.getElementById('prescription-medicines');
    const medicineItem = document.createElement('li');
    medicineItem.innerText = medicineName + ' (' + medicineType + ', ' + medicineAmount + ')';
    medicineList.appendChild(medicineItem);
    
    medicineInput.value = '';
    document.getElementById('medicine-type').selectedIndex = 0;
    document.getElementById('medicine-amount').value = '';
  }
}
</script>

</div>
</body>
</html>