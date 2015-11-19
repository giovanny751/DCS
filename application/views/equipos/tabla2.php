
<table class="table table-responsive">
    <thead>
        <th style="color: #FFF;background: #0044cc">Tipo</th>
        <th style="color: #FFF;background: #0044cc">Descripción</th>
        <th style="color: #FFF;background: #0044cc">Serial N°</th>
        <th style="color: #FFF;background: #0044cc">Estado</th>
        <th style="color: #FFF;background: #0044cc">Ubicación</th>
        <th style="color: #FFF;background: #0044cc">Fecha</th>
        <th style="color: #FFF;background: #0044cc">Usuario</th>
    </thead>
    <tbody>
        <?php $i=0;
        foreach ($array as $key => $value) { 
            if($i%2==0){
                $style='style="background: #CCC"';
            }else{
                $style='';
            }
            $i++;
            ?>
        <tr <?php echo $style; ?>>
            <td><?php echo $value->referencia ?></td>
            <td><?php echo $value->descripcion ?></td>
            <td><?php echo $value->serial ?></td>
            <td><?php echo $value->estado ?></td>
            <td><?php echo $value->ubicacion ?></td>
            <td><?php echo $value->fecha ?></td>
            <td><?php echo $value->usu_usuario ?></td>
        </tr>
        <?php }?>
    </tbody>
</table>