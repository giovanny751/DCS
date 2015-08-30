<h1>Clientes</h1>
<form action="<?php echo base_url('index.php/').'/Clientes/consult_clientes'; ?>" method="post" >
    <div>
    <div class="row">                <div class="col-md-3">
                    <label for="id_cliente">
                                            </label>
                </div>
                <div class="col-md-3">
                                            <input type="hidden" value="<?php echo (isset($post['id_cliente'])?$post['id_cliente']:'' ) ?>" class="form-control   " id="id_cliente" name="id_cliente">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-3">
                    <label for="nombre">
                    Nombre                        </label>
                </div>
                <div class="col-md-3">
                                            <input type="text" value="<?php echo (isset($post['nombre'])?$post['nombre']:'' ) ?>" class="form-control obligatorio  " id="nombre" name="nombre">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-3">
                    <label for="id_tipo_cliente">
                    Tipo de cliente                        </label>
                </div>
                <div class="col-md-3">
                                            <?php echo lista("id_tipo_cliente", "id_tipo_cliente", "form-control ", "tipo_cliente", "id_tipo_cliente", "descripcion", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="fecha_inicio_contrato">
                    Fecha inicio contrato                        </label>
                </div>
                <div class="col-md-3">
                                            <input type="text" value="<?php echo (isset($post['fecha_inicio_contrato'])?$post['fecha_inicio_contrato']:'' ) ?>" class="form-control obligatorio fecha " id="fecha_inicio_contrato" name="fecha_inicio_contrato">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="fecha_fin_contrato">
                    Fecha fin contrato                        </label>
                </div>
                <div class="col-md-3">
                                            <input type="text" value="<?php echo (isset($post['fecha_fin_contrato'])?$post['fecha_fin_contrato']:'' ) ?>" class="form-control obligatorio fecha " id="fecha_fin_contrato" name="fecha_fin_contrato">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="estado">
                    Estado                        </label>
                </div>
                <div class="col-md-3">
                                            <select  class="form-control obligatorio  " id="estado" name="estado">
                            <option value=""></option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                                                    <br>
                </div>

                            <div class="col-md-3">
                    <label for="email">
                    Email                        </label>
                </div>
                <div class="col-md-3">
                                            <input type="email" value="<?php echo (isset($post['email'])?$post['email']:'' ) ?>" class="form-control   " id="email" name="email">
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
                                    <th>Nombre</th>
                                    <th>Tipo de cliente</th>
                                    <th>Fecha inicio contrato</th>
                                    <th>Fecha fin contrato</th>
                                    <th>Estado</th>
                                    <th>Email</th>
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
        <a href="<?php echo base_url()."/index.php/Clientes/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Clientes/edit_clientes"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Clientes/delete_clientes"; ?>" method="post" id="delete">
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
