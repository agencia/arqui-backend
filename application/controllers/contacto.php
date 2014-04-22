<?php

class Contacto extends CI_Controller {
    function get($idclient){
        $this->load->model("client_model");
        $data = $this->client_model->get($idclient);
        echo json_encode(array("contacto" => $data["contacto"], "contacto_texto" => $data["contacto_texto"]));
    }
    
    function set($idclient){
        $this->load->model("client_model");
        $this->client_model->update_contacto($idclient, $this->input->post("contacto"), $this->input->post("contacto_texto"));
    }
    
}
