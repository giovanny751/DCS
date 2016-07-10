<div class="row">
    <span class="tituloH">Pacientes</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<!--<form action="<?php echo base_url('index.php/') . '/Pacientes/consult_pacientes'; ?>" method="post" >-->
    <div class="row">

        <div class="col-md-3">
            <label for="cedula_paciente">
                Cédula paciente                        </label>
        </div>
        <div class="col-md-3">

            <script>
                $('document').ready(function () {
                    $('#cedula_paciente').autocomplete({
                        source: "<?php echo base_url("index.php//Pacientes/autocomplete_cedula_paciente") ?>",
                        minLength: 3
                    });
                });
            </script>
            <input type="text" value="<?php echo (isset($post['cedula_paciente']) ? $post['cedula_paciente'] : '' ) ?>" class="form-control obligatorio  number" id="cedula_paciente" name="cedula_paciente">
        </div>

        <div class="col-md-3">
            <label for="nombres">
                Nombres                        </label>
        </div>
        <div class="col-md-3">

            <script>
                $('document').ready(function () {
                    $('#nombres').autocomplete({
                        source: "<?php echo base_url("index.php//Pacientes/autocomplete_nombres") ?>",
                        minLength: 3
                    });
                });
            </script>
            <input type="text" value="<?php echo (isset($post['nombres']) ? $post['nombres'] : '' ) ?>" class="form-control obligatorio  " id="nombres" name="nombres">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="apellidos">
                Apellidos                        </label>
        </div>
        <div class="col-md-3">

            <script>
                $('document').ready(function () {
                    $('#apellidos').autocomplete({
                        source: "<?php echo base_url("index.php//Pacientes/autocomplete_apellidos") ?>",
                        minLength: 3
                    });
                });
            </script>
            <input type="text" value="<?php echo (isset($post['apellidos']) ? $post['apellidos'] : '' ) ?>" class="form-control obligatorio  " id="apellidos" name="apellidos">
        </div>


        <div class="col-md-3">
            <label for="estado">
                Estado                        </label>
        </div>
        <div class="col-md-3">

            <select  class="form-control obligatorio  " id="estado" name="estado">
                <option value=""></option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
        </div>
    </div>
    <button type="reset" class="btn btn-dcs limpiar">Limpiar</button>
    <button class="btn btn-dcs Consultar">Consultar</button>
<!--</form>-->

<div class="row">
    <div class="col-md-12">
        <table id="tablee33" class="table table-bordered">
            <thead>
            <th style="display: none"></th>
            <th>Cédula paciente</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Fecha Afiliación</th>
            <th>Dirección</th>
            <th>Barrio</th>
            <th>Ciudad</th>
            <th>Fecha Nacimiento</th>
            <th>Acción</th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="<?php echo base_url() . "/index.php/Pacientes/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>

    <form action="<?php echo base_url('index.php/') . "/Pacientes/edit_pacientes"; ?>" method="post" id="editar">
        <input type="hidden" name="id_paciente" id="id_paciente2">
        <input type="hidden" name="campo" value="id_paciente">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Pacientes/delete_pacientes"; ?>" method="post" id="delete">
        <input type="hidden" name="id_paciente" id="id_paciente3">
        <input type="hidden" name="campo" value="id_paciente">
    </form>

<script>
    $('.Consultar').click(function(){
        table()
    })
    
    function table(){
    $('#tablee33').DataTable().destroy();
    $('#tablee33').DataTable({
        "lengthMenu": [[10, 40, 50], [10, 40, 50]],
        "bFilter": false,
        "bInfo": false,
        "processing": true,
        "serverSide": true,
        "bSort" : false,
        "ajax": {
            "url": "<?php echo base_url('index.php/Pacientes/consult_pacientes2') ?>",
            "type": "POST",
            "data": {
                cedula_paciente: $('#cedula_paciente').val(),
                nombres: $('#nombres').val(),
                apellidos: $('#apellidos').val(),
                estado: $('#estado').val(),
            },
        },
        "columns": [
            {"data": "cedula_paciente"},
            {"data": "nombres"},
            {"data": "apellidos"},
            {"data": "fecha_afiliacion"},
            {"data": "direccion"},
            {"data": "barrio"},
            {"data": "ciudad"},
            {"data": "fecha_nacimiento"},
            {
                sortable: false,
                "render": function (data, type, full, meta) {
                    return '<a onclick="editar('+full.id_paciente+')" class="btn btn-dcs" href="javascript:"><i class="fa fa-pencil"></i></a>'+
                    '<a onclick="delete_('+full.id_paciente+')" class="btn btn-danger" href="javascript:"><i class="fa fa-trash-o"></i></a>';
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

    function editar(num) {
        $('#id_paciente2').val(num);
        $('#editar').submit();
    }
    function delete_(num) {
        var r = confirm('Confirma que desea eliminar el registro');
        if (r == false) {
            return false;
        }
        $('#id_paciente3').val(num);
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
