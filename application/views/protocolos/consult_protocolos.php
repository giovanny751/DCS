<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>Protocolos
    </h5>
</div>
<div class='well'>
<form action="<?php echo base_url('index.php/').'/Protocolos/consult_protocolos'; ?>" method="post" >

    <div class="row">                <div class="col-md-2">
                    <label for="id_protocolo">
                                            </label>
                </div>
                <div class="col-md-2">
                                            <input type="hidden" value="<?php echo (isset($post['id_protocolo'])?$post['id_protocolo']:'' ) ?>" class="form-control   " id="id_protocolo" name="id_protocolo">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-2">
                    <label for="nombre">
                    Nombre                        </label>
                </div>
                <div class="col-md-2">
                                            <input type="text" value="<?php echo (isset($post['nombre'])?$post['nombre']:'' ) ?>" class="form-control obligatorio  " id="nombre" name="nombre">
                                            <br>
                </div>

                            <div class="col-md-2">
                    <label for="version">
                    Versión                        </label>
                </div>
                <div class="col-md-2">
                                            <input type="text" value="<?php echo (isset($post['version'])?$post['version']:'' ) ?>" class="form-control obligatorio  " id="version" name="version">
                                            <br>
                </div>

                            <div class="col-md-2">
                    <label for="estado">
                    Estado                        </label>
                </div>
                <div class="col-md-2">
                                            <select  class="form-control obligatorio  " id="estado" name="estado">
                            <option value=""></option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                                                    <br>
                </div>

                            <div class="col-md-2">
                    <label for="descripcion">
                    Descripción                        </label>
                </div>
                <div class="col-md-2">
                                            <input type="text" value="<?php echo (isset($post['descripcion'])?$post['descripcion']:'' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                                            <br>
                </div>

                            <div class="col-md-2">
                    <label for="enviar_sms">
                    Enviar sms                        </label>
                </div>
                <div class="col-md-2">
                    <input type="checkbox"  <?php echo (isset($post['enviar_sms'])?'checked="checked"':'' ) ?> class="form-control   " value="SI" id="enviar_sms" name="enviar_sms">
                                            <br>
                </div>

                            <div class="col-md-2">
                    <label for="enviar_email">
                    Enviar email                        </label>
                </div>
                <div class="col-md-2">
                                            <input type="checkbox" value="SI" <?php echo (isset($post['enviar_email'])?'checked="checked"':'' ) ?> class="form-control   " id="enviar_email" name="enviar_email">
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
                                    <th>Versión</th>
                                    <th>Estado</th>
                                    <th>Descripción</th>
                                    <th>Enviar sms</th>
                                    <th>Enviar email</th>
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
        <a href="<?php echo base_url()."/index.php/Protocolos/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Protocolos/edit_protocolos"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Protocolos/delete_protocolos"; ?>" method="post" id="delete">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>3">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<?php } ?>
</div>
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
