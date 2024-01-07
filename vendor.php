<?php
// first of all, we need to connect to the database
require_once('PhpConnect.php');
if (
	!empty($_POST['vcode']) &&
    !empty($_POST['vname']) &&
    !empty($_POST['cono'])) {
			
		$vendor_code = $_POST['vcode'];
		$vc=mysqli_real_escape_string($conn, $vendor_code);
		$vendor_name = $_POST['vname'];
		$vn=mysqli_real_escape_string($conn, $vendor_name);
		$cont = $_POST['cono'];
		$phn=mysqli_real_escape_string($conn, $cont);
		$sql = "SELECT * FROM Vendor WHERE Vendor_code = '$vc'";

		

		//Execute the query 
		$result = mysqli_query($conn, $sql);
		//check if it returns an empty set
		if (mysqli_num_rows($result) === 0) {
			// add book 
			$sql2 = "INSERT INTO Vendor (Vendor_code, Name, Contact_No)
							VALUES ('$vc', '$vn', '$phn')";
			$result2 = mysqli_query($conn, $sql2);
			
			
			echo "Success!";
		}
		else{
			echo "Vendor Already Exists.";
		}
	} else {
		echo "Please fill out all required fields.";
	}