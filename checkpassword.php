<?php
    $db = "db1";
    $conn = mysqli_connect("localhost","root","",$db);

    
    $password = mysqli_real_escape_string($conn,$_GET['pass']);
    $username = mysqli_real_escape_string($conn,$_GET['us']);

    $query = "SELECT password from cliente where password ='$password' and username = '$username'"; 
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($res);
    if(isset($row['password'])) $ris = true;
    else $ris = false;
    echo json_encode($ris);
    mysqli_close($conn);
    
?>