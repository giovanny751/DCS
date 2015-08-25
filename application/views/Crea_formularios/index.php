<form id="form1">
    <div class="row">
        <div class="col-md-3" id="datos">
            Tabla
        </div> 
        <div class="col-md-3" id="datos">
            <select id="tabla" class="form-control" name="tabla">
                <option></option>
                <?php
                foreach ($tablas as $value) {
                    ?><option value="<?php echo $value->Tables_in_gyy ?>"><?php echo $value->Tables_in_gyy ?></option><?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-3" id="datos">
            Numero de columnas
        </div> 
        <div class="col-md-3" id="datos">
            <select id="columnas" class="form-control" name="columnas">
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }
                ?>

            </select>
        </div> 
    </div>
    <div class="row">
        <div class="col-md-3" id="datos">
            Titulo
        </div>
        <div class="col-md-3" id="datos">
            <input type="text" class="form-control" name="titulo" id="titulo">
        </div>
    </div>
    <div class="row">
        <table class="cree table table-bordered" width="100%">
            <thead>
            <th>Campo</th>
            <th>Descripción</th>
            <th>Label</th>
            <th>Tipo</th>
            <th>Obligatorio</th>
            <th>numerico</th>
            <th>fecha</th>
            <th>aparezca</th>
            </thead>
            <tbody id="tbody_table">

            </tbody>
        </table>
    </div>
</form>

<center><button id="guardar" style="display: none" class="btn btn-success">Guardar</button></center>
<script>

    $('#guardar').click(function () {
        var url = "<?= base_url("index.php/Crea_formularios/new_file") ?>";
        $.post(url, $('#form1').serialize())
                .done(function (msg) {
                    alert('Se agregaron con exito');
                })
                .fail(function () {
                    alert('No se agregaron ');
                })
    });
    $('#tabla').change(function () {
        var url = "<?= base_url("index.php/Crea_formularios/info_table") ?>";
        $.post(url, {tabla: $('#tabla').val()})
                .done(function (msg) {
//                    msg=JSON.parse(msg);
//                    $.each(msg,function(){
//                        
//                    })
                    $('#guardar').show();
                    $('#tbody_table').html(msg)
                })
                .fail(function (msg) {

                })
    })
</script>
