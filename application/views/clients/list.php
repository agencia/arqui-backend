<script>
$(function(){
    $("#btn-nuevo-cliente").click(function(){
        $("#div_form_nuevo").toggle();
        $("#tbl-list").toggle();
    });
    $("#form_nuevo_cliente").submit(function(e){
        e.preventDefault();
        $.ajax({
            url : this.action,
            type : "POST",
            dataType: "json",
            data : $(this).serialize(),
            success : function(cliente){
                if(!(cliente.id > 0)){
                    console.log("error: " + cliente);
                } else {
                    var tr = $("<tr />");
                    tr.append($("<td />").html(cliente.id));
                    tr.append($("<td />").html($("<a />").html(cliente.nombre).attr("href","<?php echo site_url(array("menus","get")) ?>/"+cliente.id)));
                    tr.append($("<td />").html(cliente.email));
                    tr.append($("<td />").html($("<button />").html("Editar").addClass("btn-editar btn btn-primary").attr("clienteid",cliente.id)));
                    tr.append($("<td />").html($("<button />").html("Desactivar").addClass("btn-eliminar btn btn-danger").attr("clienteid",cliente.id)));
                    $("#tbl-list > tbody").append(tr);
                    console.log("bien: " + cliente);
                }
            }
        });
        
        $("#div_form_nuevo").toggle();
        $("#tbl-list").toggle();
    });
    
    $("#btn_nuevo_cancelar").click(function(){
    $("#div_form_nuevo").toggle();
        $("#tbl-list").toggle();
    });
    
    $("body").delegate(".btn-eliminar", "click",function(){
        var element = $(this);
        if($(this).attr("status") == 1){
            bootbox.confirm('¿Estás seguro de <strong><span class="text-danger">desactivar</span></strong> este proyecto?', function(result){
                if(result){
                    element.attr("status",0);
                    element.attr("title","Desactivado");
                    element.find("span").removeClass("glyphicon-ok-circle");
                    element.find("span").addClass("glyphicon-remove-circle");
                    element.find("span").removeClass("text-success");
                    element.find("span").addClass("text-danger");
                    $.get("<?php echo site_url(array("clients","update_status")) ?>/" + element.attr("clienteid") + "/0");
                }
            });
    //            $.ajax({
    //            url : this.action,
    //            type : "POST",
    //            dataType: "json",
    //            data : $(this).serialize(),
    //            success : function(cliente){
    //                if(!(cliente.id > 0)){
    //                    console.log("error: " + cliente);
    //                } else {
    //                    var tr = $("<tr />");
    //                    tr.append($("<td />").html(cliente.id));
    //                    tr.append($("<td />").html($("<a />").html(cliente.nombre).attr("href","<?php echo site_url(array("menus","get")) ?>/"+cliente.id)));
    //                    tr.append($("<td />").html(cliente.email));
    //                    tr.append($("<td />").html($("<button />").html("Editar").addClass("btn-editar btn btn-primary").attr("clienteid",cliente.id)));
    //                    tr.append($("<td />").html($("<button />").html("Eliminer").addClass("btn-eliminar btn btn-danger").attr("clienteid",cliente.id)));
    //                    $("#tbl-list > tbody").append(tr);
    //                    console.log("bien: " + cliente);
    //                }
    //            }
    //        });
            
        }else{
            bootbox.confirm('¿Estás seguro de <strong><span class="text-success">activar</span></strong> este proyecto?', function(result){
                if(result){
                
                element.attr("status",1);
                element.attr("title","Activado");
                element.find("span").removeClass("glyphicon-remove-circle");
                element.find("span").addClass("glyphicon-ok-circle");
                element.find("span").removeClass("text-danger");
                element.find("span").addClass("text-success");
                    $.get("<?php echo site_url(array("clients","update_status")) ?>/" + element.attr("clienteid") + "/1");
            }
            });
        }
    });
    
    $('.tooltip-status').tooltip();
//    bootbox.confirm('¿Estás seguro de <strong><span class="text-danger">desactivar</span></strong> este proyecto?');
});
</script>
<style>
    #div_form_nuevo {
        display: none;
    }
</style>
<div class="container" style="margin-top: 80px;">
    <button class="btn btn-success" id="btn-nuevo-cliente" ><span class="glyphicon glyphicon-plus"></span> Nuevo Proyecto</button>
    <table id="tbl-list" class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>&nbsp;</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $c): ?>
            <tr>
                <td><?php echo $c["id"] ?></td>
                <td><a href="<?php echo site_url(array("menus","get",$c["id"])) ?>"><?php echo $c["nombre"] ?></a></td>
                <td><?php echo $c["email"] ?></td>
                <td><button clienteid="<?php echo $c["id"] ?>" class="btn-editar btn btn-primary">Editar</button></td>
                <td><button clienteid="<?php echo $c["id"] ?>" status="<?php echo $c["activo"] ?>" class="btn-eliminar btn btn-default tooltip-status"  data-toggle="tooltip" data-placement="left" title="<?php echo ($c["activo"])? "Activo" : "Desactivado" ?>" ><span class="glyphicon glyphicon-<?php echo ($c["activo"])? "ok" : "remove" ?>-circle text-<?php echo ($c["activo"])? "success" : "danger" ?>"></span></button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div id="div_form_nuevo">
        <form method="post" action="<?php echo site_url(array("clients", "insert")) ?>" id="form_nuevo_cliente">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Crear cuenta</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="inp_nuevoNombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="inp_nuevoNombre" placeholder="Escriba el nombre la cuenta">
                    <small>Escriba un nombre significativo y descriptivo</small>
                </div>
                <div class="form-group">
                    <label for="inp_nuevoEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="inp_nuevoEmail" placeholder="Escriba el email de la cuenta">
                    <small>Este email servirá para ingresar a la plataforma junto con la contraseña</small>
                </div>
                <div class="form-group">
                    <label for="inp_nuevoPassword">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="inp_nuevoPassword" placeholder="Escriba la contraseña">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_nuevo_cancelar" class="btn btn-danger glyphicon glyphicon-remove">Cancelar</button>
                <button type="submit" class="btn btn-success glyphicon glyphicon-ok">Crear</button>
            </div>
        </form>
    </div>
</div>
