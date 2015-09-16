<?php
                                    if (isset($paciente_examen_variable))
                                        if (count($paciente_examen_variable) > 0) {
                                            foreach ($paciente_examen_variable as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type='hidden' name='examen[]' value='<?php echo $value->examen_cod; ?>'><?php echo $value->examen_nombre; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo lista("variable_codigo[]", "1", "form-control obligatorio variable_codigo", "variables", "variable_codigo", "hl7tag", $value->variable_codigo, array("ACTIVO" => "S", "examen_cod" => $value->examen_cod), /* readOnly? */ false); ?>
                                                    </td>
                                                    <td>
                                                        <select class=" form-control obligatorio"  name="valor_frecuencia[]">
                                                            <option value="">Seleccione</option>
                                                            <option value="Hora"  <?php echo (($value->valor_frecuencia == 'Hora') ? 'selected="selected"' : '') ?>>Hora</option>
                                                            <option value="Día" <?php echo (($value->valor_frecuencia == 'Día') ? 'selected="selected"' : '') ?>>Día</option>
                                                            <option value="Semana" <?php echo (($value->valor_frecuencia == 'Semana') ? 'selected="selected"' : '') ?>>Semana</option>
                                                            <option value="Mes" <?php echo (($value->valor_frecuencia == 'Mes') ? 'selected="selected"' : '') ?>>Mes</option>
                                                            <option value="Año" <?php echo (($value->valor_frecuencia == 'Año') ? 'selected="selected"' : '') ?> >Año</option> 
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="frecuencia[]"  class=" form-control obligatorio  " value="<?php echo $value->frecuencia; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="valor_minimo[]"  class=" form-control obligatorio  number" value="<?php echo $value->valor_minimo; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="valor_maximo[]"  class=" form-control obligatorio  number" value="<?php echo $value->valor_maximo; ?>">
                                                    </td>
                                                    <td>
                                                        <a href="javascript:" class="eliminar">Eliminar</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>