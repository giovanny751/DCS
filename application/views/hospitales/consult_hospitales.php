
<form action="<?php echo base_url('index.php/')."/Hospitales/consult_hospitales"; ?>" method="post" >
    <div class="row">                <div class="col-md-3">
                                    </div>
                <div class="col-md-3">
                    <input type="hidden" value="<?php echo (isset($post['hospital_cod'])?$post['hospital_cod']:'') ?>" class="form-control   " id="hospital_cod" name="hospital_cod">
                </div>

            </div><div class="row">                <div class="col-md-3">
                    Nombre                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['hospital_nombre'])?$post['hospital_nombre']:'') ?>" class="form-control obligatorio  " id="hospital_nombre" name="hospital_nombre">
                </div>

            </div><div class="row">                <div class="col-md-3">
                    Dirección                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['hospital_direccion'])?$post['hospital_direccion']:'') ?>" class="form-control obligatorio  " id="hospital_direccion" name="hospital_direccion">
                </div>

                            <div class="col-md-3">
                    Telefono                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['hospital_telefono_fijo'])?$post['hospital_telefono_fijo']:'') ?>" class="form-control obligatorio  number" id="hospital_telefono_fijo" name="hospital_telefono_fijo">
                </div>

                            <div class="col-md-3">
                    Celular                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['hospital_celular'])?$post['hospital_celular']:'') ?>" class="form-control   number" id="hospital_celular" name="hospital_celular">
                </div>

                            <div class="col-md-3">
                    Email                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['hospital_email'])?$post['hospital_email']:'') ?>" class="form-control   " id="hospital_email" name="hospital_email">
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
                                    <th>Dirección</th>
                                    <th>Telefono</th>
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
        <a href="<?php echo base_url()."/index.php/Hospitales/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Hospitales/edit_hospitales"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Hospitales/delete_hospitales"; ?>" method="post" id="delete">
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
