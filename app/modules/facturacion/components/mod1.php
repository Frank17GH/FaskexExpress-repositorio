<div class="jarviswidget jarviswidget-sortable" style="    margin: 0 0 0px;">
	<header role="heading">
		<div class="jarviswidget-ctrls" role="menu">    
			<a class="button-icon jarviswidget-delete-btn" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></a>
		</div>
		<span class="widget-icon"> <i class="fa fa-check"></i> </span>
		<center><h2>Acciones Adicionales</h2></center>
		<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
	</header>
	<div role="content">
		<form id="frm12">
		<?php 
			function encrypt($string, $key) {
				$result = '';
				for($i=0; $i<strlen($string); $i++) {
					$char = substr($string, $i, 1);
					$keychar = substr($key, ($i % strlen($key))-1, 1);
					$char = chr(ord($char)+ord($keychar));
					$result.=$char;
				}
				return base64_encode($result);
			}

			$id=explode('-/', $s02)[1];
			foreach ($dt1 as $dta): 
				$url="https://cpe.faskex.com/?rlz=".encrypt($dta[ser].'-'.$dta[corr],"FASK");
				?>
					<input type="hidden" name="ruta" value="<?php echo $url ?>">
					<input type="hidden" name="tipo" value="<?php echo $dta[co_tipo] ?>">
                    <input type="hidden" name="fech" value="<?php echo date('d/m/Y',strtotime($dta[co_fecha])) ?>">
                    <input type="hidden" name="comp" value="<?php echo $dta[ser].'-'.str_pad($dta[corr], 8, "0", STR_PAD_LEFT); ?>">
				<?php
				if (explode('-/', $s02)[0]==1) {
					?>
						<div class="alert alert-success alert-block">
							<h4 class="alert-heading">Guardado Correcto!</h4>
							<?php echo 'Comprobante generado correctamente, serie: '.$dta[ser].'-'.$dta[corr].'.'; ?>
						</div>
					<?php
					
				}elseif (explode('-/', $s02)[0]==2){
					?>
						<div class="alert alert-success alert-block">
							<h4 class="alert-heading">Guardado Correcto!</h4>
							<?php echo 'El Correlativo se ha modificado a: '.$dta[ser].'-'.$dta[corr].'.'; ?>
						</div>
					<?php
				}else{
					?>
					<div class="col-md-12"><br></div>
											
						<div class="col-md-12">
							<div  class="col-md-2">
								<b><font class="font-sm">CLIENTE:</font></b>
							</div>
							<div  class="col-md-10">
								<?php echo $dta[nom] ?>
							</div>
							<div  class="col-md-12"></div>
							<div  class="col-md-2">
								<b><font class="font-sm">COMP.:</font></b>
							</div>
							<div  class="col-md-10" >								

								<?php echo $dta[ser].'-'.str_pad($dta[corr], 8, "0", STR_PAD_LEFT); ?>
							</div>
							<div  class="col-md-12"><hr></div>
						</div>
					
					<?php
				}
				?>
				<div  class="col-md-12" style="text-align: center;padding: 10px;top: -10px;">
					<div  class="col-md-4">
						<a class="btn btn-info btn-sm" style="width: 100%" href="https://sistemas.faskex.com/app/modules/facturacion/imprimir.php?c=<?php echo $id;?>&tp=A5" target="_blank"><i class="fa fa-print"></i> (A5)</a>
					</div>
					<div  class="col-md-4">
						<a class="btn btn-success btn-sm" style="width: 100%" href="https://sistemas.faskex.com/app/modules/facturacion/imprimir.php?c=<?php echo $id;?>&tp=A4" target="_blank"><i class="fa fa-print"></i> (A4)</a>
					</div>
					<div  class="col-md-4">
						<!--
						<a class="btn btn-primary btn-sm" style="width: 100%" onclick="vAjax('facturacion','mod2',<?php echo $id ?>);"><i class="fa fa-print"></i> (Tiket)</a>
					-->
						<a class="btn btn-primary btn-sm" style="width: 100%" href="https://sistemas.faskex.com/app/modules/facturacion/imprimir.php?c=<?php echo $id;?>&tp=TICKET" target="_blank"><i class="fa fa-print"></i> (Ticket)</a>
					</div>

					
					<div  class="col-md-12"><br>
						<!--IMPRESION DE ETIQUETAS -->					
					</div>
					<div class="col-md-4" style="display:none">
							<a class="btn btn-primary btn-sm" style="width: 100%" href="https://sistemas.faskex.com/app/modules/facturacion/imprimir.php?c=<?php echo $id; ?>&tp=ETIQUETA" target="_blank"><i class="fa fa-print"></i> (etiqueta)</a>					
					</div>

					<div  class="col-md-4" >
						<select name="country" class="btn btn-default form-control  btn-sm" id="tipo" class="form-control input-l" onchange="tipoImpr($(this).val(),<?php echo $id?>);">
						   <option value="" selected="selected"><i class="fa fa-print"></i> ETIQUETAS Y CARGOS</option>						                      
						   		<option value="1">ETIQUETAS SIMPLE ( 8 x 5.3 ) cm </option>
						  	 	<option value="2">ETIQUETAS SIMPLE ( 5 x 2.5 ) cm </option>
								<option value="3">ETIQUETAS BARRA ( 7.5 x 5) cm </option>
								<option value="4">CARGOS - STANDAR ( 6 x 1 ) Hoja</option>
						</select>						
					</div>

						<input type="hidden" id="id" class="form-control" value="<?php echo $id; ?>">
						<input type="hidden" id="type" class="form-control" value="C128">
								<div id="contenedor" style="display:none;">
								  	<div id="display" >		  
									</div>  
								</div> 
					
					<div  class="col-md-4">
						<a class="btn btn-default btn-sm" style="width: 100%" onclick="desc(<?php echo $id?>)" target="_blank"><i class="fa fa-download"></i> XML </a>
					</div>
					<div  class="col-md-4">
						<a class="btn btn-default btn-sm" style="width: 100%" onclick="desc2(<?php echo $id?>)" target="_blank"><i class="fa fa-cloud-download"></i> CDR </a>
					</div>
					<div  class="col-md-12"><br></div>

					 

					
					<div  class="col-md-12">
		                <div class="input-group input-group-md">
		                    <div class="icon-addon addon-md">
		                        <input type="text" placeholder="Email" name="correo" class="form-control">
		                    </div>
		                    <span class="input-group-btn">
		                        <button class="btn btn-default" type="button" onclick="vAjax('facturacion','envio','frm12')"><i class="fa fa-envelope"></i> Enviar</button>
		                    </span>
		                </div>
					</div>
					<?php 
						if ($dta[co_tipo]=='01') {
							if ($dta[co_guia]) {
								?>
									<div  class="col-md-12"><br></div>
									<div  class="col-md-12">
										<a class="btn btn-danger" style="width: 100%" onclick="<?php echo ($dta[co_guia]==1)?:'vAjax(\'facturacion\',\'pguia1\','.$id.');' ?>"><i class="fa  fa-print"></i> IMPRIMIR GRE - <?php echo ($dta[co_guia]==1)?'REMITENTE':'TRANSPORTISTA'; ?></a>
									</div>
								<?php
							}else{
								?>
									<div  class="col-md-12"><hr></div>
									<div  class="col-md-12 nguia1" style="display: none">
										<div  class="col-md-6"></div>
										<div  class="col-md-6"><label><b><u>Guía de Transportista</u></b></label><br>
											<div  class="col-md-4 font-md "><b>SERIE</b></div>
											<div  class="col-md-8"><input style="text-align: center;" class="form-control input-md" id="nser" placeholder="#" type="text"></div>
										</div>
										<div  class="col-md-12"></div>
										<div  class="col-md-6"></div>
										<div  class="col-md-6">
											<div  class="col-md-4 font-md "><b>Nº</b></div>
											<div  class="col-md-8">
												<input style="text-align: center;" class="form-control input-md" id="nngr" placeholder="#" type="number">
											</div>
											<div  class="col-md-12"><hr></div>
										</div>
										<div  class="col-md-12"></div>
										<div  class="col-md-6"></div>
										<div  class="col-md-6">
											<select class="form-control input-md" id="nchof">
												<?php 
													foreach ($dt2 as $dta2): 
														?><option value="<?php echo $dta2[idrutas] ?>"><?php echo $dta2[nom] ?></option><?php
													endforeach; 
												?>
											</select>
											<div  class="col-md-12"><hr></div>
										</div>
									</div>
									<div  class="col-md-6">
										<button id="grem" class="btn btn-danger"  style="width: 100%" onclick="confir('CONFIRMACIÓN','¿Seguro que deseas Emitir una GRE - REMITENTE?','facturacion','insert4',<?php echo $id ?>,'road');return false"><i class="fa  fa-road"></i><font style="font-size: 10px"> GRE - REMITENTE</font> <br><center style="font-size: 10px"><i>(Click para Emitir)</i></center></button>
									</div>

									<div  class="col-md-6 nguia1" style="display: none">
										<div  class="col-md-6">
											<a class="btn btn-success btn-lg" href="javascript:void(0);" onclick="nguia(2)">Guardar</a>
										</div>
										<div  class="col-md-6">
											<a class="btn btn-default btn-lg" href="javascript:void(0);" onclick="nguia(0)">Cancelar</a>
										</div>
									</div>

									<div  class="col-md-6">
										
										<a class="btn btn-danger nguia2" style="width: 100%" onclick="nguia(1)"><i class="fa  fa-truck"></i> <font style="font-size: 10px">GRE - TRANSPORTISTA</font> <br><center style="font-size: 10px"><i>(Click para Emitir)</i></center></a>
									</div>
									<div  class="col-md-12"><br></div>
									<div  class="col-md-9"></div>
									<div  class="col-md-3">
										<a class="btn btn-default btn-sm" style="width: 100%" data-dismiss="modal"><i class="fa fa-rotate-left"></i> Cerrar</a>
									</div>
								<?php
							}
							
						} 
					?>
										
				</div>
				</form>	
				<?php
			endforeach; 
		?>
	</div>
</div>
<script type="text/javascript">
	function nguia(dt){
		if (dt==1) {
			$('.nguia1').show();$('.nguia2').hide();$( "#grem" ).prop( "disabled", true );$('#nngr').select();
		}else if(dt==2){
			if (!$('#nngr').val()) {
				aviso('warning','Sebes ingresar el Correlativo que corresponde a la GRE - TRANSPORTISTA.');$('#nngr').select();
			}else{
				confir('CONFIRMACIÓN','¿Seguro que deseas Emitir una GRE - TRANSPORTISTA?','facturacion','insert5','<?php echo $id ?>-/'+$('#nngr').val()+'-/'+$('#nser').val()+'-/'+$('#nchof').val(),'truck');
			}
			
		}else{
			$('.nguia1').hide();$('.nguia2').show();$( "#grem" ).prop( "disabled", false );
		}
		
	}
</script>

<script type="text/javascript">

	function tipoImpr(tipo,idc){

		if(tipo==1){
      $.ajax({
        url:'app/modules/facturacion/components/barcode.php',
        method:"POST",
        data:{code:$('#code').val(),type:$('#type').val(),id:idc,label:$('#label').val()},
        error:err=>{
          console.log(err)
        },
        success:function(resp){        	
          $('#display').html(resp)
          $('#bcode-card .card-footer').show('slideUp')
          imprime();
        }
      })

    }else if(tipo==2){
    	 $.ajax({
        url:'app/modules/facturacion/components/barcode2.php',
        method:"POST",
      data:{type:$('#type').val(),id:idc},
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          $('#display').html(resp)
          $('#bcode-card .card-footer').show('slideUp')
          imprime();
        }
      })
    }else if(tipo==3){
    	 $.ajax({
        url:'app/modules/facturacion/components/barcode3.php',
        method:"POST",
       data:{code:$('#code').val(),type:$('#type').val(),id:$('#id').val(),label:$('#label').val()},
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          $('#display').html(resp)
          $('#bcode-card .card-footer').show('slideUp')
          imprime();
        }
      })
    }
    else if(tipo==4){
    	 $.ajax({
        url:'app/modules/facturacion/components/cargo.php',
        method:"POST",
       data:{code:$('#code').val(),type:$('#type').val(),id:$('#id').val(),label:$('#label').val()},
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          $('#display').html(resp)
          $('#bcode-card .card-footer').show('slideUp')
          imprime();
        }
      })

    }
	}

	function imprime(){
		var openWindow = window.open("_blank");
      openWindow.document.write($('#display').parent().html());
      openWindow.document.write('<style>'+$('style').html()+'</style>');		     
     	openWindow.document.close();
      openWindow.focus();

   //  
      	          
      setTimeout(function(){
       openWindow.print();
      },1000)
      setTimeout(function(){
      openWindow.close();
      },1000)
	}




	function impresion (tipo){
		var openWindow = window.open("https://sistemas.faskex.com/app/modules/facturacion/imprimir.php?c=<?php echo $id; ?>&tp="+tipo);
	}

</script>

