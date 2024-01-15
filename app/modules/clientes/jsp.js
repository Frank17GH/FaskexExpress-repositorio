function buscaN(dni){
    
	if ($('#stdoc').val()==1 && $('#Dnni').val().length ==8) {				   
	    $.getJSON('https://cors-anywhere.herokuapp.com/https://api.apis.net.pe/v1/dni?numero='+dni,function(jd){

	    $.each(jd, function(id,value){
	    	aviso('success','Encontrado',':)');
	    	$('#verNom').val(jd.nombre);	  
	        })
	    }).fail(function(){
	    	aviso('danger','Habilitar el servicio temporal para usar API RENIEC.','Error!');
            $('#myModal5').modal('show');                        
	            $("#div-modal5").html('<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>'+
                '<h4 class="modal-title" id="myModalLabel"><center><b>[ INFO! Habilitar el servicio temporal para usar API RENIEC. ]</b></center></h4></div><div class="modal-body"><div class="row">'+
                '<iframe width="580" height="270" src="https://cors-anywhere.herokuapp.com/corsdemo" frameborder="0" allowfullscreen></iframe> '+
                '</li><li></li></ul></center></form> </div></div></div></div>');	
      	});		    		
	}
	else if ($('#Dnni').val().length < 8){
		aviso('danger','Dni Incorrecto',':(');
	    $('#Dnni').select();
	    $('#verNom').val('');  
		$('#verDirr').val('');
	}


	else {	
			$.getJSON('https://api.conta.club/sunat/'+dni,function(jd){
	        $.each(jd, function(id,value){
	        	$('#verNom').val(jd.RazonSocial);  
	        	$('#verDirr').val(jd.Direccion);
	        });
	    });	 				
	}


}
    function scamb(){
		if ($('#stdoc').val()==1) {
			$('#desb').html('RENIEC');
		}else if ($('#stdoc').val()==6){
			$('#desb').html('SUNAT');
		}else{
			$('#desb').html('-');
		}
	}

	/* */