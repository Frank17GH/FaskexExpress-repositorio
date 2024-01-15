function viewComps2(id){
			    var det='';var det2='';
			    var cc=0;
			    $.ajax({
			        url: "app/modules/guia_remision/components/data.php?t=1&id="+id,
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