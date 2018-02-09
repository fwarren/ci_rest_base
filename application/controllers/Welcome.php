<?php

// use \Firebase\JWT\JWT;

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
    $this->session->set_userdata('name','Fredrick');
		$this->load->view('welcome_message');
  }

  public function name()
  {
      $name = $this->session->userdata('name');
      echo "My name is {$name}";
  }

  public function test()
  {
      $jwt = $this->input->get_request_header('Authorization');
      if (strlen($jwt)>7)
      {
          $jwt = substr($jwt,7);
      }
      $key = $this->config->item('encryption_key');

      try {
        $token = Firebase\JWT\JWT::decode($jwt, $key, array('HS256'));
      } catch (Firebase\JWT\ExpiredException $e) {
          $token = (object)['uid'=>'','email'=>'', 'student'=>'bob'];
      }  catch (Exception $e) {
          $token = (object)['uid'=>'','email'=>''];
      } 



      $output = print_r($token, TRUE);
      echo "<pre>{$output}</pre>";
  }
}
