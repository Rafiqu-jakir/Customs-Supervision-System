<?php

    $update_name = $_POST['update_name'];
    $update_password = $_POST['update_password'];
    $update_phone = $_POST['update_phone'];

    $myfile = fopen("admin_email.txt", "r") or die("Unable to open file!");
    $admin_email = fgets($myfile);

    $conn = new mysqli('localhost','root','','import_export');

    $query = "UPDATE admin SET name='$update_name',password='$update_password',phone='$update_phone' WHERE email = '$admin_email'";
    $data = mysqli_query($conn,$query);
    fclose($myfile);
    header( 'Location: ../admin-page.html' );   
?>