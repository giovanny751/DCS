
<form action="<?php echo base_url('index.php/').'/Medicos/consult_medicos'; ?>" method="post" >
    <div>
    <div class="row">                <div class="col-md-3">
                                    </div>
                <div class="col-md-3">
                    <input type="hidden" value="<?php echo (isset($post['medico_codigo'])?$post['medico_codigo']:'') ?>" class="form-control   " id="medico_codigo" name="medico_codigo">
                    <br>
                </div>

            </div><div class="row">                <div class="col-md-3">
                    Nombre                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['medico_nombre'])?$post['medico_nombre']:'') ?>" class="form-control obligatorio  " id="medico_nombre" name="medico_nombre">
                    <br>
                </div>

            </div><div class="row">                <div class="col-md-3">
                    Matricula profecional                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['medico_matricula_prof'])?$post['medico_matricula_prof']:'') ?>" class="form-control obligatorio  " id="medico_matricula_prof" name="medico_matricula_prof">
                    <br>
                </div>

                            <div class="col-md-3">
                    Dirección                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['medico_direccion'])?$post['medico_direccion']:'') ?>" class="form-control obligatorio  " id="medico_direccion" name="medico_direccion">
                    <br>
                </div>

                            <div class="col-md-3">
                    Telefono fijo                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['medico_telefono_fijo'])?$post['medico_telefono_fijo']:'') ?>" class="form-control obligatorio  number" id="medico_telefono_fijo" name="medico_telefono_fijo">
                    <br>
                </div>

                            <div class="col-md-3">
                    Celular                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['medico_celular'])?$post['medico_celular']:'') ?>" class="form-control   number" id="medico_celular" name="medico_celular">
                    <br>
                </div>

                            <div class="col-md-3">
                    Email                </div>
                <div class="col-md-3">
                    <input type="email" value="<?php echo (isset($post['medico_email'])?$post['medico_email']:'') ?>" class="form-control   " id="medico_email" name="medico_email">
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
                                    <th>Matricula profecional</th>
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
        <a href="<?php echo base_url()."/index.php/Medicos/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Medicos/edit_medicos"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Medicos/delete_medicos"; ?>" method="post" id="delete">
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
