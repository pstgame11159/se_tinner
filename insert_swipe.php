<?php

    session_start();
    require_once 'connection/server.php';
    $o_id = $_POST['o_id'];
    $status_swipe = $_POST['status_swipe'];
    $u_id = $_SESSION['admin_login'];
    $qury_sql = "INSERT INTO  swipe(u_swipe,o_swipe,status_swipe)value('$u_id','$o_id','$status_swipe')";
    $start_sql = mysqli_query($conn,$qury_sql);


    $sql = "SELECT * FROM swipe WHere (u_swipe = '$o_id' AND o_swipe = '$u_id') AND  status_swipe = 'like' ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1)
    {
        if($status_swipe=='like')
        {

        $response = "math";
        echo json_encode($response);
        $qury_sql = "INSERT INTO  match_tinner(u_id,o_id)value('$u_id','$o_id')";
        $start_sql = mysqli_query($conn,$qury_sql);
        }
    
    }



?>