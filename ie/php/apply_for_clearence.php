<?php

	$name_of_vessel = $_POST['name_of_vessel'];
	$i_e_date = $_POST['i_e_date'];
	$user_id = $_POST['user_id'];
	$trade_license = $_POST['trade_license'];
	$product_type = $_POST['product_type'];
	$im_product_id = $_POST['i_e_product_id'];
	$product_weight =$_POST['product_weight'];
    $i_e_country = $_POST['i_e_country'];
	$total_tax_amount = $_POST['total_tax_amount'];

	// Database connection
	$conn = new mysqli('localhost','root','','import_export');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO `apply_for_clearence`(`name_of_vessel`, `date`, `user_id`, `trade_license`, `product_type`, `i_e_product_id`,`product_weight`, `i_e_country`, `total_tax_amount`) values(?, ?, ?,?, ?, ?, ?,?,?)");
		$stmt->bind_param("sssssssss", $name_of_vessel, $i_e_date, $user_id,$trade_license, $product_type,$im_product_id,$product_weight,$i_e_country,$total_tax_amount);
		$execval = $stmt->execute();
		echo $execval;

		$user_importer_id_query = "SELECT importer_id FROM `importer` WHERE importer_id= '$user_id'";
		$user_importer_id_data = mysqli_query($conn,$user_importer_id_query);
		$user_importer_id_row = mysqli_fetch_array($user_importer_id_data);
		$importer_id = $user_importer_id_row['importer_id'];

		$user_exporter_id_query = "SELECT exporter_id FROM `exporter` WHERE exporter_id= '$user_id'";
		$user_exporter_id_data = mysqli_query($conn,$user_exporter_id_query);
		$user_exporter_id_row = mysqli_fetch_array($user_exporter_id_data);
		$exporter_id = $user_exporter_id_row['exporter_id'];


		if($importer_id == $user_id){
			header( 'Location: ../importer-page.html');			
		}else if($exporter_id == $user_id) {
			header( 'Location: ../exporter-page.html');	
		}
		else{
			header( 'Location: ../404.html');	
		}

		$stmt->close();
		$conn->close();
	}
?>