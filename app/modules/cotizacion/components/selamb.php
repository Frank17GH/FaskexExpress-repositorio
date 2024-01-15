<select class="form-control input-xs" id="amb" onchange="vAjax('cotizacion','table1',$(this).val(),'prods');" >
	<option value="0">Seleccione</option>	
	<?php  		
		 if($dt1){ $ca=0;                                                
			foreach ($dt1 as $dta1): 
                if(!$cn){$cc=$dta1[idambito];}
                ?>
                    <option id="serv1" value="<?php echo $dta1[idambito] ?>-/<?php echo $dta1[idnom] ?>"><?php echo $dta1[am_nombre] ?></option>
                <?php 
            endforeach; 
        }
	?>
</select>
<script type="text/javascript">sel2('amb')</script>

