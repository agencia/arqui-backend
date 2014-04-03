<?php

class Clients extends CI_Controller {
    function index(){
        $this->load->model("client_model");
        $data["clients"] = $this->client_model->get();
        $this->load->view("header");
        $this->load->view("modal");
        $this->load->view("navbar");
        $this->load->view("clients/list", $data);
        $this->load->view("footer");
    }
    
    function form(){
        $this->load->view("clients/new");
    }
    
    function insert(){
        $client = $this->input->post();
        $this->load->model("client_model");
        $id = $this->client_model->insert($client);
        $client["id"] = $id;
        echo json_encode($client);
    }
    
}