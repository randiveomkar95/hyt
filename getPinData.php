<?php
    //... mysql connection etc.
    require_once "inc/conn.php";
    $response = Array();

    $response['status'] = false;
    $id = "111";
    $query = mysqli_query($conn,"SELECT * FROM `authorities` WHERE `id` = '".$_POST['value']."'"); 

    // $query = mysqli_query("SELECT * FROM `appointments` WHERE `id` LIKE '%".$_POST['value']."%' LIMIT 1"); 

    //Or you can use = instead of LIKE if you need a more strickt search
    if(mysqli_num_rows($query)) {
        $userData = mysqli_fetch_assoc($query);

        $response['userData'] = $userData;
        $response['status'] = true;

    }

    echo json_encode($response);

    ?>