<?php
	$conn = new mysqli('localhost','root','','import_export');
	$delete_importer = $_POST['delete_importer'];
    $query = "DELETE FROM importer WHERE importer_id = '$delete_importer'";
    $data = mysqli_query($conn,$query);
    header( 'Location: http://localhost/ie/admin-page.html' );
?>