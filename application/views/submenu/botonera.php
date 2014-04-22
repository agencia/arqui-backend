<style>
    #inp_videourl{
        margin: 5px;
    }
</style>
<div class="container">
    <div class="row">
<div class="panel panel-default col-md-4">
  <div class="panel-body">
        <div class="btn-group col-md-12">
            <button submenu="1" class="btn btn-default <?php echo ($submenu == 1) ? "active" : "" ?>"><span class="glyphicon glyphicon-facetime-video"></span> Video</button>
            <button submenu="2" class="btn btn-default <?php echo ($submenu == 2) ? "active" : "" ?>"><span class="glyphicon glyphicon-camera"></span> Galería</button>
        </div>