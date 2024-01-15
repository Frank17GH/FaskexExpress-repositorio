<!doctype html>
<html lang="en" ng-app="byproyet">
	<head>
		<meta charset="utf-8">
		<title>[ Intranet ] <?php echo __COM__ ?> </title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo __REC__?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo __REC__?>css/app.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo __REC__?>css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo __REC__?>css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo __REC__?>css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo __REC__?>css/smartadmin-skins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo __REC__?>css/demo.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo __REC__?>css/buttons.dataTables.min.css">
	</head>
	<body class="">
		<script>var _mod='<?php echo __MOD__ ?>';</script>
		<?php require_once "app/sections/top.php"; ?>
		<?php require_once "app/sections/menu.php"; ?>
		<!-- MODAL PRINCIPAL -->
		<?php require_once "app/sections/fact.php"; ?>
		
		<div class="modal fade" id="sunat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-body">
										<div role="content">
											<div class="widget-body">
												<form class="form-horizontal" action="javascript: " id="8_frmnC" method="post">
													<div class="alert alert-success fade in" id="al-sun">
														Envio de CPE
													</div>
													<fieldset>
														<input type="hidden" value="" id="idEnv" name="">
														<div class="col-md-5" style="vertical-align: middle;">
															<center>
																<a class="btn btn-default btn-lg" id="visPl" onclick="reFresh('20495613349')">
																	<i class="fa fa-play"></i> <font id="dtenv">INICIAR ENVIOS</font>
																</a>
															</center>
														</div>
														<div class="col-md-5">
															<table style="width: 100%">
																<tr>
																	<td style="color: green">ENVIADO</td>
																	<td><font id="vven">0</font> CPE</td>
																</tr>
																<tr>
																	<td style="color: orange">PENDIENTE</td>
																	<td><font id="vvp">0</font> CPE</td>
																</tr>
																<tr>
																	<td style="color: red">ERROR</td>
																	<td><font id="vve">0</font> CPE</td>
																</tr>
															</table>
														</div>
														<div class="col-md-1">
															<a class="btn btn-default btn-lg" href="javascript:void(0);" onclick="reSUN()">
																<i class="fa fa-refresh"></i>
															</a>
														</div>
														<div class="col-md-12"><hr></div>
														<div class="col-md-12">
															<div id="eruc" style="width: 100%; height: 250px; overflow-y: scroll;"></div>
															
														</div><div class="col-md-12" style="text-align: right;"><h3 id="vdias">Vence en <code>
											[ 2 días ]</code></h3></div>
													</fieldset>
												</form>
											</div>
											
										</div>
										<div class="modal-footer">
											<a class="btn btn-warning" target="_blank" href="http://www.sunat.gob.pe/" >
												<i class="fa fa-file-text-o"></i>
												Ir a SUNAT
											</a>
											<button class="btn btn-default" onclick="$('#sunat').modal('hide');">
												<i class="fa fa-remove"></i>
												CERRAR
											</button>
										</div>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
		<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog5"><div class="modal-content" id="div-modal1"></div></div><!-- /.modal-dialog -->
		</div>
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog2"><div class="modal-content" id="div-modal2"></div></div><!-- /.modal-dialog -->
		</div>
		<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog5"><div class="modal-content" id="div-modal3"></div></div>
		</div>
		<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog2"><div class="modal-content" id="div-modal4"></div></div>
		</div>
		<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog"><div class="modal-content" id="div-modal5"></div></div>
		</div>
		
		<div id="main" role="main">
			<div id="ribbon">
				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>
				<ol class="breadcrumb">
					<li id="hf_1" class="mymayus">Inicio</li><li id="hf_2" class="mymayus"></li>
				</ol>
			</div>

			<div id="content">
				<section id="widget-grid" class="">
					<div class="row">
						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
							<div class="modal-dialog" style="    width: 1200px;">
								<div class="modal-content" id="div-prod">
									
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
							<div class="modal-dialog">
								<div class="modal-content" id="div-modal">
									
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
						
						<article class="col-sm-12">
							<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">

								<div class="no-padding">
									<div class="widget-body">
										<div id="det" class="tab-content">
											<div class="tab-pane active  tb1 hb9">
												<div class="tabbable tabs-below">
													<div class="tab-content padding-10"><div ng-view></div></div>
												</div>
												
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</article>
					</div>
					<div class="row">
						<article class="col-sm-12 col-md-12 col-lg-6">
							<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
							</div>
						</article>
					</div>
				</section>
				
			</div>
		</div>
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white"> <span class="hidden-xs"> - Todos los derechos reservados </span> © 2018-2020</span>
				</div>
			</div>
		</div>
		<div id="divSmallBoxes"></div>
		<div id="div-alerta" style="display: none"></div>
		<div id="div-alerta2" style="display: none"></div>

		<script>
			if (!window.jQuery) {
				document.write('<script src="<?php echo  __REC__?>js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>
		<script src="app/modules/cotizacion/build/ckeditor.js"></script>
		<script src="<?php echo  __MOD__?>orden/jsp.js"></script>
		<script src="<?php echo  __MOD__?>configuracion-general/jsp.js"></script>
		<script src="<?php echo  __MOD__?>facturacion/jsp.js"></script>		
		<script src="<?php echo  __MOD__?>personal_ingreso/jsp.js"></script>
		<script src="<?php echo  __MOD__?>caja/jsp.js"></script>
		<script src="<?php echo  __MOD__?>manifiestos/jsp.js"></script>
		<script src="<?php echo  __MOD__?>mensajero/jsp.js"></script>
		<script src="<?php echo  __MOD__?>clientes/jsp.js"></script>
		<script src="<?php echo  __REC__?>js/app.config2.js"></script>
		<script src="<?php echo  __REC__?>js/bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo  __REC__?>js/smartwidgets/jarvis.widget.min.js"></script>
		<script src="<?php echo  __REC__?>js/demo.min.js"></script>
		<script src="<?php echo  __REC__?>js/app.min.js"></script>
		<script src="<?php echo  __REC__?>js/angular/angular.js"></script>
	    <script src="<?php echo  __REC__?>js/angular-route/angular-route.js"></script>
	    <script src="<?php echo  __REC__?>app.config.js"></script>
	    <script src="<?php echo  __REC__?>app.general.js"></script>
		<script src="<?php echo  __REC__?>js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo  __REC__?>js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo  __REC__?>js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script src="<?php echo  __REC__?>js/buttons.colVis.min.js"></script>
		<script src="<?php echo  __REC__?>js/dataTables.buttons.min.js"></script>
		<script src="<?php echo  __REC__?>js/buttons.flash.min.js"></script>
		<script src="<?php echo  __REC__?>js/jszip.min.js"></script>
		<script src="<?php echo  __REC__?>js/vfs_fonts.js"></script>
		<script src="<?php echo  __REC__?>js/buttons.html5.min.js"></script>
		<script src="<?php echo  __REC__?>js/notification/SmartNotification.min.js"></script>
		<script src="<?php echo  __REC__?>js/plugin/jquery-validate/jquery.validate.min.js"></script>
		<script src="<?php echo  __REC__?>js/buttons.print.min.js"></script>
		<script src='<?php echo  __REC__?>js/jquery-ui.min.js'></script>
		<script src="<?php echo  __REC__?>js/libs/select2.min.js"></script><script type="text/javascript">reSUN()</script>
		<style type="text/css">
			input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
input[type=number] { -moz-appearance:textfield; }
		</style>
	</body>
</html>