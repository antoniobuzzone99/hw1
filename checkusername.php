<?php
    $db = "db1";
    $conn = mysqli_connect("localhost","root","",$db);

    $username = mysqli_real_escape_string($conn, $_GET['q']);
    $query = "SELECT username from cliente where username ='$username'"; 
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($res);
    
    if(isset($row['username'])) $ris = true;
    else $ris = false;

    echo json_encode($ris);
    mysqli_close($conn);
    
?>