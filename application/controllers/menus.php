<?php

class Menus extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
    
    function get($index = 1){
        $this->load->view("header");
        $this->load->view("back-end");
        $this->load->view("menu");
    }

}