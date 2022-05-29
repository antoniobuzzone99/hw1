<?php
    $db = "db1";
    $conn = mysqli_connect("localhost","root","",$db);

    $email = mysqli_real_escape_string($conn,$_GET['q']);
    $query = "SELECT email from cliente where email ='$email'"; 
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($res);
    if(isset($row['email'])) $ris = true;
    else $ris = false;
    echo json_encode($ris);
    mysqli_close($conn);
    
?>