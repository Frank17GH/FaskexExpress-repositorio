<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
        <form class="form-horizontal" id="vfrm1">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-12">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <select class="form-control" onchange="vops();vAjax('personal_ingreso','tabla1','vfrm1','tbl')" id="idtin" name="repo">
                            <option value="1">Diario</option>
                            <option value="2">Mensual</option>
                            <option value="3">Anual</option>
                            <option value="4" selected="">Rango</option>
                        </select>
                    </div>
                                       
                    <div class="col-md-2 vops" id="rr_dia" style="display: none">
                        <select class="form-control" onchange="vAjax('personal_ingreso','tabla1','vfrm1','tbl');" name="dia">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19" selected="">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                    </div>
                    <div class="col-md-2 vops" id="rr_mes" style="display: none">
                        <select class="form-control" onchange="vAjax('personal_ingreso','tabla1','vfrm1','tbl');" name="mes">
                            <option value="1" selected="">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Setiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <div class="col-md-2 vops" id="rr_anio" style="display: none">
                        <select class="form-control" onchange="vAjax('personal_ingreso','tabla1','vfrm1','tbl');" name="anio">
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021" selected="">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="vops" id="rr_in" style="display: ">
                        <div class="col-md-1" style="margin-top: 6px; text-align: right;"><b>INICIO:</b></div>
                        <div class="col-md-2 ">
                            <input type="date" class="form-control" value="2021-01-01" name="inicio" onchange="vAjax('personal_ingreso','tabla1','vfrm1','tbl');">
                        </div>
                    </div>
                    <div class="vops" id="rr_fn" style="display: ">
                        <div class="col-md-1" style="margin-top: 6px; text-align: right;"><b>FIN:</b></div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" value="2021-01-31" name="fin" onchange="vAjax('personal_ingreso','tabla1','vfrm1','tbl');">
                        </div>
                    </div>
                    <div class="col-md-2" style="text-align: right;">
                    <div class="btn-group">
                        <a class="btn btn-labeled btn-primary" onclick="vAjax('personal_ingreso','mod1',0,'modal1');"> <span class="btn-label"><i class="fa fa-plus"></i></span><b>Nuevo</b>&nbsp;&nbsp;</a>
                    </div>
                </div>
                </div>
            </div><br>
        </form>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
	<header>
        <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-book"></i> </span>
        <h2>Listado de ingresos</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
        	<div id="buttons1">
        		<button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
        	</div>
            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tbl"><script>vAjax('personal_ingreso','tabla1','vfrm1','tbl');</script></div>
    </div>
</div>