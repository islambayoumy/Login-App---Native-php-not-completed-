<?php


class Database {

    private $db_host;
    private $db_username;
    private $db_password;
    private $db_name;

    public function __construct($configfile){

        if(is_file($configfile)) $ini = parse_ini_file($configfile);
        else throw new Exception("Error: Not a file !");

        $this->db_host = $ini['db_host'];
        $this->db_username = $ini['db_username'];
        $this->db_password = $ini['db_password'];
        $this->db_name = $ini['db_name'];

        $this->connect();
 
    }

    private function connect(){
        
        // connect to local server
        $db_c = mysql_connect($this->db_host, $this->db_username, $this->db_password);

        if (!$db_c) {
            throw new Exception("Error: NOT connected to the server !");
            exit;
        }

        // select database
        $db_s = mysql_select_db($this->db_name);

        if (!$db_s) {
            throw new Exception("Error: NO database selected !");
            exit;
        }

    }

    function close(){

        mysql_close();
    
    }

}


?>