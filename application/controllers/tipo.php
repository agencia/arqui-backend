<?php

class Tipo extends CI_Controller {
    
    function get($idmenu){
        $this->load->model("menu_model");
        $data = $this->menu_model->getTipo($idmenu);
        echo json_encode(array("tipo" => $data["tipo"]));
    }
//    
//    function get_first($idcliente){
//        $this->load->model("menu_model");
//        $data = $this->menu_model->getFirst($idcliente);
//        echo json_encode(array("tipo" => $data["tipo"]));
//    }
//            
    function set($idmenu){
        $this->load->model("menu_model");
        $data =$this->menu_model->updateTipo($idmenu, $this->input->post("tipo"));
        echo json_encode(array($data));
    }
    
}