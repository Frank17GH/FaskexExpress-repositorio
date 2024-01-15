
	function barcode2(id){
		if ($('#ttrr'+id).hasClass("success")) {
			$('#ttrr'+id).removeClass('success');
			$('#chec'+id).prop('checked',false);
		}else{
			$('#ttrr'+id).addClass('success');
			$('#chec'+id).prop('checked',true);
			
		}
		calc2();
	}
	function calc2(){
		var tot='';
		$('#idveri2 tr').each(function () {
			id=$(this).find("td").eq(2).html();
			if ($('#ttrr'+id).hasClass("success")) {
				tot+=id+',';
			}
			$('#idet2').val(tot);
		});
	}
	
	