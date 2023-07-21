<?php
$email = $_POST['exporter_email'];
$password = $_POST['exporter_password'];

///connect database
$con = new mysqli("localhost","root","","import_export");
if($con->connect_error){
    die("Faild to connect: ".$con->connect_error);
} else{
    $stmt = $con->prepare("select * from exporter where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password){
            $myfile = fopen("exporter_email.txt", "w") or die("Unable to open file!");

            fwrite($myfile, $email);

            fclose($myfile);     
            header( 'Location: ../exporter-page.html');
            exit();
        }
  else{
    header( 'Location: ../404.html' );            

    }

 }
 else{
    header( 'Location: ../404.html' );            
}
}
?>