<div class="jarviswidget jarviswidget-sortable" style="margin: 0 0 0px;">
	<header role="heading">
		<div class="jarviswidget-ctrls" role="menu">    
			<a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></a>
		</div>
		<span class="widget-icon"> <i class="fa fa-search"></i> </span>
				<?php if($dt1){
                	foreach ($dt1 as $dta): 
                 ?>
		<h2>Orden : <?php echo $dta[or_serie] ,'-',$dta[or_numero], '. . . . . .', $dta[co_texto], '. . . .  . .',implode('-', array_reverse(explode('-', $dta[tr_fiopera]))),' . / . ',implode('-', array_reverse(explode('-', $dta[tr_ffopera])))  ?> </h2> 

		<input type="hidden" id="fecha" class="form-control" value="<?php echo $dta['tr_fecha'] ?>">
		<input type="hidden" id="cliente" class="form-control" value="<?php echo $dta['cl_nombres'] ?>">
		<input type="hidden" id="coti" class="form-control" value="<?php echo $dta['co_serie'] ,'-',$dta['num'] ?>">
		<input type="hidden" name="" id="IdOrden" value="<?php echo $dta[idorden] ?> ">
		<input type="hidden" id="code" class="form-control" value="<?php echo $dta[or_serie] ,'-',$dta[or_numero] ?>">
		<input type="hidden" name="" id="servicio" value="<?php echo $dta[co_texto] ?> ">

		
 		<input type="hidden" id="type" class="form-control" value="C128">
		<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
	</header>
	<div role="content">
		<div class="widget-body">
			<div class="row">
				<form id="wizard-1" novalidate="novalidate">               
					<div id="bootstrap-wizard-1" class="col-sm-12">
						<div class="form-bootstrapWizard">
							<ul class="bootstrapWizard form-wizard">

							

								<li  data-target="#step1" <?php echo ($dta['or_estado']=='0')? 'class="active"' : ''; ?>>
									<a href="#tab1" data-toggle="tab" onclick="return false;"> <span class="step">1</span> <span class="title">Base de Datos</span> </a>		
								</li>
								<li data-target="#step2"<?php echo ($dta['or_estado']=='1')? 'class="active"' : ''; ?> ?> >
									<a href="#tab2" data-toggle="tab" onclick="return false;"> <span class="step">2</span> <span class="title">Digitación</span> </a>
								</li>
								<li data-target="#step3" <?php echo ($dta['or_estado']=='2')? 'class="active"' : ''; ?> >
									<a href="#tab3" data-toggle="tab" onclick="return false;"> <span class="step">3</span> <span class="title">Habilitado</span> </a>
								</li>
								<li data-target="#step4" <?php echo ($dta['or_estado']=='3')? 'class="active"' : ''; ?>>
									<a href="#tab4" data-toggle="tab" onclick="return false;"> <span class="step">4</span> <span class="title">Clasificación</span> </a>
								</li>							
							</ul>
					<div class="clearfix"></div>
						</div>
						<div class="tab-content">						
							<div id="tab1" <?php echo ($dta['or_estado']=='0')? 'class="tab-pane active"': 'class="tab-pane"' ;?>  >
									<fieldset <?php echo ($dta['or_estado']>='1')? 'disabled="disabled"':'';?>> 
								<br>
								<h3>Paso 1<strong></strong> - Cargar Información </h3>
								<div class="row">
									<div class="col-sm-3"></div>
									<div class="col-sm-3">
										<div class="form-group">
											<div class="input-group">												                  					
												<span class="input-group-addon"><i class="fa fa-download fa-l fa-fw"></i></span>
													<button class="btn dropdown-toggle btn-l btn-default" type="button" onclick="vAjax('apoyo_postal','Exportar',$('#IdOrden').val()+'-/'+$('#code').val()+'-/'+$('#coti').val()+'-/'+$('#fecha').val()+'-/'+$('#cliente').val()+'-/'+$('#servicio').val());return false;">Formato BD</button>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-upload fa-l fa-fw"></i></span>
												<button class="btn dropdown-toggle btn-l btn-default" type="button" onclick="vAjax('apoyo_postal','excel',<?php echo $dta[idorden] ?>,'modal5');return false;">
								                        <i class="fa "></i> Subir BD
								        </button>
											</div>
										</div>
									</div>
								</div>
								<div <?php echo ($dta['or_estado']=='0')? 'style="display: "':'style="display: none"';?>>
										<h6 class="text-center text-success"><button onclick="confir('Confirmacion','Antes de aprobar verificar que no falte datos, para evitar errores ?','apoyo_postal','estado',1 +'-/'+<?php echo $dta[idorden]  ?>,'remove');return false;"><strong><i class="fa fa-check fa-lg"></i> aprobar</strong></button></h6>
									</div>							 
								</fieldset>
							</div>

							<div  id="tab2" <?php echo ($dta['or_estado']=='1')? 'class="tab-pane active"': 'class="tab-pane"' ;?> >
										<fieldset  <?php echo ($dta['or_estado']=='1')? '':'disabled="disabled"';?>> 
								<br>
								<h3><strong>Paso 2</strong> - Digitación</h3>
								<div class="alert alert-info fade in">
									<button class="close" data-dismiss="alert">
										×
									</button>
									<i class="fa-fw fa fa-info"></i>
									<strong>Observaciones!</strong><?php echo $dta[tr_obdigit] ?>
								</div>
								<div class="row">									
									<div class="col-sm-5">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-flag fa-lg fa-fw"></i></span>
												<select name="country" class="form-control input-l" onchange="tipoImpr($(this).val())">
												   <option value="" selected="selected">[SELECCIONAR TIPO DE IMPRESION]</option>						                      
							                       <option value="1">Etiqueta Faskex (1")</option>
							                       <option value="2">Etiqueta Faskex (2"x1") </option>
							                       <option value="3">Etiqueta Faskex (4"x4")</option>
							                       <option value="4">Cargos Standar</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<div class="input-group">
												<button class="btn print-toggle btn-l btn-primary" type="button" onclick="" id="print">
								                       <i class="fa fa-upload fa-lg fa-fw"></i> Imprimir
								               </button>
											</div>
										</div>
									</div>
								</div>								

								<div class="row">
									<div class="col-sm-12">
										<fieldset disabled="disabled">
											<div class="form-group">
											<div class="input-group">												
												<?php $class = new Mod();
													$arr=explode(',', $dta[tr_iddigit]);
	                            $dt4 = $class->list_glosa(4);       
	                            if($dt4){ foreach ($dt4 as $dta4): ?>
	                                <div class="col-md-3">
	                                    <div class="checkbox" >
	                                        <label>
	                                            <input type="checkbox"   class="checkbox style-0" value="<?php echo $dta4[idglosa] ?>" title="<?php echo $dta4[gl_nombre] ?>" <?php echo (in_array($dta4[idglosa], $arr))?'checked="cheked"':'' ?>>
	                                            <span title="<?php echo $dta4[gl_nombre]; ?>" style="text-align: left; width: 130%;"><?php echo substr($dta4[gl_nombre], 0, 10);  ?></span>
	                                        </label>
	                                    </div>
	                                </div>
	                        <?php endforeach; }else{ ?> <div class="col-md-12"><center><i>(No hay información)</i></center></div> <?php } ?>  
												</div>
											</div>
										</fieldset>
									</div>
										<div <?php echo ($dta['or_estado']=='1')? 'style="display: "':'style="display: none"';?>>
										<h6 class="text-center text-success"><button onclick="confir('Confirmacion','Antes de aprobar verificar que no falte datos, para evitar errores ?','apoyo_postal','estado',2 +'-/'+<?php echo $dta[idorden]  ?>,'remove');return false;"><strong><i class="fa fa-check fa-lg"></i> aprobar</strong></button></h6>
									</div>									
								</div>
								</fieldset>
							</div>

							<div id="tab3" <?php echo ($dta['or_estado']=='2')? 'class="tab-pane active"': 'class="tab-pane"' ;?> >									 
								<br>
								<fieldset disabled="disabled" >
								<h3><strong>Step 3</strong> - Habilitado</h3>
								<div class="alert alert-info fade in">
										<button class="close" data-dismiss="alert">
											×
										</button>
										<i class="fa-fw fa fa-info"></i>
										<strong>Observaciones!</strong> 
								</div>
									<div class="form-group">
										
										<div class="input-group">
													<?php $class = new Mod();
													$arr=explode(',', $dta[tr_idhabil]);
							                            $dt4 = $class->list_glosa(3);       
							                            if($dt4){ foreach ($dt4 as $dta4): ?>
							                                <div class="col-md-3" >
							                                    <div class="checkbox">
							                                        <label>
							                                            <input type="checkbox" name="check_3" id="check_3" onclick="check(3,'habil')" class="checkbox style-0" value="<?php echo $dta4[idglosa] ?>" title="<?php echo $dta4[gl_nombre] ?>" <?php echo (in_array($dta4[idglosa], $arr))?'checked="cheked"':'' ?>>
							                                            <span title="<?php echo $dta4[gl_nombre]; ?>" style="text-align: left; width: 130%;"><?php echo substr($dta4[gl_nombre], 0, 10);  ?></span>
							                                        </label>
							                                    </div>
							                                </div>
							                        <?php endforeach; }else{ ?> <div class="col-md-12"><center><i>(No hay información)</i></center></div> <?php } ?>  
												</div>
											
									</div>
									</fieldset>	
									<div <?php echo ($dta['or_estado']=='2')? '':'style="display: none"';?>>
										<h6 class="text-center text-success"><button onclick="confir('Confirmacion','Antes de aprobar verificar que no falte datos, para evitar errores ?','apoyo_postal','estado',3 +'-/'+<?php echo $dta[idorden]  ?>,'remove');return false;"><strong><i class="fa fa-check fa-lg"></i> aprobar</strong></button></h6>
									</div>			
							
							</div>


							<div  id="tab4"  <?php echo ($dta['or_estado']>='3')? 'class="tab-pane active"': 'class="tab-pane"' ;?>  >
								<br>
									<fieldset  <?php echo ($dta['or_estado']>='3')? '':'disabled="disabled"';?>>
								<h3><strong>Step 4</strong> - Clasificacion</h3>
								<br>
									<div <?php echo ($dta['or_estado']=='3')? 'style="display: "':'style="display: none"';?>>
										<h6 class="text-center text-success"><button onclick="confir('Confirmacion','Antes de aprobar verificar que no falte datos, para evitar errores ?','apoyo_postal','estado',4 +'-/'+<?php echo $dta[idorden]  ?>,'remove');return false;"><strong><i class="fa fa-check fa-lg"></i> aprobar</strong></button></h6>
									</div>	
								</fieldset>
									<div  <?php echo ($dta['or_estado']>='4')? 'style="display: "':'style="display: none"';?>>
										<h4 class="text-center">Esta en despacho</h4>
									</div>								
								<br>
								<br>
							</div>										

						</div>
					</div>
					<?php endforeach; } ?>
				</form>
			</div>
		</div>

		<div class="tabbable tabs-below">
			<div class="tab-content padding-10">
				<div class="row">
					<div id ="div-lista"></div>
					<script>vAjax('apoyo_postal','tbl_apoyo_postal',<?php echo $s02 ?>,'lista');</script> 
				</div>
			</div>
		</div>
<div class="card-body" id="contenedor" style="display:none;">
  	<div id="display" >		  
	</div>  
</div>  

	</div>
</div>


<script type="text/javascript">

	function tipoImpr(tipo){

		if(tipo==1){
      $.ajax({
        url:'app/modules/apoyo_postal/components/barcode.php',
        method:"POST",
        data:{code:$('#code').val(),type:$('#type').val(),id:$('#IdOrden').val(),label:$('#label').val()},
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          $('#display').html(resp)
          $('#bcode-card .card-footer').show('slideUp')
        }
      })
    }else if(tipo==2){
    	 $.ajax({
        url:'app/modules/apoyo_postal/components/barcode2.php',
        method:"POST",
      data:{code:$('#code').val(),type:$('#type').val(),id:$('#IdOrden').val(),label:$('#label').val()},
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          $('#display').html(resp)
          $('#bcode-card .card-footer').show('slideUp')
        }
      })
    }else if(tipo==3){
    	 $.ajax({
        url:'app/modules/apoyo_postal/components/barcode3.php',
        method:"POST",
       data:{code:$('#code').val(),type:$('#type').val(),id:$('#IdOrden').val(),label:$('#label').val()},
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          $('#display').html(resp)
          $('#bcode-card .card-footer').show('slideUp')
        }
      })
    }
    else if(tipo==4){
    	 $.ajax({
        url:'app/modules/apoyo_postal/components/cargo.php',
        method:"POST",
       data:{code:$('#code').val(),type:$('#type').val(),id:$('#IdOrden').val(),label:$('#label').val()},
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          $('#display').html(resp)
          $('#bcode-card .card-footer').show('slideUp')
        }
      })
    }
	}

	
	$('#print').click(function(){

 			var openWindow = window.open("", "", "_blank");
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
    })
</script>





