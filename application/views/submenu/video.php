<style>
    #url_video {
        height: 50px;
    }
    
    #inp_file {
        display: none;
    }
    #error-message{
        display: none;
    }
    
    #success-message{
        display: none;
    }
    
    .btn-eliminar-imagen{
        float: right;
    }
    #ul_filelist {
        list-style: none;
        font-size: small;
    } 
    
    #btn_subir {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .indice-title-input{
        display: none;
    }
    .indice-contenido-input{
        display: none;
    }
    .btn-indice-opcion{
        float: right;
        margin-bottom: 5px;
    }
    
    .inp_time{
        display: none;
    }
    
    .inp_contenido{
        display: none;
    }
    .editor_video {
        position: relative;
        margin-top: 10px;
    }
</style>
<div class="btn-group col-md-12">
    <form id="upload-video"  method="post" action="<?php echo base_url() ?>upload.php" enctype="multipart/form-data">
                        <input type="hidden" id="img_titulo" name="titulo" value="mil" />
                        <input type="file" id="inp_file" name="files[]" />
                        <div id="status"></div>
                        <button class="btn btn-primary btn-large btn-block" id="btn_subir"><span class="glyphicon glyphicon-circle-arrow-up"></span> Subir Video</button>
                        <div id="url_video"><a href="<?php echo $video ?>"><?php echo urldecode($nombre_video); ?></a></div>
                    </form>
</div>
<div class="btn-group col-md-12">
            <button class="btn btn-default btn_video <?php echo ($videosubmenu == 1) ? "active" : "" ?>"><span class="glyphicon glyphicon-th-list"></span> Índice</button>
            <button class="btn btn-default btn_video_html <?php echo ($videosubmenu == 2) ? "active" : "" ?>"><span class="glyphicon glyphicon-align-left"></span> HTML</button>
        </div>
<div id="panel_indice_video">
    <ul id="list_marcadores_video" class="list-group">
        <li><button class="btn btn-success btn-block" id="btn_agregar_indice_video"><span class="glyphicon glyphicon-plus"></span> Agregar Indice</button></li>
    </ul>

<!--Indices-->
            <ul id="lista-indices" class="list-group <?php echo ($videosubmenu == 2) ? "hidden" : "" ?>">
                <?php if (count($indices) == 0 && $videosubmenu == 1): ?>
                        <li id="li_menus_empty">
                            <small><i>No hay indices, haga click en el botón anterior para agregar uno</i></small>
                        </li>
                    <?php elseif(count($indices) > 0 && $videosubmenu == 1) :  foreach ($indices as $i): ?>
                    <!--<span><?php echo $i["contenido"]?></span>-->
                        <li class="list-group-item" idIndice="<?php echo $i["id"] ?>">
                            <a href="#" class="btn-indice-detail i_tiempo"><span class="indice-title"><?php echo floor($i["titulo"] /60); echo ":"; echo ($i["titulo"]%60 <10) ? "0":""; echo  $i["titulo"]%60 ?></span></a>
                            <input type="text" class="inp_time" value="<?php echo $i["titulo"]?>"/>
                            <a href="#" class="btn-indice-detail i_contenido"><span class="indice-contenido"><?php echo $i["contenido"] ?></span></a>
                            <input type="text" class="inp_contenido" value="<?php echo $i["contenido"] ?>"/>
                            <a href="#" class="btn_indice_eliminar btn-indice-opcion"><span class="glyphicon glyphicon-trash"></span></a>
                             
                       </li>

                    <?php endforeach;  else : endif; ?>
                </ul>
<!--Fin-Indices-->

<li class="hidden list-group-item" id="tpl_li_indice_video">

                            <a href="#" class="btn-indice-detail i_tiempo"><span class="indice-title"></span></a>
                            <input type="text" class="inp_time" value=""/>
                            <a href="#" class="btn-indice-detail i_contenido"><span class="indice-contenido"></span></a>
                            <input type="text" class="inp_contenido" value=""/>
                            <a href="#" class="btn_indice_eliminar btn-indice-opcion"><span class="glyphicon glyphicon-trash"></span></a>
</li>
</div>
<div class="btn-group col-md-12">
<div class="<?php echo ($videosubmenu == 2) ? "" : "hidden" ?> editor editor_video">
</div>
</div>
<script>
    $(".editor").load("<?php echo site_url(array("videos","editor")) ?>/"+submenuid);
    
    console.log(submenuid);
            $("#btn_subir").click(function() {

                            $("#inp_file").click();
        });
        <?php if($videosubmenu == 2): ?> 
        $(".editor").removeClass('hidden');
        $("#panel_indice_video").addClass('hidden');
          <?php endif; ?>
        $("#upload-video").submit(function(e) {
            e.preventDefault();
            $("#status").empty();
        });
        $(".btn_video_html").click(function(){
        $(this).addClass('active');
          $(".btn_video").removeClass('active');
                var tipo=1;
           var parametros={'tipo': tipo};
           console.log("editorr video" + submenuid + tipo); 
           $.post("<?php echo site_url(array("submenu","set_tipo"))?>/"+ submenuid, $.param(parametros));
           if(tipo==1){
               $(".editor").removeClass('hidden');
               $(".editor").css("margin-top","20%");
               $("#panel_indice_video").addClass('hidden');
           }
   
        });
        $(".btn_guardar_html").addClass("hidden");
            $(".btn_video").click(function(){
                   $(this).addClass('active');
                  $(".btn_video_html").removeClass('active');
                  $(".btn_guardar_html").addClass("hidden");
                   var tipo=2;
           var parametros={'tipo': tipo};
           console.log("editorr video" + submenuid + tipo); 
           $.post("<?php echo site_url(array("submenu","set_tipo"))?>/"+ submenuid, $.param(parametros));
           if(tipo==2){
               $(".editor").addClass('hidden');
               $("#panel_indice_video").removeClass('hidden');
           }
   
        });
//
        $("body").delegate(".btn-indice-detail", "click", function() {
            var that2 = $(this).closest("li");
            var title = $(that2).find(".inp_time").val();
            var cont = $(that2).find(".inp_contenido").val();
            var idindice = $(that2).attr("idIndice");
            //var that2 = $(this).closest("ls");
            var title_min = Math.floor(title/60);
            var title_seg = title%60;
            console.log(title_seg);
            console.log(title_min);
            console.log(cont);
            console.log(idindice);
                bootbox.dialog({
                    message: "<div style='width:50px; float:left; height:35px;'>Min<br><input type='number' id='inp_min_time' step='1' value='"+title_min+"' min='0' style='width:80%'></input> : </div><div  style='width:40px; height:35px; float:left'>Seg<br><input type='number' id='inp_seg_time' value ='"+ title_seg +"' step='1' min='0' style='width:100%'></input></div> <br> <br> <br>Botón <br><input type='text' value='"+ cont+"' id='id_msg_new_boton_video'/>",
                    buttons: {
                        main: {
                            label: "Guardar",
                            className: "btn-success",
                            callback: function() {
                                var li = $("#tpl_li_indice_video").clone().attr("id", "").removeClass("hidden");
                                li.find("input name[txt_time_video]").val($('#inp_new_time_video').val());
                                li.find("input name[txt_boton_video]").val($('#id_new_button_video').val());
                                li.attr("idmarcador", 1);
                                var min = parseInt($("#inp_min_time").val() * 60);
                                var seg = parseInt($("#inp_seg_time").val());
                                var boton = $("#id_msg_new_boton_video").val()
                                var tiempo = seg + min;

                                console.log("Tiempo en segundos = " + tiempo + " Boton:" + boton );
                                var parametros = {"titulo": tiempo, "contenido": boton};
                                console.log(parametros);
                                $.post("<?php echo site_url(array("submenu", "update_indice"))?>/" + idindice, $.param(parametros), "json");
                                //console.log("Hi "+ $('#inp_new_time_video').val());
                                $("#menu_content").load("<?php echo site_url(array("submenu", "get")) ?>/" + submenuid);
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
            
            $("#lista-indices").undelegate(".btn_indice_eliminar", "click").delegate(".btn_indice_eliminar", "click", function(e) {
                e.preventDefault();
                //$('.btn_menus_titulo').removeClass('active');
                var this_idIndice = $(this).closest(".list-group-item").attr("idIndice");
                console.log(this_idIndice);
                var that = this;
                bootbox.confirm("Está seguro de eliminar el indice?", function(result) {
                    console.log("Confirmed: " + result);
                    if (result == true) {
                        $.get("http://cognosvideoapp.com.mx/index.php/submenu/eliminar_indice/" + this_idIndice);
                        //$.get("<?php echo site_url(array("submenu", "eliminar_indice"))?>/ + this_idIndice");
                        $(that).closest(".list-group-item").remove();
                    }
                });
            });
            
            
            $("body").undelegate("#btn_agregar_indice_video", "click").delegate("#btn_agregar_indice_video", "click", function() {
                console.log("bumm");
                bootbox.dialog({
                    //message: "Tiempo:<input type='time' id='inp_new_time_video' step='1'></input><br />Botón<input typoe='text' id='id_new_button_video' />",
                    //message: "Tiempo <br> Minutos: <br><input type='number' id='inp_min_time' step='1' min='0'></input> <br> Segundos: <br><input type='number' id='inp_seg_time' step='1' min='0'></input> <br> <hr> Botón <br><input type='text' id='id_msg_new_boton_video'/>",
                    message: "<div style='width:50px; float:left; height:35px;'>Min<br><input type='number' id='inp_min_time' step='1' min='0' style='width:80%'></input> : </div><div  style='width:40px; height:35px; float:left'>Seg<br><input type='number' id='inp_seg_time' step='1' min='0' style='width:100%'></input></div> <br> <br> <br>Botón <br><input type='text' id='id_msg_new_boton_video'/>",
                    buttons: {
                        main: {
                            label: "Insertar",
                            className: "btn-success",
                            callback: function() {
                                var li = $("#tpl_li_indice_video").clone().attr("id", "").removeClass("hidden");
                                li.find("input name[txt_time_video]").val($('#inp_new_time_video').val());
                                li.find("input name[txt_boton_video]").val($('#id_new_button_video').val());
                                li.attr("idmarcador", 1);
                                var minutos = parseInt($("#inp_min_time").val());
                                var min = parseInt($("#inp_min_time").val() * 60);
                                var seg = parseInt($("#inp_seg_time").val());
                                var boton = $("#id_msg_new_boton_video").val()
                                var tiempo = seg + min;

                                console.log("Tiempo en segundos = " + tiempo + " Boton:" + boton + " idsubmenu:" + submenuid);
                                var parametros = {"titulo": tiempo, "contenido": boton};
                                console.log(parametros);
                                $.post("<?php echo site_url(array("submenu", "set_indice"))?>/" + submenuid, $.param(parametros), function(data){
                                    var li = $("#tpl_li_indice_video").clone().attr("id","").attr("idIndice",data.id).removeClass("hidden");
                                    li.find(".indice-title").html(minutos + ":" + (seg<10 ? "0"+seg : seg));
                                    li.find(".indice-contenido").html(boton);
                                    li.find(".inp_time").val(tiempo);
                                    li.find(".inp_contenido").val(data.contenido);
                                    $("#lista-indices").append(li);
                                    console.log("entra");
                                }
                                ,"json");
                                $("#li_menus_empty").remove();
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
    
</script>
<script src="<?php echo base_url(); ?>js/upload-video.js" type="text/javascript"></script>
