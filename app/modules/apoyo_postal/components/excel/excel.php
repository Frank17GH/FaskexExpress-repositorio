<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="fa fa-remove"></i>
    </button>
    <h4 class="modal-title" id="myModalLabel"><b><center>IMPORTACION MASIVA DE BD</center></b></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12" >
            <form enctype="multipart/form-data" id="formuploadajax" method="post">
                <input type="hidden" name="id" id="orden" value="<?php echo $s02 ?>">
                <section>
                    <label class="col-md-12" style="color: black"><b><?php echo utf8_decode('NOTA:') ?></b>: <?php echo utf8_decode('si no cuentas con el formato de importacion, puedes descargarlos.') ?></label>                    
                </section>
                <input  type="file" id="archivo1" class="custom-file-upload" name="userfile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" style="display:none;"  />
                
                <br>

                <div class="well well-sm bg-color-darken txt-color-white text-center" id="vcarg" style="cursor:pointer">
                    <h5 id="file"><?php echo utf8_decode('SIN SELECCION') ?></h5>
                    <code>Click en el recuadro</code>
                </div>
                <div style="width: 100%; text-align: right;">
                    <input type="submit" id="btnsav" class="btn btn-success" value="Guardar"/>
                </div>                
            </form>
            <div id="mensaje"></div>
            <center>
        </div>
    </div>
</div>

<script>
    //var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
    var fileInput = $('#archivo1');
   
    fileInput.change(function(){
        $this = $(this);
        $('#file').text($this.val());
        $('#btnsav').show();
    })

    $('#vcarg').click(function(){
        fileInput.click();
          
    }).show();
    $(function(){         
        $("#formuploadajax").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            formData.append("dato", "valor");
           
            $.ajax({
                url: "app/recursos/pdf/recibe.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res){
                if (res) {  
                           
                    aviso('info','Se han cargado los datos correctamente.');
                    vAjax('apoyo_postal','tbl_apoyo_postal',<?php echo $s02 ?>,'lista');
                    $('#myModal5').modal('hide');
                    console.log("%c✔ funciona 2", "color: #148f32",<?php echo $s02 ?>); 
                }else{
                  
                    aviso('danger','Error al guardar comprobante'+res+' datos correctamente.');
                }
            });
            return false;
        }); 
    });
</script>