<?php
    $conn = new mysqli('localhost','root','','import_export');
    $delete_id = $_GET['delete_id'];
    $delete_id_query = "DELETE FROM `ex_warehouse` WHERE exporter_id = '$delete_id'";
    mysqli_query($conn,$delete_id_query);
    header( 'Location: http://localhost/ie/admin-page.html' ); 
?>