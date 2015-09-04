<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>ROLES
    </h5>
</div>
<div class='well'>
    <form method="post" id="f20">
    <table class="table table-hover table-bordered">
        <thead>
        <th>Rol</th><th>Seleccionar</th>
        </thead>
        <tbody>
            <?php foreach($roles as $r){?>
            <tr>
                <td><?php echo $r->rol_nombre ?></td>
                <td align="center"><input type="radio" name="rol" id="rol" value="<?php echo $r->rol_id ?>"></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="row" style="text-align:center">
        <!--<button type="button" class="btn btn-success ingresar">Ingresar</button>-->
        <button type="button" class="btn btn-success defecto">Rol por defecto</button>
    </div>
    </form>   
</div>
<script>
    
    $('.ingresar').click(function(){
        
        
        $('#f20').attr("action","<?php echo base_url("index.php") ?>");
        $('#f20').submit();
        
    });
    
    $('.defecto').click(function(){
        
        $.post("<?php echo base_url("index.php/presentacion/guardarroldefecto") ?>"
        ,$('#f20').serialize()
                ).done(function(msg){
                    window.location.href = '<?php echo base_url("index.php") ?>';
                }).fail(function(msg){
                    
                })
        
    });
</script>    