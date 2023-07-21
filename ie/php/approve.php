<?php
    $conn = new mysqli('localhost','root','','import_export');
    $approval_id = $_GET['approval_id'];
    
    $approval_id_query = "SELECT * FROM apply_for_clearence WHere user_id='$approval_id'";
    $approval_id_data = mysqli_query($conn,$approval_id_query);
    $user_id_row = mysqli_fetch_array($approval_id_data);

    $name_of_vessel =  $user_id_row['name_of_vessel'];
    $date =  $user_id_row['date'];
    $user_id =  $user_id_row['user_id'];
    $trade_license =  $user_id_row['trade_license'];
    $product_type =  $user_id_row['product_type'];
    $product_id =  $user_id_row['i_e_product_id'];
    $product_weight = $user_id_row['product_weight'];
    $i_e_country =  $user_id_row['i_e_country'];
    $total_tax_amount =  $user_id_row['total_tax_amount'];

      $user_importer_id_query = "SELECT importer_id FROM `importer` WHERE importer_id= '$approval_id'";
      $user_importer_id_data = mysqli_query($conn,$user_importer_id_query);
      $user_importer_id_row = mysqli_fetch_array($user_importer_id_data);
      $importer_id = $user_importer_id_row['importer_id'];

		$user_exporter_id_query = "SELECT exporter_id FROM `exporter` WHERE exporter_id= '$approval_id'";
		$user_exporter_id_data = mysqli_query($conn,$user_exporter_id_query);
		$user_exporter_id_row = mysqli_fetch_array($user_exporter_id_data);
		$exporter_id = $user_exporter_id_row['exporter_id'];


		if($importer_id == $approval_id){

      $stmt = $conn->prepare("INSERT INTO `im_customs_clearance`(`name_of_vessel`, `date_of_arrival`, `importer_id`, `trade_license`, `product_type`, `im_product_id`, `importer_country`, `total_tax_amount`) values(?, ?, ?, ?, ?, ?,?,?)");
      $stmt->bind_param("ssssssss", $name_of_vessel,$date,$user_id,$trade_license,$product_type,$product_id,$i_e_country,$total_tax_amount);
      $execval = $stmt->execute();	
      
      $Ware_house_product_delete = "DELETE FROM im_warehouse WHERE importer_id = '$approval_id' AND im_product_id = '$product_id'";
      mysqli_query($conn,$Ware_house_product_delete);
      
		}
      else if($exporter_id == $approval_id) {
      $stmt = $conn->prepare("INSERT INTO `ex_customs`(`name_of_vessel`, `date_of_exported`, `exporter_id`, `trade_license`, `product_type`, `ex_product_id`, `exporter_country`, `total_tax_amount`) values(?, ?, ?, ?, ?, ?,?,?)");
      $stmt->bind_param("ssssssss", $name_of_vessel,$date,$user_id,$trade_license,$product_type,$product_id,$i_e_country,$total_tax_amount);
      $execval = $stmt->execute();
      
      $exported_product = $conn->prepare("INSERT INTO `exported_product`(`exporter_id`, `ex_product_id`, `product_type`, `exported_country`) values(?, ?, ?, ?)");
      $exported_product->bind_param("ssss", $exporter_id,$product_id,$product_type,$i_e_country);
      $execval = $exported_product->execute();

      $product_in_warehouse = $conn->prepare("INSERT INTO `ex_warehouse`(`exporter_id`, `ex_product_id`, `product_weight`, `product_type`, `country`) values(?,?,?,?,?)");
      $product_in_warehouse->bind_param("sssss", $exporter_id,$product_id,$product_weight,$product_type,$i_e_country);
      $execval = $product_in_warehouse->execute();

      $exported_country = $conn->prepare("INSERT INTO `exported_country`(`ex_country`, `ex_product_type`) values(?, ?)");
      $exported_country->bind_param("ss",$i_e_country,$product_type);
      $execval = $exported_country->execute();

		}
		else{
			echo "404 Not FOUND";
		}


      $approval_id_delete = "DELETE FROM apply_for_clearence WHERE user_id = '$approval_id' AND i_e_product_id = '$product_id'";
      mysqli_query($conn,$approval_id_delete);


        header( 'Location: ../admin-page.html' );
?>