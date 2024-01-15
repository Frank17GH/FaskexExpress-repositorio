<div class="modal-header" style="padding: 10px;">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel">Nueva Compra</h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="widget-body">
					<form class="form-horizontal" action="javascript: vAjax('compras','insert1','frm1'); " id="frm1">
						<fieldset>
							<div class="form-group">
								<div class="col-md-3">
									<label>Tipo de comprobante<font style="color: red">*</font></label>
									<div class="input-group input-group-md " style="width: 100%">
										<select class="form-control input-xs" name="tdoc">
											<option value="01">FACTURA ELECTRONICA</option>
											<option value="03">BOLETA ELECTRONICA</option>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<label>Serie</label>
									<input type="text" class="form-control input-xs" name="ser" required="">
								</div>
								<div class="col-md-3">
									<label>Número</label>
									<input type="text" class="form-control input-xs" name="corr" required="">
								</div>
								
								<div class="col-md-4">
									<label>Asiento</label>
									<select class="form-control input-xs" id="selas" name="asiento">
										<?php 
											if ($dt1) {
												foreach ($dt1 as $dta): 
													?>
														<option value="<?php echo $dta[idasiento] ?>"><?php echo $dta[idasiento].' - '.$dta[as_descripcion] ?></option>
													<?php
												endforeach; 
											}
										?>
									</select>
								</div>
								<div class="col-md-12"></div>
							</div>
							<div class="form-group">
								<div class="col-md-2">
									<label>RUC<font style="color: red">*</font></label>
									<input type="number" placeholder="DNI/RUC" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="numDni" autofocus="" onkeydown=" if (event.keyCode === 13){FClient(0);return false;}">
								</div>
								<div class="col-md-8">
									<label>Nombre<font style="color: red">*</font></label>
									<input class="form-control input-xs" id="nomClient" placeholder="Nombre Proveedor" type="text" readonly="">
									<input type="hidden" id="idClient" name="prov" value="0" autocomplete="off">
								</div>
								<div class="col-md-2">
									<label>Moneda</label>
									<select class="form-control input-xs" name="mon">
										<option value="PEN">PEN</option>
										<option value="USD">USD</option>
									</select>
								</div>
							</div>
							<hr>
							<div class="well well-sm well-light col-sm-12" style="    padding: 0px;">
	                        	<div class="col-md-6">
		                        	<legend style="    font-size: 14px;">&nbsp;&nbsp;
		                        		<span class="glyphicon glyphicon-shopping-cart"></span> DETALLE DE PRODUCTOS Y/O SERVICIOS
		                        	</legend>
			                    </div>
			                    <div class="col-md-6" style="text-align: right;margin-top: 10px">
			                        <a class="btn btn-success btn-xs" href="javascript:void(0);" onclick="vAjax('facturacion','mod7',0,'modal4');"><i class="fa fa-shopping-cart"></i> Productos / Servicio</a>
			                        <a class="btn btn-info btn-xs" href="javascript:void(0);" onclick="vAjax('facturacion','mod8',0,'modal1');"><i class="fa fa-plus"></i> Otro&nbsp;&nbsp;&nbsp;</a>
			                    </div>
			                    <div class="col-md-12">
			                        <table class="table" id="tabprod" style="margin-bottom: 0px;">
			                            <thead>
			                                <tr class="encabezado">
			                                    <th><center>Tipo</center></th>
			                                    <th style="width:100%;"><center>Descripción</center></th>
			                                    <th><center>Cantidad</center></th>
			                                    <th><center>Unitario</center></th>
			                                    <th><center>Total</center></th>
			                                    <th><center>Acciones</center></th>
			                                </tr>
			                            </thead>
			                            <tbody id="div-prods"> 
									        <tr>
									            <td colspan="6"><center><i>No hay productos/servicios asignados a esta venta</i></center></td>
									        </tr>
									    </tbody>
			                        </table>
			                        <script type="text/javascript">vAjax('compras','tabla2',0,'prods');</script>
			                    </div>
	                    	</div>
							<button style="display: none;" id="subfrm1" type="submit"></button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<div class="view">
		<button class="btn btn-primary" onclick="$('#subfrm1').click()">
			<i class="fa fa-edit"></i>
			Guardar
		</button>
		<button class="btn btn-default"  data-dismiss="modal">
			<i class="fa fa-remove"></i>
			Cerrar
		</button>
	</div>
</div>
<script type="text/javascript">sel2('selas');</script>