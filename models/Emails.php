<?php

class Emails{

    private $to;
    private $subject;
    private $header;
    private $message;
    private $confirm_id;

    public function __construct($to, $confirm_id){

        $this->setData($to, $confirm_id);
        $this->sendMail();
    }

    private function setData($to, $confirm_id){

        $this->to = $to;
        $this->confirm_id = $confirm_id;
        $this->subject = "Verification mail";

        $headers =  'MIME-Version: 1.0' . "\r\n"; 
        $headers .= 'From: admin@localhost' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $this->header = $headers;

        $body = '<html><body>';
        $body.='<div style="width:550px; background-color:#333; padding:15px; font-weight:bold; color:#fff;">';
        $body.='Automatic Verification mail';
        $body.='</div>';
        $body.='<br/><div style="font-family: Arial;">Confiramtion mail have been sent to your email.<br/>';
        $body.='Click on the below link to verify your account.<br/>';
        $body.="<a href='http://localhost/work/testInterview/controllers/verifyController.php?email=" .$to. "&confirm_id=" .$confirm_id. "'>confirm here</a>";
        $body.='</div><h3>Thanks</h3>';
        $body.='</body></html>';
        $this->message = $body;
 
    }

    private function sendMail(){
        mail($this->to, $this->subject, $this->message, $this->headers);
    }

}

?>