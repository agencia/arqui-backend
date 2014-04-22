<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Menus extends REST_Controller
{
    function __construct() {
        parent::__construct();
         header("Access-Control-Allow-Origin: *");
    }
    function token_post(){
                $this->load->library('encrypt');
        $idcliente = $this->encrypt->decode(base64_decode($this->get("cliente")));
        if(!is_numeric($idcliente)){
            $this->response(array("error" => "bad token"), 400);
        } else {
            $this->load->model("menu_model");
            $menus = $this->menu_model->get($idcliente);
            if(is_array($menus)){
                $this->response($menus, 200);
            } else {
                $this->response(array('error' => 'No hay menus para este usuario'), 404);
            }
        }
    }
} 