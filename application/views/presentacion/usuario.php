<div class="row">
    <span class="tituloH">REGISTRO USUARIO</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<script>
    $('document').ready(function () {
        $('#nombre').autocomplete({
            source: "<?php echo base_url("index.php//Medicos/autocomplete_nombre_usuario") ?>",
            minLength: 3
        });
    });
</script>
<script>
    $('document').ready(function () {
        $('#email').autocomplete({
            source: "<?php echo base_url("index.php//Medicos/autocomplete_correo") ?>",
            minLength: 3
        });
    });
</script>

<!--<form action="<?php echo base_url('index.php/presentacion/usuario') ?>" method="post">-->
<div class="row">
    <div class="col-md-3">Nombre</div>
    <div class="col-md-3">
        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo (isset($post['nombre']) ? $post['nombre'] : '') ?>">
    </div>
    <div class="col-md-3">Correo</div>
    <div class="col-md-3">
        <input type="text" class="form-control" name="email" id="email" value="<?php echo (isset($post['email']) ? $post['email'] : '') ?>">
        <br>
    </div>
    <div class="col-md-3">Estado</div>
    <div class="col-md-3">
        <select id="estado" name="estado" class="form-control">
            <option value=""></option>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
        </select><br>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <button class="btn btn-dcs " id="Consultar">Consultar</button>
    </div>
</div>
<!--</form>-->
<div class="row">
    <div class="table-responsive ">
        <table id="tablee33" class="table table-responsive table-striped table-bordered">
            <thead>
            <th>Nombre</th>
            <th>Apellido</th>
            <th >Email</th>
            <th >Estado</th>
            <th >Roles</th>
            </thead>
            <tbody>

            </tbody>
        </table>
        <div id="alerta"></div>
    </div>
</div>
<!--Modal-->

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Permisos</h4>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <div class="widgetTitle">
                        <h5><i class="glyphicon glyphicon-pencil"></i> Asignacion de Rol</h5>
                    </div>
                    <div class="well">
                        <div class="row">
                            <div class="form-group has-success has-feedback">
                                <form method="post" id="f15">
                                    <input type="hidden" value="" id="idusuario" name="idusuario" />
                                    <table class="table table-hover table-bordered"> 
                                        <thead>
                                        <th>Rol</th><th>Asignación</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($roles as $rol) { ?>
                                                <tr>
                                                    <td><?php echo $rol['rol_nombre']; ?></td>
                                                    <td style="text-align:center">
                                                        <input type="checkbox" class="yyy" value="<?php echo $rol['rol_id']; ?>" id="idrol" name="idrol[]">
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>    

                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <form method="post" id="formulariopermisos">
                                <input type="hidden" name="usuarioid" id="usuarioid">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12 permisomenu">

                                </div>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>		
            <div class="modal-footer">
                <div class="row marginV10">
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 col-md-offset-8 col-lg-offset-8 col-sm-offset-8 col-sx-offset-8 margenlogo' align='center' >
                        <button type="button" class="btn btn-dcs insertarrol">Asignar</button>
                    </div>
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .error{
        border: 2px solid #7d7d7d;
        background-color: lightgoldenrodyellow;
    }
</style>
<script>
    $('#ingresousuario').hide();

    $('.insertarrol').click(function () {
        $("#idusuario").val($(this).attr('usuarioid'));
        $.post("<?php echo base_url('index.php/presentacion/guardarpermisos') ?>",
                $('#f15').serialize()
                ).done(function (msg) {
//                    console.log(msg); 
            alerta('verde', 'Asignación con éxito')
            $('#myModal3').modal('hide');
        }).fail(function (msg) {
            alerta('rojo', 'Error en la asignación');
        })


    });

    $('.modificar').click(function () {
        $('.obligatorio').val('');
        $.post("<?php echo base_url('index.php/presentacion/consultausuario') ?>",
                {id: $(this).attr('idpadre')},
        function (data) {
            $('#usuario').val(data.usu_nombres_apellido);
            $('#email').val(data.usu_correo);
            $('#celular').val(data.usu_telF);
        });
    });

    $('body').delegate('.permiso', 'click', function () {

        var id = $(this).attr('usuarioid');
        $(".yyy").prop('checked', false);
        $.post("<?php echo base_url("index.php/presentacion/permisosRol") ?>", {id: id}).done(function (msg) {

            $.each(msg, function (key, val) {
//                $('input[type="checkbox"][value="'+val.rol_id+'"]').is(":checked"); 
//                console.log(val.rol_id);
//                $('input[value="'+val.rol_id+'"]').prop("checked");
                $('.yyy').each(function (key2, val2) {
                    if ($(this).val() == val.rol_id) {
//                        $(this).attr("checked",true);
                        $(this).prop('checked', true);
                    }

                })



            });

        }).fail(function (msg) {
            alert("Error");
        });

        $('#usuarioid').val(id);
        $('.insertarrol').attr('usuarioid', id);
    });


    $('#insertarusuario').click(function () {
        $('.obligatorio').val('');
    });

    $('#Consultar').click(function () {
        table()
    })
    function table() {
        $('#tablee33').DataTable().destroy();
        $('#tablee33').DataTable({
            "lengthMenu": [[10, 40, 50], [10, 40, 50]],
            "bFilter": false,
            "bInfo": false,
            "processing": true,
            "serverSide": true,
            "bSort" : false,
            "ajax": {
                "url": "<?php echo base_url('index.php/presentacion/usuario2') ?>",
                "type": "POST",
                "data": {
                    nombre: $('#nombre').val(),
                    email: $('#email').val(),
                    estado: $('#estado').val(),
                },
            },
            "columns": [
                {"data": "usu_nombre"},
                {"data": "usu_apellido"},
                {"data": "usu_email"},
                {
                    sortable: false,
                    "render": function (data, type, full, meta) {
                        return (full.est_id == 1) ? "Activo" : "Inactivo";
                    }
                },
                {
                    sortable: false,
                    "render": function (data, type, full, meta) {
                        return '<button class="btn btn-info permiso" usuarioid="' + full.usu_id + '" data-target="#myModal3" data-toggle="modal" type="button">Roles</button>';
                    }
                },
            ],
            "drawCallback": function (nRow, aaData, iDataIndex) {
                info = nRow.json.data;
                var html = ""
                $.each(info, function (key, val) {
                    html += val.id_alarmas_generadas + ","
                })
            }
        });
    }
table()
</script>    