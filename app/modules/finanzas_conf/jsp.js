function buscaN(dni){
        $.getJSON("app/modules/clientes/servi.php?doc="+dni, function(jd) {
            $('#verNom').val(jd.nom);
            $('#verDirr').val(jd.dir);
        });
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