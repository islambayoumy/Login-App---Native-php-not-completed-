<?php


class Verify {

    private $email;
    private $confirm_id;
    private $db;

    public function __construct($email, $confirm_id){

        $this->setData($email, $confirm_id);

        $this->connectToDb();

        $this->updateData();
    }

    private function setData($email, $confirm_id){

        $this->email = $email;
        $this->confirm_id = $confirm_id;
        
    }

    private function connectToDb(){
        
        include 'Database.php';
        $con_vars = '../configs/config.ini';

        $db = new Database($con_vars);
    }

    private function updateData(){

        $query = "UPDATE `users` SET `verified` = '1' WHERE `email` = '$this->email' AND `confirm_id` = '$this->confirm_id'";
        
        $sql_result = mysql_query($query);
        if($sql_result) return TRUE;
        else throw new Exception('Error while updating data !');

    }

    function close(){
        $this->db->close();
    }
}


?>