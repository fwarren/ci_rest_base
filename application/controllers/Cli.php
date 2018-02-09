<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cli extends CI_Controller {

    /************************************************
     * CONSTRUCTOR
     * fetch the User account, if any
     ************************************************/

    function __construct() {
        parent::__construct();

        if(!is_cli())
        {
            echo 'Not allowed';
            exit();
        }

    }

    public function message($user,$password)
    {
        $this->load->model('User');
        $result = $this->User->attemptLogin($user,$password);

        $key = $this->config->item('encryption_key');
        $token = array(
            'iss'     => 'http://127.0.0.1/test',
            'aud'     => 'http://127.0.0.1/test',
            'iat'     => time(),
            'exp'     => time() + 3600,
            'uid'     => $result->uid,
            'email'   => $result->email,
        );
        $jwt = Firebase\JWT\JWT::encode($token,$key);
        $this->session->set_userdata('token', $jwt);
        echo substr($jwt,0,177).PHP_EOL;
        echo substr($jwt,177,177).PHP_EOL;
        echo $this->User->encryptPassword($password).PHP_EOL;
    }

} // End Cli.php

