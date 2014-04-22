<?php

class Menu_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
//        R::freeze( TRUE );
    }
    
    function insert($clientid, $titulo){
        $client = R::load( 'client', $clientid );
        
        $menu = R::dispense( 'menu' );
        $menu->titulo = $titulo;
        $menu->activo = 1;
        $menu->tipo = 0;
        $menu->videosubmenu = 1;
        $menu->videoURL = NULL;
        $menu->submenu = 1; //1 -> video, 2 -> Galeria, 3 -> HTML
        $menu->pos = ($this->getLastPosition($clientid))+1;
        
        $client->ownMenu[] = $menu;
        
        $id = R::store($client); 
        //echo $id;
        return $this->getLast($clientid);
    }
    
    function get($clientid = NULL, $id = NULL){
            $client = R::load( 'client', $clientid );
            if ($id===NULL)
                return $client->with(' ORDER BY pos ASC ')->ownMenu;
            else
                return $client->ownMenu[$id];
    }
    
    function getTipo($idmenu){
        $menu = R::findOne( 'menu', "id = ?", array($idmenu));
        return $menu->export();
    }
    
    function getLast($clientid){
        $menu = R::findLast( 'menu', "client_id = ?", array($clientid));
        return $menu->export();
    }
    
    function getLastPosition($clientid){
        $menu = R::findOne( 'menu', "client_id = ? ORDER BY pos DESC", array($clientid));
        if ($menu)
            return $menu->pos;
        else
            return 0;
    }
    
    function updateTitulo($idcliente,$idmenu,$titulo){
        $menu = R::load( 'menu', $idmenu );
        $menu->titulo = $titulo;
        R::store($menu);
    }
    
    function updateTipo($idmenu,$tipo){
        $menu = R::load( 'menu', $idmenu );
        $menu->tipo = $tipo;
        R::store($menu);
        return $menu->export();
    }
    
    function delete($idmenu){
        $menu = R::load( 'menu', $idmenu );
        R::trash($menu);
    }
    
    function update($idmenu, $field, $value){
        $menu = R::load( 'menu', $idmenu );
        $menu->$field = $value;
        R::store($menu);
        return $menu->export();
    }
    
    function updatePos($idcliente,$data){
            foreach ($data as $key => $value) {
                $menu = R::load( 'menu', $value );
                $menu->pos=$key;
                R::store($menu); 
            }
    
    }
}
    
