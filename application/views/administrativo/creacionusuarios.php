<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>CREACI�N USUARIOS
    </h5>
</div>
<div class='well'>
    <form id="f3" method="post">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="cedula"><span class="campoobligatorio">*</span>Cédula</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="cedula" name="cedula" class="form-control obligatorio" value="<?php echo (!empty($usuario[0]->usu_cedula)) ? $usuario[0]->usu_cedula : ""; ?>" />
            </div>    
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="nombres">
                    <span class="campoobligatorio">*</span>Nombres</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="nombres" name="nombres" class="form-control obligatorio"  value="<?php echo (!empty($usuario[0]->usu_nombre)) ? $usuario[0]->usu_nombre : ""; ?>" />
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="apellidos">Apellidos</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo (!empty($usuario[0]->usu_apellido)) ? $usuario[0]->usu_apellido : ""; ?>" />
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="usuario"><span class="campoobligatorio">*</span>Usuario</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="usuario" name="usuario" class="form-control obligatorio"  value="<?php echo (!empty($usuario[0]->usu_usuario)) ? $usuario[0]->usu_usuario : ""; ?>" />
            </div> 
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="usuario">Cambio contraseña inicial</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="checkbox" name="cambiocontrasena" class="form-control" <?php echo (!empty($usuario[0]->usu_cambiocontrasena) && $usuario[0]->usu_cambiocontrasena == 1)?"checked":""; ?> />
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="contrasena"><span class="campoobligatorio">*</span>Contraseña</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="password" id="contrasena" name="contrasena" class="form-control obligatorio" value="<?php echo (!empty($usuario[0]->usu_contrasena)) ? $usuario[0]->usu_contrasena : ""; ?>" />
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="estado">Estado</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select id="estado" name="estado" class="form-control">
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($estado as $e) { ?>
                        <option <?php echo (!empty($usuario[0]->est_id) && $usuario[0]->est_id == $e->est_id) ? "selected" : ""; ?> value="<?php echo $e->est_id ?>"><?php echo $e->est_nombre ?></option>
                    <?php } ?>
                </select>
            </div>    
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="email">Email</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="email" id="email" name="email" class="form-control" value="<?php echo (!empty($usuario[0]->usu_email)) ? $usuario[0]->usu_email : ""; ?>" />
            </div>    
              
        </div>
        <?php if (!empty($usuario[0]->usu_id)) { ?>
            <input type="hidden" name="usuid" id="usuid" value="<?php echo $usuario[0]->usu_id; ?>">
        <?php } ?>
    </form>
    <div class="row" style="text-align:center">
        
        <button type="button" class="btn btn-success" id="guardar"><?php echo (!empty($usuario[0]->usu_id))?"Actualizar":"Guardar"; ?></button>
    </div>    
</div>    
<script>
    $('#cargo').change(function(){
        
        $.post(
               "<?php echo base_url("index.php/administrativo/consultausuarioscargo") ?>",
       {
           cargo:$(this).val()
       }
               ).done(function(msg){
                   var data = "";
                   $('#empleado *').remove();
                   $.each(msg,function(key,val){
                       data += "<option value='"+val.Emp_Id+"'>"+val.Emp_Nombre+" "+val.Emp_Apellidos+"</option>" 
                   });
                   $('#empleado').append(data);
               }).fail(function(msg){
                   
               })
    });
    
    $('#guardar').click(function () {
        if (obligatorio('obligatorio') == true) {
            $.post(
                    "<?php
        if (empty($usuario[0]->usu_id))
            echo base_url('index.php/administrativo/guardarusuario');
        else
            echo base_url('index.php/administrativo/actualizarusuario');
        ?>",
                    $('#f3').serialize()
                    ).done(function (msg) {
                        if(msg == 1){
                            alerta("rojo", "El usuario ya esta registrado");
                        }else{
                            alerta("verde", "Datos guardados correctamente");
                        }
                
            })
                    .fail(function (msg) {
                        
                    });
        }
    });
</script>    