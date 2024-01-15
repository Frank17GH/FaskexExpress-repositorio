	function savSer(id){
		if($('#nSer').val()=='') {
			aviso('warning','Ingrese una serie!','Atención!');
			$('#nSer').select();
		}else if($('#nSer').val().length>4 || $('#nSer').val().length<4) {
			aviso('warning','La serie debe tener 4 digitos !','Atención!');
			$('#nSer').select();
		}else{
			if (id==1 && $('#nSer').val().charAt(0)!='F') {
				aviso('warning','La serie debe iniciar en Fxxx !','Atención!');
				$('#nSer').select();
			}else if(id==3 && $('#nSer').val().charAt(0)!='B'){
				aviso('warning','La serie debe iniciar en Bxxx !','Atención!');
				$('#nSer').select();
			}else{
				vAjax('configuracion-general','insert4',id+'-/'+$('#nSer').val());
			}
		}
	}
	function savLoc(){
		if($('#idabrev').val()=='') {
			aviso('warning','Ingrese una abreviatura!','Correcto!');
			$('#idabrev').select();
		}else if($('#iddir').val()=='') {
			aviso('warning','Ingrese una dirección!','Correcto!');
			$('#iddir').select();
		}else if($('#prov').val()==0) {
			aviso('warning','Ingrese una departamento!','Correcto!');
			$('#prov').select();
		}else if($('#idprov').val()==0) {
			aviso('warning','Ingrese una provincia!','Correcto!');
			$('#idprov').select();
		}else if($('#iddist').val()==0) {
			aviso('warning','Ingrese un distrito!','Correcto!');
			$('#iddist').select();
		}else{
			vAjax('configuracion-general','insert1','frm1')
		}
	}
	function bfalt(idcomp,idloc){
		var det='';
		$.ajax({
            url: "app/modules/configuracion-general/components/data.php?st=1&idloc="+idloc+'&idcomp='+idcomp,
            dataType: 'json', //tipo de datos retornados
            type: 'post' //enviar variables como post
        }).done(function (data){
            $.each($.parseJSON(JSON.stringify(data)), function(){ 
            	det+='<option value="'+this['idser']+'">'+this['idser']+'</option>';
            });
            $('#idsers2').html(det);
            
        }).fail(function(){
            $('#idsers2').empty();
        });vAjax('configuracion-general','comp1',$('#idlocall').val()+'-/'+$('#idsers1').val(),'sers')
	}