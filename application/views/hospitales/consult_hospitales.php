<h1> Lista Hospitales</h1>
<form action="<?php echo base_url('index.php/') . '/Hospitales/consult_hospitales'; ?>" method="post" >
    <div>
        <div class="row">   
            <div class="col-md-3">
                Código hospital                </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($post['codigo_hospital']) ? $post['codigo_hospital'] : '' ) ?>" class="form-control obligatorio  " id="codigo_hospital" name="codigo_hospital">
                <br>
            </div>
            <div class="col-md-3">
                Nombre Hospital               </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($post['nombre']) ? $post['nombre'] : '' ) ?>" class="form-control obligatorio  " id="nombre" name="nombre">
                <br>
            </div>

            <div class="col-md-3">
                Estado                </div>
            <div class="col-md-3">
                <select  class="form-control obligatorio  " id="estado" name="estado">
                    <option value=""></option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
                <br>
            </div>
        </div>
        <button class="btn btn-success">Buscar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <th>Código</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Dirección</th>
            <th>Telefono fijo</th>
            <th>Celular</th>
            <th>Email</th>
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
                    . '<a href="javascript:" class="btn btn-success" onclick="editar(' . $valor . ')"><i class="fa fa-pencil"></i></a>'
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
        <a href="<?php echo base_url() . "/index.php/Hospitales/index" ?>" class="btn btn-success" >Crear Hospital</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Hospitales/edit_hospitales"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Hospitales/delete_hospitales"; ?>" method="post" id="delete">
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
