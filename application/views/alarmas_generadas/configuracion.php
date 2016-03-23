<div class="row">
    <span class="tituloH">Configiración</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<form action="<?php echo base_url('index.php/') . '/Alarmas_generadas/configuracion'; ?>" method="post" >
    <div class="row">
        <div class="col-md-3">
            <label for="id_niveles_alarma">
                Tiempo en segundos                        </label>
        </div>
        <div class="col-md-3">
            <input type="text" name="tiempo" id="tiempo" class="form-control" value="<?php echo (isset($datos[0]->tiempo)?$datos[0]->tiempo:0) ?>">
        </div>
        <div class="col-md-3">
            <input type="submit" value="Guardar" class="btn btn-dcs">
        </div>
    </div>
</form>