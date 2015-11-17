<div class="row">
    <span class="tituloH">SERVICIOS MÉDICO</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>



<!--<div class='well'>-->
    <form action="<?php echo base_url('index.php/') . '/Parts/consult_parts'; ?>" method="post" >
        <div class="row">
            <div class="col-md-3">
                <label for="description">
                    Procedimiento                        
                </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($post['description']) ? $post['description'] : '' ) ?>" class="form-control obligatorio  " id="description" name="description">
                <br>
            </div>
        </div>
        <button class="btn btn-dcs">Consultar</button>
    </form>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <th>Procedimiento</th>
                <th>Medicos</th>
                <th>Pacientes</th>
                <th>Acción</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $key => $value) {
                        
                        echo "<tr>";
                        $valor=$value->id;
                        echo '<td>'.$value->description.'</td>';
                        echo '<td>0</td>';
                        echo '<td>0</td>';
                        
                        
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
        <a href="<?php echo base_url() . "/index.php/Parts/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Parts/edit_parts"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Parts/delete_parts"; ?>" method="post" id="delete">
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

    $('body').delegate('.number', 'keypress', function(tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({
        rtl: Metronic.isRTL(),
        autoclose: true
    });
</script>
