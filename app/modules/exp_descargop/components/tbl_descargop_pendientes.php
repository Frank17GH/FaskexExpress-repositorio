<div class="col-md-6 jarviswidget jarviswidget-color-blueDark" >
     <header>
        <h2>Lista de entregas Pendientes </h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
            <div id="buttons1">
                <button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"></button>
            </div>            
        </div>
    </header>

    <div class="jarviswidget-editbox"></div>
    <table class="table table-hover">
        <tr>                                
            <th style="width: 1px">#</th>
            <th style="width:80px">N° Salida</th>
            <th style="width:80px">N° Orden</th>
            <th style="width:17px">Corr</th>
            <th >Destinatario</th>
            <th style="width:150px" >Distrito</th>
            <th style="width:90px">Salida</th>        
        </tr>
        <tbody >
            <?php 
                if ($dt1) {
                    $cc=0;
                    foreach ($dt1 as $dta1): $cc++; $orden = explode('-', $dta1['etiqueta']);$distrito = explode('-', $dta1['distrito'])
                        ?>
                        <tr style="cursor: pointer;">
                            <td><?php echo $cc; ?></td>
                            <td><?php echo $dta1['de_codigo'] ?></td>
                            <td title="<?php echo $orden[0].'-'.$orden[1] ?>"><?php echo $orden[1]?></td>
                            <td><?php echo $orden[2] ?></td>
                            <td><?php echo $dta1['persona'] ?></td>
                            <td title="<?php echo $dta1['distrito'] ?>"><?php echo $distrito[2] ?></td>
                            <td><?php echo $dta1['de_fecha'] ?></td>
                            
                        </tr>

                        <?php
                    endforeach;
                } 
                ?>  
                   
        </tbody>                                    
    </table>
</div>