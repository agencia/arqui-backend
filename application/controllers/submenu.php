<?php

class Submenu extends CI_Controller {

    function get($idsubmenu) {
        $this->load->model("submenu_model");
        $data = $this->submenu_model->getSubmenu($idsubmenu);
        //var_dump($data);
        $this->load->view("submenu/botonera", array("submenu" => $data["tipo"]));
        switch ($data["tipo"]) {
            //tipo: 1 -> video indice, 2->video html, 3 -> Galeria, 4->html

            case 2:
                $nombre_array = explode("/", $data["video"]);
                $data["nombre_video"] = end($nombre_array);
                $data["indices"] = $this->submenu_model->getIndice($idsubmenu);
                //var_dump($data["indices"]);
                $data["videosubmenu"] = 1;
                //var_dump($data["indices"]);
                $this->load->view("submenu/video", $data);
                //echo json_encode($indices);
                break;
            case 1:
                $data["indices"] = null;
                $data["videosubmenu"] = 2;
                $nombre_array = explode("/", $data["video"]);
                $data["nombre_video"] = end($nombre_array);
                $this->load->view("submenu/video", $data);

                //echo json_encode($data["video_html"]);
                break;
            case 3:
                $data = array("idsubmenu" => $idsubmenu);
                $this->load->view("submenus/galeria", $data);
                break;
            case 0:
                $this->load->view("submenu/editor", $data);
//                var_dump($data);
                //echo json_encode($data["html"]);
                break;
            default:
                //$this->video();
                $indices = $this->submenu_model->getIndice($idsubmenu);
                //var_dump($indices);
                $data["videosubmenu"] = 1;
                //var_dump($data);
                $this->load->view("submenu/video", $data);
            //echo json_encode($indices);
        }
    }

    function get_html($idsubmenu) {
        $this->load->model("submenu_model");
        $data = $this->submenu_model->getSubmenu($idsubmenu);
        echo json_encode($data["html"]);
        //var_dump($data);
    }

    function video($idmenu) {
        $this->load->model("menu_model");
        $data = $this->menu_model->getTipo($idmenu);
        $this->load->view("submenu/botonera", array("submenu" => 1));
        $this->load->view("submenu/video", $data);
    }

    function galeria($idsubmenu) {
        $data = array("idsubmenu" => $idsubmenu);
        $this->load->view("header");
        $this->load->view("galeria", $data);
        $this->load->view("footer");
    }

    function set($idmenu) {
        $this->load->model("menu_model");
        $data = $this->menu_model->updateTipo($idmenu, $this->input->post("tipo"));
        echo json_encode(array($data));
    }

    function update($field, $idmenu) {
        $this->load->model("menu_model");
        $data = $this->menu_model->update($idmenu, $field, $this->input->post("video_url"));
        echo json_encode($data);
    }

    function insert($idmenu = NULL) {
        if ($idmenu === NULL) {
            echo "error";
        } else {
            $this->load->model("submenu_model");
            $submenu = $this->submenu_model->insert($idmenu, $this->input->post("titulo"));
            echo json_encode($submenu);
        }
    }

    function set_html($idsubmenu) {
        $this->load->model("submenu_model");
        $this->submenu_model->update($idsubmenu, "html", $this->input->post("contenido"));
    }

    function set_tipo($idsubmenu) {
        $tipo = $this->input->post("tipo");
        $this->load->model("submenu_model");
        $this->submenu_model->update($idsubmenu, "tipo", $tipo);
    }

    function set_video_html($idsubmenu) {
        $this->load->model("submenu_model");
        $this->submenu_model->update($idsubmenu, "video_html", $this->input->post("contenido"));
    }

    function set_video_url($idsubmenu) {
        $this->load->model("submenu_model");
        $this->submenu_model->update($idsubmenu, "video_url", $this->input->post("url"));
    }

    function set_indice($idsubmenu) {
        $this->load->model("submenu_model");
        // var_dump("hecho");
        echo json_encode($this->submenu_model->insertIndice($idsubmenu, $this->input->post("titulo"), $this->input->post("contenido")));
    }

    function eliminar($idsubmenu) {
        $this->load->model("submenu_model");
        $menu = $this->submenu_model->delete($idsubmenu);
        //redirect('menus/lista');
    }

    function editar($idsubmenu) {
        $this->load->model("submenu_model");
        $submenu = $this->submenu_model->update($idsubmenu, "titulo", $this->input->post("titulo"));
    }

    function update_indice($idIndice) {
        $this->load->model("submenu_model");
        // var_dump("hecho");
        $this->submenu_model->updateIndice($idIndice, $this->input->post("titulo"), $this->input->post("contenido"));
    }

    function eliminar_indice($idIndice) {
        $this->load->model("submenu_model");
        $this->submenu_model->delete_indice($idIndice);
    }

    function resort() {
        $this->load->model("submenu_model");
        $this->submenu_model->updatePos($this->input->post("submenus"));
    }

}
