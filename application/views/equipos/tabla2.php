
<table class="table table-responsive">
    <thead>
        <th>Tipo</th>
        <th>Descripción</th>
        <th>Serial N°</th>
        <th>Estado</th>
        <th>Ubicación</th>
        <th>Fecha</th>
        <th>Usuario</th>
    </thead>
    <tbody>
        <?php foreach ($array as $key => $value) { ?>
        <tr>
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