
<table class="table table-responsive">
    <thead>
        <th>Tipo</th>
        <th>Descripción</th>
        <th>Serial N°</th>
        <th>Estado</th>
        <th>Fecha Calibración</th>
        <th>Cantidad</th>
    </thead>
    <tbody>
        <?php foreach ($array as $key => $value) { ?>
        <tr>
            <td><?php echo $value->referencia ?></td>
            <td><?php echo $value->descripcion ?></td>
            <td><?php echo $value->serial ?></td>
            <td><?php echo $value->estado ?></td>
            <td><?php echo $value->fecha_ultima_calibracion ?></td>
            <td><?php echo $value->cantidad ?></td>
        </tr>
        <?php }?>
    </tbody>
</table>