<div class="row">
    <span class="tituloH">SERVICIOS MÉDICOS</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>



<!--<div class='well'>-->
<form action="<?php echo base_url('index.php/') . '/Parts/consult_parts'; ?>" method="post" id="form1">
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
    <a href="javascript:" class="btn btn-dcs limpiar">Limpiar </a>
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
                $i = 0;
                foreach ($datos as $key => $value) {
                    $campo = 'id';
                    echo "<tr>";
                    $valor = $value->id;
                    echo '<td>' . $value->description . '</td>';

                    echo '<td><a href="javascript:" class="medicos"  data-toggle="modal" data-target="#myModal" id="' . $valor . '"><b>' . @$d = Parts::cuntar_medicos($valor) . '</b></a></td>';
                    echo '<td>' . @$e = Parts::cuntar_pacientes($valor) . '</td>';


                    echo "<td>"
                    . '<a href="javascript:" class="btn btn-dcs" onclick="editar(' . $valor . ')"><i class="fa fa-pencil"></i></a>';
                    if ($d == 0 && $e == 0) {
                        echo '<a href="javascript:" class="btn btn-danger" onclick="delete_(' . $valor . ')"><i class="fa fa-trash-o"></i></a>';
                    }
                    echo "</td>";
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


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Medicos</h4>
            </div>
            <div class="modal-body">
                <span class="medicos_data"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

<script>
    $('.medicos').click(function () {
        $('.medicos_data').html('');
        var id_medico = $(this).attr('id');
        var url = "<?php echo base_url('index.php/') . '/Parts/consult_medicos'; ?>";
        $.post(url, {id_medico})
                .done(function (msg) {
                    if (msg != 1) {
                        var datos = JSON.parse(msg)
                        var html = "";
                        $.each(datos, function (key, val) {
                            html += 'Nombre: ' + val.nombre+'<br>'
                        })
                        $('.medicos_data').html(html);
                    }
                })
                .fail(function () {
                    alert('')
                })
    })
    $('.limpiar').click(function () {
        $('#form1 input[type="text"]').val("");
        $('#description').val('');
    })
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
