<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyPHPMailer {
    public function MyPHPMailer() {
    	
        require_once('PHPMailer/class.phpmailer.php');
        require_once('PHPMailer/PHPMailerAutoload.php');
    }
}

/* End of file MyPHPMailer.php */
/* Location: ./application/libraries/MyPHPMailer.php */