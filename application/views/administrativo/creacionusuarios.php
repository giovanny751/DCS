<?php
if ($usuario == "") {
    $usuario = array();
}
?>
<div class="row">
    <span class="tituloH">CREACIÓN USUARIOS</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<form id="f3" method="post">

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="cedula"><span class="campoobligatorio">*</span>Cédula</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="cedula" name="cedula" class="form-control obligatorio" value="<?php echo (isset($usuario[0]->usu_cedula)) ? $usuario[0]->usu_cedula : ""; ?>" />
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="nombres">
                <span class="campoobligatorio">*</span>Nombres</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="nombres" name="nombres" class="form-control obligatorio"  value="<?php echo (isset($usuario[0]->usu_nombre)) ? $usuario[0]->usu_nombre : ""; ?>" />
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="apellidos">Apellidos</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo (isset($usuario[0]->usu_apellido)) ? $usuario[0]->usu_apellido : ""; ?>" />
        </div> 
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="email"><span class="campoobligatorio">*</span>Email</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="email" name="email" class="form-control obligatorio" value="<?php echo (isset($usuario[0]->usu_email)) ? $usuario[0]->usu_email : ""; ?>" />
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="usuario"><span class="campoobligatorio">*</span>Usuario</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="usuario" name="usuario" class="form-control obligatorio"  value="<?php echo (isset($usuario[0]->usu_usuario)) ? $usuario[0]->usu_usuario : ""; ?>" />
        </div> 
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="usuario">Cambio contraseña inicial</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="checkbox" name="cambiocontrasena" class="form-control" <?php echo (isset($usuario[0]->usu_cambiocontrasena) && $usuario[0]->usu_cambiocontrasena == 1) ? "checked" : ""; ?> />
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="contrasena"><span class="campoobligatorio">*</span>Contraseña</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="password" id="contrasena" name="contrasena" class="form-control obligatorio" value="" />
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="estado">Estado</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select id="estado" name="estado" class="form-control">
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
            </select><br>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="estado">Tipo usuario</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select id="tipo_usuario" name="tipo_usuario" class="form-control">
                <option value="1" <?php echo (isset($usuario[0]->tipo_usuario)) ? ($usuario[0]->tipo_usuario==1?'selected':'') : ""; ?>>Admin</option>
                <option value="2" <?php echo (isset($usuario[0]->tipo_usuario)) ? ($usuario[0]->tipo_usuario==2?'selected':'') : ""; ?>>Medico</option>
                <option value="3" <?php echo (isset($usuario[0]->tipo_usuario)) ? ($usuario[0]->tipo_usuario==3?'selected':'') : ""; ?>>Paciente</option>
                <option value="4" <?php echo (isset($usuario[0]->tipo_usuario)) ? ($usuario[0]->tipo_usuario==4?'selected':'') : ""; ?>>Contacto</option>
            </select>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="estado"><span class="campoobligatorio">*</span>Rol</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <?php echo lista("rol_id", "rol_id", "form-control obligatorio", "roles", "rol_id", "rol_nombre", (isset($usuario[0]->rol_id) ? $usuario[0]->rol_id : ''), array("rol_estado" => 1), /* readOnly? */ false); ?>
        </div>    
    </div>


    <?php if (isset($usuario[0]->usu_id)) { ?>
        <input type="hidden" name="usuid" id="usuid" value="<?php echo $usuario[0]->usu_id; ?>">
    <?php } ?>
</form>
<div class="row" style="text-align:center">

    <button type="button" class="btn btn-dcs" id="guardar"><?php echo (isset($usuario[0]->usu_id)) ? "Actualizar" : "Guardar"; ?></button>
    <input class="btn btn-dcs" type="reset" value="Limpiar">
    <a href="<?php echo base_url('index.php') . "/Administrativo/listadousuarios" ?>" class="btn btn-dcs">Listado </a>

</div>    
<script>
    $('#estado').val('<?php echo (isset($usuario[0]->est_id) ? $usuario[0]->est_id : '') ?>')
    $('#cedula').change(function () {
        var cedula = $('#cedula').val();
        $.post('<?php echo base_url('index.php/administrativo/confirm_cedula') ?>', {cedula: cedula})
                .done(function (msg) {
                    if (msg == 0) {
                        alerta('verde', 'Cédula valido')
                    } else {
                        alerta('rojo', 'Cédula ya se encuentra registrada')
                        $('#cedula').val('');
                    }
                })
                .fail(function (msg) {
                })
    })
    $('#email').change(function () {
        var email = $('#email').val();
        $.post('<?php echo base_url('index.php/administrativo/email') ?>', {email: email})
                .done(function (msg) {
                    if (msg == 0) {
                        alerta('verde', 'email valido')
                    } else {
                        alerta('rojo', 'email ya se encuentra registrada')
                        $('#email').val('');
                    }
                })
                .fail(function (msg) {
                })
    })
    $('#usuario').change(function () {
        var usuario = $('#usuario').val();
        $.post('<?php echo base_url('index.php/administrativo/confirm_usuario') ?>', {usuario: usuario})
                .done(function (msg) {
                    if (msg == 0) {
                        alerta('verde', 'Usuario valido')
                    } else {
                        alerta('rojo', 'Usuario ya se encuentra registrado')
                        $('#usuario').val('');
                    }
                })
                .fail(function (msg) {
                })
    })

    $('#guardar').click(function () {
        var email = $('#email').val();

        if (email != "") {
            expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!expr.test(email)) {
                alerta("rojo", "La dirección de correo " + email + " es incorrecta.");
                return false;
            }
        }


        if (obligatorio('obligatorio') == true) {
            $.post(
                    "<?php
    if (!isset($usuario[0]->usu_id))
        echo base_url('index.php/administrativo/guardarusuario');
    else
        echo base_url('index.php/administrativo/actualizarusuario');
    ?>",
                    $('#f3').serialize()
                    ).done(function (msg) {
                alerta("verde", "Datos guardados correctamente");
                location.href = "<?php echo base_url('index.php') . "/Administrativo/listadousuarios" ?>";
            })
                    .fail(function (msg) {
                        alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
                    });
        }
    });

    $('#contrasena').change(function () {
        if ($(this).val().length < 7) {
            alerta('rojo', 'La contraseña debe ser minimo de 8 caracteres')
            $(this).val('')
        }
    })
</script>    
