<h1>Aseguradoras</h1>
<form action="<?php echo base_url('index.php/').'/Aseguradoras/consult_aseguradoras'; ?>" method="post" >
    <div>
    </div><div class="row">                <div class="col-md-3">
                    Tipo                </div>
                <div class="col-md-3">
                    <select class="form-control obligatorio  " id="asegu_tipo" name="asegu_tipo">
                        <option value=""></option>
                <option value="EPS/IPS" <?php echo (isset($datos[0]->asegu_tipo) ? (($datos[0]->asegu_tipo=='EPS/IPS')?'selected="selected"':'') : '' ) ?>>EPS/IPS</option>
                <option value="Prepagada" <?php echo (isset($datos[0]->asegu_tipo) ? (($datos[0]->asegu_tipo=='EPS/IPS')?'selected="selected"':'') : '' ) ?>>Prepagada</option>
                <option value="Red de ambulancias" <?php echo (isset($datos[0]->asegu_tipo) ? (($datos[0]->asegu_tipo=='EPS/IPS')?'selected="selected"':'') : '' ) ?>>Red de ambulancias</option>
            </select>
                    <br>
                </div>

            </div><div class="row">                <div class="col-md-3">
                    Dirección                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['asegu_direccion'])?$post['asegu_direccion']:'') ?>" class="form-control obligatorio  " id="asegu_direccion" name="asegu_direccion">
                    <br>
                </div>

                            <div class="col-md-3">
                    Telefono fijo                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['asegu_telefono_fijo'])?$post['asegu_telefono_fijo']:'') ?>" class="form-control obligatorio  number" id="asegu_telefono_fijo" name="asegu_telefono_fijo">
                    <br>
                </div>

                            <div class="col-md-3">
                    Celular                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['asegu_celular'])?$post['asegu_celular']:'') ?>" class="form-control   number" id="asegu_celular" name="asegu_celular">
                    <br>
                </div>

                            <div class="col-md-3">
                    Email                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['asegu_email'])?$post['asegu_email']:'') ?>" class="form-control   " id="asegu_email" name="asegu_email">
                    <br>
                </div>

                </div>
    <button class="btn btn-success">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                                    <th>Tipo</th>
                                    <th>Dirección</th>
                                    <th>Telefono fijo</th>
                                    <th>Celular</th>
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
        <a href="<?php echo base_url()."/index.php/Aseguradoras/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Aseguradoras/edit_aseguradoras"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Aseguradoras/delete_aseguradoras"; ?>" method="post" id="delete">
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
