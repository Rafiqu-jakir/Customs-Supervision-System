<?php
	$conn = new mysqli('localhost','root','','import_export');
	$delete_exporter = $_POST['delete_exporter'];
    $query = "DELETE FROM exporter WHERE exporter_id = '$delete_exporter'";
    $data = mysqli_query($conn,$query);
    header( 'Location: http://localhost/ie/admin-page.html' );        


?>