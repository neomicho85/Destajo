<!-- Dialogs -->
<div id="dialog-editar" title="Editar <?php echo strtolower($modulo['display']); ?>"></div>
<div id="dialog-nuevo" title="Agregar <?php echo strtolower($modulo['display']); ?>"></div>
<div id="dialog-buscar" title="Buscar <?php echo strtolower($modulo['display']); ?>"></div>

<div id="main-content">
	
	<div class="mc-inner">
		
		<!-- Main toolbar -->
	    <div class="navbar navbar-googlenav" id="main-toolbar">
            <div class="navbar-inner">                
                <div class="btn-toolbar">
                    
                    <!-- Autocalcular -->
                    <?php if ($this->users->can('TiempoDescarga.Calcular')): ?>
                    <div class="btn-group">
                        <a href="<?php echo base_url($modulo['nombre'] . '/autoCalc'); ?>" class="btn btn-success comando-autocalc">CALCULAR</a>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Editar, Eliminar -->
                    <div class="btn-group hide comando-editar-eliminar">
                        <a href="<?php echo base_url($modulo['nombre'] . '/eliminar'); ?>" 
                        class="btn comando-eliminar hide">Eliminar</a>
                    </div>
                    
                    <!-- Buscar -->
                    <div class="btn-group">
                        <?php
                        // Agregar el numero de busquedas actuales para este modulo al boton de "Buscar"
                        $b_campo = $this->session->userdata('buscar_campo_tiempo_descarga');
                        if ($b_campo) $b_campo_count = count($b_campo);                     
                        ?>
                        <a href="#" class="btn comando-buscar">Buscar 
                            <?php if (isset($b_campo_count)): ?>
                                <span>(<?php echo $b_campo_count; ?>)</span>
                            <?php endif; ?>
                        </a>
                    </div>
                    
                    <!-- Paginacion -->
                    <div class="btn-group pull-right" id="paginacion-group"></div>

                </div>                
            </div>
        </div><!-- /Main toolbar -->
        
        
        <!-- Table content -->
        <div id="table-fixed-content"> </div>
		
	</div>
	
</div>