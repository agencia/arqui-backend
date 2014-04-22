<?php

class Menus extends CI_Controller {

    function __construct() {
        parent::__construct();
        $userid = $this->session->userdata("userid");
        if(!($userid > 0))
            redirect ("users/login");
    }
    
    function get($idcliente = 1){
        $data = array("idcliente"=>$idcliente);
        $this->load->model("menu_model");
        $data["menus"] = $this->menu_model->get($idcliente);
        
        //var_dump($data["menus"]);
        $this->load->view("header");
        $this->load->view("clients/banner",$data);
        $this->load->view("menu_backend/contacto", $data);
        $this->load->view("clients/menus", $data);
        $this->load->view("menu_backend/submenu", $data);
        $this->load->view("footer");
    }
    
    function insert($idcliente = NULL){
        if ($idcliente === NULL){
            echo "error";
        } else {
            $this->load->model("menu_model");
            $menu = $this->menu_model->insert($idcliente, $this->input->post("titulo"));
            echo json_encode($menu);
        }
    }
    
    function lista($idcliente = 1){
        $data = array("idcliente"=>$idcliente);
        $this->load->model("menu_model");
        $data["menus"] = $this->menu_model->get($idcliente);
        $this->load->view("header");
        //$this->load->view("clients/menus", $data);
        $this->load->view("testing/menus", $data);        
        $this->load->view("footer");
    }
    function editar($idcliente){
       $this->load->model("menu_model");
       $menu = $this->menu_model->updateTitulo($idcliente, $this->input->post("id"),  $this->input->post("titulo"));
       
    }
    
    function eliminar($idmenu){
        $this->load->model("menu_model");
       $menu = $this->menu_model->delete($idmenu);
       //redirect('menus/lista');
    }
    
    function resort($idcliente){
        $this->load->model("menu_model");
        $this->menu_model->updatePos($idcliente,  $this->input->post("menus"));
    }

}
