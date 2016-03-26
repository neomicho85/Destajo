<!-- Vista previa -->

<div id="main-content-all">    
    <div class="mc-inner">
        
        <!-- Toolbar -->
        <div class="navbar navbar-googlenav vista-previa-toolbar navbar-fixed-top" id="main-toolbar">
            
            <div class="navbar-inner">
                
                <div class="btn-toolbar">

                    <ul class="nav navbar-googlenav">
                        
                        <li><a title="Regresar" href="<?php echo $modulo['nombre']; ?>"> <i class="icon-chevron-left"></i> </a></li>
                        
                        <li class="divider-vertical"></li>
                        
                        <li><a href="javascript:window.print();"> <i class="icon-print"></i> </a></li> 
                        
                        <li><a title="Exportar a Excel" href="<?php echo base_url($modulo['nombre'] . '/exportar'); ?>"> <i class="icon-file-alt"></i> </a></li>                       
                                           
                    </ul>
                    
                </div>
                
            </div>
            
        </div>
        
        <!-- Table content -->
        <div id="word-template">            
            <div class="word-template-inner">
                
                <div class="sheet">                    
                    
                    <div class="sheet-header">
                        <div class="row-fluid">
                            <div class="span4">
                                <img alt="Destajo" src="<?php echo base_url('css/img/logo32.png'); ?>" />
                            </div>
                            <div class="span4 sheet-title">
                                <p class="text-center">Salario por equipos</p>
                            </div>
                            <div class="span4 text-right">
                                <?php echo date("d/m/Y",$fipp) . " - " . date("d/m/Y",$ffpp);  ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="sheet-body">           
                        <table class="table-printable table table-condensed table-bordered">
                            
                            <thead>
                                <th>Equipo</th>
                                <th>Cu&ntilde;a</th>
                                <th>Importe del viaje</th>
                            </thead>
                            
                            <tbody>
                                <?php if ($query->num_rows() > 0): ?>
                                    <?php foreach($query->result() as $row): ?>
                                        <tr>
                                            <td><?php echo $row->numero_operacional_equipo; ?></td>
                                            <td><?php echo $row->numero_operacional_cuna; ?></td>
                                            <td><?php echo mysql_to_number($row->importe_viaje); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="nosearch-title">No encontramos ning&uacute;n resultado</p>
                                <?php endif; ?>
                            </tbody>
                                                        
                        </table>
                    </div>
                                        
                </div>
                
            </div>            
        </div>  
        
    </div>    
</div>