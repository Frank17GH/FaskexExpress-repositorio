function barcode(id){
		if ($('#ttr'+id).hasClass("success")) {
			$('#ttr'+id).removeClass('success');			
		}else{
			$('#ttr'+id).addClass('success');
		}
		$('#barc').val('');calc();
	}
	function calc(){
		var tot='';
		$('#idveri tr').each(function () {
			id=$(this).find("td").eq(1).html();
			if ($('#ttr'+id).hasClass("success")) {
				tot+=id+',';
			}
			$('#idet').val(tot);
		});
	}
	