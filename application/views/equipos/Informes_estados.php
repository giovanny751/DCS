<span class="tituloH">Informes Equipos</span>
<span class="cuadroH1"></span>
<span class="cuadroH2"></span>
<span class="cuadroH3"></span>
<form id="form1" action="<?php echo base_url('index.php/Equipos/obterner_informe') ?>" method="post">
<div class="row">
    <div class="col-md-3">
        Informe
    </div>
    <div class="col-md-3">
        <select id="informe" name="informe" class="form-control">
            <option value="1">Inventario Equipos</option>
            <option value="2">Movimientos Equipos</option>
        </select>
    </div>
    <div class="col-md-3" >
        Descripción
    </div>
    <div class="col-md-3 " >
        <script>
                    $('document').ready(function () {
                        $('#descripcion').autocomplete({
                            source: "<?php echo base_url("index.php//Equipos/autocomplete_descripcion") ?>",
                            minLength: 3
                        });
                    });
                </script>
        <input type="text" name="descripcion" id="descripcion" class="form-control">
    </div>
    
</div>
<div class="row">
    <div class="col-md-3">
        Tipo
    </div>
    <div class="col-md-3">
        <?php echo lista("id_equipo", "id_equipo", "form-control", "tipo_equipo", "tipo_equipo_cod", "referencia", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
    </div>
    <div class="col-md-3" >
        Estado
    </div>
    <div class="col-md-3">
        <?php echo lista("id_estado", "id_estado", "form-control", "estado_equipos", "id_estado", "estado", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
    </div>
</div>
<div class="row tipo_ii" style="display:none">
    <div class="col-md-3">
        Fecha Inicio
    </div>
    <div class="col-md-3">
        <input type="text" name="fecha_ini" id="fecha_ini" class="fecha form-control">
    </div>
    <div class="col-md-3">
        Fecha Final
    </div>
    <div class="col-md-3">
        <input type="text" name="fecha_fin" id="fecha_fin" class="fecha form-control">
    </div>
</div>
    <input type="hidden" name="accion" id="accion" class="">
</form>
<button class="btn btn-dcs ver">Ver</button>
<button class="btn btn-dcs exportar">Exportar</button>
<div class="row">
    <div id="resultado"></div>
</div>
<script>
    $('.ver').click(function(){
        $('#accion').val(1)
        enviar();
    });
    $('.exportar').click(function(){
       $('#accion').val(2)
       $('#form1').submit();
    });
    function enviar(){
        var url='<?php echo base_url('index.php/Equipos/obterner_informe') ?>';
        $.post(url,$('#form1').serialize())
                .done(function(msg){
                    $('#resultado').html(msg);
                })
                .fail(function(msg){
                    alerta('rojo','Error al consultar')
                })
    }
    
    
    
    $('#informe').change(function(){
        if($(this).val()==1){
            $('.tipo_i').show();
            $('.tipo_ii').hide();
        }
        if($(this).val()==2){
            $('.tipo_i').hide();
            $('.tipo_ii').show();
        }
    })
</script>