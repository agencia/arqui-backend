<?php

class Log extends CI_Controller {
//Genera ID de la sesión tomando como base el ID del usuario
    public function in() {
//        var_dump($this->input->post());
        $this->load->model("log_model");
        $user = $this->log_model->in($this->input->post("email"),$this->input->post("password"));
//        var_dump($user);
        if(!is_null($user)){
            $this->session->set_userdata("userid", $user->id);
            echo $user->id;
        } else
            echo "null";
        
    }
    
    public function out(){
        $this->session->sess_destroy();
        redirect("portada");
    }

}