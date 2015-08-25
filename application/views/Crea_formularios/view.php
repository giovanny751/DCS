
<h1><?php echo $post['titulo']; ?></h1>
<form action="<=?php echo base_url('index.php/')."<?php echo "/" . ucfirst($post['tabla']) . '/save_' . $post['tabla'] ?>"; ?=>" method="post" onsubmit="return campos()">
    <div>
        <?php
        $resul = 12 / $post['columnas'];
        for ($i = 0; $i < count($post['nombre_label']); $i++) {
            if ($post['aparezca'][$i] == 1) {

//                echo $i % $post['columnas']."**";
                if ($i == 0) {
                    ?><div class="row"><?php
                } else if ($resul % $i == 0) {
                    ?></div><div class="row"><?php
                        $uu = $i;
                    }
                    ?>


                    <div class="col-md-<?php echo $resul ?>">
                        <?php if ($post['obligatorio'][$i] != '') {
                            echo "* ";
                        } ?>
        <?php echo $post['nombre_label'][$i]; ?>
                    </div>
                    <div class="col-md-<?php echo $resul ?>">
                        <input type="<?php echo $post['tipo'][$i]; ?>" value="<=?php echo (isset($datos[0]-><?php echo $post['nombre_campo'][$i]; ?>)?$datos[0]-><?php echo $post['nombre_campo'][$i]; ?>:'' ) ?=>" class="form-control <?php echo $post['obligatorio'][$i] ?> <?php echo $post['fecha'][$i] ?> <?php echo $post['numero'][$i] ?>" id="<?php echo $post['nombre_campo'][$i]; ?>" name="<?php echo $post['nombre_campo'][$i]; ?>">
                        <br>
                    </div>

                    <?php
                }
            }
            ?>
        </div>
        <=?php if(isset($post['campo'])){ ?=>
        <input type="hidden" name="<=?php echo $post['campo']?=>" value="<=?php echo $post[$post['campo']]?=>">
        <input type="hidden" name="campo" value="<=?php echo $post['campo']?=>">
        <=?php } ?=>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-success" >Guardar</button> 
                <input class="btn btn-success" type="reset" value="Limpiar">
                <a href="<=?php echo base_url('index.php')."<?php echo "/" . ucfirst($post['tabla']) . "/consult_" . $post['tabla'] ?>" ?=>" class="btn btn-success">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
</form>
<script>
    function campos() {

        if (obligatorio('obligatorio') == false) {
            return false
        } else {
            $('#boton_guardar').hide();
            $('#boton_cargar').show();
            return true;
        }
    }
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker();
</script>