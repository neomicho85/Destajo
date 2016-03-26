<?php echo form_open('salida_salario_trabajador/show_content', array('id'=>'form-search')); 
    // Obtener las busquedas almacenadas en session
    $b_campo = $this->session->userdata('buscar_campo_salida_salario_trabajador');
    $b_criterio = $this->session->userdata('buscar_criterio_salida_salario_trabajador');
    $b_texto = $this->session->userdata('buscar_texto_salida_salario_trabajador');
    $b_periodo = $this->session->userdata('search_periodo_salida_st');
    $datepicker = NULL;
?>

	<input type="hidden" name="buscar_btn_avanzado" value="search" />
	
	<div class="row-fluid">
    	<table class="table-search">
    		<tbody>
    		    <!-- Buscar periodos de pago -->
                <tr class="tr-periodos">
                    <td colspan="4">
                        <label for="radio_set"><strong>Periodo a buscar</strong></label>
                        <div id="radio_set" class="buttonset">
                            <input type="radio" id="radio1" name="b_periodo" <?php if ($b_periodo == 'present' OR $b_periodo === FALSE) echo 'checked="checked"'; ?>  value="present" /><label for="radio1">Este periodo</label>
                            <input type="radio" id="radio2" name="b_periodo" <?php if ($b_periodo == 'past') echo 'checked="checked"'; ?> value="past" /><label for="radio2">Periodos anteriores</label>
                            <input type="radio" id="radio3" name="b_periodo" <?php if ($b_periodo == 'both') echo 'checked="checked"'; ?> value="both" /><label for="radio3">Ambos</label>
                        </div>
                    </td>
                </tr>
    			<?php
                // Solo mostrar las busquedas almacenadas si las hay
                if ($b_campo):
                    foreach ($b_campo as $key => $value):
                        $datepicker = FALSE; 
                ?>
    			<tr>
    				<!-- Campo -->
    				<td>
                        <select class="select2" name="buscar_campo[]" data-placeholder="Columna">
                            <option value="chapa" <?php if($value=='chapa'): ?> selected="selected" <?php endif; ?>>Chapa</option>
                            <option value="nombre" <?php if($value=='nombre'): ?> selected="selected" <?php endif; ?>>Nombre</option>
                            <option value="apellidos" <?php if($value=='apellidos'): ?> selected="selected" <?php endif; ?>>Apellidos</option>                            
                            <option value="importe_viaje" <?php if($value=='importe_viaje'): ?> selected="selected" <?php endif; ?>>Importe del viaje</option>
                            <option value="cumplimiento_norma" <?php if($value=='cumplimiento_norma'): ?> selected="selected" <?php endif; ?>>Cumplimiento de la norma</option>
                            <option value="horas_viaje" <?php if($value=='horas_viaje'): ?> selected="selected" <?php endif; ?>>Horas de viaje</option>
                            <option value="horas_interrupto" <?php if($value=='horas_interrupto'): ?> selected="selected" <?php endif; ?>>Horas interrupto</option>
                            <option value="horas_no_vinculado" <?php if($value=='horas_no_vinculado'): ?> selected="selected" <?php endif; ?>>Horas no vinculado</option>
                            <option value="horas_nocturnidad_corta" <?php if($value=='horas_nocturnidad_corta'): ?> selected="selected" <?php endif; ?>>Horas nocturnidad corta</option>
                            <option value="horas_nocturnidad_larga" <?php if($value=='horas_nocturnidad_larga'): ?> selected="selected" <?php endif; ?>>Horas nocturnidad larga</option>
                            <option value="horas_capacitacion" <?php if($value=='horas_capacitacion'): ?> selected="selected" <?php endif; ?>>Horas capacitaci&oacute;n</option>
                            <option value="horas_movilizado" <?php if($value=='horas_movilizado'): ?> selected="selected" <?php endif; ?>>Horas movilizado</option>
                            <option value="horas_feriado" <?php if($value=='horas_feriado'): ?> selected="selected" <?php endif; ?>>Horas feriado</option>
                            <option value="horas_ausencia" <?php if($value=='horas_ausencia'): ?> selected="selected" <?php endif; ?>>Horas ausencia</option>
                            <option value="fecha_inicio_periodo_pago" <?php if($value=='fecha_inicio_periodo_pago'): ?> selected="selected" <?php $datepicker = TRUE; endif; ?>>Inicio del periodo de pago</option>
                            <option value="fecha_final_periodo_pago" <?php if($value=='fecha_final_periodo_pago'): ?> selected="selected" <?php $datepicker = TRUE; endif; ?>>Final del periodo de pago</option>
                        </select>
                    </td>
                    
                    <!-- Regla -->
                    <td>
	                    <select class="select2" name="buscar_criterio[]" data-placeholder="Criterio">
	                        <option value="like_both" <?php if ($b_criterio[$key] == 'like_both') echo 'selected="selected"'; ?>>Contiene</option>
	                        <option value="not_like_both" <?php if ($b_criterio[$key] == 'not_like_both') echo 'selected="selected"'; ?>>No contiene</option>
	                        <option value="like_none" <?php if ($b_criterio[$key] == 'like_none') echo 'selected="selected"'; ?>>Es igual a</option>
	                        <option value="not_like_none" <?php if ($b_criterio[$key] == 'not_like_none') echo 'selected="selected"'; ?>>No es igual a</option>               
	                        <option value="or_like_both" <?php if ($b_criterio[$key] == 'or_like_both') echo 'selected="selected"'; ?>>&oacute; Contiene</option>               
	                        <option value="or_not_like_both" <?php if ($b_criterio[$key] == 'or_not_like_both') echo 'selected="selected"'; ?>>&oacute; No contiene</option>
	                        <option value="gt" <?php if ($b_criterio[$key] == 'gt') echo 'selected="selected"'; ?>>Mayor que</option>
	                        <option value="lt" <?php if ($b_criterio[$key] == 'lt') echo 'selected="selected"'; ?>>Menor que</option>                                
	                    </select>
                    </td>
                    
                    <!-- Texto -->
                    <td>
                        <input type="text" value="<?php echo $b_texto[$key]; ?>" class="span2 <?php if ($datepicker) echo "datepicker"; ?>" name="buscar_texto[]" placeholder="Texto a buscar" />
                    </td>
                    
                    <!-- Close -->
                    <td><button class="close">&times;</button></td>
    				
    			</tr>
    			<?php
                    endforeach;
                endif;        
                ?>
    		</tbody>
    	</table>
	</div>	

</form>