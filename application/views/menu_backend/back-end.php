<script src="<?php echo base_url() ?>js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" charset="utf-8">
        $(function(){
            tinymce.init({
                selector: ".textarea",
                width: 550,
                menubar : false,
                height: 200,
                language : 'es',
                image_advtab: true,
                plugins: [
                     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                     "save table contextmenu directionality emoticons template paste textcolor jbimages"
               ],
               toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
               relative_urls: false,
               
               setup : function(editor){
                      editor.on('Init', function(ed) {
                          $.getJSON("<?php echo site_url(array("contacto","get",$idcliente)) ?>", function(data){
                            $("#inp_email").val(data.contacto);
                            
                            tinymce.get('txt_contacto').setContent(data.contacto_texto);
                            //tinymce.activeEditor.setContent(data.contacto_texto);
                          });
                      });
          
                   
                    editor.on('keyup', function(e) {
                        //$contenido = 'contacto_text: ' + tinymce.activeEditor.getContent();
                        //alert($contenido);
//                        alert(tinymce.get('txt_contacto').getContent());
                        //$value=tinymce.get('txt_contacto').getContent();
                        //$value=tinymce.get('txt_contacto').getContent()
                        //$('txt_contacto').val($value);
                        
                        //tinymce.get('txt_contacto').setContent($value);
                        var parametros = {contacto: $("#inp_email").val(), contacto_texto: tinymce.get('txt_contacto').getContent()};
                        console.log($.param(parametros));
                        $.post("<?php echo site_url(array("contacto","set",$idcliente)) ?>", $.param(parametros));
                    });                 
               }
            });
  
            $("#nuevo_menu").click(function(e){
                alert("nuevo menu");
                e.preventDefault();
                $('<li><input type="text" href="#" class="menu_cont" id="nuevo_menu"></a></li>').appendTo('#menu_div');
            });
                
//            $.getJSON("<?php echo site_url(array("contacto","get",$idcliente)) ?>", function(data){
//                $("#inp_email").val(data.contacto);
//                
//            });
            
            $("#inp_email").keyup(function(){
                var parametros = {contacto: $("#inp_email").val(), contacto_texto:tinymce.get('txt_contacto').getContent()};
                        console.log($.param(parametros));
                        $.post("<?php echo site_url(array("contacto","set",$idcliente)) ?>", $.param(parametros));
                //$.post("<?php echo site_url(array("contacto","set",$idcliente)) ?>", $("#form_contacto").serialize());
                
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
        
        <!--
        <div id="encabezado" class="borde">
            <div class="fondo_1">
                <label>Encabezado</label>
            </div>
            <div id="imagen_logo" class="borde"></div>
            <div class="row">
                <div class="col-sm-7 col-sm-offset-1 borde">
                    <label>Cambiar</label>
                    <button type="button" class="btn btn-primary">Buscar</button>
                </div>
                <div class="col-sm-3  borde">
                    <!--<span class="glyphicon glyphicon-info-sign"></span>    ->
                    <label>Esta imagen debe ser de 1024 x 200</label>
                </div>
            </div>    
        </div>
        -->
        
        <br>
        <div id="contacto" class="borde" style="height: 400px">
            <div class="fondo_1">
                <label>Contacto</label>
            </div>
            <div>
                <form role="form" id="form_contacto">
                    <div class="row">
                        <div class="col-sm-1 col-sm-offset-1 borde">
                            <div class="form-group">
                                <label for="for_email">Email</label>
                            </div>
                        </div>
                        <div class="col-sm-2 borde">
                            <input name="contacto" type="email" class="form-contro inp_contactol" id="inp_email" placeholder="Ingrese email">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-1 col-sm-offset-1 borde">
                            <label>Contenido</label>
                        </div>
                        <div class="col-sm-2 borde">
                            <textarea name="contacto_texto" id="txt_contacto" class="textarea inp_contacto" placeholder="Enter text ..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--
        <div id="menu">
            <div class="fondo_1">
                <label>Menús</label>
            </div>
            <div class="row">
                <div class="col-sm-offset-1 borde">
                    <ul id="menu_div" class="nav nav-tabs">
                        <!--<li><a href="#" class="menu_cont">Menu1</a></li> ->               
                        <li><input type="text" href="#" class="menu_cont" id="nuevo_menu"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        -->
