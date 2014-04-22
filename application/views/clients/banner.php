<script src="<?php echo base_url(); ?>js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/upload-banner.js" type="text/javascript"></script>
<script>
    $(function() {

        $("#btn_subir").click(function() {
            $("#inp_file").click();
        });

        $("#upload").submit(function(e) {
            e.preventDefault();
                        $("#status").empty();
        });

//    $("#inp_file").change(function(){
//        $("#alert_subir").fadeOut("slow");
//        
//        
//    });
    });
</script>
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
    
    #btn_subir{
        float: left;
        margin-top: 10px;
        margin-right: 10px;
    }
    #status {
        padding: 6px;
        margin-top: 10px;
        float: left;
        /*border: 1px solid black;*/
        width: 880px;
    } 
</style>
<div class="container">
    <form id="upload" method="post" action="<?php echo site_url(array("imagenes", "subir_banner", $idcliente)) ?>" enctype="multipart/form-data">
        <img id="img_banner" width="1024" height="227" src="<?php echo site_url(array("imagenes", "get_banner", $idcliente)) ?>" />
        <input type="file" id="inp_file" name="userfile" />
        <button class="btn btn-default btn-large" id="btn_subir"><span class="glyphicon glyphicon-circle-arrow-up"></span> Subir Imagen</button>
        
        <div id="status">
        </div>
    </form>
</div>
    <div id="error-message" class="text-danger"><span class="glyphicon glyphicon-warning-sign" style="float:left;margin-right: 5px;"></span><i></i></div>
    <div id="success-message" class="text-success"><span class="glyphicon glyphicon-ok-circle" style="float:left;margin-right: 5px;"></span><i></i></div>
</div>