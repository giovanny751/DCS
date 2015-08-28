<h1>Contactos</h1>
<form action="<?php echo base_url('index.php/').'/Contacto/consult_contacto'; ?>" method="post" >
    <div>
    
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Division by zero</p>
<p>Filename: Crea_formularios/view_consulta.php</p>
<p>Line Number: 5</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\DCS\application\views\Crea_formularios\view_consulta.php<br />
			Line: 5<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\DCS\application\controllers\Crea_formularios.php<br />
			Line: 72<br />
			Function: view			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\DCS\index.php<br />
			Line: 292<br />
			Function: require_once			</p>

		
	

</div><div class="row">                <div class="col-md-">
                                    </div>
                <div class="col-md-">
                                            <input type="hidden" value="<?php echo (isset($datos[0]->contacto_id)?$datos[0]->contacto_id:'' ) ?>" class="form-control   " id="contacto_id" name="contacto_id">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-">
                    Cédula o NIT                </div>
                <div class="col-md-">
                                            <input type="text" value="<?php echo (isset($datos[0]->documento)?$datos[0]->documento:'' ) ?>" class="form-control obligatorio  " id="documento" name="documento">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-">
                    Nombre                </div>
                <div class="col-md-">
                                            <input type="text" value="<?php echo (isset($datos[0]->nombre)?$datos[0]->nombre:'' ) ?>" class="form-control obligatorio  " id="nombre" name="nombre">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-">
                    Estado                </div>
                <div class="col-md-">
                                            <input type="text" value="<?php echo (isset($datos[0]->Estado)?$datos[0]->Estado:'' ) ?>" class="form-control obligatorio  " id="Estado" name="Estado">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-">
                    Direccion                </div>
                <div class="col-md-">
                                            <input type="text" value="<?php echo (isset($datos[0]->direccion)?$datos[0]->direccion:'' ) ?>" class="form-control obligatorio  " id="direccion" name="direccion">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-">
                    Telefono fijo                </div>
                <div class="col-md-">
                                            <input type="text" value="<?php echo (isset($datos[0]->telefono_fijo)?$datos[0]->telefono_fijo:'' ) ?>" class="form-control obligatorio  number" id="telefono_fijo" name="telefono_fijo">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-">
                    celular                </div>
                <div class="col-md-">
                                            <input type="text" value="<?php echo (isset($datos[0]->celular)?$datos[0]->celular:'' ) ?>" class="form-control   " id="celular" name="celular">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-">
                    email                </div>
                <div class="col-md-">
                                            <input type="email" value="<?php echo (isset($datos[0]->email)?$datos[0]->email:'' ) ?>" class="form-control   " id="email" name="email">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-">
                    parentesco                </div>
                <div class="col-md-">
                                            <input type="text" value="<?php echo (isset($datos[0]->parentesco)?$datos[0]->parentesco:'' ) ?>" class="form-control   " id="parentesco" name="parentesco">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-">
                    Tiene o no llaves de la casa                </div>
                <div class="col-md-">
                                            <input type="checkbox" value="<?php echo (isset($datos[0]->llaves)?$datos[0]->llaves:'' ) ?>" class="form-control   " id="llaves" name="llaves">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-">
                    Cuidador                </div>
                <div class="col-md-">
                                            <input type="checkbox" value="<?php echo (isset($datos[0]->cuidador)?$datos[0]->cuidador:'' ) ?>" class="form-control   " id="cuidador" name="cuidador">
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
                                    <th>Cédula o NIT</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>Direccion</th>
                                    <th>Telefono fijo</th>
                                    <th>celular</th>
                                    <th>email</th>
                                    <th>parentesco</th>
                                    <th>Tiene o no llaves de la casa</th>
                                    <th>Cuidador</th>
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
        <a href="<?php echo base_url()."/index.php/Contacto/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Contacto/edit_contacto"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Contacto/delete_contacto"; ?>" method="post" id="delete">
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
