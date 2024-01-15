<?php 
    class Mod extends database{
        
        public function local($loc){
            return $this->select("SELECT lo_direccion,lo_mail,lo_telefonos FROM adm_locales al inner join comprobante c on al.idlocales=c.idlocales WHERE c.idcomprobante=".$loc);
        }
        public function etiqueta($id){
            return $this->select("SELECT cd.de_descrip servicio ,cd.de_peso as peso, concat ( p.pe_nombres,' ',p.pe_apellidos) responsable,cd.de_tipo_encomienda as tipoe, co_nombre_envia as cliente, (select cl_telefono from clientes where idclientes=cd.idclientes ) as telefono, cd.de_nombre as destino , cd.de_direccion ,cd.idlocales,cd.de_descrip,date_format(com.co_fecha, '%d-%m-%Y')  as fecha, com.co_serie as serie , com.co_correlativo as correlativo,
            (SELECT  CONCAT(cdi.nombre,' - ',cp.nombre,' - ',cde.nombre) as nombre FROM ciudad_distrito cdi left join ciudad_provincia cp on cdi.idprovincia = cp.idprovincia left join ciudad_departamento cde on cdi.iddepartamento =cde.iddepartamento where cdi.iddistrito = cd.idlocales) as distrito, cd.de_obser

            from comprobante com 
            inner join comprobante_det cd on cd.idcomprobante=com.idcomprobante 
            LEFT JOIN personal p on com.iduser=p.idpersonal 
            inner join adm_locales part on com.idlocales=part.idlocales where com.idcomprobante=".$id);
        }

        public function detprod($id){ 
            return $this->select("SELECT cd.idlocales, cd.iddet, de_cant, de_tipo_entrega, de_direccion, de_ruc, de_nombre, if(cd.idproducto=0,de_descrip, pr_nombre) as descrip, de_unit, de_tipo_encomienda, de_descrip,de_total,de_medida from comprobante_det cd left join producto p on cd.idproducto=p.idproducto  WHERE idcomprobante=".$id);
        }
        public function detguia($id){ 
            return $this->select("SELECT p.idproducto, cd.idlocales, de_cant, de_tipo_entrega, de_direccion, de_ruc, de_nombre, pr_nombre, de_unit, de_tipo_encomienda, de_descrip,de_total, de_medida, de_peso from comprobante_det cd left join producto p on cd.idproducto=p.idproducto  WHERE idcomprobante=".$id);
        }
        public function printComp($dt){ 
            return $this->select("SELECT co_tipo, co_serie, co_correlativo, co_fecha, co_total, co_tipo_pago, com.idlocales as part,part.lo_direccion as d_part, p.pe_nombres as nom,p.pe_apellidos as apell,co_tel_envia, co_docref, co_tipo_nota, co_glosa,co_fech_ref, co_nombre_envia, co_ruc_envia, co_direcc_envia, part.idgiros, co_cargo, co_obs, co_orden, cd.de_peso, cd.de_medida, co_tipo_pago,detraccion from comprobante com left join comprobante_det cd on cd.idcomprobante=com.idcomprobante LEFT JOIN personal p on com.iduser=p.idpersonal left join adm_locales part on com.idlocales=part.idlocales where com.idcomprobante=".$dt);
        }
        public function printguia($dt){ 
            return $this->select("SELECT gu_tipo, gu_serie, co_serie, gu_correlativo, co_correlativo, gu_fecha, dest.lo_ciudad as dest, dest.lo_direccion as d_dest, co_total, co_tipo_pago, part.lo_ciudad as part,part.lo_direccion as d_part,co_tel_envia, co_docref, co_tipo_nota, co_glosa,co_fech_ref, co_nombre_envia, co_ruc_envia, co_direcc_envia, part.idgiros,  r.idlocales as llega, com.idlocales as parte, com.iduser, part.lo_codigo, gu_guia_motivo, ve_placa,gr.idrutas, co_nombre from guia_remision gr inner join comprobante com on gr.idguia=com.idcomprobante inner join rutas r on gr.idrutas=r.idrutas LEFT JOIN adm_locales part on com.idlocales=part.idlocales left join adm_locales dest on r.idlocales=dest.idlocales left join vehiculos v on r.idvehiculos=v.idvehiculos left join vehiculos_config vc on v.idvehiculosconfig=vc.idvehiculosconfig where com.idcomprobante=".$dt);
        }
        public function table3($dt){
            $qy='pr_tipo=1';
            if($dt[categoria]){$qy.=' and p.idcategoria='.$dt[categoria];}
            if(trim($dt[bus_prod])){
                $qy.=" and ".$dt[campos]." like '%".$dt[bus_prod]."%'";
            }
            return $this->select("SELECT p.idproducto,pr_codigo, pr_nombre, ca_nombre, ma_descripcion as marca, al.lo_abreviatura, (SELECT pre_precio from producto_presentacion pp WHERE pp.idproducto=p.idproducto order by pre_unidades asc limit 1) as prec,pr_stock, pr_min FROM producto p left join producto_categoria pc on p.idcategoria=pc.idcategoria left join producto_marca pm on p.idmarca=pm.idmarca left join adm_locales al on p.idlocales=al.idlocales WHERE ".$qy." LIMIT ".$dt[limite]);
        }
        public function table4($dt){
            $qy='pr_tipo=0';
            if($dt[categoria]){$qy.=' and p.idcategoria='.$dt[categoria];}
            if(trim($dt[bus_prod])){
                $qy.=" and ".$dt[campos]." like '%".$dt[bus_prod]."%'";
            }
            return $this->select("SELECT p.idproducto,pr_codigo, pr_nombre, ca_nombre, ma_descripcion as marca, al.lo_abreviatura, pr_costo,pr_stock, pr_min FROM producto p left join producto_categoria pc on p.idcategoria=pc.idcategoria left join producto_marca pm on p.idmarca=pm.idmarca left join adm_locales al on p.idlocales=al.idlocales WHERE ".$qy." LIMIT ".$dt[limite]);
        }
        public function mod1($dt){
            return $this->select("SELECT co_tipo, co_serie as ser, co_correlativo as corr, co_guia, co_nombre_envia as nom, co_fecha, co_tipo from comprobante where idcomprobante=".explode('-/', $dt)[1]);
        }
        public function mod1_2($dt){
            return $this->select("SELECT CONCAT(pe_apellidos,', ',pe_nombres) as nom,r.idrutas from personal p inner join rutas r on p.idpersonal=r.idpersonal inner join rutas_destinos rd on r.idrutas=rd.idrutas WHERE rd.idlocales=(SELECT cd.idlocales from comprobante c inner join comprobante_det cd on c.idcomprobante=cd.idcomprobante WHERE c.idcomprobante=".explode('-/', $dt)[1]." LIMIT 1)");
        }
        public function del2($id){
            return $this->ejecutar("UPDATE comprobante SET co_anulacion =1 WHERE idcomprobante=".$id);
        }
        public function del3($id){
            $comp= $this->ejecutar("DELETE from  comprobante WHERE idcomprobante=".$id);
            if ($comp) {
                $det= $this->ejecutar("DELETE from  comprobante_det WHERE idcomprobante=".$id);
                return $comp;
            }else{
                return 0;
            }
        }
        public function eliminar($id){
            $comp= $this->ejecutar("DELETE from  comprobante WHERE idcomprobante=".$id);
            if ($comp) {
                $det= $this->ejecutar("DELETE from  comprobante_det WHERE idcomprobante=".$id);
                return $comp;
            }else{
                return 0;
            }
        }
        public function dtprod($dt){
            return $this->select("SELECT idtemp, te_tipo, te_cant, ct.idlocales, te_tipo_encomienda, te_nombre, if(ct.idproducto=0,te_descrip, pr_nombre) as te_descrip, te_unit, te_total from comprobante_temp ct left join producto p on ct.idproducto=p.idproducto where te_venta=".$dt." and iduser=".$_SESSION[fasklog][iduser]);
        }
        public function sel1($num){ 
            // FILTRAR POR DIRECCIONES CENTRALES where iddepartamento in (SELECT cd.iddepartamento from adm_locales al inner join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito)
            return $this->select("SELECT DISTINCT nombre, iddepartamento from ciudad_departamento ");
        }
        public function sel2($num){ 
            return $this->select("SELECT ve_marca, ve_placa, pe_num_auto, ve_inscripcion, co_nombre FROM rutas r inner join personal p  on p.idpersonal=r.idpersonal left join vehiculos v on r.idvehiculos=v.idvehiculos left join vehiculos_config vc on v.idvehiculosconfig=vc.idvehiculosconfig where idrutas=".$num);
        }
        public function sel3($num){ 
            
            $comp= $this->select("SELECT * FROM clientes where cl_numdoc=".$num);

            if ($comp) {              
                return $comp;
            }else{
                return $this->select("SELECT * FROM");
            }
        }
        public function sel4($dt){ 
            return $this->select("SELECT UPPER( CONCAT('',cp.nombre,' - ',cdi.nombre)) as ub from ciudad_provincia cp inner join ciudad_distrito cdi on cp.idprovincia=cdi.idprovincia  where cdi.iddistrito=".$dt);
        }
        public function sel5($dt){ 
            return $this->select("SELECT UPPER( CONCAT(cd.nombre,' - ',cp.nombre,' - ',cdi.nombre)) as ub from ciudad_departamento cd inner join ciudad_provincia cp on cd.iddepartamento=cp.iddepartamento inner join ciudad_distrito cdi on cp.idprovincia=cdi.idprovincia inner join adm_locales al on cdi.iddistrito=al.lo_ciudad where al.idlocales=".$dt);
        }
        public function sel6($dt){ 
            return $this->select("SELECT idprovincia,nombre from ciudad_provincia where iddepartamento=".$dt);
        }
        public function sel7($dt){ 
            return $this->select("SELECT iddistrito, nombre from ciudad_distrito where idprovincia='".$dt."'");
        }
        public function sel8($dt){ 
            return $this->select("SELECT kilo_base, kilo_adicional, envio_dom, precio_sobre from ciudad_distrito cd inner join adm_locales al on cd.iddistrito=al.lo_ciudad where al.idlocales=".$dt);
        }
        public function sel9(){ 
            if ($_SESSION['fasklog']['local_pre']) {
                return $this->select("SELECT idcomprobante, co_serie, co_correlativo, co_nombre_envia, cpe_icon from comprobante c inner join conf_cpe cc on c.co_tipo=cc.idcpe WHERE idlocales=".$_SESSION['fasklog']['local_pre']." order by idcomprobante desc limit 10");
            }else{
                return $this->select("SELECT idcomprobante, co_serie, co_correlativo, co_nombre_envia, cpe_icon from comprobante c inner join conf_cpe cc on c.co_tipo=cc.idcpe order by idcomprobante desc limit 10");
            }
        }
        public function sel10($dt){ 
            //and al.idgiros= .$_SESSION['fasklog']['idgiros']
            return $this->select("SELECT DISTINCT al.idlocales,cd.nombre, lo_abreviatura from adm_locales al inner join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito WHERE idprovincia= ".$dt);
        }
        public function sel11($dt){ 
            //and idprovincia in (SELECT idprovincia from adm_locales al inner join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito)
            return $this->select("SELECT DISTINCT idprovincia,nombre from ciudad_provincia where iddepartamento=".$dt);
        }
        public function sel12($dt){ 
            return $this->select("SELECT idpresentacion, pre_descrip, pre_precio, pre_unidades, idmedida from producto_presentacion where idproducto=".explode('-/', $dt)[0]);
        }
        public function sel13($dt){
            if(!isset($dt)){ 
              return $this->select("SELECT * FROM producto order by name limit 5");
            }else{ 
              return $this->select("SELECT * FROM producto where pr_nombre like '%".$dt."%' limit 5");
            } 
        }
        public function sel14($dt){ 
            return $this->select("SELECT idarea,ar_nombre FROM area_contacto ac join clientes c on ac.idclientes=c.idclientes  WHERE  c.cl_numdoc = ".$dt);
        }
        public function sel15($dt){ 
            return $this->select("SELECT co.idcontacto as idcontacto, co.co_nombres  FROM contacto co join clientes cl on co.idclientes = cl.idclientes WHERE co.idarea= ".$dt);
        }
        public function sel16($dt){ 
            return $this->select("SELECT co.idcontacto as idcontacto, co.co_telefono, co.co_correo  FROM contacto co join clientes cl on co.idclientes = cl.idclientes WHERE co.idcontacto= ".$dt);
        }
        public function comp1(){ 
            return $this->select("SELECT cl.idcpe as cod, cpe_abre,cpe_icon from conf_cpe cc inner join conf_giros_cpe cl on cc.idcpe=cl.idcpe inner join adm_locales al on cl.idgiros=al.idgiros where cc.cpe_ver=1 and al.idlocales=".$_SESSION['fasklog']['local_pre']);
        }

        public function comp17(){ 
            return $this->select("SELECT cl.idcpe as cod, cpe_abre,cpe_icon from conf_cpe cc inner join conf_giros_cpe cl on cc.idcpe=cl.idcpe inner join adm_locales al on cl.idgiros=al.idgiros where  cl.idcpe in (01,03,99) and al.idlocales=".$_SESSION['fasklog']['local_pre']);
        }
        public function comp1_2(){ 
            return $this->select("SELECT cl.idseries as id, cs.se_tipo as tipo, cl.idseries FROM conf_series_locales cl inner join conf_series cs on cl.idseries=cs.idseries WHERE idlocales=".$_SESSION['fasklog']['local_pre']." order by cl.idseries asc");
        }

        public function serie_atencion($id){ 
            $query='1=1';

             if ($id > 0) {$query.=" AND idlocales=".$id; }


            return $this->select("SELECT cl.idseries as id, cs.se_tipo as tipo, cl.idseries FROM conf_series_locales cl inner join conf_series cs on cl.idseries=cs.idseries where ".$query."");
        }

        public function comp2($dt){ 
            return $this->select("SELECT IFNULL(max(co_correlativo)+1,1) as corr from comprobante where co_serie='".$dt."'");
        }
        public function comp3($dt){ 
            return $this->select("SELECT idclientes,cl_nombres from clientes where cl_numdoc='".$dt."'");
        }
        public function comp4($dt){ 
            return $this->select("SELECT idcorreo as id,co_correo as value from persona_correo where idpersona=".$dt);
        }
        public function comp5($dt){ 
            return $this->select("SELECT iddireccion as id,di_direccion as value from persona_direccion where idpersona=".$dt);
        }
        public function comp6($dt){ 
            return $this->select("SELECT case c.te_tipo when 1 then 'SOBRE' else 'CAJA' END as tp, te_cant, te_descrip as des, te_unit,te_total,idtemp as id from comprobante_temp c  where c.iduser=".$_SESSION['fasklog']['iduser']);
        }
        public function comp7($dt){ 
            return $this->select("SELECT pr_nombre,pr_precio from producto p where idproducto=".$dt);
        }
        
        public function comp8($ser,$num){ 
            return $this->select("SELECT idpersona,co_nombre_adquiriente,co_ruc_adquiriente from comprobante  where co_serie='".$ser."' and co_correlativo=".$num);
        }
        public function comp8_2($ser,$num){ 
            return $this->select("SELECT iddet, de_cant, IF(c.idproducto=0,de_nombre,pr_nombre) as des, de_unit,de_total,c.idproducto as id from comprobante cc inner join comprobante_det c on cc.idcomprobante=c.idcomprobante left join producto p on c.idproducto=p.idproducto where cc.co_serie='".$ser."' and cc.co_correlativo=".$num);
        }
        public function comp9(){ 
            return $this->select("SELECT * from producto_categoria");
        }
        public function comp10(){ 
            return $this->select("SELECT al.idlocales, lo_abreviatura, lo_direccion from conf_user_locales cu inner join adm_locales al on cu.idlocales=al.idlocales WHERE cu.iduser=".$_SESSION[fasklog][iduser]);
        }
        public function del1($dt){ 
            return $this->ejecutar("DELETE FROM comprobante_temp WHERE idtemp=".$dt);
        }
        public function verifica(){
            return $this->select("SELECT count(*) as can from caja where estado=1 and iduser=".$_SESSION['fasklog']['iduser']." and idlocales=".$_SESSION['fasklog']['local_pre']);
        }
        public function busqprod($dt){ 
            return $this->select("SELECT * from  producto p where pr_nombre like '%".$dt."%' limit 5");
        }
        public function insert1($dt){ 
            if ($dt['serie']=='F999' || $dt['serie']=='B999') {
                $dt['envio']=0;
            }
            return $this->proc("CALL comprobante_insert1(".$_SESSION['fasklog']['iduser'].",'".$dt['tpcomp']."', '".$dt['pago']."','".$dt['serie']."','".date('Y-m-d H:i:s')."','".$dt['envio_doc']."','".$dt['envia_nombre']."','".$dt['envia_id']."','".$dt['envia_corr']."','".$dt['envia_dir']."','".$dt['envia_tel']."',".$_SESSION['fasklog']['local_pre'].",".$dt['cargo'].",'".$dt['order']."','".$dt['obs']."',".$dt['envio'].",".$dt['detraccion'].")");
        }
        public function insert2($dt){
            return $this->ejecutar("INSERT INTO caja(idlocales, iduser, estado) SELECT  ".$_SESSION['fasklog']['local_pre'].",".$_SESSION['fasklog']['iduser']." ,1 FROM DUAL WHERE NOT EXISTS (SELECT * FROM caja WHERE idlocales=".$_SESSION['fasklog']['local_pre']." and iduser=".$_SESSION['fasklog']['iduser']." and estado=1)");
        }
        public function insert3($dt){ 
            if($dt[tp]==1){$cant=1;$dt[prod]=0;}else{$cant=$dt[cant];$dt[recibe_dist]=$_SESSION[fasklog][local_pre];}
            if($dt['paq_tipo']==1){$dt['paq_medida']='G';}
            if (!$dt['paq_ancho']) {$dt['paq_ancho']='0.0';}
            if (!$dt['paq_largo']) {$dt['paq_largo']='0.0';}
            if (!$dt['paq_alto']) {$dt['paq_alto']='0.0';}
            if (!$dt['te_peso']) {$dt['te_peso']='0.0';}
            if (!$dt['tipo_entrega']) {$dt['tipo_entrega']=0;}
            if (!$dt[recibe_id]) {$dt[recibe_id]=0;}
            if (!$dt[paq_peso]) {$dt[paq_peso]=0;}
            if (!$dt[paq_tipo]) {$dt[paq_tipo]=0;}

         if($dt[tp]==1){
                return $this->ejecutar("INSERT INTO comprobante_temp(idtemp,te_tipo, te_nombre, te_ruc, idclientes, te_tipo_entrega, idlocales, te_direccion, te_cant, te_unit, te_total, te_descrip, iduser, te_peso, te_ancho, te_largo, te_alto,te_tipo_encomienda,te_medida,idproducto, idlocal_venta ,te_des,te_obser, te_clave) SELECT (SELECT IFNULL(MAX( idtemp ),0)+1 FROM comprobante_temp asd),".$dt[tp].",'".$dt[recibe_nombre]."','".$dt[recibe_doc]."','".$dt[recibe_id]."','".$dt[tipo_entrega]."','".$dt[recibe_dist]."','".$dt[recibe_dir]."',".$cant.",'".$dt[total]."','".$dt[total]*$cant."','".$dt[paq_descrip]."',".$_SESSION[fasklog][iduser].",'".$dt[paq_peso]."','".$dt[paq_ancho]."','".$dt[paq_largo]."','".$dt[paq_alto]."','".$dt[paq_tipo]."','".$dt[paq_medida]."',".$dt[prod].", ".$_SESSION[fasklog][local_pre].", '".$dt[p_desc]."','".$dt[recibe_observ]."' ,'".$dt[pass]."' FROM DUAL WHERE NOT EXISTS (SELECT * FROM comprobante_temp WHERE iduser=".$_SESSION[fasklog][iduser]." and te_venta=1 and idlocal_venta=".$_SESSION[fasklog][local_pre].")");
            }else{

                return $this->ejecutar("INSERT INTO comprobante_temp(idtemp,te_tipo, te_nombre, te_ruc, idclientes, te_tipo_entrega, idlocales, te_direccion, te_cant, te_unit, te_total, te_descrip, iduser, te_peso, te_ancho, te_largo, te_alto,te_tipo_encomienda,te_medida,idproducto, idlocal_venta, te_venta, te_obser ,te_des) SELECT (SELECT IFNULL(MAX( idtemp ),0)+1 FROM comprobante_temp asd),".$dt[tp].",'".$dt[recibe_nombre]."','".$dt[recibe_doc]."','".$dt[recibe_id]."','".$dt[tipo_entrega]."','".$dt[recibe_dist]."','".$dt[recibe_dir]."',".$cant.",'".$dt[total]."','".$dt[total]*$cant."','".$dt[paq_descrip]."',".$_SESSION[fasklog][iduser].",'".$dt[paq_peso]."','".$dt[paq_ancho]."','".$dt[paq_largo]."','".$dt[paq_alto]."','".$dt[paq_tipo]."','".$dt[paq_medida]."',".$dt[prod].", ".$_SESSION[fasklog][local_pre].",".$dt[tpp].",'".$dt[recibe_observ]."' , '".$dt[p_desc]."' FROM DUAL WHERE NOT EXISTS (SELECT * FROM comprobante_temp WHERE te_tipo=1 and iduser=".$_SESSION[fasklog][iduser]." and idlocal_venta=".$_SESSION[fasklog][local_pre].")");
            }
        }
        public function insert4($dt){ 
            $qy=$this->ejecutar("INSERT INTO guia_remision(idguia,gu_tipo, gu_serie, gu_correlativo, gu_fecha, gu_guia_motivo, idrutas) VALUES (".$dt.",'09' ,'T001',1,NOW(),'01', (SELECT idrutas FROM rutas r inner join comprobante_det cd on r.idlocales=cd.idlocales WHERE cd.idcomprobante=".$dt." LIMIT 1))");
            if ($qy) {
                $qy2=$this->ejecutar("UPDATE comprobante set co_guia=1 where idcomprobante=".$dt);
                if ($qy2) {
                    return $qy; 
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }
        public function insert5($dt){ 
            $id=explode('-/', $dt)[0];
            $num=explode('-/', $dt)[1];
            $ser=explode('-/', $dt)[2];
            $chof=explode('-/', $dt)[3];
            $qy=$this->ejecutar("INSERT INTO guia_remision(idguia,gu_tipo, gu_serie, gu_correlativo, gu_fecha, gu_guia_motivo, idrutas) VALUES (".$id.",'31' ,'".$ser."',".$num.",NOW(),'01', ".$chof.")");
            if ($qy) {
                $qy2=$this->ejecutar("UPDATE comprobante set co_guia=2 where idcomprobante=".$id);
                if ($qy2) {
                    return $qy; 
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }
        public function insert6($dt){ 
           
            return $this->ejecutar("INSERT INTO comprobante_temp(idtemp,te_tipo, te_nombre, te_ruc, idclientes, te_tipo_entrega, idlocales, te_direccion, te_cant, te_unit, te_total, te_descrip, iduser, te_peso, te_ancho, te_largo, te_alto,te_tipo_encomienda,te_medida,idproducto, idlocal_venta, te_des) SELECT (SELECT IFNULL(MAX( idtemp ),0)+1 FROM comprobante_temp asd),".$dt[tp].",'".$dt[recibe_nombre]."','".$dt[recibe_doc]."','".$dt[recibe_id]."','".$dt[tipo_entrega]."','".$dt[recibe_dist]."','".$dt[recibe_dir]."',".$cant.",'".$dt[total]."','".$dt[total]*$cant."','".$dt[paq_descrip]."',".$_SESSION[fasklog][iduser].",'".$dt[paq_peso]."','".$dt[paq_ancho]."','".$dt[paq_largo]."','".$dt[paq_alto]."','".$dt[paq_tipo]."','".$dt[paq_medida]."',".$dt[prod].", ".$_SESSION[fasklog][local_pre].", '".$dt[p_desc]."' FROM DUAL WHERE NOT EXISTS (SELECT * FROM comprobante_temp WHERE te_tipo=1 and iduser=".$_SESSION[fasklog][iduser]." and idlocal_venta=".$_SESSION[fasklog][local_pre].")");
        }
    }
 ?>