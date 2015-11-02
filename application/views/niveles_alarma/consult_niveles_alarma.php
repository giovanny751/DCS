<div class="row">
    <span class="tituloH">Niveles Alarmas</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<form action="<?php echo base_url('index.php/') . '/Niveles_alarma/consult_niveles_alarma'; ?>" method="post" >

    <div class="row">                
        <div class="col-md-3">
            <label for="descripcion">
                Descripción                        </label>
        </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($post['descripcion']) ? $post['descripcion'] : '' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
        </div>
        <!--                <div class="col-md-3">
                        <label for="examen_cod">
                            Examen                        </label>
                    </div>
                    <div class="col-md-3">
        <?php echo lista("examen_cod", "examen_cod", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", (isset($post['examen_cod']) ? $post['examen_cod'] : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                    </div>-->
        <div class="col-md-3">
            <label for="id_protocolo">
                protocolo                        </label>
        </div>
        <div class="col-md-3">
            <?php echo lista("id_protocolo", "id_protocolo", "form-control obligatorio", "protocolos", "id_protocolo", "nombre", (isset($post['id_protocolo']) ? $post['id_protocolo'] : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="n_repeticiones_minimas">
                N° repeticiones mínimas                        </label>
        </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($post['n_repeticiones_minimas']) ? $post['n_repeticiones_minimas'] : '' ) ?>" class="form-control obligatorio  number" id="n_repeticiones_minimas" name="n_repeticiones_minimas">
        </div>

        <div class="col-md-3">
            <label for="n_repeticiones_maximas">
                N° repeticiones máximas                        </label>
        </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($post['n_repeticiones_maximas']) ? $post['n_repeticiones_maximas'] : '' ) ?>" class="form-control obligatorio  number" id="n_repeticiones_maximas" name="n_repeticiones_maximas">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label for="color">
                Color                        </label>
        </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($post['color']) ? $post['color'] : '' ) ?>" class="form-control obligatorio  " id="color" name="color">
        </div>



    </div>
    <button type="reset" class="btn btn-dcs">Limpiar</button>
    <button class="btn btn-dcs">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <th></th>
            <th>Descripción</th>
            <!--<th>Examen</th>-->
            <th>Analisis resultado</th>
            <th>N° repeticiones mínimas</th>
            <th>N° repeticiones máximas</th>
            <th>Color</th>
            <!--<th>protocolo</th>-->
            <th>Acción</th>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $key => $value) {
                    echo "<tr>";
                    $i = 0;

                    foreach ($value as $key2 => $value2) {
                        echo "<td>" . $value->$key2 . "</td>";
                        if ($i == 0) {
                            $campo = $key2;
                            $valor = "'" . $value->$key2 . "'";
                        }
                        $i++;
                    }
                    echo "<td>"
                    . '<a href="javascript:" class="btn btn-dcs" onclick="editar(' . $valor . ')"><i class="fa fa-pencil"></i></a>'
                    . '<a href="javascript:" class="btn btn-danger" onclick="delete_(' . $valor . ')"><i class="fa fa-trash-o"></i></a>'
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
        <a href="<?php echo base_url() . "/index.php/Niveles_alarma/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Niveles_alarma/edit_niveles_alarma"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Niveles_alarma/delete_niveles_alarma"; ?>" method="post" id="delete">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>3">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
<?php } ?>

<script>
    $('#analisis_resultado').val("<?php echo (isset($post['analisis_resultado']) ? $post['analisis_resultado'] : '' ) ?>");
    function editar(num) {
        $('#<?php echo $campo ?>2').val(num);
        $('#editar').submit();
    }
    function delete_(num) {
        var r = confirm('Confirma que desea eliminar el registro');
        if (r == false) {
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
