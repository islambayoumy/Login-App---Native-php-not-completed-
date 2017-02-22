<?php

    if($_GET){
        $email = $_GET['email'];
        $confirm_id = $_GET['confirm_id'];

        include '../models/Verify.php';
        $verify = new Verify($email, $confirm_id);
        
        if($verify == TRUE){
            echo "<h1>Verified !</h1>";
        }
    }

?>