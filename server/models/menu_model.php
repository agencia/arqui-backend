<?php

class Menu_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('rb');
        R::freeze(TRUE);
    }

    function get($clientid) {
        $clients = R::find( 'menu', "client_id = ? ORDER BY pos DESC", array($clientid));
//        var_dump($client);
        return R::exportAll($clients);
    }

}
