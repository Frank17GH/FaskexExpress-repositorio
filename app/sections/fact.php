<div id="logo-group">
    <span style="cursor: pointer;border: 1px solid #bfbfbf;color: #c4bab6;font-size: 19px;margin: 10px 0 0;position: relative;border-radius: 2px;display: inline-block;font-weight: 700;height: 24px;width: 24px;padding: 2px;text-align: center;text-decoration: none!important;" onclick="$('#sunat').modal('show');"> 
        <img src="app/recursos/img/SUNAT.ico" style="width: 20px; margin-top: -6px;"> 
        <b class="bounceIn animated" style="    position: absolute;top: -5px;right: -5px;background: #0091d9;display: inline-block;font-size: 10px;box-shadow: inset 1px 1px 0 rgba(0,0,0,.1), inset 0 -1px 0 rgba(0,0,0,.07);color: #fff;font-weight: 700;border-radius: 50%;-moz-border-radius: 50%;-webkit-border-radius: 50%;padding: 2px 4px 3px;text-align: center;line-height: normal;" id="sAler"> 0 </b> 
    </span>
</div>

<script>
    function reFresh(){
        if ($('#dtenv').html()=='INICIAR ENVIOS') {
            if ($('#idEnv').val('<?php echo __RUC__ ?>')) {
                $('#dtenv').html('DETENER ENVIOS');
                $("#detEnv").append($("<div>").html("░░░░░░░░░ <b>SERVIDOR - CPE [ &nbsp;&nbsp;INICIADO <i class='fa fa-play'></i>&nbsp; ]</b> ░░░░░░░░░"));
                Envi();
            }
        }else{
            if ($('#idEnv').val('')) {
                $('#dtenv').html('INICIAR ENVIOS');
                $("#detEnv").append($("<div>").html("▒▒▒▒▒▒▒▒▒ <b>SERVIDOR - CPE [ DETENIDO <i class='fa fa-stop'></i> ]</b> ▒▒▒▒▒▒▒▒▒"));
            }
        }
    }
    function dollar(){
        $.ajax({
            url: "app/sections/data.php?st=5", 
            dataType: 'json', //tipo de datos retornados
            type: 'post' //enviar variables como post
        }).done(function (data){
            $.each($.parseJSON(JSON.stringify(data)), function(){ 
              	$('.tcamb').val(this['precio']);
            });
        }).fail(function() {
           
        });
    }
    function Envi(as=0){console.log(1);
        if (as) {id=as.split("-")[1];}else{id=as;}
        
        $.ajax({
            url: "app/sections/byfact/fact.php?st=3&send=true&id="+as, 
            dataType: 'json', //tipo de datos retornados
            type: 'post' //enviar variables como post
        }).done(function (data){
            $.each($.parseJSON(JSON.stringify(data)), function(){ 
                if (id==0) {
                    $("#detEnv").append($("<div>").html(this['des']));
                    if (this['id']==0) {
                        $('#vven').html(parseInt($('#vven').html())+1);
                        $('#vvp').html(parseInt($('#vvp').html())-1);
                        Envi();
                    }else if(this['id']=='ERROR' || this['id']=='CONE' || this['id']=='VERS'){
                        reFresh();
                    }else if(this['id']=='ERR_01'){
                        reFresh('20554335269');
                    }else{
                        $('#vve').html(parseInt($('#vve').html())+1);
                        $('#vvp').html(parseInt($('#vvp').html())-1);
                        Envi();
                    }
                }else{
                    $("#detEnv").append($("<div>").html(this['des']));
                    if (this['id']==0) {
                        aviso('info',this['des'],'Correcto!');
                        $('.vdt'+id).show();$('#env'+id).hide();
                        $('#vp'+id).html('<a title="Enviado Correctamente" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>');
                    }else if(this['id']=='ERROR'){
                        aviso('info','NO HAY COMPROBANTES PARA ENVIO','Correcto!');
                    }else{
                        aviso('danger',this['des'],'Correcto!');
                    }
                }
                reSUN();
            });
        }).fail(function() {
            $("#eruc").append('<b>ERROR DE CONEXIÓN <b>');
        });
    }

    function reSUN(){
        $('#dSunat').show();
        $.ajax({
            url: "app/sections/data.php?st=2", 
            dataType: 'json', //tipo de datos retornados
            type: 'post' //enviar variables como post
        }).done(function (data){
            $.each($.parseJSON(JSON.stringify(data)), function(){ 
                $('#vven').html(this['env']);
                $('#vvp').html(this['pend']);
                $('#vve').html(this['err']);
                $('#vicpe').html(this['pend']);
                $('#viguia').html(this['vigu']);
                $('#vian').html(this['vian']);
                if (this['dias']==0) {
                    $('#vdias').html('<b><code>No hay comprobantes pendientes de envio.</code></b>');
                }else{
                    $('#vdias').html('<b><code> Tiene '+this['pend']+' comprobante(s) por enviar.</code></b>');
                }
                if (parseInt(this['pend'])+parseInt(this['err'])>0) {
                    $('#sAler').html(parseInt(this['pend'])+parseInt(this['err'])).css({'background':'#a90329'});
                }else{
                    $('#sAler').html('0').css({'background':'#0091d9'});
                }
                $('#vers').val(this['vers']);
                       
            });
        }).fail(function() {
            alert('Error');
        });
    }
</script>