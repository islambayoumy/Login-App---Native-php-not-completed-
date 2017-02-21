<?php


class Register {

    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $confirm_id;
    private $db;

    public function __construct($data){

       if(is_array($data)){
           $this->setData($data);
       } else{
           throw new Exception('Error: Not array !');
       }

        $this->connectToDb();

        $this->registerData();
    }

    private function setData($data){
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->email = $data['email'];
        $this->password = $data['password'];
    }

    private function connectToDb(){
        
        include 'Database.php';
        $con_vars = '../configs/config.ini';

        $db = new Database($con_vars);
    }

    private function registerData(){

        $this->confirm_id = md5(uniqid(mt_rand(), true));
        $query = "INSERT INTO `users` (`firstname`,`lastname`,`email`,`password`,`confirm_id`) 
                    VALUES ('$this->firstname', '$this->lastname', '$this->email', '$this->password',
                    '$this->confirm_id')";
        
        $sql_result = mysql_query($query);
        if($sql_result) return TRUE;
        else throw new Exception('Insertion error !');
    }

    function close(){
        $this->db->close();
    }
}


?>