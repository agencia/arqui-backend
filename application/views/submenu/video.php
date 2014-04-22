
<input id="inp_videourl" name="video_url" class="col-md-12" value="<?php echo $video_url; ?>" placeholder="Url del video" />
<div class="btn-group col-md-12">
            <button class="btn btn-default <?php echo ($videosubmenu == 1) ? "active" : "" ?>"><span class="glyphicon glyphicon-th-list"></span> Índice</button>
            <button class="btn btn-default <?php echo ($videosubmenu == 2) ? "active" : "" ?>"><span class="glyphicon glyphicon-align-left"></span> HTML</button>
        </div>
<div id="panel_indice_video">
    <ul id="list_marcadores_video" class="list-group">
        <li><button class="btn btn-success btn-block" id="btn_agregar_indice_video"><span class="glyphicon glyphicon-plus"></span> Agregar Indice</button></li>
    </ul>
</div>

            </div><!--cierra el body-->
        </div><!--cierra el panel-->
        <div id="video_youtube" class="col-md-8">
            <iframe width="560" height="315" id="iframe_video" src="<?php echo $video_url; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div><!--cierra el row-->
</div>
<li class="hidden" id="tpl_li_indice_video" idmarcador="">
<span class="col-md-6">Marcador:</span> <input type="time" class="col-md-6" step="1" name="txt_time_video" />
    <input type="type" class="col-md-12" name="txt_boton_video" />
</li>