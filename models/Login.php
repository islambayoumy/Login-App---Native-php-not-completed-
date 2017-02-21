<?php

class Login {

    private $username;
    private $password;
    private $db;

    public function __construct($username, $password){

        // set username and password
        $this->setData($username, $password);

        // connect to database
        $this->connectToDb();

        // get data for check
        $this->getData();
    }    

    private function setData($username, $password){
        
        $this->username = $username;
        $this->password = $password;
    }

    private function connectToDb(){
        
        include 'Database.php';
        $con_vars = '../configs/config.ini';

        $db = new Database($con_vars);
    }

    function getData(){

        // allow user to login with username or email (ex: test or test@gmail.com)
        $email = $this->username;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = $email . "@%";
            $emailQuery = "`email` LIKE '" . $email . "'"; 
        } else $emailQuery = "`email` = '" . $email . "'"; 

        $query = "SELECT * FROM `users` WHERE " . $emailQuery . " AND `password` = '$this->password'";

        $sql_result = mysql_query($query);

        if(mysql_num_rows($sql_result) > 0){
            // fetch array ($sql_result), if valid = 1 return true, else header to activation.php
            return TRUE;
        } else{
            throw new Exception('Username or password is invalid');
        }

    }

    function close(){
        $this->db->close();
    }
}


?>