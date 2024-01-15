function viewComps(id){
    var det='';var det2='';
    var cc=0;
    $.ajax({
        url: "app/modules/facturacion/components/data.php?t=1&id="+id,
        dataType: 'json', //tipo de datos retornados
        type: 'post' //enviar variables como post
    }).done(function (data){
        $.each($.parseJSON(JSON.stringify(data)), function(){ 
            for (i = 0; i < this['cpe'].length; i++) {
                if(i==0){cc=this['cpe'][i]['cod'];}
                det+='<a class="btn btn-default vff" id="cp'+this['cpe'][i]['cod']+'" onclick="vfact(\''+this['cpe'][i]['cod']+'\')" href="javascript:void(0);"><i class="fa '+this['cpe'][i]['icon']+' fa-1x"></i> <br>'+this['cpe'][i]['descrip']+'</a>';
            }
            for (i = 0; i < this['series'].length; i++) {
                det2+='<option class="sub-'+this['series'][i]['tip']+'" value="'+this['series'][i]['ser']+'">'+this['series'][i]['ser']+'</option>';
            }
        });
        $('#view1').html(det);
        $('#view2').html(det2);
        vfact(cc);
    }).fail(function(){
        $('#view1').empty();
    });
}

function serie_doc(id){
    var det='';var det2='';
    var cc=0;
    $.ajax({
        url: "app/modules/facturacion/components/data.php?t=17&id="+id,
        dataType: 'json', //tipo de datos retornados
        type: 'post' //enviar variables como post
    }).done(function (data){
        $.each($.parseJSON(JSON.stringify(data)), function(){ 
            for (i = 0; i < this['cpe'].length; i++) {
                if(i==0){cc=this['cpe'][i]['cod'];}
                det+='<a class="btn btn-default vff" id="cp'+this['cpe'][i]['cod']+'" onclick="vfact(\''+this['cpe'][i]['cod']+'\')" href="javascript:void(0);"><i class="fa '+this['cpe'][i]['icon']+' fa-1x"></i> <br>'+this['cpe'][i]['descrip']+'</a>';
            }
            for (i = 0; i < this['series'].length; i++) {
                det2+='<option class="sub-'+this['series'][i]['tip']+'" value="'+this['series'][i]['ser']+'">'+this['series'][i]['ser']+'</option>';
            }
        });
        $('#view1').html(det);
        $('#view2').html(det2);
        vfact(cc);
    }).fail(function(){
        $('#view1').empty();
    });
}

function serie_atencion(id,id2){

      $('#view2').empty();
      $('#optc').empty();
    var det='';var det2='';
    var cc=0;
    $.ajax({
        url: "app/modules/facturacion/components/data.php?t=18&id="+id,
        dataType: 'json', //tipo de datos retornados
        type: 'post' //enviar variables como post
    }).done(function (data){
        $.each($.parseJSON(JSON.stringify(data)), function(){ 
            for (i = 0; i < this['cpe'].length; i++) {
                if(i==0){cc=this['cpe'][i]['cod'];}
                det+='<a class="btn btn-default vff" id="cp'+this['cpe'][i]['cod']+'" onclick="vfact(\''+this['cpe'][i]['cod']+'\')" href="javascript:void(0);"><i class="fa '+this['cpe'][i]['icon']+' fa-1x"></i> <br>'+this['cpe'][i]['descrip']+'</a>';               
            }
            for (i = 0; i < this['series'].length; i++) {
                det2+='<option class="sub-'+this['series'][i]['tip']+'" value="'+this['series'][i]['ser']+'">'+this['series'][i]['ser']+'</option>';
            }
        });
        $('#view1').html(det);
        $('#view2').html(det2);
      
        vfact(id2);


    }).fail(function(){
        $('#view1').empty();
         $('#view2').empty();
    });
}


function tpcm(id){
    if (id=='PEN') {
        $('.mon').html('S/.');
        $('.tcamb').hide();
    }else{
        $('.tcamb').show();
        $('.mon').html('$.');
    }
}
function avent(id){
    $.ajax({
        url: "app/modules/facturacion/components/data.php?t=2&id="+id,
        dataType: 'json', //tipo de datos retornados
        type: 'post' //enviar variables como post
    }).done(function (data){
        $.each($.parseJSON(JSON.stringify(data)), function(){ 
            $('#vcorr').val(this['corr']);
        });
    }).fail(function(){
        $('#vcorr').empty();
    });
}
function SelectTipoPago(){
    if ($('#tpcomp').val()=='07') {
        if($('#motCredito').val()=='04'){
            $( "#total" ).prop( "disabled", false ).select();
        }else{
            $( "#total" ).prop( "disabled", true );
        }
    }else if($('#tpcomp').val()=='08'){
        $( "#total" ).prop( "disabled", false );
    }
}
function FENC(){
    if($('#idClient2').val()==0){
        aviso('danger','Porfavor definida a quien va dirigida la encomienda');
        $('#numDni2').select().css('background-color','#b94a48').css('color','white');
    }else if($('#tenvi').val()==1 && $('#nomDir2').val()==''){
        aviso('danger','Es necesaro que agregue una direccion de envio, cuando es una "Entrega a Domicilio".');
        $('#nomDir2').select();
        $("#nomDir2").attr('readonly', false);
    }else if($('#total').val()<=0 || $('#total').val()==''){
        aviso('danger','Debes de agregar el precio por el servicio.');
        $('#total').select();
    }else if($('#iddist').val()==0){
        aviso('danger','Debes de Seleccionar un destino.');
    }else if($('#dtdescrip').val()==''){
        aviso('danger','Debes de declarar lo que se envia.');$('#dtdescrip').select();
    }else if($('#dtpeso').val()==''){
        aviso('danger','Debes de ingresar el peso de la encomienda');$('#dtpeso').select();
    }else if($('#dtpeso').val()>500 && $('#idtp').val()==1){
        aviso('warning','Parece que tienes un paquete, el peso maximo para un sobre es de 500 gramos.');$('#dtpeso').select();
    }else if($('#idtp').val()==2 && ($('#dtancho').val()=='')){
        aviso('danger','Valor "Ancho", invalido');$('#dtancho').select();
    }else if($('#idtp').val()==2 && ($('#dtlargo').val()=='')){
        aviso('danger','Valor "Largo", invalido');$('#dtlargo').select();
    }else if($('#idtp').val()==2 && ($('#dtalto').val()=='')){
        aviso('danger','Valor "Alto", invalido');$('#dtalto').select();
    }else{
        vAjax('facturacion','insert3','frm5');
    }
}
function FVent(){
    if ($('#vCorrelativo').val()=="") {
        aviso('danger','Seleccione un documento valido.');
    }else if ($("#numDni").val().length==8 && $('#view2').val()[0]=='F') {
        aviso('danger','No se puede emitir una factura a una persona natural!');
    }else{
        if ($('#tpcomp').val()=='07' || $('#tpcomp').val()=='08') {
            if ($('#dtGlosa').val()=='') {
                aviso('danger','Agrege una Glosa');$('#dtGlosa').select();
            }else{
                vAjax('facturacion','insert1','frm_sVent');
            }
        }else{
            if (!$('#idoll').val() && $('#idmon').val()=='USD') {
                aviso('danger','No Puedes Emitir una Factura sin Cliente');$('#idoll').select();
            }else{
                vAjax('facturacion','insert1','frm_sVent');
            }
        }
        return false;
    }
}
function FClient(dt,ttp='',id){
    switch(dt){
        case 0:
            dni=$("#numDni"+ttp).val();
            if (dni.length<8) {
                aviso('danger','Faltan digitos al D.N.I.!','Info!');
                $('#numDni'+ttp).select();
           	}else if (dni.length>11) {
                aviso('danger','Muchos digitos en el R.U.C.!','Info!');
                $('#numDni'+ttp).select();
            }else{
                $("#nomClient"+ttp).val('');
                $("#idClient"+ttp).val('0');
                $("#nomDir"+ttp).val('');
                $("#nomCorr"+ttp).val('');
                $("#nomTel"+ttp).val('');
                $(".btnm"+ttp).prop( "disabled", true );
                $.getJSON('app/modules/facturacion/components/data.php?t=3&num='+dni).done(function( data ) {
                    $.each(data, function(value){
                        aviso('success','Persona/Empresa registrada, cargando Info.');
                        $(".btnm"+ttp).prop( "disabled", false );
                        $("#nomClient"+ttp).val(this['nombres']);
                        $("#nomDir"+ttp).val(this['direccion']);
                        $("#nomCorr"+ttp).val(this['correo']);
                        $("#nomTel"+ttp).val(this['telefono']);
                        $("#idClient"+ttp).val(this['id']);
                        
                        $("#numDni"+ttp).css('background-color','#cde0c4').css('color','black');
                       // if (dni.length==8 && ttp!=2) {vfact('03');}else if (dni.length==11 && ttp!=2){vfact('01');}
                        $('#numDni2').select();
                    });
                          
                }).fail( function(d, textStatus, error) {
                    $("#idarea").empty().html('<option>Seleccione un Cliente</option>');
                    $('#myModal5').modal('show');
                    $("#div-modal5").html('<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
                                    '<h4 class="modal-title" id="myModalLabel"><center><b>[ INFO! PERSONA/EMPRESA NO ENCONTRADA ]</b></center></h4></div><div class="modal-body"><div class="row">'+
                                    '<div class="col-md-12"><div class="well well-sm well-primary"><form class="form form-inline" id="1_frmCorr" ><center>'+
                                    '<h3>¿Deseas registrarlo?</h3><br><ul class="demo-btns"><li><a id="ssi" class="btn btn-info" onclick="FClient(1,'+ttp+')"> SI <i class="fa fa-check"></i></a>'+
                                    '</li><li><a id="smart-mod-eg3" class="btn btn-danger" onclick="$(\'#myModal5\').modal(\'hide\');$(\'#numDni\').select()"> NO <i class="fa fa-remove"></i></a></li></ul></center></form></div></div></div></div>');
                    $('#myModal5').on('shown.bs.modal', function() {$('#ssi').focus();});
                });
            }
        break;
        case 1:
        if (ttp=='') {ttp=3;}
           	vAjax('clientes','mod1',ttp,'modal5');
            $('#Dnni').select();
        break;
        case 2:
            $("#idarea").empty();
            dni=$("#numDni").val();
            $.getJSON('app/modules/facturacion/components/data.php?t=14&dni='+dni,function(data){
                $.each(data, function(value){                    
                    $("#idarea").append('<option value="'+this['id']+'">'+this['value']+'</option>');
                });                
            });
        break;
        case 3:
         $("#contacto").empty();
            id=$('#idarea').val();
            $.getJSON('app/modules/facturacion/components/data.php?t=15&id='+id,function(data){
                $.each(data, function(value){                    
                    $("#contacto").append('<option value="'+this['id']+'">'+this['nombre']+'</option>');
                });                
            });            
        break;
        case 4:         
            id=$('#contacto').val();
            $.getJSON('app/modules/facturacion/components/data.php?t=16&id='+id,function(data){
                $.each(data, function(value){
                    $('#conCorreo').val(this['correo']);                    
                    $("#conTelefono").val(this['telefono']);
                });                
            });            
        break;
    }
}
function vfact(id) {
    $('.vff').removeClass('active');$('#cp'+id).addClass('active');

    if ($('#optc').text() == "") {
        $('option[class^="sub-"]').each(function() {
            optionlist = $('#optc').text() + "@%" + $(this).val() + "@%" + $(this).prop('class') + "@%" + $(this).text();
            $('#optc').text(optionlist);
        });
    }

    $('option[class^="sub-"]').remove();
    $('#tpcomp').val(id);
    $('#view2').html(revfact(id));
    $('#tr_0').show();
    $("#numDni").attr('readonly', false).select();
    if (id=='01') {
        $('.vigv').show();
    }else{
        $('.vigv').hide();
    }
    avent($('#view2').val());
}

function revfact(id) {
    var options = $('#optc').text().split('@%');
    var resultgood = false;
    var myfilterclass = "sub-" + id;
    var optionlisting = "" ;
    myfilterclass = (id != "")?myfilterclass:"all";
    for (var i = 3; i < options.length; i = i + 3) {
        if (options[i - 1] == myfilterclass || myfilterclass == "all") {
            optionlisting = optionlisting + '<option value="' + options[i - 2] + '" class="' + options[i - 1] + '">' + options[i] + '</option>';
            resultgood = true;
        }
    }
    if (resultgood) { return optionlisting; }

}

function provi(id,id2){
    $('#select2-idprov-container').html('Seleccione una provincia');
    $('#select2-iddist-container').html('Seleccione un distrito');
    det='';$('#'+id2).empty();
    $.ajax({
        url: "app/modules/facturacion/components/data.php?t=6&id="+id,
        dataType: 'json', //tipo de datos retornados
        type: 'post' //enviar variables como post
    }).done(function (data){
        $.each($.parseJSON(JSON.stringify(data)), function(){ 
            det+='<option  value="'+this['id']+'">'+this['value']+'</option>';
        });
        $('#'+id2).html(det);
    }).fail(function(){
        $('#'+id2).empty();
    });
}
function provi2(id,id2){
    $('#select2-idprov-container').html('Seleccione una provincia');
    $('#select2-iddist-container').html('Seleccione un distrito');
    det='';$('#'+id2).empty();
    $.ajax({
        url: "app/modules/facturacion/components/data.php?t=11&id="+id,
        dataType: 'json', //tipo de datos retornados
        type: 'post' //enviar variables como post
    }).done(function (data){
        $.each($.parseJSON(JSON.stringify(data)), function(){ 
            det+='<option  value="'+this['id']+'">'+this['value']+'</option>';
        });
        $('#'+id2).html(det);
    }).fail(function(){
        $('#'+id2).empty();
    });
}
    function dist(id,id2){
        det='';$('#'+id2).empty();$('#select2-iddist-container').html('Seleccione un item');
        $.ajax({
            url: "app/modules/facturacion/components/data.php?t=7&id="+id,
            dataType: 'json', //tipo de datos retornados
            type: 'post' //enviar variables como post
        }).done(function (data){
            $.each($.parseJSON(JSON.stringify(data)), function(){ 
               det+='<option  value="'+this['id']+'">'+this['value']+'</option>';
            });
            $('#'+id2).html(det);
        }).fail(function(){
            $('#'+id2).empty();
        });
    }
    function dist2(id,id2){
        det='';$('#'+id2).empty();$('#select2-iddist-container').html('Seleccione un item');
        $.ajax({
            url: "app/modules/facturacion/components/data.php?t=10&id="+id,
            dataType: 'json', //tipo de datos retornados
            type: 'post' //enviar variables como post
        }).done(function (data){
            $.each($.parseJSON(JSON.stringify(data)), function(){ 
               det+='<option  value="'+this['id']+'">'+this['value']+'</option>';
            });
            $('#'+id2).html(det);
        }).fail(function(){
            $('#'+id2).empty();
        });
    }
    function kilo_(id){
        $.ajax({
            url: "app/modules/facturacion/components/data.php?t=8&id="+id,
            dataType: 'json', //tipo de datos retornados
            type: 'post' //enviar variables como post
        }).done(function (data){
            $.each($.parseJSON(JSON.stringify(data)), function(){ 
                $('#kb').val(this['kb']);$('#ka').val(this['ka']);$('#edom').val(this['ed']);$('#pps').val(this['ps']);
                prprec();
            });
        }).fail(function(){
            $('#kb').val(0);$('#ka').val(0);$('#edom').val(0);$('#pps').val(0);
        });
    }
    function prprec(){
        del=0;
        if($('#tenvi').val()==1){del=$('#edom').val();}
        if ($('#idtp').val()==1) {
            if ($('#dtpeso').val()>500) {
                $('#dtpeso').val(500);aviso('danger','Peso Maximo para envio de sobres es de 500 gr.');
                if ($('#tenvi').val()==1) {
                    $('#total').val(parseFloat($('#pps').val())+parseFloat(del));
                }else{
                    $('#total').val($('#pps').val());
                }
                
            }else{
                if ($('#dtpeso').val()==0 || $('#dtpeso').val()=='') {
                    $('#total').val(0);
                }else{
                    $('#total').val(parseFloat($('#pps').val())+parseFloat(del));
                }
            }
        }else{
            
            if ($('#idpeso').val()=='KG') {ptot=$('#dtpeso').val();}else{ptot=$('#dtpeso').val()/1000;}
            tot=0;
            pv=($('#dtancho').val()*$('#dtlargo').val()*$('#dtalto').val())/6000;
            if (pv>ptot) {ptot=pv;}
            if (ptot>1) {tot=Math.ceil(ptot)-1;}
            if (pv==0 || ptot==0 || ptot=='') {
                $('#total').val(0);
                
            }else{
                $('#total').val(parseFloat($('#kb').val())+parseFloat(($('#ka').val()*tot))+parseFloat(del));
            }
        }
    }
    function cmbo(id){
        $(".tdoc").removeClass("active");
        $("#tpq"+id).addClass("active");
        $(".detpq").hide();
        $('#tpqd'+id).show();
        $('#idtp').val(id);
        if (id==1) {
            $('#idpeso').hide();$('#idgr').show();
            $("#idpeso").val("G");
        }else{
            $('#idpeso').show();$('#idgr').hide();
            $("#idpeso").val("KG");
        }
        prprec();
    }
    function cmbo2(id){
        $(".tdoc2").removeClass("active");
        $("#tenvi"+id).addClass("active");
        $('#tenvi').val(id);
        if (id==1) {
            $('#idclav').hide();
            $('.edom').show();$('#nomDir2').prop('readonly',false).select();
        }else{
            $('#idclav').show();
            $('.edom').hide();
        }
        prprec();
    }
    function vercant(cant){
        if (cant.length>4) {
            ccant=$('#idclavv').val();
            aviso('warning','Excedio el maximo de 4 caracteres.');
            $('#idclavv').val(ccant.substr(0,4));
        }
    }
    function actTot(){ 
                c=0;
                tot=0;
                subt=0;
                igv=0;
                $('#tabprod tr').each(function(index, element){
                    if (c>0) {
                        tot += parseFloat($(element).find("td").eq(0).html());
                    }
                    c++;
                });
                subt=tot/1.18;
                igv=tot-subt;
                $('#vvtotal').val(tot.toFixed(2));
                $('#tsubt').val(subt.toFixed(2));
                $('#tigv').val(igv.toFixed(2));
            }