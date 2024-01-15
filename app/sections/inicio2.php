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
		<?php require_once "app/sections/top2.php"; ?>
	
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
					<span class="txt-color-white"> <span class="hidden-xs"> - Todos los derechos reservados </span> © 2022</span>
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
		
		<script src="<?php echo  __REC__?>js/app.config2.js"></script>
		<script src="<?php echo  __REC__?>js/bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo  __REC__?>js/smartwidgets/jarvis.widget.min.js"></script>
		<script src="<?php echo  __REC__?>js/demo.min.js"></script>
		<script src="<?php echo  __REC__?>js/app.min.js"></script>
		<script src="<?php echo  __REC__?>js/angular/angular.js"></script>
	    <script src="<?php echo  __REC__?>js/angular-route/angular-route.js"></script>
	    <script src="<?php echo  __REC__?>app.config.js"></script>
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