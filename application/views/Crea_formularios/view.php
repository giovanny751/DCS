
<h1><?php echo $post['titulo']; ?></h1>
<form action="<=?php echo base_url('index.php/')."<?php echo "/" . ucfirst($post['tabla']) . '/save_' . $post['tabla'] ?>"; ?=>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
    <div>
        <?php
        $post['columnas'] = str_replace("'", "", $post['columnas']);
        $resul = 12 / $post['columnas'];
        for ($i = 0; $i < count($post['nombre_label']); $i++) {
            
            if ($post['aparezca'][$i] == 1) {
                
                if ($i == 0) {
                    
                    ?><div class="row">
                        <=?php $id=(isset($datos[0]-><?php echo $post['nombre_campo'][$i]; ?>)?$datos[0]-><?php echo $post['nombre_campo'][$i]; ?>:'' ) ?=>
                        <?php
                } else if ($resul % $i == 0) {
                    ?></div><div class="row"><?php
                        $uu = $i;
                    }
                    ?>


                    <div class="col-md-<?php echo $resul ?>">
                        <label for="<?php echo $post['nombre_campo'][$i]; ?>">
                            <?php
                            if ($post['obligatorio'][$i] != '') {
                                echo "* ";
                            }
                            ?>
                            <?php echo $post['nombre_label'][$i]; ?>
                        </label>
                    </div>
                    <div class="col-md-<?php echo $resul ?>">
                        <?php if ($post['nombre_campo'][$i] == "estado" || $post['nombre_campo'][$i] == "Estado") {
                            ?>
                            <select  class="form-control <?php echo $post['obligatorio'][$i] ?> <?php echo $post['fecha'][$i] ?> <?php echo $post['numero'][$i] ?>" id="<?php echo $post['nombre_campo'][$i]; ?>" name="<?php echo $post['nombre_campo'][$i]; ?>">
                                <option value=""></option>
                                <option value="Activo" <=?php echo (isset($datos[0]-><?php echo $post['nombre_campo'][$i]; ?>)?(($datos[0]-><?php echo $post['nombre_campo'][$i]; ?>=='Activo')?'selected="selected"':''):'' ) ?=>>Activo</option>
                                <option value="Inactivo" <=?php echo (isset($datos[0]-><?php echo $post['nombre_campo'][$i]; ?>)?(($datos[0]-><?php echo $post['nombre_campo'][$i]; ?>=='Inactivo')?'selected="selected"':''):'' ) ?=>>Inactivo</option>
                            </select>
                            <?php } else {
                            ?>
                            <input type="<?php echo $post['tipo'][$i]; ?>" value="<=?php echo (isset($datos[0]-><?php echo $post['nombre_campo'][$i]; ?>)?$datos[0]-><?php echo $post['nombre_campo'][$i]; ?>:'' ) ?=>" class=" <?php echo ($post['tipo'][$i]!='file'?'form-control':'')?> <?php echo $post['obligatorio'][$i] ?> <?php echo $post['fecha'][$i] ?> <?php echo $post['numero'][$i] ?>" id="<?php echo $post['nombre_campo'][$i]; ?>" name="<?php echo $post['nombre_campo'][$i]; ?>">
                            
                            <?php if($post['tipo'][$i]=="file"){?>
                            <=?php if(!empty($id)){ ?=>
                            <img style="width: 100px" src="<=?php echo base_url('uploads')?=>/<?php echo $post['tabla']."/".'<=?php echo $id."/".$datos[0]->nombre?=>';?>">
                            <=?php } ?=>
                            <?php } ?>
                            
                        <?php } ?>
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
        $('input[type="file"]').each(function(key,val){
            var img = $(this).val();
            var r=(img.indexOf('jpg') != -1)?'':((img.indexOf('png') != -1 )?'':((img.indexOf('gif') != -1)?'':false))
            if ( r===false ) {
                alert('Tipo de archivo no valido');
                return false;
            }
        });
        if (obligatorio('obligatorio') == false) {
            return false
        } else {
            $('#boton_guardar').hide();
            $('#boton_cargar').show();
            return true;
        }
    }
    $('body').delegate('.number', 'keypress', function(tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker();


</script>