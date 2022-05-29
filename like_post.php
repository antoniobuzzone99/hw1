<?php
    include "auth.php"; 

    $db = "db1";
    $conn = mysqli_connect("localhost","root","",$db);

    $id_post = mysqli_real_escape_string($conn, $_GET['post_id']);
    $id = mysqli_real_escape_string($conn, $_SESSION['user_id']);

    $query = "INSERT INTO likes(id_utente,id_post) VALUES($id,$id_post)";
    $res = mysqli_query($conn, $query);
    
    $out_query = "SELECT nlikes FROM posts WHERE id = $id_post";
    $res = mysqli_query($conn, $out_query);

    $array = array();
    
    if ($res) {

        $res = mysqli_query($conn, $out_query);
    
        if (mysqli_num_rows($res) > 0) {
    
            $entry = mysqli_fetch_assoc($res);
    
            $array = array('var' => true, 'id_post' => $id_post, 'likes' => $entry['nlikes']);
                
            echo json_encode($array);
            mysqli_close($conn);
            exit;
        }
    }
    mysqli_close($conn);

?>