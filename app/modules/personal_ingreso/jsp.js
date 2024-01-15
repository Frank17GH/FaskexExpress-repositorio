function vops(){
        $('.vops').hide();
        if($('#idtin').val()==1){
            $('#rr_dia').show();$('#rr_mes').show();$('#rr_anio').show();
        }else if($('#idtin').val()==2){
            $('#rr_mes').show();$('#rr_anio').show();
        }else if($('#idtin').val()==3){
            $('#rr_anio').show();
        }else if($('#idtin').val()==4){
            $('#rr_in').show();$('#rr_fn').show();
        }
    }