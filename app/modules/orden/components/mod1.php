
	<div class="jarviswidget jarviswidget-sortable" style="    margin: 0 0 0px;">
		<header role="heading">
			<div class="jarviswidget-ctrls" role="menu">    
				<a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></a>
			</div>
			<span class="widget-icon"> <i class="fa fa-search"></i> </span>
			<h2>Busqueda de productos</h2>
			<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
		</header>
		<div role="content">
			<div class="widget-body no-padding">
				<form class="form-horizontal">
					<fieldset>
						<div class="col-md-12"><br></div>
					<div class="col-md-10">
						<label>Buscar producto</label>
						<select style="width: 100%" class="form-control" id="sel1"></select>
					</div>
					<div class="col-md-2">
						<label>&nbsp;&nbsp;</label>
						<a class="btn btn-default btn-sm" href="javascript:void(0);">Agregar</a>
					</div>
					<div class="col-md-12"><br></div>
					
					<div class="col-md-2">
						<label>Id</label>
						<input type="text" class="form-control" readonly="">
					</div>
					<div class="col-md-7">
						<label>Presentación</label>
						<select class="form-control">
							<option></option>
						</select>
					</div>
					<div class="col-md-3">
						<label>Cant. x Pres.</label>
						<input type="text" class="form-control" readonly="">
					</div>
					<div class="col-md-12"><br></div>
					<div class="col-md-6"><br></div>
					<div class="col-md-3">
						<label>Cantidad</label>
						<input type="text" class="form-control" name="">
					</div>
					<div class="col-md-3">
						<label>Total</label>
						<input type="text" class="form-control" name="">
					</div>
					<div class="col-md-12"><hr></div>
					<div class="col-md-12" style="    padding: 0px 8px 5px; text-align: right;">
														<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
															Cancel
														</button>
														<button class="btn btn-primary" type="submit">
															<i class="fa fa-save"></i>
															Submit
														</button>
													</div>
					</fieldset>

				</form>
			</div>
		</div>

	</div>


<script type="text/javascript">
	$(document).ready(function(){
		$("#sel1").select2({
 			dropdownParent: $('#myModal1'),
  			ajax: { 
   				url: "app/modules/facturacion/components/data.php?st=9",
   				type: "post",
   				dataType: 'json',
   				delay: 250,
   				minimumInputLength: 3,
   				data: function (params) {
				    return {
				      searchTerm: params.term // search term
				    };
   				},
   				processResults: function (response) {
     				return {
        				results: response
     				};
   				},
   				cache: true
  			}
 		});
	});
</script>