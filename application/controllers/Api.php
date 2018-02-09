<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Api  extends REST_Controller {

  public function test_get() {
      $name = $this->session->userdata('name');
      $last = $this->session->userdata('booger');
      $this->response([
          'status' => True,
          'message' => 'Short Message for '.$name. ' '.$last
      ], REST_Controller::HTTP_NOT_FOUND);
                 
  }
}
