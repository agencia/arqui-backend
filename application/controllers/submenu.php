<?php

class Submenu extends CI_Controller {
    
    function get($idmenu){
        $this->load->model("menu_model");
        $data = $this->menu_model->getTipo($idmenu);
        //echo json_encode(array("tipo" => $data["tipo"]));
        if($data["tipo"] == 0){
            //Cargar el submenu
            switch($data["submenu"]){
                default :
                    $this->video($idmenu);
            }
        } else {
            //Cargar lo de solo html
        }
    }
    
    function video($idmenu){
        $this->load->model("menu_model");
        $data = $this->menu_model->getTipo($idmenu);
        $this->load->view("submenu/botonera", array("submenu" => 1));
        $this->load->view("submenu/video", $data);
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
    
    function update($field,$idmenu){
        $this->load->model("menu_model");
        $data =$this->menu_model->update($idmenu, $field, $this->input->post("video_url"));
        echo json_encode($data);
    }
    
}