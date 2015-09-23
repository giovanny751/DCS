<div class="alert alert-info"><center><b>PLANES</b></center></div>
<form method="post" id="f7">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-group">
                <label for="codigo">Codigo</label><input type="text" name="codigo" id="codigo" class="form-control" />
            </div>
            <div class="form-group">
                <label for="nombre"><span class="campoobligatorio">*</span>Nombre</label><input type="text" name="nombre" id="nombre" class="form-control obligatorio" />
            </div>
            <div class="form-group">
                <label for="fechainicio"><span class="campoobligatorio">*</span>Fecha Inicio</label><input type="text" name="fechainicio" id="fechainicio" class="form-control fecha obligatorio" />
            </div>
            <div class="form-group">
                <label for="fechafin"><span class="campoobligatorio">*</span>Fecha Fin</label><input type="text" name="fechafin" id="fechafin" class="form-control fecha obligatorio" />
            </div>
            <div class="form-group">
                <label for="responsable"><span class="campoobligatorio">*</span>Responsable</label><input type="text" name="responsable" id="responsable" class="form-control obligatorio" />
            </div>
            <div class="form-group">
                <label for="presupuesto"><span class="campoobligatorio">*</span>Presupuesto</label><input type="text" name="presupuesto" id="presupuesto" class="form-control obligatorio" />
            </div>
            <div class="form-group">
                <label for="costoreal"><span class="campoobligatorio">*</span>Costo Real</label><input type="text" name="costoreal" id="costoreal" class="form-control obligatorio" />
            </div>
            <div class="form-group">
                <label for="norma">Norma</label><input type="text" name="norma" id="norma" class="form-control" />
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-group">
                <label for="estado">estado</label><input type="text" name="estado" id="estado" class="form-control" />
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label><textarea name="descripcion" id="descripcion" class="form-control" style="width: 556px; height: 116px;"></textarea>
            </div>
            <div class="form-group">
                <label for="avanceprogramado"><span class="campoobligatorio">*</span>Avance programado</label><input type="text" name="avanceprogramado" id="avanceprogramado" class="form-control obligatorio" />
            </div>
            <div class="form-group">
                <label for="avancereal"><span class="campoobligatorio">*</span>Avance real</label><input type="text" name="avancereal" id="avancereal" class="form-control obligatorio" />
            </div>
            <div class="form-group">
                <label for="eficiencia">%Eficiencia</label><input type="text" name="eficiencia" id="eficiencia" class="form-control" />
            </div>
        </div>
    </div>
</form>    
<div class="row" style="text-align: center">
    <button type="button" id="guardarplan" class="guardar btn btn-dcs">Guardar</button>
</div>
<hr>
<div class="row">
    <table class="table table-bordered table-hover">
        <thead>
        <th>Nuevo Historial</th>
        <th>Avance</th>
        <th>Tipo</th>
        <th>Nombre de la Tarea</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Duraciòn presupuestada</th>
        <th>Responsables</th>
        </thead>
        <tbody>
            <tr>
                <td colspan="8" style="text-align:center">Ingresar Informaciòn</td> 
            </tr>
        </tbody>
    </table>
</div>
<script>
    $('#guardarplan').click(function () {
        $.post(
                "<?php echo base_url("index.php/tareas/guardarplan") ?>",
                    $('#f7').serialize()
                ).done(function(msg){
                    
                }).fail(function(msg){
                    
                });
    });
</script>