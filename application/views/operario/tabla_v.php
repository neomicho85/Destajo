<?php
/*
DESTAJO-MODULE

date: 2015.01.19
type: php module
path: application/views/operario/tabla_v.php

DESTAJO-MODULE-END
*/
if ($results->num_rows() > 0): ?>

    <table class="table-fixed-header fancyTable">

        <thead>
            <tr>
                <th headers="checked"><input type="checkbox" />
                    <?php echo anchor($modulo['nombre'] . "/show_content/?ofield=m_operario.chapa&otype=" . $otype, 'Chapa'); ?>
                </th>
                <th>
                    <?php echo anchor($modulo['nombre'] . "/show_content/?ofield=m_operario.nombre&otype=" . $otype, 'Nombre y apellidos'); ?>
                </th>
                <th>
                    <?php echo anchor($modulo['nombre'] . "/show_content/?ofield=m_categoria_operario.categoria&otype=" . $otype, 'Categor&iacute;a del operario'); ?>
                </th>
                <th>
                    <?php echo anchor($modulo['nombre'] . "/show_content/?ofield=m_categoria_operario.ci&otype=" . $otype, 'C. Identidad'); ?>
                </th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($results->result() as $row): ?>
            <tr>
                <td headers="checked">
                    <input type="checkbox" value="<?php echo $row->m_operario_id; ?>" />
                    <?php echo $row->chapa; ?>
                </td>
                <td><?php echo $row->nombre . " " . $row->apellidos; ?></td>
                <td><?php echo $row->categoria; ?></td>
                <td><?php echo $row->ci; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

<?php else: ?>

    <div class="no-search">
       <div class="no-search-inner">
           <i class="icon-info-sign"></i>
           <p class="nosearch-title">No encontramos ning&uacute;n resultado</p>
           <p>
               Deber&iacute;as probar con otros criterios de b&uacute;squeda
               <a href="#" class="btn btn-inverse comando-buscar"> Buscar  <i class="icon-search"></i> </a>
           </p>
       </div>
    </div>

<?php endif; ?>