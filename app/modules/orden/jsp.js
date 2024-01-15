
// PROGRAMADOR: 
// Cuando escribí este código, sólo Dios y yo
// sabíamos cómo funcionaba.
// Ahora, ¡sólo Dios lo sabe!

// Si estas tratando de 'optimizar'
// esta rutina y fracasa (seguramente),
// por favor, incremente el siguiente contador 
// como advertencia
// para el siguiente colega: 

// total_horas_perdidas_aquí = 189

function aOrden(ab){
    switch(ab) {
        case 1:
            if ($('#vtip').val()==1) {
              $("#vserie").empty();
              $('#vnumero').prop('readonly',true);
                $.getJSON('app/modules/orden/components/data.php?t=1',function(data){
                $.each(data, function(id,value){
                    $("#vserie").val(this['value']);
                          $("#vnumero").empty();
                        $.getJSON('app/modules/orden/components/data.php?t=2&ser='+$('#vserie').val(),function(data){
                        $.each(data, function(id,value){
                        $("#vnumero").val(this['num']);
                      });
                    });
                });
            });
            }else if ($('#vtip').val()==2) {                   
               $('#vserie').val('O001');  $("#vnumero").val('');$('#vnumero').select(); $('#vnumero').prop('readonly',false);
            }
        break;
    }
}
function fechas(ven,dev){ 
$.getJSON('app/modules/orden/components/data.php?t=7&ven='+ven+'&dev='+dev,function(data){
                    $.each(data, function(value){
                        $("#finicio").val(this['inicio']);
                        $("#fvence").val(this['vence']);
                        $("#fdevol").val(this['devol']);
                        $("#fliqui").val(this['liqui']);
                        $("#finic").val(this['inicio']); 
                        $("#ffin").val(this['vence']); 
                    });
                });
}

function FCotizacion(dt){
    switch(dt){
        case 0:    
            ser=$("#cserie").val()
            num=$("#cnumero").val()
            if (num.length<6 || num.length>6) {
                aviso('danger','Ingrese cotizacion válida','Info!');
                $('#nserie'+ttp).select();
            }else{              
                 $("#idCotizacion").val('');
                    $("#nomClient").val('');
                    $("#numDni").val('');
                    $("#nomCorr").val('');
                    $("#nomDir").val('');
                    $("#nomTel").val('');

                    $("#cfecha").val('');
                    $("#conNombre").val('');
                    $("#conArea").val('');
                    $("#conTelefono").val('');
                    $("#conCorreo").val('');

                    $("#finicio").val('');
                    $("#fvence").val('');
                    $("#fdevol").val('');
                    $("#servi").val('');

                    $("#digit_cantidad").val(0);
                    $("#opera_tvisita").val(0);

                    $("#finic").val('');
                    $("#fliqui").val('');
                    $("#ffin").val('');

                $.getJSON('app/modules/orden/components/data.php?t=3&num='+num+'&ser='+ser).done(function( data ) {
                    $.each(data, function(value){
                        $("#idCotizacion").val(this['idcotizacion']);
                        $("#cfecha").val(this['fecha']);                      
                        $("#nomClient").val(this['nombres']);
                        $("#numDni").val(this['ruc']);
                        $("#nomCorr").val(this['correo']);  
                        $("#nomDir").val(this['direccion']);
                        $("#nomTel").val(this['telefono']);
                        $("#servi").val(this['servicio']);

                        $("#conNombre").val(this['cnombres']);
                        $("#conArea").val(this['carea']);
                        $("#conTelefono").val(this['ctelefono']);
                        $("#conCorreo").val(this['ccorreo']);

                        $("#finicio").val('');
                        $("#fvence").val('');
                        $("#fdevol").val('');

                        $("#digit_cantidad").val(0);
                        $("#opera_tvisita").val(0);

                        $("#finic").val('');
                        $("#fliqui").val('');
                        $("#ffin").val('');
                      
                        aviso('success','Cotización registrada, cargando datos.');
                       if ( data.length == 0 ) {
                                aviso('success','sin datos.');
                            }
                    });
                    
                }).fail( function(d, textStatus, error) {   

               
                    aviso('success','Cotización no encontrada, :(');
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
            $.getJSON('app/modules/orden/components/data.php?t=14&dni='+dni,function(data){
                $.each(data, function(value){                    
                    $("#idarea").append('<option value="'+this['id']+'">'+this['value']+'</option>');
                });
                FClient(3);
            });
        break;

        case 3:
            $.getJSON('app/modules/orden/components/data.php?t=15&id='+$('#idarea').val(),function(data){
                $.each(data, function(value){
                    $("#nomCont").val(this['nombre']);
                });
            });
        break;
        case 4:
     
         $.getJSON('https://sheetdb.io/api/v1/fqhb7rc7xj36j',function(data){
                $.each(data, function(value){
                    $("#cambio").val(this['precio']);
                    cot_seguro();
                    cot_total();
                    // window.alert("Precio actual obtenido de Google");
                });
            });
                 
        break;
        
    }
}        

