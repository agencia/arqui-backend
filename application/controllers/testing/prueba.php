<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prueba extends CI_Controller {

    function index(){
        $this->load->view('testing/header');
        $this->load->view('testing/menus');

    }
    
}

