<?php
	$importer_id = $_POST['importer_id'];
	$im_product_id = $_POST['im_product_id'];
	$product_weight = $_POST['product_weight'];
	$product_type = $_POST['product_type'];
    $country = $_POST['i_e_country'];


	// Database connection
	$conn = new mysqli('localhost','root','','import_export');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {

			$stmt = $conn->prepare("INSERT INTO `im_warehouse`(`importer_id`, `im_product_id`, `product_weight`, `product_type`, `country`) values(?, ?, ?, ?, ?)");
			$stmt->bind_param("sssss", $importer_id,$im_product_id,$product_weight,$product_type,$country);
			$execval = $stmt->execute();


            $stmt = $conn->prepare("insert into imported_product(`importer_id`, `im_product_id`, `product_type`, `imported_country`) values(?, ?, ?, ?)");
            $stmt->bind_param("ssss", $importer_id,$im_product_id,$product_type,$country);
            $execval = $stmt->execute();

			$stmt = $conn->prepare("INSERT INTO `imported_country`(`country`, `product_type`) values(?, ?)");
            $stmt->bind_param("ss",$country,$product_type);
            $execval = $stmt->execute();

		header( 'Location: http://localhost/ie/admin-page.html' );
		$stmt->close();
		$conn->close();
	}
?>