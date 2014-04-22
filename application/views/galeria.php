<style>
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
</style>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Galeria</h3>
                </div>
                <div class="panel-body" id="panel_list_files">
                    <ul id="ul_filelist" class="list-group">
                    </ul>
                    <form id="upload"  method="post" action="<?php echo site_url(array("imagenes", "subir_galeria", $idcliente, $idmenu)) ?>" enctype="multipart/form-data">
                        <input type="file" id="inp_file" name="userfile" />
                        <div id="status"></div>
                        <button class="btn btn-default btn-large btn-block" id="btn_subir"><span class="glyphicon glyphicon-circle-arrow-up"></span> Subir Imagen</button>
                    </form>
                </div>
            </div>
        </div>
            
            
            <div id="carousel_galeria" class="carousel slide col-md-8" data-ride="carousel"  >

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel_galeria" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel_galeria" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
            
            
    </div>
</div>
<script>
    
    var idcliente = <?php echo $idcliente; ?>;
            $("#btn_subir").click(function() {
            $("#inp_file").click();
        });

        $("#upload").submit(function(e) {
            e.preventDefault();
                        $("#status").empty();
        });
        
        var listOfFiles = function(){
            var idcliente = <?php echo $idcliente; ?>;
            $("#ul_filelist").empty();
            $.getJSON("<?php echo site_url(array("imagenes","galeria_files",$idcliente,$idmenu)) ?>", function(data){
                var first = true;
                $.each(data.archivos, function(index, value){
                    $("#ul_filelist").append($("<li />").html(value.name).addClass("list-group-item").append($("<a />").attr("href","<?php echo site_url(array("imagenes","del_galeria",$idcliente)) ?>/"+ Base64.encode(value.name)).append($("<span />").addClass("glyphicon glyphicon-remove-circle btn-eliminar-imagen"))));
                    $("#carousel_galeria .carousel-inner").append($("<div />").addClass("item").addClass(first?"active":"").append($("<img />").attr("src","<?php echo base_url() ?>galeria/<?php echo $idcliente ?>/" + value.name)));
                    first = false;
                });
            });
        }
        listOfFiles();
</script>
<script src="<?php echo base_url(); ?>js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/upload-galeria.js" type="text/javascript"></script>
