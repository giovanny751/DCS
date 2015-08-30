<h1></h1>
<form action="<?php echo base_url('index.php/').'/Prueba/consult_prueba'; ?>" method="post" >
    <div>
    <div class="row">                <div class="col-md-12">
                    <label for="id">
                                            </label>
                </div>
                <div class="col-md-12">
                    
                                            <input type="hidden" value="<?php echo (isset($post['id'])?$post['id']:'' ) ?>" class="form-control   " id="id" name="id">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-12">
                    <label for="nombre">
                    nombre                        </label>
                </div>
                <div class="col-md-12">
                    
                                        <script>
                        $('document').ready(function() {
                            $('#nombre').autocomplete({
                                source: "<?php echo base_url("index.php//Prueba/autocomplete_nombre") ?>",
                                minLength: 1
                            });
                        });
                    </script>
                                            <input type="text" value="<?php echo (isset($post['nombre'])?$post['nombre']:'' ) ?>" class="form-control obligatorio  " id="nombre" name="nombre">
                                            <br>
                </div>

                </div>
    <button class="btn btn-success">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                                    <th></th>
                                    <th>nombre</th>
                            <th>Acción</th>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $key => $value) {
                echo "<tr>";
                    $i=0;

                    foreach ($value as $key2 => $value2) {
                    echo "<td>".$value->$key2."</td>";
                    if($i==0){
                    $campo=$key2;
                    $valor="'".$value->$key2."'";
                    }
                    $i++;
                    }
                    echo "<td>"
                        . '<a href="javascript:" class="btn btn-success" onclick="editar('.$valor.')"><i class="fa fa-pencil"></i></a>'
                        . '<a href="javascript:" class="btn btn-danger" onclick="delete_('.$valor.')"><i class="fa fa-trash-o"></i></a>'
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
        <a href="<?php echo base_url()."/index.php/Prueba/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Prueba/edit_prueba"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Prueba/delete_prueba"; ?>" method="post" id="delete">
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
        var r=confirm('Confirma que desea eliminar el registro');
        if(r==false){
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
