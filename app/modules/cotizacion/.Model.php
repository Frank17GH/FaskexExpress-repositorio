<?php 
    class Mod extends database{

        public function insert1($dt){          
            if($dt[total_cot]>0 and $dt[idclient]>0 ){
                return $this->proc("CALL cotizacion_insert1(".$_SESSION[fasklog][iduser].",'".$dt[serie]."','".$dt[num]."',".$dt[idclient].",".$_SESSION[fasklog][local_pre].",".$_SESSION[fasklog][idgiros].",'".date('Y-m-d')."',".$dt[idcontacto].",'".$dt[co_texto]."')");
            }           
        }        
        public function mod_detservicio($dt){ 
            return $this->select("SELECT * From cotizacion_det where iddet =".$dt[0]);
        }
        public function listar(){ 
            return $this->select("SELECT c.idcotizacion,c.co_texto,cl.cl_numdoc,cl.cl_nombres,c.co_serie,c.num,c.co_fecha,c.co_estado,co.co_nombres,(SELECT COUNT(idorden) FROM orden where idcotizacion = c.idcotizacion) as orden FROM `cotizacion` c join clientes cl  on c.idclientes = cl.idclientes left join contacto co on c.idcontacto = co.idcontacto WHERE c.co_iduser= ".$_SESSION[fasklog][iduser]." and c.idlocales = ".$_SESSION['fasklog']['local_pre']." order by c.num desc" );
        }
        public function listar_detalle($id,$ca){ 
            return $this->select("SELECT idadicionales, ad_descrip, ad_ver from servicios_adicionales WHERE idcategoria =".$ca." and idadicionales IN (".$id.")");
        }       

        public function comp1(){ 
            return $this->select("SELECT cl.idcpe as cod, cpe_abre,cpe_icon from conf_cpe cc inner join conf_giros_cpe cl on cc.idcpe=cl.idcpe inner join adm_locales al on cl.idgiros=al.idgiros where cc.cpe_ver=1 and al.idlocales=".$_SESSION['fasklog']['local_pre']);
        }
         public function serie(){ 
            if (!$_SESSION['fasklog']['local_pre']) {
                return $this->select("SELECT cl.idseries as series,se_tipo AS id from conf_series_locales cl inner join conf_series cs on cl.idseries=cs.idseries where se_tipo='04'");
            }else{
                return $this->select("SELECT cl.idseries as series,se_tipo AS id from conf_series_locales cl inner join conf_series cs on cl.idseries=cs.idseries where cl.idlocales=".$_SESSION['fasklog']['local_pre']." and se_tipo='04'");
            }
        }

        public function glosas(){
            return $this->select("SELECT * from glosa ");
        }      

        public function servicios(){
            return $this->select("SELECT idservicios, se_descripcion from servicios WHERE se_giro = ".$_SESSION['fasklog']['idgiros'] );
        }
       
        public function cotizacion($id){
             return $this->select("SELECT idcotizacion,co_fecha,co_serie,num,cl_numdoc,cl_nombres,cl_direccion,cl_correo,cl_telefono,ac.idarea,ar_nombre,co.idcontacto,co_nombres,co_correo,co_estado,co_obser,co_telefono,co_texto,(SELECT COUNT(idorden) FROM orden where idcotizacion = c.idcotizacion) as orden, (SELECT idprod from cotizacion_det where idcotizacion = ".$id." limit 1) as prod   FROM `cotizacion` c join clientes cl on c.idclientes = cl.idclientes  left join contacto co on c.idcontacto = co.idcontacto  left join area_contacto ac on co.idarea = ac.idarea where idcotizacion=".$id);
        }
         public function ser(){
            return $this->select("SELECT idtemp,se_descripcion,de_descripcion,no_nombre, am_nombre,sd.idambito,cantidad, tipo_entrega,precio_entrega,tipo_recojo,precio_recojo,largo,ancho,alto,peso_real,peso_volumen,total FROM `cotizacion_temp`ct 
        JOIN servicios_det sd on ct.idprod = sd.iddet
        JOIN servicios s on sd.idservicios = s.idservicios
        JOIN servicio_nom sn on sd.idnom = sn.idnom
        JOIN servicio_ambito sa on sd.idambito = sa.idambito  WHERE ct.usuario = ".$_SESSION[fasklog][iduser]." and ct.local=".$_SESSION['fasklog']['local_pre']." and ct.giro = ".$_SESSION['fasklog']['idgiros']." ");
        }
       

        public function detalle($id){ 
            return $this->select("SELECT ct.iddet as iddet , c.idcotizacion as idcot, s.se_descripcion as se_descripcion ,sn.no_nombre as no_nombre,sa.am_nombre as am_nombre,sd.de_descripcion ,sd.idambito,precio_recojo,precio_entrega,total_reen,total_muestra,total_gestiones,total_seguro,total_transporte,cantidad,km_precio,km_adicional,total,sd.entrega_nacional,tipo_recojo,tipo_entrega, sd.venc as v,sd.devol as d,(SELECT COUNT(idorden) FROM orden where idcotizacion = c.idcotizacion) as orden  FROM `cotizacion_det` ct
                 JOIN cotizacion c on ct.idcotizacion=c.idcotizacion
               JOIN servicios_det sd on ct.idprod = sd.iddet
        JOIN servicios s on sd.idservicios = s.idservicios
        JOIN servicio_nom sn on sd.idnom = sn.idnom
        JOIN servicio_ambito sa on sd.idambito = sa.idambito  WHERE  c.co_estado=1 and c.idcotizacion=".$id);
        }

        public function detservicio($id){
            return $this->select("SELECT ct.iddet as iddet , s.se_descripcion as se_descripcion ,sn.no_nombre as no_nombre,sa.am_nombre as am_nombre,sd.de_descripcion ,sd.idambito,cant_lo,precio_lo,adicional,cant_ex,precio_ex,cant_pe,precio_pe,recojo_lo,recojo_pe, recojo_ex FROM `cotizacion_det` ct 
               JOIN servicios_det sd on ct.idprod = sd.iddet
        JOIN servicios s on sd.idservicios = s.idservicios
        JOIN servicio_nom sn on sd.idnom = sn.idnom
        JOIN servicio_ambito sa on sd.idambito = sa.idambito  WHERE ct.iddet=".$id);
        }


        public function mod1($a){
            return $this->select("SELECT c.idcotizacion, cc.cl_nombres as pers, co_fecha, co_total, gi_nombre, gi_color, al.idgiros, lo_direccion, lo_mail, cd.nombre as dist, lo_telefonos, co_fecha, cc.idclientes, pe_apellidos, pe_nombres, cc.cl_direccion, se_descripcion, cli.cl_nombres as empresa from cotizacion c left join clientes cc on c.idclientes=cc.idclientes inner join adm_locales al on c.idlocales=al.idlocales left join conf_giros cg on al.idgiros=cg.idgiros left join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito left join personal p on c.iduser=p.idpersonal left join servicios s on c.co_tipo_serv=s.idservicios left join clientes cli on cli.idclientes=c.idempresa WHERE c.idcotizacion=".$a);
        }
        public function mod1_2($a){
            return $this->select("SELECT cant, precio, descrip from cotizacion_det c left join producto p on c.idprod=p.idproducto  WHERE c.idcotizacion=".$a);
        }
        
        

        public function aprobar($id){            
            return $this->select("UPDATE cotizacion set co_estado=1 where idcotizacion=".$id);
        }

        public function upd_item($loc){    
                     
            return $this->select("UPDATE `cotizacion_det` SET `cantidad`=".explode('-/', $loc)[1].",`precio_entrega`=".explode('-/', $loc)[2].",`total`=".explode('-/', $loc)[3]." WHERE `iddet` = ".explode('-/', $loc)[0]);
        }        

        public function anular($id){            
            return $this->select(" UPDATE `cotizacion` SET `co_estado`=2 WHERE idcotizacion=".$id);
            
        }
        public function anular_1($dt){            
            return $this->select(" UPDATE `cotizacion` SET `co_obser`='".$dt[observacion]."'  WHERE idcotizacion=".$dt[id]);
        }

        public function update_cot($dt){               
            return $this->select(" UPDATE cotizacion SET idclientes=".$dt[idclient].",idcontacto=".$dt[idcontacto]."  WHERE idcotizacion=".$dt[idcotizacion]);
        }

        public function insert2($dt){
       
          
            if ($dt[cantidad]>0 and $dt[total]>0 ){
            return $this->insertar("INSERT INTO `cotizacion_temp`(`idprod`, `cantidad`, `tipo_entrega`, `precio_entrega`, `tipo_recojo`, `precio_recojo`,`largo`, `ancho`, `alto`, `peso_real`, `peso_volumen`,`volumen_cubo`, `se_producto`, `se_valor`, `se_porcentaje`,`se_cambio`, `se_detalle`, `adicional`, `km_adicional`,`km_precio`, `ge_nombre`, `ge_precio`, `ge_valor`,`ge_fraccion`, `ge_interes`, `total_reen`, `total_muestra`,`total_seguro`, `total_gestiones`, `total_transporte`,`total`, `usuario`, `local`, `giro`) VALUES ('".$dt[idprod]."','".$dt[cantidad]."','".$dt[tipo_entrega]."','".$dt[precio_entrega]."','".$dt[tipo_recojo]."','".$dt[precio_recojo]."','".$dt[largo]."','".$dt[ancho]."','".$dt[alto]."','".$dt[peso_real]."','".$dt[peso_volumen]."','".$dt[volumen_cubo]."', '".$dt[se_producto]."','".$dt[se_valor]."', '".$dt[se_porcentaje]."','".$dt[se_cambio]."','".$dt[se_detalle]."','".$dt[adicional]."','".$dt[km_adicional]."','".$dt[km_precio]."','".$dt[ge_nombre]."','".$dt[ge_precio]."','".$dt[ge_valor]."','".$dt[ge_fraccion]."','".$dt[ge_interes]."','".$dt[total_reen]."','".$dt[total_muestra]."','".$dt[total_seguro]."','".$dt[total_gestiones]."','".$dt[total_transporte]."','".$dt[total]."',".$_SESSION[fasklog][iduser].",".$_SESSION['fasklog']['local_pre'].",".$_SESSION['fasklog']['idgiros'].")");  
            }
               
        }

        public function insert3($dt){
          
          

            if ($dt[cantidad]>0 and $dt[total]>0 ){
            return $this->insertar("INSERT INTO `cotizacion_det`(`idprod`, `cantidad`, `tipo_entrega`, `precio_entrega`, `tipo_recojo`, `precio_recojo`,`largo`, `ancho`, `alto`, `peso_real`, `peso_volumen`,`volumen_cubo`, `se_producto`, `se_valor`, `se_porcentaje`,`se_cambio`, `se_detalle`, `adicional`, `km_adicional`,`km_precio`, `ge_nombre`, `ge_precio`, `ge_valor`,`ge_fraccion`, `ge_interes`, `total_reen`, `total_muestra`,`total_seguro`, `total_gestiones`, `total_transporte`,`total`,`idcotizacion`, `giro`, `local`) VALUES ('".$dt[idprod]."','".$dt[cantidad]."','".$dt[tipo_entrega]."','".$dt[precio_entrega]."','".$dt[tipo_recojo]."','".$dt[precio_recojo]."','".$dt[largo]."','".$dt[ancho]."','".$dt[alto]."','".$dt[peso_real]."','".$dt[peso_volumen]."','".$dt[volumen_cubo]."', '".$dt[se_producto]."','".$dt[se_valor]."', '".$dt[se_porcentaje]."','".$dt[se_cambio]."','".$dt[se_detalle]."','".$dt[adicional]."','".$dt[km_adicional]."','".$dt[km_precio]."','".$dt[ge_nombre]."','".$dt[ge_precio]."','".$dt[ge_valor]."','".$dt[ge_fraccion]."','".$dt[ge_interes]."','".$dt[total_reen]."','".$dt[total_muestra]."','".$dt[total_seguro]."','".$dt[total_gestiones]."','".$dt[total_transporte]."','".$dt[total]."',".$dt[idcotizacion].",".$_SESSION['fasklog']['idgiros'].",".$_SESSION['fasklog']['local_pre'].")");  
            }
               
        }
        
        public function local($loc){
            return $this->select("SELECT lo_direccion,lo_mail FROM adm_locales al inner join comprobante c on al.idlocales=c.idlocales WHERE c.idcomprobante=".$loc);
        }
        public function sel1($loc){           
            return $this->select("SELECT * FROM `servicios_det` sd 
            join servicio_ambito sa on sd.`idambito` = sa.idambito            
            WHERE sd.de_estado =1 and sd.idambito =".explode('-/', $loc)[0]." and sd.idnom=".explode('-/', $loc)[1]);
        }
        public function ser_det($id){           
            return $this->select("SELECT * FROM `servicios_det` sd 
            join servicio_ambito sa on sd.`idambito` = sa.idambito            
            WHERE iddet =".$id);
        }
        public function selnom($id){
            return $this->select("SELECT * FROM servicio_nom WHERE idservicio=".$id);
        }
          public function mod3($id){
            return $this->select("SELECT * FROM `servicios_det` sd join servicio_nom sn on sd.idnom = sn.idnom WHERE iddet=".$id);
        }
        public function mod3_1($dt){
            return $this->select("SELECT * FROM `servicios_det` sd join servicio_nom sn on sd.idnom = sn.idnom WHERE iddet=".explode('-/', $dt)[0]);
        }
        public function verificar($id){
        
             return $this->select("SELECT idprod from cotizacion_temp where usuario =".$_SESSION[fasklog][iduser]." and local =".$_SESSION['fasklog']['local_pre']." and giro=".$_SESSION['fasklog']['idgiros']." ");     

        }
        public function selamb($id){
            return $this->select("SELECT sa.idambito, sa.am_nombre, idnom  FROM `servicios_det` sd 
                join servicio_ambito sa on sd.`idambito` = sa.idambito
                where idnom = ".$id."
                group by sa.am_nombre ");
        }
        public function sel2($id){       
            return $this->select("SELECT DISTINCT cl.cl_numdoc,c.co_texto ,cl.cl_tipodoc,cl.cl_nombres,c.co_serie,c.num,c.co_fecha, co.co_nombres, ar.ar_nombre,cd.nombre as lugar,serd.servicios_adicionales as servicios  FROM `cotizacion` c 
                join adm_locales al on c.idlocales=al.idlocales
                join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito
                join clientes cl  on c.idclientes = cl.idclientes 
                join contacto co on c.idcontacto = co.idcontacto 
                JOIN area_contacto ar on co.idarea = ar.idarea 
                join cotizacion_det cotd on cotd.idcotizacion= c.idcotizacion
                JOIN servicios_det serd on cotd.idprod = serd.iddet
                WHERE c.idcotizacion=".$id);
        }
        public function sel2_2($id){ 
            return $this->select("SELECT idcategoria, ca_descrip from servicios_categoria WHERE ca_estado=1");
        }
        public function sel2_3($id){ 
            return $this->select("SELECT idadicionales, ad_descrip, ad_ver from servicios_adicionales WHERE idcategoria=".$id);
        }
        public function detprod($id){ 
            return $this->select("SELECT cd.idlocales, cd.iddet, de_cant, de_tipo_entrega, de_direccion, de_ruc, de_nombre, if(cd.idproducto=0,de_descrip, pr_nombre) as descrip, de_unit, de_tipo_encomienda, de_descrip,de_total,de_medida from comprobante_det cd left join producto p on cd.idproducto=p.idproducto  WHERE idcomprobante=".$id);
        }
        public function del_det($dt){            
            return $this->ejecutar("DELETE FROM cotizacion_det WHERE iddet=".explode('-/', $dt)[0]);            
        }
        public function del1($id){            
            return $this->ejecutar("DELETE FROM cotizacion_temp WHERE idtemp=".$id);            
        }
        public function del_temp(){            
            return $this->ejecutar("DELETE FROM cotizacion_temp WHERE usuario=".$_SESSION[fasklog][iduser]." and local =".$_SESSION['fasklog']['local_pre']." ");            
        }
        public function recojo($id){            
            return $this->select("SELECT * FROM `reen_local`  LIMIT ".$id);            
        }
        public function recojo_g($id){            
            return $this->select("SELECT * FROM `reen_local`  WHERE re_tipo=".$id);            
        }

        public function entrega_nacional($id){            
            return $this->select("SELECT * FROM `reen_nacional` where idreennacional =  ".$id);            
        }


       
        public function correlativo($dt){                        

            return $this->select("SELECT IFNULL(max(num)+1,1) as num from cotizacion where co_serie='".$dt."'");
        }

        
    }
 ?>