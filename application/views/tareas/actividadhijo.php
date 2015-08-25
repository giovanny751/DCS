<div class="alert alert-info"><center><b>ACTIVIDAD HIJO</b></center></div>
<div class="row">
    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><label for="id">Id</label></div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><input type="text" id="id" name="id" class="form-control"></div>
    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><label for="idpadre">Id Padre</label></div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><input type="text" id="idpadre" name="idpadre" class="form-control"></div>
    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><label for="nombre">Nombre</label></div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><input type="text" id="nombre" name="nombre" class="form-control"></div>
</div>
<form method="post" id="f6">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="row">
                <div class="form-group">
                    <label for="fechainicio">Fecha Inicio</label>
                    <input type="text" class="form-control" id="fechainicio" name="fechainicio" />
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="fechafinalizacion">Fecha Finalización</label>
                    <input type="text" class="form-control" id="fechafinalizacion" name="fechafinalizacion" />
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="peso">Peso</label>
                    <input type="text" class="form-control" id="peso" name="peso" />
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="riesgosancion">Riesgo Sanción</label>
                    <input type="text" class="form-control" id="riesgosancion" name="riesgosancion" />
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" />
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="presupuestototal">Presupuesto Total</label>
                    <input type="text" class="form-control" id="presupuestototal" name="presupuestototal" />
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="costoreal">Costo Real</label>
                    <input type="text" class="form-control" id="costoreal" name="costoreal" />
                </div>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" style="width: 765px; height: 209px;"></textarea>
            </div>
            <div class="form-group">
                <label for="modoverificacion">Modo Verificación</label>
                <textarea class="form-control" id="modoverificacion" name="modoverificacion" style="width: 757px; height: 296px;"></textarea>
            </div>
        </div>
    </div>
</form>    
<div class="row" style="text-align: center">
    <button type="button" id="guardar" class="btn btn-success">Guardar</button>
</div>    
<script>
    $('#guardar').click(function () {
        $.post(
                "<?php base_url("index.php/tareas/guardaractividadhijo") ?>",
                $('#f6').serialize()
            ).done(function(msg){
                
            }).fail(function(msg){
                
            })
    });
</script>