<style>
    #lista-menus {
        list-style: none;
        margin: 0px;
        padding: 0px;
    }
</style>
<div class="fondo_1">
                <label>Menús</label>
</div>
<div class="container">
    <!-- Single button -->
    <ul id="lista-menus"  class="list-inline">
        <?php foreach ($menus as $m): ?>
        <li class="li-menu" idmenu="<?php echo $m["id"] ?>">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn_menus_titulo">
                        <?php echo $m["titulo"] ?>
                    </button>
                    <button type="button" class="btn btn-default btn_menus_mover"><span class="glyphicon glyphicon-move"></span></button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="sr-only">Toggle Dropdown</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href=""><span class="glyphicon glyphicon-remove-circle text-danger"></span>Eliminar</a></li>
                        <li><a href="<?php echo base_url();?>/menus/editar" class="btn_menus_editar"><span class="glyphicon glyphicon-edit"></span>Editar</a></li>
                    </ul>
                </div>
            </li>
        <?php endforeach; ?>
        <?php if (count($menus) == 0): ?>
            <li id="li_menus_empty">
                <small><i>No hay menús, haga click en el siguiente botón para agregar uno -></i></small>
            </li>
        <?php endif; ?>
        <li id="li_menus_add">
            <button class="btn btn-success" id="btn_menus_add"><span class="glyphicon glyphicon-plus"></span></button>
        </li>
    </ul>
<li id="li_to_clone" class="hidden li-menu" idmenu="">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn_menus_titulo">
                    </button>
                    <button type="button" class="btn btn-default btn_menus_mover"><span class="glyphicon glyphicon-move"></span></button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="sr-only">Toggle Dropdown</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href=""><span class="glyphicon glyphicon-remove-circle text-danger"></span>Eliminar</a></li>
                        <li><a href="<?php echo base_url();?>/menus/editar" class="btn_menus_editar"><span class="glyphicon glyphicon-edit"></span>Editar</a></li>
                    </ul>
                </div>
            </li>
            <div id="selec_tipo" class="fondo_2">
                <br>
                <div class="row">
                    <div class="col-sm-1 col-sm-offset-1 borde">
                        <label>Tipo</label>
                    </div>
                    <div class="col-sm-2 borde">
                        <form id="tipo" role="form">
                            <div class="checkbox">
                                <input type="radio" name="tipo" id="sub" value="0"> Submenú
                                <br>
                                <input type="radio" name="tipo" id="html" value="1"> HTML 
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
            <div class="panel panel-default" id="submenu_content">
                <div class="panel-heading">
                  <h3 class="panel-title">Submenú</h3>
                </div>
                <div class="panel-body">
                    
                </div>
              </div>
</div>
<script src="<?php echo base_url() ?>js/jquery-ui-1.10.4.sortable.min.js" type="text/javascript"></script>
<script>
    
    var menuid = null;
    
    var loadSubmenuContent = function(tipo){
        //alert(tipo);
            if(tipo==0||tipo==null){
                //alert('el tipo es 0 o null');
                $('#html').attr('checked', false);
                $('#sub').attr('checked', true);
                
                $("#submenu_content .panel-body").load("<?php echo site_url(array("submenu","get")) ?>/" + menuid);
            }else{
                $('#sub').attr('checked', false);
                $('#html').attr('checked', true);
            }
    };
    
    $( document ).ready(function() {
         $("#submenu").hide();
         $("#contenido").hide();
        //$(".btn").slice(2,3).button("toggle");
        //$(".btn_menus_titulo").first().button("toggle");
        $(".btn_menus_titulo").first().addClass("active");
        //$(".btn_menus_titulo").first().button("untoggle");
        menuid=$("#lista-menus li").first().attr("idmenu");
        //alert(<?php echo $idcliente?>);
        //alert('antes');
        $.getJSON("<?php echo site_url(array("tipo","get")) ?>/" + menuid, function(data){
            loadSubmenuContent(data.tipo);
        });
    });
    
    
    
    $(".btn_menus_editar").click(function(e) {
        var btn_menu = $(this).closest("div");
        var menuid = btn_menu.closest("li").attr("idmenu");
        e.preventDefault();
        var nombreDelMenu = $.trim(btn_menu.find(".btn_menus_titulo").html());
        console.log(nombreDelMenu);
        bootbox.prompt({
            title: "Editar menú",
            value: nombreDelMenu,
            callback: function(result) {
                if (result === null) {
                    console.log("Prompt dismissed");
                } else {
                    btn_menu.find(".btn_menus_titulo").html(result);
                    var parametros = {id:menuid,"titulo": result};
                    $.post("<?php echo site_url(array("menus", "editar", $idcliente)) ?>", $.param(parametros),"json");
                }
            }
        });
    });

    $("#lista-menus").sortable({
        handle: ".btn_menus_mover",
        cancel: '',
        update: function( event, ui ) {
            var elementos = {};
            $.each($("#lista-menus .li-menu"), function(index,value){
                elementos[index+1] = $(value).attr("idmenu");
            });
            var parametros = {"menus" : elementos};
            console.log(parametros);
            $.post("<?php echo site_url(array("menus", "resort", $idcliente)) ?>", $.param(parametros),"json");
        }
    }).disableSelection();

    $("#btn_menus_add").click(function() {
        bootbox.prompt("Crear nuevo menú", function(data) {
            console.log(data);
            if (data && data.length > 0) {
                var parametros = {"titulo": data};
                $.post("<?php echo site_url(array("menus", "insert", $idcliente)) ?>", $.param(parametros), function(success){
                    console.log(success);
                    var li = $("#li_to_clone").clone().attr("id","").removeClass("hidden").attr("idmenu",success.id);
                    li.find(".btn_menus_titulo").html(success.titulo);
                    $("#lista-menus li:last").before(li);
                },"json");
                
                $("#li_menus_empty").remove();
            }
        });
    });
    $(".btn_menus_titulo").click(function(){
        menuid=$(this).closest("li").attr("idmenu");
        
        $(".btn_menus_titulo").removeClass("active");
        $(this).button().addClass("active");
        $.getJSON("<?php echo site_url(array("tipo","get")) ?>/" + menuid, function(data){
            loadSubmenuContent(data.tipo);
            
            alert('menuid:'+ menuid + 'tipo:' + data.tipo);
        });
    });
    
    $('#tipo input').on('change', function() {
                    //alert($('input[name=tipo]:checked', '#tipo').val()); <-value de radio
                    var parametros = {tipo: $('input[name=tipo]:checked', '#tipo').val()};
                        console.log($.param(parametros));
                        //alert(menuid);
                        $.post("<?php echo site_url(array("tipo","set")) ?>/" + menuid, $.param(parametros));
                        
                    if($('input[name=tipo]:checked', '#tipo').val()==1){
                        $("#contenido").show();
                        
                        $("#submenu").hide();
                    }
                    else{
                        $("#submenu").show();
                        $("#contenido").hide();
                    }
                });
                
                $("body").delegate("#inp_videourl","keyup", function(){
                    console.log($(this).serialize());
                    $.post("<?php echo site_url(array("submenu","update","videoURL")) ?>/" + menuid, $(this).serialize());
                    $("#iframe_video").attr("src",$(this).val());
                });
                
                $("body").delegate("#btn_agregar_indice_video","click", function(){
                    console.log("bumm");
                    bootbox.dialog({
                        message: "Tiempo:<input type='time' id='inp_new_time_video' step='1'></input><br />Botón<input typoe='text' id='id_new_button_video' />",
                         buttons: {
                            main: {
                              label: "Insertar",
                              className: "btn-success",
                              callback: function() {
                                  var li = $("#tpl_li_indice_video").clone().attr("id","").removeClass("hidden");
                                  li.find("input name[txt_time_video]").val($('#inp_new_time_video').val());
                                  li.find("input name[txt_boton_video]").val($('#id_new_button_video').val());
                                  li.attr("idmarcador",1);
                                console.log("Hi "+ $('#inp_new_time_video').val());
                              }
                            },
                            danger: {
                                label: "Cancelar",
                                className: "btn-danger",
                                callback: function() {
                                }
                            }
                        }
                    });
                });
                //videoURL
                
</script>