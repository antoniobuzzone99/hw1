<?php
    include "auth.php";

    $db = "db1";
    $conn = mysqli_connect("localhost","root","",$db);

    $id_post = mysqli_real_escape_string($conn, $_GET['post_id']);
    $id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
    
    $query = "DELETE FROM likes where id_utente ='$id' and id_post = '$id_post'";
    $res = mysqli_query($conn, $query);
    
    $array = array();
    
    if ($res) {
        $out_query = "SELECT nlikes FROM posts WHERE id = '$id_post'";
        $res = mysqli_query($conn, $out_query);
    
        if (mysqli_num_rows($res) > 0) {
    
            $entry = mysqli_fetch_assoc($res);
    
            $array = array('var' => false, 'id_post' => $id_post, 'likes' => $entry['nlikes']);
                
            echo json_encode($array);
            mysqli_close($conn);
            exit;
    
        }
    }
    mysqli_close($conn);
?>