<h1>Equipos</h1>
<form action="<?php echo base_url('index.php/').'/Equipos/consult_equipos'; ?>" method="post" >
    <div>
    <div class="row">                <div class="col-md-3">
                                    </div>
                <div class="col-md-3">
                    <input type="hidden" value="<?php echo (isset($post['id_equipo'])?$post['id_equipo']:'') ?>" class="form-control   " id="id_equipo" name="id_equipo">
                    <br>
                </div>

            </div><div class="row">                <div class="col-md-3">
                    Descripción                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['descripcion'])?$post['descripcion']:'') ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                    <br>
                </div>

            </div><div class="row">                <div class="col-md-3">
                    Estado                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['estado'])?$post['estado']:'') ?>" class="form-control obligatorio  " id="estado" name="estado">
                    <br>
                </div>

                            <div class="col-md-3">
                    Ubicacion                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['ubicacion'])?$post['ubicacion']:'') ?>" class="form-control   " id="ubicacion" name="ubicacion">
                    <br>
                </div>

                            <div class="col-md-3">
                    Serial N°                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['serial'])?$post['serial']:'') ?>" class="form-control obligatorio  " id="serial" name="serial">
                    <br>
                </div>

                            <div class="col-md-3">
                    Fabricante                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['fabricante'])?$post['fabricante']:'') ?>" class="form-control   " id="fabricante" name="fabricante">
                    <br>
                </div>

                            <div class="col-md-3">
                    Fecha fabricación                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['fecha_fabricacion'])?$post['fecha_fabricacion']:'') ?>" class="form-control   " id="fecha_fabricacion" name="fecha_fabricacion">
                    <br>
                </div>

                            <div class="col-md-3">
                    Tipo equipo                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['tipo_equipo_cod'])?$post['tipo_equipo_cod']:'') ?>" class="form-control obligatorio  " id="tipo_equipo_cod" name="tipo_equipo_cod">
                    <br>
                </div>

                            <div class="col-md-3">
                    Imagen                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['imagen'])?$post['imagen']:'') ?>" class="form-control   " id="imagen" name="imagen">
                    <br>
                </div>

                            <div class="col-md-3">
                    Responsable                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['responsable'])?$post['responsable']:'') ?>" class="form-control   " id="responsable" name="responsable">
                    <br>
                </div>

                            <div class="col-md-3">
                    Observaciones                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['observaciones'])?$post['observaciones']:'') ?>" class="form-control   " id="observaciones" name="observaciones">
                    <br>
                </div>

                </div>
    <button class="btn btn-success">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                                    <th></th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Ubicacion</th>
                                    <th>Serial N°</th>
                                    <th>Fabricante</th>
                                    <th>Fecha fabricación</th>
                                    <th>Tipo equipo</th>
                                    <th>Imagen</th>
                                    <th>Responsable</th>
                                    <th>Observaciones</th>
                            <th>Acción</th>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $key => $value) {
                echo "<tr>";
                    $i=0;

                    foreach ($value as $key2 => $value2) {
                    echo "<td>".$value->$key2."</td>";
                    if($i==0){
                    $campo=$key2;
                    $valor="'".$value->$key2."'";
                    }
                    $i++;
                    }
                    echo "<td>"
                        . '<a href="javascript:" class="btn btn-success" onclick="editar('.$valor.')"><i class="fa fa-pencil"></i></a>'
                        . '<a href="javascript:" class="btn btn-danger" onclick="delete_('.$valor.')"><i class="fa fa-trash-o"></i></a>'
                        . "</td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="<?php echo base_url()."/index.php/Equipos/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Equipos/edit_equipos"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Equipos/delete_equipos"; ?>" method="post" id="delete">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>3">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<?php } ?>
<script>
    function editar(num) {
        $('#<?php echo $campo ?>2').val(num);
        $('#editar').submit();
    }
    function delete_(num) {
        var r=confirm('Confirma que desea eliminar el registro');
        if(r==false){
            return false;
        }
        $('#<?php echo $campo ?>3').val(num);
        $('#delete').submit();
    }

    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({
        rtl: Metronic.isRTL(),
        autoclose: true
    });
</script>
