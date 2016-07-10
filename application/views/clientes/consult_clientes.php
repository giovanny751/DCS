<div class="row">
    <span class="tituloH">Clientes</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<!--<form action="<?php echo base_url('index.php/') . '/Clientes/consult_clientes'; ?>" method="post">-->
    <div class="row">
        <div class="col-md-3">
            <label for="id_cliente">Código
            </label>
        </div>
        <div class="col-md-3">

            <input type="text" value="<?php echo (isset($post['id_cliente']) ? $post['id_cliente'] : '' ) ?>" class="form-control   " id="id_cliente" name="id_cliente">
        </div>

        <div class="col-md-3">
            <label for="nombre">
                Nombre                        </label>
        </div>
        <div class="col-md-3">

            <script>
                $('document').ready(function () {
                    $('#nombre').autocomplete({
                        source: "<?php echo base_url("index.php//Clientes/autocomplete_nombre") ?>",
                        minLength: 3
                    });
                });
            </script>
            <input type="text" value="<?php echo (isset($post['nombre']) ? $post['nombre'] : '' ) ?>" class="form-control obligatorio  " id="nombre" name="nombre">
        </div>
    </div>
    <div class="row">

        <div class="col-md-3">
            <label for="id_tipo_cliente">
                Tipo cliente                        </label>
        </div>
        <div class="col-md-3">
            <?php echo lista("id_tipo_cliente", "id_tipo_cliente", "form-control ", "tipo_cliente", "id_tipo_cliente", "descripcion", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                                    <!--<input type="text" value="<?php echo (isset($post['id_tipo_cliente']) ? $post['id_tipo_cliente'] : '' ) ?>" class="form-control   " id="id_tipo_cliente" name="id_tipo_cliente">-->
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
            <th></th>
            <th>Nombre</th>
            <th>Tipo cliente</th>
            <th>Fecha inicio contrato</th>
            <th>Fecha fin contrato</th>
            <th>Estado</th>
            <th>Email</th>
            <th>Acción</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="<?php echo base_url() . "/index.php/Clientes/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>

<form action="<?php echo base_url('index.php/') . "/Clientes/edit_clientes"; ?>" method="post" id="editar">
    <input type="hidden" name="id_cliente" id="id_cliente2">
    <input type="hidden" name="campo" value="id_cliente">
</form>
<form action="<?php echo base_url('index.php/') . "/Clientes/delete_clientes"; ?>" method="post" id="delete">
    <input type="hidden" name="id_cliente" id="id_cliente3">
    <input type="hidden" name="campo" value="id_cliente">
</form>

<script>

    function editar(num) {
        $('#id_cliente2').val(num);
        $('#editar').submit();
    }
    function delete_(num) {
        var r = confirm('Confirma que desea eliminar el registro');
        if (r == false) {
            return false;
        }
        $('#id_cliente3').val(num);
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

    $('.Consultar').click(function () {
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
                "url": "<?php echo base_url('index.php/Clientes/consult_clientes2') ?>",
                "type": "POST",
                "data": {
                    id_cliente: $('#id_cliente').val(),
                    nombre: $('#nombre').val(),
                    id_tipo_cliente: $('#id_tipo_cliente').val(),
                    estado: $('#estado').val(),
                },
            },
            "columns": [
                {"data": "id_cliente"},
                {"data": "nombre"},
                {"data": "descripcion"},
                {"data": "fecha_inicio_contrato"},
                {"data": "fecha_fin_contrato"},
                {"data": "estado"},
                {"data": "email"},
                {
                    sortable: false,
                    "render": function (data, type, full, meta) {
                        return '<a onclick="editar(' + full.id_cliente + ')" class="btn btn-dcs" href="javascript:"><i class="fa fa-pencil"></i></a>' +
                                '<a onclick="delete_(' + full.id_cliente + ')" class="btn btn-danger" href="javascript:"><i class="fa fa-trash-o"></i></a>';
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
