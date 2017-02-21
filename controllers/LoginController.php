<?php


if($_POST){
    if(isset($_POST['submit']) AND $_POST['submit'] == 'Login'){
        
        $username = $_POST['email'];
        $password = $_POST['password'];

        try{

            include '../models/Login.php';
            $login = new Login($username, $password);

            if($login == TRUE){
                session_start();
                $_SESSION['username'] = $username;
                header('Location:../views/home.php');
            }

        } catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    if(isset($_POST['submit']) AND $_POST['submit'] == 'Register'){

        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];

        try{

            include '../models/Register.php';
            $register = new Register($data);

            if($register == TRUE){
                // create class Emails
                // send email with activation code
                // prepare activation.php to update activation flag in db
                header('Location:../views/activation.php');
            }
        } catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

}



?>
