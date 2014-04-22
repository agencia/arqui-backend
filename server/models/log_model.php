<?php

class Log_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
//        R::freeze( TRUE );
    }
    
    function in($email,$password){
        $user = R::findOne( 'client', " email LIKE ? AND password = MD5(?)", array($email,$password) );
        unset($user->password);
        //var_dump($user);
        if(is_object($user))
            return $user->export();
        else
            return FALSE;
    }
}