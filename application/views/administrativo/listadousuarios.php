<div class="row">
    <span class="tituloH">LISTADO USUARIOS</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<form method="post" id="f4">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="form-group">
                <label for="cedula">Cédula</label><input type="text" name="cedula" id="cedula" class="form-control">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="form-group">
                <label for="nombre">Nombre</label><input type="text" name="nombre" id="nombre" class="form-control">
            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="form-group">
                <label for="apellido">Apellido</label><input type="text" name="apellido" id="apellido" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="">::Seleccionar::</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center">
            <div class="form-group">
                <label>&nbsp;</label><button type="reset" class="btn btn-dcs">Limpiar</button>
                <label>&nbsp;</label><button type="button" class="btn btn-dcs consultar">Consultar</button>
            </div>
        </div>
    </div>
</form>
<hr>
<div class="row">
    <table id="tablee33" class="table table-bordered table-hover">
        <thead>
        <th>Cédula</th>
        <th>Usuario</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Estado</th>
        <th>Fecha actualización</th>
        <th>Fecha creación</th>
        <th>Opciones</th>
        </thead>
        <tbody id="bodyuser">
            
        </tbody>
    </table>
    <br>
    <a href="<?php echo base_url() . "/index.php/Administrativo/creacionusuarios" ?>" class="btn btn-dcs" >Nuevo</a>
</div>    
<form id="f10" method="post" action="<?php echo base_url("index.php/administrativo/creacionusuarios") ?>">
    <input type="hidden" value="" name="usu_id" id="usu_id">
</form>
<script>



    $('document').ready(function () {
        $('#cedula').autocomplete({
            source: "<?php echo base_url("index.php//Administrativo/autocomplete_cedula") ?>",
            minLength: 3
        });
    });
    $('document').ready(function () {
        $('#nombre').autocomplete({
            source: "<?php echo base_url("index.php//Administrativo/autocomplete_nombre") ?>",
            minLength: 3
        });
    });
    $('document').ready(function () {
        $('#apellido').autocomplete({
            source: "<?php echo base_url("index.php//Administrativo/autocomplete_apellido") ?>",
            minLength: 3
        });
    });
    $('document').ready(function () {
        $('#cedula').autocomplete({
            source: "<?php echo base_url("index.php/administrativo/autocomplete_cedulausuario") ?>",
            minLength: 3
        });
        $('#nombre').autocomplete({
            source: "<?php echo base_url("index.php/administrativo/autocomplete_nombreusuario") ?>",
            minLength: 3
        });
        $('#apellido').autocomplete({
            source: "<?php echo base_url("index.php/administrativo/autocomplete_apellidousuario") ?>",
            minLength: 3
        });
    });

    $('body').delegate(".eliminar", "click", function () {
        var r = confirm('Desea eliminar el usuario');
        if (r == false)
            return false;
        var url = "<?php echo base_url("index.php/administrativo/eliminar_usuarios") ?>";
        $.post(url, {usu_id: $(this).attr('usu_id')})
                .done(function (msg) {
                    alerta('verde', 'Eliminado con exito');
                    location.reload();
                })
    })
    $('#cedula').autocomplete({
        source: "<?php echo base_url("index.php/administrativo/autocompletaruacedula") ?>",
        minLength: 3
    });
    $('#nombre').autocomplete({
        source: "<?php echo base_url("index.php/administrativo/autocompletar") ?>",
        minLength: 3
    });
    $('#apellido').autocomplete({
        source: "<?php echo base_url("index.php/administrativo/autocompletaruapellido") ?>",
        minLength: 3
    });
    $('body').delegate(".modificar", "click", function () {
        $("#usu_id").val($(this).attr("usu_id"));
        $("#f10").submit();
    });
    $('.limpiar').click(function () {
        $('select,input').val('');
    });
    $('.consultar').click(function () {
        table()
    });
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
                    "url": "<?php echo base_url('index.php/administrativo/consultarusuario') ?>",
                    "type": "POST",
                    "data": {
                        cedula: $('#cedula').val(),
                        nombre: $('#nombre').val(),
                        apellido: $('#apellido').val(),
                        estado: $('#estado').val(),
                    },
                },
                "columns": [
                    {"data": "usu_cedula"},
                    {"data": "usu_usuario"},
                    {"data": "usu_nombre"},
                    {"data": "usu_nombre"},
                    {
                        sortable: false,
                        "render": function (data, type, full, meta) {
                            return (full.est_id == 1) ? "Activo" : "Inactivo";
                        }
                    },
                    {"data": "usu_fechaActualizacion"},
                    {"data": "usu_fechaCreacion"},
                    {
                        sortable: false,
                        "render": function (data, type, full, meta) {
                            return '<i class="fa fa-pencil modificar btn btn-info" title="Modificar" usu_id="'+full.usu_id+'"  data-toggle="modal" data-target="#myModal"></i>' +
                                    '<i class="fa fa-trash-o eliminar btn btn-danger" title="Eliminar" usu_id="'+full.usu_id+'"></i>';
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
</script>