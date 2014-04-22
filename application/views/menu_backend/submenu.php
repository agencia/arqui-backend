<script type="text/javascript" charset="utf-8">
        $(function(){
                //$.getJSON("<?php echo site_url(array("tipo","get",$idcliente)) ?>", function(data){
                //alert(data.contacto);
                //$("#inp_email").val(data.contacto);
              
               $("#submenu_video_tipo").hide();
               $("#submenu_video_indice").hide();
               $("#submenu_video_html").hide();
               $("#submenu_galeria").hide();
               $("#submenu_html").hide();
               
                
                $('#form_submenu_tipo input').on('change', function() {
                    //alert($('input[name=radioName]:checked', '#myForm').val()); 
                    if($('input[name=inp_sub_tipo]:checked', '#form_submenu_tipo').val()=="0"){
//                        $("#submenu_indice").show();
//                        $("#submenu_html").hide();
                           //alert('sub_tipo video');
                           $("#submenu_video_tipo").show();
                           $("#submenu_video_indice").hide();
                           $("#submenu_video_html").hide();
                           $("#submenu_galeria").hide();
                           $("#submenu_html").hide();
                    }
                    else if($('input[name=inp_sub_tipo]:checked', '#form_submenu_tipo').val()=="1"){
                        alert('sub_tipo galeria');
                        $("#submenu_video_tipo").hide();
                        $("#submenu_video_indice").hide();
                        $("#submenu_video_html").hide();
                        $("#submenu_galeria").show();
                        $("#submenu_html").hide();
                    }
                    else{
                        //alert("sub_tipo_html");
                         $("#submenu_video_tipo").hide();
                         $("#submenu_video_indice").hide();
                         $("#submenu_video_html").hide();
                         $("#submenu_galeria").hide();
                         $("#submenu_html").show();
                    }
                });
                
                $('#form_sub_video_tipo input').on('change', function() {
                    //alert($('input[name=radioName]:checked', '#myForm').val()); 
                    if($('input[name=inp_sub_video_tipo]:checked', '#form_sub_video_tipo').val()=="0"){

                           $("#submenu_video_tipo").show();
                           $("#submenu_video_indice").show();
                           $("#submenu_video_html").hide();
                           $("#submenu_galeria").hide();
                           $("#submenu_html").hide();
                    }
                    else{
                        $("#submenu_video_tipo").show();
                           $("#submenu_video_indice").hide();
                           $("#submenu_video_html").show();
                           $("#submenu_galeria").hide();
                           $("#submenu_html").hide();
                    }
                });
            })
            
           
    </script>
        <style type="text/css" media="screen">
            #encabezado{
                height: 400px;
            }
            
            #imagen_logo{
                height: 300px;
                width: 90%;
                margin: 0 auto;
                margin-top: 15px;
            }
            
            #contacto{
                height: 100px;
            }
            .borde{
                border: 0px solid #000;
            }
            .fondo_1{
                background-color: #B8B8B8;
                height: 30px;
            }
            
            .fondo_2{
                background-color: #e4e4e4;
            }
            .btn.jumbo {
		font-size: 20px;
		font-weight: normal;
		padding: 14px 24px;
		margin-right: 10px;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
	}
        </style>

        <div id="submenu">
            <br>
            <div class="row">
                <div class="col-sm-1 col-sm-offset-1 borde">
                    <br>
                    <label>Submenú</label>
                </div>  
                <div class="col-sm-5 borde fondo_2" style="height: 500px">
                    <div style="margin: 0 auto">
                    <label><input type="text" placeholder="Submenú 1"></label>
                    </div>
                   <br>
                   <div class="checkbox">
                        <form id="form_submenu_tipo" role="form">
                            <input type="radio" name="inp_sub_tipo" value="0" checked> Video
                            <input type="radio" name="inp_sub_tipo" value="1" style="margin-left: 20%"> Galería
                            <input type="radio" name="inp_sub_tipo" value="2" style="margin-left:20%"> HTML
                        </form>
                    </div>
                   <div id="submenu_video_tipo"> 
                        <input type="text" class="form-control" id="URL" placeholder="URL">
                            <div class="checkbox">
                                <form id="form_sub_video_tipo">
                                    <input type="radio" name="inp_sub_video_tipo" value="0" checked> Índice 
                                    <input type="radio" name="inp_sub_video_tipo" value="1" style="margin-left:20%"> HTML 
                                </form>
                            </div>
                   </div>
                  
                    <div id="submenu_video_indice">
                        <br>
                        <input type="time" name="hora_indice">
                        <br>
                        <br>
                        <input type="text" name="texto_boton" placeholder="Texto del botón"/>
                        <br>
                        <br>
                        <input type="time" name="hora_indice">
                        <br>
                        <br>
                        <input type="text" name="texto_boton" placeholder="Texto del botón"/>
                    </div>
                   
                    <div id="submenu_video_html">
                        <textarea class="textarea" id="sub_video_html" placeholder="Enter text ..."></textarea>
                    </div>
                    <div id="submenu_galeria">
                        <!--AJAX GALERIA -->
                    </div>
                    <div id="submenu_html">
                        <textarea class="textarea" id="sub_html" placeholder="Enter text ..."></textarea>
                    </div>
                </div> 
            </div>
        </div>
                
           <!--     
                <div class="col-sm-5 col-sm-offset-1 borde fondo_2">
                    <!--label>Submenú</label> ->
                    <br>
                    <br>
                    <input type="text" placeholder="Nuevo Submenú"/>
                    <form role="form">
                        <div class="checkbox">
                            <input type="radio" name="nuev_tipo" checked/> Video
                            <input type="radio" name="nuev_tipo" style="margin-left:20%" checked/> HTML 
                        </div>
                    </form>
                    <div class="fondo_1">
                        <div class="container">
                            <div class="hero-unit" style="margin-top:40px">
                                <textarea id="txt_contenido" class="textarea" placeholder="Enter text ..." style="width: 500px; height: 200px"></textarea>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
-->
        <div id="contenido">
            <br>
            <div class="row">
                <div class="col-sm-1 col-sm-offset-1 borde">
                    <br>
                    <label>Contenido</label>
                </div>  
                <div class="col-sm-6 borde fondo_2">
                   <label>Texto HTML</label>
                   <br>
                   <div class="container">
                        <div style="margin-top:20px">
                               <textarea class="textarea" placeholder="Enter text ..." ></textarea>
                        </div>
                   </div> 
                </div>     
            </div>
        </div>
                    
                   