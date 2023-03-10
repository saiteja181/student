<?php

	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "SCHOOL-DB";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$rollno = $_POST['rollno'];
	$fullname = $_POST['fullname'];
	$class = $_POST['class'];
	$birthdate = $_POST['birthdate'];
	$address = $_POST['address'];
	$enrollmentdate = $_POST['enrollmentdate'];


	$sql = "SELECT * FROM `STUDENT-TABLE` WHERE `Roll No` = '$rollno'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {

		$sql = "UPDATE `STUDENT-TABLE` SET `Full Name` = '$fullname', `Class` = '$class', `Birth Date` = '$birthdate', `Address` = '$address', `Enrollment Date` = '$enrollmentdate' WHERE `Roll No` = '$rollno'";
		if (mysqli_query($conn, $sql)) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
	} else {
	
		$sql = "INSERT INTO `STUDENT-TABLE` (`Roll No`, `Full Name`, `Class`, `Birth Date`, `Address`, `Enrollment Date`) VALUES ('$rollno', '$fullname', '$class', '$birthdate', '$address', '$enrollmentdate')";
		if (mysqli_query($conn, $sql)) {
			echo "Record saved successfully";
		} else {
			echo "Error saving record: " . mysqli_error($conn);
		}
	}

	// Close the database connection
	mysqli_close($conn);
?>

<script>
	document.getElementById("rollno").value = "";
	document.getElementById("fullname").value = "";
	document.getElementById("class").value = "";
	document.getElementById("birthdate").value = "";
	document.getElementById("address").value = "";
	document.getElementById("enrollmentdate").value = "";
	document.getElementById("save").disabled = true;
	document.getElementById("update").disabled = true;
	document.getElementById("reset").disabled = true;
	document.getElementById("rollno").focus();
</script>
