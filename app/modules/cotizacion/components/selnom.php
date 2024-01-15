<select class="form-control input-xs" id="nom" onchange="vAjax('cotizacion','selamb',$(this).val(),'selam');" >
	<option value="0" selected="true"> Seleccionar</option>
	<?php  		
		 if($dt1){ $cn=0;                                                
			foreach ($dt1 as $dta1): 
                if(!$cn){$cc=$dta1[idnom];}
                ?>
                    <option id="serv1" value="<?php echo $dta1[idnom] ?>"><?php echo $dta1[no_nombre] ?></option>
                <?php 
            endforeach; 
        }
	?>
</select>
<script type="text/javascript">sel2('nom')</script>
