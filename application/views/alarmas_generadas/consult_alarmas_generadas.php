<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Alarmas Generadas    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . '/Alarmas_generadas/consult_alarmas_generadas'; ?>" method="post" >
        <div class="row">


            <div class="col-md-3">
                <label for="id_niveles_alarma">
                    Niveles alarma                        </label>
            </div>
            <div class="col-md-3">

                <?php echo lista("id_niveles_alarma", "id_niveles_alarma", "form-control obligatorio", "niveles_alarma", "id_niveles_alarma", "descripcion", (isset($datos[0]->id_niveles_alarma) ? $datos[0]->id_niveles_alarma : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
            </div>

            <div class="col-md-3">
                <label for="descripcion">
                    Descripción                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['descripcion']) ? $post['descripcion'] : '' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                <br>
            </div>

            <div class="col-md-3">
                <label for="id_lectura_equipo">
                    Lectura equipo                        </label>
            </div>
            <div class="col-md-3">

                <?php echo lista("id_lectura_equipo", "id_lectura_equipo", "form-control obligatorio", "lectura_equipo", "id_lectura_equipo", "id_lectura_equipo", (isset($datos[0]->id_lectura_equipo) ? $datos[0]->id_lectura_equipo : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
            </div>

            <div class="col-md-3">
                <label for="analisis_resultado">
                    Analisis resultado                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['analisis_resultado']) ? $post['analisis_resultado'] : '' ) ?>" class="form-control obligatorio  " id="analisis_resultado" name="analisis_resultado">
                <br>
            </div>

        </div>
        <button class="btn btn-dcs">Consultar</button>
    </form>

    <div class="row">
        <div class="col-md-12 table-responsive" style="font-size: 8px">
            <table class="table table-bordered">
                <thead>
                <th></th>
                <th>Codigo</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha Creacion</th>
                <th>Descripción alarma</th>
                <th>Nivel</th>
                <th>Examen</th>
                <th>Análisis resultado</th>
                <th>Valor leido</th>
                <th>Protocolo</th>
                <th>Estado</th>
                <th>Fecha atención</th>
                <th>Onservaciones</th>
                <th>Acción</th>
                </thead>
                <tbody>
                    <?php
//                    echo "<pre>";
//                    print_r($datos);
//                    echo "</pre>";
                    foreach ($datos as $key => $value) {
                        echo "<tr>";
                        $i = 0;

                        foreach ($value as $key2 => $value2) {
                            if ($i == 0) {
                                $campo = $key2;
                                if (empty($value->descrip)) {
                                    echo '<td><span class="charSelected_' . $value->$key2 . '"><b>O</b></span></td>';
                                }else{
                                    echo '<td><span class="charSelecte_' . $value->$key2 . '"><b>O</b></span></td>';
                                }
                            } else if ($i == 1) {
                                $campo = $key2;
                                $valor = "'" . $value->$key2 . "'";
                                echo "<td>" . $value->$key2 . "</td>";
                            } else {
                                echo "<td>" . $value->$key2 ."</td>";
                            }
                            $i++;
                        }
                        echo "<td>"
                        . '<a href="javascript:" class="btn btn-dcs" onclick="editar(' . $valor . ')"><i class="fa fa-pencil"></i></a>'
                        . "</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="<?php echo base_url() . "/index.php/Alarmas_generadas/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Alarmas_generadas/edit_alarmas_generadas"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Alarmas_generadas/delete_alarmas_generadas"; ?>" method="post" id="delete">
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
</script>

<style>


    .charSelecte_Verde{
        background-color: green;
        padding: 1px 3px;
        border-radius: 15px;
    }
    .charSelecte_Amarillo{
        background-color: yellow;
        padding: 1px 3px;
        border-radius: 15px;
    }
    .charSelecte_Rojo{
        background-color: red;
        padding: 1px 3px;
        border-radius: 15px;
    }
    .charSelecte_Naranja{
        background-color: orange;
        padding: 1px 3px;
        border-radius: 15px;
    }
    ///// de aka para abajo se pintan y desaparecen 
    .charSelected_Verde{
        background-color: green;
        animation: parpadeo 1s;
        -webkit-animation: parpadeo_green 1s;
        -moz-animation: parpadeo_green 1s;
        animation-iteration-count:infinite;
        -webkit-animation-iteration-count:infinite;
        -moz-animation-iteration-count:infinite;
        padding: 1px 3px;
        border-radius: 15px;
    }
    


    .charSelected_Amarillo{
        background-color: yellow;
        animation: parpadeo 1s;
        -webkit-animation: parpadeo_yellow 1s;
        -moz-animation: parpadeo_yellow 1s;
        animation-iteration-count:infinite;
        -webkit-animation-iteration-count:infinite;
        -moz-animation-iteration-count:infinite;
        padding: 1px 3px;
        border-radius: 15px;
    }
    


    .charSelected_Rojo{
        background-color: red;
        animation: parpadeo 1s;
        -webkit-animation: parpadeo_red 1s;
        -moz-animation: parpadeo_red 1s;
        animation-iteration-count:infinite;
        -webkit-animation-iteration-count:infinite;
        -moz-animation-iteration-count:infinite;
        padding: 1px 3px;
        border-radius: 15px;
    }
    


    .charSelected_Naranja{
        background-color: orange;
        animation: parpadeo 1s;
        -webkit-animation: parpadeo_orange 1s;
        -moz-animation: parpadeo_orange 1s;
        animation-iteration-count:infinite;
        -webkit-animation-iteration-count:infinite;
        -moz-animation-iteration-count:infinite;
        padding: 1px 3px;
        border-radius: 15px;
    }
    
    @keyframes parpadeo_orange {
        0% {background-color: white}
        100%{background-color: orange}
    }

    @-webkit-keyframes parpadeo_orange {
        0% {background-color: white}
        100%{background-color: orange}
    }
    @keyframes parpadeo_green {
        0% {background-color: white}
        100%{background-color: green}
    }

    @-webkit-keyframes parpadeo_green {
        0% {background-color: white}
        100%{background-color: green}
    }
    @keyframes parpadeo_yellow {
        0% {background-color: white}
        100%{background-color: yellow}
    }

    @-webkit-keyframes parpadeo_yellow {
        0% {background-color: white}
        100%{background-color: yellow}
    }
    @keyframes parpadeo_red {
        0% {background-color: white}
        100%{background-color: red}
    }

    @-webkit-keyframes parpadeo_red {
        0% {background-color: white}
        100%{background-color: red}
    }


</style>