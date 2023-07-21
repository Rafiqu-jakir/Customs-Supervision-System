<?php
	$exporter_id = $_POST['exporter_id'];
	$company_name = $_POST['company_name'];
	$trade_license = $_POST['trade_license'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];


	// Database connection
	$conn = new mysqli('localhost','root','','import_export');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO `exporter`(`exporter_id`, `company_name`, `trade_license`, `phone`, `email`, `password`) VALUES(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $exporter_id, $company_name, $trade_license,$phone, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		header( 'Location: http://localhost/ie/admin-page.html' );
		$stmt->close();
		$conn->close();
	}
?>