<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function login(){
        $this->load->view("header");
        $this->load->view("login");
        $this->load->view("footer");
    }
}