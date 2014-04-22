        <script type="text/javascript" charset="utf-8">
        $(function(){
                //$.getJSON("<?php echo site_url(array("tipo","get",3)) ?>", function(data){
                //alert(data.contacto);
                //$("#inp_email").val(data.contacto);
                
                
               $("#submenu_html").hide();
               $("#contenido").hide();
               
               $('#tipo input').on('change', function() {
                    //alert($('input[name=radioName]:checked', '#myForm').val());
                    //alert($('input[name=tipo]:checked', '#tipo').val()); <-value de radio
                    //alert($("#tipo").val());
                    var parametros = {tipo: $('input[name=tipo]:checked', '#tipo').val()};
                        console.log($.param(parametros));
                        //alert($(".btn_menus_titulo").closest("li").attr("idmenu")); <-IDMENU
                        
                        $.post("<?php echo site_url(array("tipo","set", 1)) ?>", $.param(parametros));
                        
                    if($('input[name=tipo]:checked', '#tipo').val()==1){
                        $("#contenido").show();
                        
                        $("#submenu").hide();
                    }
                    else{
                        $("#submenu").show();
                        $("#contenido").hide();
                    }
                });
                
                $('#submenu_2 input').on('change', function() {
                    //alert($('input[name=radioName]:checked', '#myForm').val()); 
                    if($('input[name=tipo_2]:checked', '#submenu_2').val()=="indice"){
                        $("#submenu_indice").show();
                        $("#submenu_html").hide();
                    }
                    else{
                        $("#submenu_indice").hide();
                        $("#submenu_html").show();
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

        <div id="selec_tipo" class="fondo_2">
                <br>
                <div class="row">
                    <div class="col-sm-1 col-sm-offset-1 borde">
                        <label>Tipo</label>
                    </div>
                    <div class="col-sm-2 borde">
                        <form id="tipo" role="form">
                            <div class="checkbox">
                                <input type="radio" name="tipo" value="0" checked> Submenú
                                <br>
                                <input type="radio" name="tipo" value="1"> HTML 
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
            <!--Submenú-->
            <div id="submenu">
                <br>
                <div class="row">
                    <div class="col-sm-1 col-sm-offset-1 borde">
                        <br>
                        <label>Submenú</label>
                    </div>  
                    <div class="col-sm-5 borde fondo_2">
                        <div style="margin: 0 auto">
                        <label><input type="text" placeholder="Submenú 1"></label>
                        </div>
                       <br>
                       <form id="submenu_2" role="form">
                            <div class="checkbox">
                                <input type="radio" name="sub_tipo" value="video" checked> Video
                                <input type="radio" name="sub_tipo" value="video" style="margin-left: 20%"> Galería
                                <input type="radio" name="sub_tipo" value="html" style="margin-left:20%"> HTML 
                            </div>
                            <input type="text" class="form-control" id="URL" placeholder="URL">
                                <div class="checkbox">
                                    <input type="radio" name="tipo_2" value="indice" checked> Índice 
                                    <input type="radio" name="tipo_2" value="html" style="margin-left:20%"> HTML 
                                </div>
                      <!-- </form>-->
                            <div id="submenu_indice">
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
                           <div id="submenu_html">
                               
                            <!--<div class="fondo_1" style="height: 150px">-->
                                    
                                <!--<div class="container">-->
                                    <div class="hero-unit fondo_1" style="width: 305px; height: 350px;">
                                        <textarea class="textarea" placeholder="Enter text ..." style="width: 250px; height: 100px; margin-left: -30px"></textarea>
                                    </div>
                                <!--</div>--> 
                                <!--<textarea name="textarea" id="textarea" class="textarea" cols="40" rows="6"></textarea> -->
                            <!--</div>-->
                           </div>
                       </form>
                    </div>  
                    <div class="col-sm-5 col-sm-offset-1 borde fondo_2">
                        <!--label>Submenú</label>-->
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
            <div id="contenido">
                <br>
                <div class="row">
                    <div class="col-sm-1 col-sm-offset-1 borde">
                        <br>
                        <label>Contenido</label>
                    </div>  
                    <div class="col-sm-5 borde fondo_2">
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