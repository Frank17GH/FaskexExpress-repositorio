<link rel="stylesheet" type="text/css" href="app/modules/cotizacion/build/styles.css">
<div class="col-md-12"><br></div>
<?php 
	 $mes = array(0, 'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');
?>
<div class="col-md-12">
	<div data-editor="DecoupledDocumentEditor" data-collaboration="false">
		<main>
			<div class="centered">
				<div class="row">
					<div class="document-editor__toolbar" style="    width: 100%;"></div>
				</div>
				<div class="row row-editor" style="display: flex;position: relative;justify-content: center;overflow-y: auto;background-color: #f2f2f2;border: 1px solid hsl(0, 0%, 77%);">
					<div class="editor" id="editor1" style="width: 18.5cm;height: 100%;min-height: 26.25cm;padding: 1.75cm 1.5cm;margin: 2.5rem;border: 1px hsl( 0, 0%, 82.7% ) solid;background-color: var(--ck-sample-color-white);box-shadow: 0 0 5px hsla( 0, 0%, 0%, .1 );">
						<p style="text-align: right;">
			                <?php echo ucwords(strtolower(explode('-', $_SESSION[fasklog][lo_abreviatura])[0])) ?>, <?php echo date('d') ?> de <?php echo $mes[date('n')] ?> del <?php echo date('Y') ?>
			            </p><br>
			            <p>
			                <b>
			                    Señor(a):<br>
			                    <?php 
			                    	if ($dt2) {
			                    		foreach ($dt2 as $dta2):
											echo ucwords(mb_strtolower($dta2[cl_nombres])).'<br>';
											echo mb_strtoupper(mb_strtolower('EMPRESA EJEMPLO E.I.R.L')).'<br>';
										endforeach; 
			                    	}else{
			                    		echo '[ INGRESAR NOMBRE DE CLIENTE ] <br> [ INGRESAR NOMBRE DE EMPRESA ]';
			                    	}
			                    	
			                    ?>
			                     <br>
			                    <br>
			                </b>
			            </p>
			            <p style="text-align:justify;">
				           	<b>Presente.-</b><br>
				            Por medio de la presente saludarla y a la vez poder enviarle nuestra cotización de acuerdo a sus necesidades:<br><br>
							<b>FASK EXPRESS S.A.C.</b> es una empresa 100% peruana, cuyo objeto social es brindar Servicios Logísticos de Mensajería, Courier, Paquetería, Gestión Documentaria y Outsorcing a nivel nacional. <br><br>
							Nuestro espíritu positivo pone a nuestros clientes en el centro de lo que hacemos, entregar un servicio de calidad es nuestra prioridad y parte de nuestro ADN.  
				            </p>
			           
						<table class="table table-striped table-bordered table-hover"  width="100%">
                        <thead>
                            <tr>
                                <th data-hide="esconder" style="width:5px">#</th>
                                <th data-class="expand" ><center>Servicio</center></th>
                                <th data-hide="esconder" style="width:10px">Nomenclatura</th>
                                <th data-hide="esconder" style="width:80px">Ambito</th>
                                <th data-hide="esconder" style="width:80px">Sub-Servicio</th>
                                <th data-hide="esconder" style="width:5px">Cantidad</th>
                                <th data-hide="esconder" style="width:5px">Precio</th>                                
                                <th data-hide="esconder" style="width:5px">Adicional</th>
                                <th data-hide="esconder" style="width:50px">Total sin IGV</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                                if($dt1){$cc=0; $total = 0; $valor = 0;
                                    foreach ($dt1 as $dta1): $cc++;
                                         $valor = ($dta1[precio]+$dta1[periferico]+$dta1[extremo])*$dta1[cant]; 
                                                                             
                                        $total+=$valor ;
                                        ?>
                                            <tr>
                                                <td><?php echo$cc; ?></td>
                                                <td><?php echo $dta1[se_descripcion]; ?></td>
                                                <td><?php echo $dta1[no_nombre]; ?></td>
                                                <td><?php echo $dta1[am_nombre]; ?></td>
                                                <td><?php echo $dta1[de_descripcion]; ?></td>
                                                <td><?php echo $dta1[cant]; ?></td>
                                                <td><?php echo $dta1[precio]; ?></td>                                                
                                                <td><?php echo "Adicional: " , $dta1[adicional];?> <br>
                                                    <?php if($dta1[periferico]>0.1) {echo "Periferico: " , $dta1[periferico];}?><br>
                                                    <?php if ($dta1[extremo]>0.1) {echo "Extremo: " , $dta1[extremo];}?></td>
                                                <td><?php ?><?php echo $valor ?></td>
                                                                                       
                                            </tr>
                                        <?php 
                                    endforeach; 
                                }
                            ?>
                        </tbody>
                    </table>

                     
                        <label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 16px">
                            <b>SUBTOTAL S/. <?php echo $total; ?></b>
                        </label>
                        <br>
                                            
                        <label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 16px"><b>I.G.V. S/.<?php echo $igv=$total*0.18; ?></b>
                        </label>
						<br>
                                           
                   		<label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 20px"><b>TOTAL S/. <?php echo $total+$igv; ?></b></label>
                    


						<br>Para mayor información, consulta o visita comuníquese a nuestra central telefónica  (01)719-6218  y con    gusto lo atenderemos o coordinaremos una entrevista personal o telefónica. <br><br>

						Sin otro en particular y a la espera de su comunicación, quedamos de usted. <br><br>
						               
						Atentamente,

						<img src="http://sistemas.faskex.com/app/recursos/img/97.png" alt="SmartAdmin" style="margin-top: -15px; width: 160px;">

					</div>
				</div>
			</div>
		</main>
		<script>DecoupledDocumentEditor
			.create( document.querySelector( '.editor' ), {
				
				toolbar: {
					items: [
						'heading',
						'|',
						'fontSize',
						'fontFamily',
						'|',
						'bold',
						'italic',
						'underline',
						'strikethrough',
						'highlight',
						'|',
						'alignment',
						'|',
						'numberedList',
						'bulletedList',
						'|',
						'indent',
						'outdent',
						'|',
						'todoList',
						'link',
						'imageInsert',
						'insertTable',
						'mediaEmbed',
						'|',
						'undo',
						'redo'
					]
				},
				language: 'es',
				image: {
					toolbar: [
						'imageTextAlternative',
						'imageStyle:full',
						'imageStyle:side'
					]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells'
					]
				},
				licenseKey: '',
				
			} )
			.then( editor => {
				window.editor = editor;
		
				
				
				
		
				// Set a custom container for the toolbar.
				document.querySelector( '.document-editor__toolbar' ).appendChild( editor.ui.view.toolbar.element );
				document.querySelector( '.ck-toolbar' ).classList.add( 'ck-reset_all' );
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: j3dpr92qc14g-ovr9owtdn7xh' );
				console.error( error );
			} );

	</script>
	</div>
</div>







