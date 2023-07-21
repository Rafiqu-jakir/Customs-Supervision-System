<?php
    $company_name = $_POST['company_name'];
    $trade_license = $_POST['trade_license'];
    $update_phone = $_POST['update_phone'];
    $update_password = $_POST['update_password'];


    $myfile = fopen("exporter_email.txt", "r") or die("Unable to open file!");
    $exporter_email = fgets($myfile);

    $conn = new mysqli('localhost','root','','import_export');

    $query = "UPDATE `exporter` SET `company_name`='$company_name',`trade_license`='$trade_license',`phone`='$update_phone',`password`='$update_password' WHERE email = '$exporter_email'";
    $data = mysqli_query($conn,$query);
    fclose($myfile);
    header( 'Location: ../exporter-page.html' );   
?>