
<div class="row">
    <span class="tituloH">Brigadas</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>

<!--<div class='well'>-->
    <form action="<?php echo base_url('index.php/') . '/Brigadas/consult_brigadas'; ?>" method="post" >
        <div class="row">
            <div class="col-md-3">
                <label for="id_brigada">
                    N° </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['id_brigada']) ? $post['id_brigada'] : '' ) ?>" class="form-control   " id="id_brigada" name="id_brigada">
                <br>
            </div>

            <div class="col-md-3">
                <label for="nombre">
                    Nombre                        </label>
            </div>
            <div class="col-md-3">

                <script>
                    $('document').ready(function () {
                        $('#nombre').autocomplete({
                            source: "<?php echo base_url("index.php//Brigadas/autocomplete_nombre") ?>",
                            minLength: 3
                        });
                    });
                </script>
                <input type="text" value="<?php echo (isset($post['nombre']) ? $post['nombre'] : '' ) ?>" class="form-control obligatorio  " id="nombre" name="nombre">
                <br>
            </div>

            <div class="col-md-3">
                <label for="id_cliente">
                    Cliente                        </label>
            </div>
            <div class="col-md-3">

                <?php echo lista("id_cliente", "id_cliente", "form-control obligatorio", "clientes", "id_cliente", "nombre", (isset($datos[0]->id_cliente) ? $datos[0]->id_cliente : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
            </div>
        </div>
        <button class="btn btn-dcs">Consultar</button>
    </form>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <th>N°</th>
                <th>Nombre</th>
                <!--<th>Cliente</th>-->
                <th>Dirección</th>
                <th>Ciudad</th>
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
<!--</div>-->
<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="<?php echo base_url() . "/index.php/Brigadas/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Brigadas/edit_brigadas"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Brigadas/delete_brigadas"; ?>" method="post" id="delete">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>3">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
<?php } ?>
<script>
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
