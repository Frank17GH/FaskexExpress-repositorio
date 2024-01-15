//$('#js-page-content').smartPanel();
   function mostrar(id) {       
        $('#div_'+id).show();  
        $('#btn_'+id).hide();  
    }
    function ocultar(id) { 
        $('#div_'+id).hide();
        $('#btn_'+id).show();       
    }

//SALIDA A RUTA 
function seriesNum(ab,cpe){
    switch(ab) {
        case 1:                
            det1='';
              $("#serie").empty();
              $("#sserie").empty();
              $('#snumero').prop('readonly',true);
                $.getJSON('app/modules/exp_salidaruta/components/data.php?t=4&cpe='+cpe,function(data){
                $.each(data, function(id,value){
                        det1+='<option  value="'+this['id']+'">'+this['serie']+'</option>';
                        $('#sserie').html(det1);
                        $("#snumero").empty();
                        $("#serie").val(this['serie']);
                        $.getJSON('app/modules/exp_salidaruta/components/data.php?t=5&ser='+$('#serie').val(),function(data){
                        $.each(data, function(id,value){
                        $("#snumero").val(this['num']);
                      });
                    });
                });
            });
            
        break;
    }
}
function vPaquete(comprobante,ambito){    
        var idC=$("#idapoyo");
        var tipoC=$("#tipo");      
        var perC=$("#perC"); 
        var dirC=$("#dirC"); 
        var disC=$("#disC");    

        if (ambito!='') {
            $.getJSON('app/modules/exp_salidaruta/components/data.php?t=1&comp='+comprobante+'&amb='+ambito,function(data){
                $.each(data, function(value){
                    aviso('info','Documento '+comprobante+' encontrado');
                        idC.val(this['idapoyo']);
                        tipoC.val(this['tipo']);
                        perC.val(this['persona']);
                        dirC.val(this['direccion']);
                        disC.val(this['distrito']);                         
                });
                vAjax('exp_salidaruta','saveDet','frm_salida');                              
                
            }).fail( function(d, textStatus, error) { 
                aviso('warning','Paquete ya esta asignado o no corresponde al ambito, :(');
                $("#tipo").val('');
                $("#idapoyo").val('');
         });
        }
        else{           
            aviso('danger','Seleccione Ambito e ingrese Código válido');
            $('#ambito').select(); 
        }  
}

function codigo(codigo){ 

        if (codigo!='') {
            $.getJSON('app/modules/exp_descargop/components/data.php?t=1&comp='+codigo,function(data){
                $.each(data, function(value){
                    aviso('info','Documento '+codigo+' encontrado');
                    var idApoyo = this['idapoyo'];
                    var tipo = this['tipo'];
                   vAjax('exp_descargop','mod_Descargo',idApoyo+'-/'+tipo,'modal4')
                });                

              //   vAjax('exp_descargop','consultar_codigo',''+this['idapoyo']);                            
                
            }).fail( function(d, textStatus, error) { 
                aviso('warning','Documento No encontrado ');
         });
        }
        else{           
            aviso('danger','Ingrese Código válido');
            $('#nomC').select(); 
        }  
}

function selCargo(id,id2){ 
    $('#select2-puesto-container').html('Seleccione Cargo');
    $('#select2-responsable-container').html('Seleccione Responsable');    
    det='';$('#'+id2).empty();
    $.ajax({
        url: "app/modules/exp_salidaruta/components/data.php?t=2&id="+id,
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

function selEmpresaDestino(id,id2){ 
    $('#select2-puesto-container').html('Seleccione Destino');    
    det='';$('#'+id2).empty();      
    $.ajax({
        url: "app/modules/exp_salidaruta/components/data.php?t=7&id="+id,
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


function selResponsable(id,id2,id3){
     $('#select2-responsable-container').html('Seleccione Responsable');
        det1='';$('#'+id2).empty();      
        $.ajax({
            url: "app/modules/exp_salidaruta/components/data.php?t=3&id="+id+"&tp="+id3,
            dataType: 'json', //tipo de datos retornados
            type: 'post' //enviar variables como post
        }).done(function (data){
            $.each($.parseJSON(JSON.stringify(data)), function(){ 
               det1+='<option  value="'+this['id']+'">'+this['value']+'</option>';
            });
            $('#'+id2).html(det1);
        }).fail(function(){
            $('#'+id2).empty();
        });
    }

function selAmbitoDistrito(id,id2){ 
    $('#select2-iddis-container').html('Seleccione distrito');    
    det3='';

    $('#'+id2).empty();

    $.ajax({
        url: "app/modules/exp_salidaruta/components/data.php?t=6&id="+id,
        dataType: 'json', //tipo de datos retornados
        type: 'post' //enviar variables como post
    }).done(function (data){
        $.each($.parseJSON(JSON.stringify(data)), function(){ 
            det3+='<option  value="'+this['id']+'">'+this['value']+'</option>';
        });
        $('#'+id2).html(det3);
    }).fail(function(){
        $('#'+id2).empty();
    });

}

// PRO_MASIVO 
function Ser_cantidad(id){
    $("#total").html('Cantidad Total  :'+ this['total']);    
    $("#ingresado").html('Total Ingresado: '+this['ingresado']);
}



function Orden(id,id2){
    num = id.padStart(6,'0');    
    ser = id2;
    if (num.length>6) {
        aviso('danger','Ingrese # válida','Error!');
        $('#orden').select();                
    }else{ 
            aviso('success','Consultando Información...');            
            vAjax('pro_masivo','mod1',0,'frm_masivo');
            $("#cliente").val('');
            $("#servicio").empty();
            $("#fecha").val('');
            $("#idorden").val('');
            $("#numcot").val('');
            $("#numord").val('');
            $("#total").val('');
            $("#ingresado").val('');

        $.getJSON('app/modules/pro_masivo/components/data.php?t=1&num='+num+'&ser='+ser).done(function( data ) {
            $.each(data, function(value){                              
                mostrar('masivo');
                mostrar('tbl-masivo');
                vAjax('pro_masivo','apo_tabla',ser+'-/'+num,'tbl_data');
                $("#cliente").val(this['cliente']);    
                $("#numcot").val(this['cotizacion']);
                $("#numord").val(this['orden']);             
                $("#servicio").append('<option value="'+this['idservicio']+'">'+this['servicio']+'</option>');
                $("#fecha").val(this['fecha']);
                $("#idorden").val(this['idorden']);
                $("#total").html('Cantidad Total  :'+ this['total']);
                $("#ingresado").html('Total Ingresado: '+this['ingresado']);
            });
        }).fail( function(d, textStatus, error) { 
            aviso('warning','No se encontro datos.');
            vAjax('pro_masivo','apo_tabla',0,'tbl_data');
            ocultar('masivo');
            ocultar('tbl-masivo');                             
        });                
    }    
}    

