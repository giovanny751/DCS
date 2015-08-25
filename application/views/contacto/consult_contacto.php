
<form action="<?php echo base_url('index.php/').'/Contacto/consult_contacto'; ?>" method="post" >
    <div>
    <div class="row">                <div class="col-md-3">
                                    </div>
                <div class="col-md-3">
                    <input type="hidden" value="<?php echo (isset($post['contacto_id'])?$post['contacto_id']:'') ?>" class="form-control   " id="contacto_id" name="contacto_id">
                    <br>
                </div>

            </div><div class="row">                <div class="col-md-3">
                    Documento                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['contacto_documento'])?$post['contacto_documento']:'') ?>" class="form-control obligatorio  number" id="contacto_documento" name="contacto_documento">
                    <br>
                </div>

                            <div class="col-md-3">
                    Nombre                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['contacto_nombre'])?$post['contacto_nombre']:'') ?>" class="form-control obligatorio  " id="contacto_nombre" name="contacto_nombre">
                    <br>
                </div>

                            <div class="col-md-3">
                    Dirección                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['contacto_direccion'])?$post['contacto_direccion']:'') ?>" class="form-control obligatorio  " id="contacto_direccion" name="contacto_direccion">
                    <br>
                </div>

                            <div class="col-md-3">
                    Telefono fijo                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['contacto_telefono_fijo'])?$post['contacto_telefono_fijo']:'') ?>" class="form-control obligatorio  number" id="contacto_telefono_fijo" name="contacto_telefono_fijo">
                    <br>
                </div>

                            <div class="col-md-3">
                    Ccelular                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['contacto_celular'])?$post['contacto_celular']:'') ?>" class="form-control   " id="contacto_celular" name="contacto_celular">
                    <br>
                </div>

                            <div class="col-md-3">
                    Email                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['contacto_email'])?$post['contacto_email']:'') ?>" class="form-control   " id="contacto_email" name="contacto_email">
                    <br>
                </div>

                            <div class="col-md-3">
                    Parentesco                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($post['contacto_parentesco'])?$post['contacto_parentesco']:'') ?>" class="form-control   " id="contacto_parentesco" name="contacto_parentesco">
                    <br>
                </div>

                            <div class="col-md-3">
                    Tiene o no tiene llaves de la casa                </div>
                <div class="col-md-3">
                    <input type="checkbox" value="<?php echo (isset($post['contacto_llaves'])?$post['contacto_llaves']:'') ?>" class="form-control   " id="contacto_llaves" name="contacto_llaves">
                    <br>
                </div>

                            <div class="col-md-3">
                    Ciudador                </div>
                <div class="col-md-3">
                    <input type="checkbox" value="<?php echo (isset($post['contacto_cuidador'])?$post['contacto_cuidador']:'') ?>" class="form-control   " id="contacto_cuidador" name="contacto_cuidador">
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
                                    <th>Documento</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Telefono fijo</th>
                                    <th>Ccelular</th>
                                    <th>Email</th>
                                    <th>Parentesco</th>
                                    <th>Tiene o no tiene llaves de la casa</th>
                                    <th>Ciudador</th>
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
        <a href="<?php echo base_url()."/index.php/Contacto/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Contacto/edit_contacto"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Contacto/delete_contacto"; ?>" method="post" id="delete">
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
