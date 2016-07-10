<div class="row">
    <span class="tituloH">Equipos</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<!--    <form action="<?php echo base_url('index.php/') . '/Equipos/consult_equipos'; ?>" method="post" >-->
<div class="row">
    <div class="col-md-3">
        <label for="id_equipo">Serial N° 
        </label>
    </div>
    <div class="col-md-3">

        <input type="text" value="<?php echo (isset($post['serial']) ? $post['serial'] : '' ) ?>" class="form-control   " id="serial" name="serial">
    </div>

    <div class="col-md-3">
        <script>
            $('document').ready(function () {
                $('#descripcion').autocomplete({
                    source: "<?php echo base_url("index.php//Equipos/autocomplete_descripcion") ?>",
                    minLength: 3
                });
            });
        </script>
        <label for="descripcion">
            Descripción                        </label>
    </div>
    <div class="col-md-3">
        <input type="text" value="<?php echo (isset($post['descripcion']) ? $post['descripcion'] : '' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label for="estado">
            Estado                        </label>
    </div>
    <div class="col-md-3">
        <?php echo lista("estado", "estado", "form-control obligatorio", "estado_equipos", "id_estado", "estado", (isset($post['estado']) ? $post['estado'] : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
    </div>

    <div class="col-md-3">
        <label for="ubicacion">
            Ubicación                        </label>
    </div>
    <div class="col-md-3">

        <script>
            $('document').ready(function () {
                $('#ubicacion').autocomplete({
                    source: "<?php echo base_url("index.php//Equipos/autocomplete_ubicacion") ?>",
                    minLength: 3
                });
            });
        </script>
        <input type="text" value="<?php echo (isset($post['ubicacion']) ? $post['ubicacion'] : '' ) ?>" class="form-control obligatorio  " id="ubicacion" name="ubicacion">
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label for="tipo_equipo_cod">
            Tipo equipo                        </label>
    </div>
    <div class="col-md-3">

<!--                                            <input type="text" value="<?php echo (isset($post['tipo_equipo_cod']) ? $post['tipo_equipo_cod'] : '' ) ?>" class="form-control obligatorio  " id="tipo_equipo_cod" name="tipo_equipo_cod">-->
        <?php echo lista("tipo_equipo_cod", "tipo_equipo_cod", "form-control obligatorio", "tipo_equipo", "tipo_equipo_cod", "referencia", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
    </div>


    <div class="col-md-3">
        <label for="responsable">
            Responsable                        </label>
    </div>
    <div class="col-md-3">

        <input type="text" value="<?php echo (isset($post['responsable']) ? $post['responsable'] : '' ) ?>" class="form-control   " id="responsable" name="responsable">
    </div>
</div>
<a href="javascript:" class="btn btn-dcs limpiar">Limpiar</a>
<button class="btn btn-dcs consultar">Consultar</button>
<!--</form>-->

<div class="row">
    <div class="col-md-12">
        <table id="tablee33" class="table table-bordered">
            <thead>
            <th>Código</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Ubicación</th>
            <th>Serial N° </th>
            <th>Fabricante</th>
            <th>Fecha fabricación</th>
            <th>Tipo equipo</th>
            <th>Responsable</th>
            <th>Acción</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="<?php echo base_url() . "/index.php/Equipos/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<form action="<?php echo base_url('index.php/') . "/Equipos/edit_equipos"; ?>" method="post" id="editar">
    <input type="hidden" name="id_equipo" id="id_equipo2">
    <input type="hidden" name="campo" value="id_equipo">
</form>
<form action="<?php echo base_url('index.php/') . "/Equipos/delete_equipos"; ?>" method="post" id="delete">
    <input type="hidden" name="id_equipo" id="id_equipo3">
    <input type="hidden" name="campo" value="id_equipo">
</form>
<script>
    $('.limpiar').click(function () {
        $('input[type="text"]').val('')
        $('select').val('')
    })
    function editar(num) {
        $('#id_equipo2').val(num);
        $('#editar').submit();
    }
    function delete_(num) {
        var r = confirm('Confirma que desea eliminar el registro');
        if (r == false) {
            return false;
        }
        $('#id_equipo3').val(num);
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
            "order":false,
            "bSort" : false,
            "ajax": {
                "url": "<?php echo base_url('index.php/Equipos/consult_equipos2') ?>",
                "type": "POST",
                "data": {
                    serial: $('#serial').val(),
                    descripcion: $('#descripcion').val(),
                    estado: $('#estado').val(),
                    ubicacion: $('#ubicacion').val(),
                    tipo_equipo_cod: $('#tipo_equipo_cod').val(),
                    responsable: $('#responsable').val(),
                },
            },
            "columns": [
                {"data": "id_equipo"},
                {"data": "descripcion"},
                {"data": "estado"},
                {"data": "ubicacion"},
                {"data": "serial"},
                {"data": "fabricante"},
                {"data": "fecha_fabricacion"},
                {"data": "referencia"},
                {"data": "responsable"},
                {
                    sortable: false,
                    "render": function (data, type, full, meta) {
                        return '<a onclick="editar(' + full.id_equipo + ')" class="btn btn-dcs" href="javascript:"><i class="fa fa-pencil"></i></a>' +
                                '<a onclick="delete_(' + full.id_equipo + ')" class="btn btn-danger" href="javascript:"><i class="fa fa-trash-o"></i></a>';
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
