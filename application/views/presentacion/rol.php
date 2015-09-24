<div class="row">
    <span class="tituloH">ROLES</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
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
        <!--<button type="button" class="btn btn-dcs ingresar">Ingresar</button>-->
        <button type="button" class="btn btn-dcs defecto">Rol por defecto</button>
    </div>
    </form>   
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