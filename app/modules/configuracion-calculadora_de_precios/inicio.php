<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
        <form class="form-horizontal" id="frm1">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <select class="form-control input-xs" id="prov" name="dep" onchange="provi($(this).val());vAjax('configuracion-calculadora_de_precios','tabla1','frm1','tbl1');">
                        <option value="0">Seleccione un Departamento</option>
                        <option value="01" selected="">AMAZONAS</option>
                        <option value="02">ÁNCASH</option>
                        <option value="03">APURÍMAC</option>
                        <option value="04">AREQUIPA</option>
                        <option value="05">AYACUCHO</option>
                        <option value="06">CAJAMARCA</option>
                        <option value="07">CALLAO</option>
                        <option value="08">CUSCO</option>
                        <option value="09">HUANCAVELICA</option>
                        <option value="10">HUÁNUCO</option>
                        <option value="11">ICA</option>
                        <option value="12">JUNIN </option>
                        <option value="13">LA LIBERTAD</option>
                        <option value="14">LAMBAYEQUE</option>
                        <option value="15">LIMA</option>
                        <option value="16">LORETO</option>
                        <option value="17">MADRE DE DIOS</option>
                        <option value="18">MOQUEGUA</option>
                        <option value="19">PASCO</option>
                        <option value="20">PIURA</option>
                        <option value="21">PUNO</option>
                        <option value="22">SAN MARTÍN</option>
                        <option value="23">TACNA</option>
                        <option value="24">TUMBRES</option>
                        <option value="25">UCAYALI</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control input-xs" id="idprov" name="prov" onchange="dist($(this).val());vAjax('configuracion-calculadora_de_precios','tabla1','frm1','tbl1');">
                        <option value="0">Seleccione un Departamento</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control input-xs" id="iddist" name="recibe_dist" onchange="vAjax('configuracion-calculadora_de_precios','tabla1','frm1','tbl1');">
                        <option value="0">Seleccione una Provincia</option>
                    </select>
                </div>
                <div class="col-md-2" style="text-align: center;">
                    
                </div>
            </div><br>
        </form>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
	<header>
        <span class="widget-icon"><i class="fa fa-map-marker fa-fw "></i></span>
        <h2>Lugares</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
        	<div id="buttons1">
        		<button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
        	</div>
            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tbl1">
            <script>
                vAjax('configuracion-calculadora_de_precios','tabla1','frm1','tbl1');sel2('prov');sel2('idprov');sel2('iddist');
                provi('01');
            </script>
        </div>
    </div>
</div>