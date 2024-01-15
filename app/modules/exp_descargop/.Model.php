<?php 
    class Mod extends database{

        public function sel_mensajero (){              
            return $this->select("SELECT p.idpersonal,dt.iddespacho, d.de_codigo, CONCAT(d.de_codigo ,' - ', pca.ca_descripcion,' : ',p.pe_apellidos,', ', p.pe_nombres ) As responsable,1 as cantidad
            FROM despacho_det dt    
            JOIN despacho d on dt.iddespacho = d.iddespacho
            LEFT join personal p on d.idpersonal = p.idpersonal
            LEFT join personal_contratos pc on p.idpersonal = pc.idpersonal
            LEFT join personal_cargo pca on pc.idpersonalcargo = pca.idpersonalcargo
            WHERE dt.dd_estado = 2
            GROUP BY dt.iddespacho");
        }

        public function upd_Entrega($dt)
        {
            $estado = $dt[idestado];
            $set = '';
            if($dt[idmotivo]){ $set.= ", idmotivo = ".$dt[idmotivo]." " ;  }   
            if($dt[img1]){ $set.= ", dd_img1 = '".$dt[img1]."'" ;  }            
            if($dt[img2]){ $set.= ", dd_img2 = '".$dt[img2]."'" ;  }            
            if($dt[img3]){ $set.= ", dd_img3 = '".$dt[img3]."'" ;  }   
            if($dt[img4]){ $set.= ", dd_img4 = '".$dt[img4]."'" ;  }   
           
                echo "UPDATE despacho_det SET identrega=".$dt[identrega].",dd_fecha= now(),dd_estado='".$estado."',dd_nota='".$dt[nota]."' $set where iddet='".$dt[iddespachotemp]."'";

            $id=$this->ejecutar("UPDATE despacho_det SET idmotivo=".$dt[idmotivo].",identrega=".$dt[identrega].",dd_fecha= now(),dd_estado='".$estado."',dd_nota='".$dt[nota]."' $set where iddet='".$dt[iddespachotemp]."'");

            if ($id and $dt[tipo]==2){

                $this->ejecutar("UPDATE comprobante_det a SET est_paq='".$estado."' WHERE a.iddet = '".$dt[idapoyo]."' "); 

                return $id;

            }else  if ($id and $dt[tipo]==1) {
                    
                $this->ejecutar("UPDATE apoyo_postal a SET estado='".$estado."' WHERE a.idapoyo = '".$dt[idapoyo]."' ");
                return $id;                               
            }
            else{
                return 0;
            }
             
        }

        public function sel_Motivo()
        {
            return $this->select(" SELECT * FROM motivo where mo_estado=1");
        }

        public function sel_Entrega()
        {
            return $this->select(" SELECT * FROM entrega where en_estado=1");
        }

        public function mod_Detalle($id)
        {
            return $this->select(" SELECT * FROM despacho_det where iddet=".$id);
        }

        public function tbl_Buscar()
        {
            return $this->select("SELECT p.idpersonal,dt.iddespacho,d.de_fecha,d.de_fechacierre,d.de_codigo,pca.ca_descripcion cargo, CONCAT(p.pe_apellidos,', ', p.pe_nombres ) As responsable,count(a.idapoyo) cantidad
            FROM despacho_det dt    
            JOIN apoyo_postal a on dt.idapoyo = a.idapoyo 
            JOIN despacho d on dt.iddespacho = d.iddespacho
            LEFT join personal p on d.idpersonal = p.idpersonal
            LEFT join personal_contratos pc on p.idpersonal = pc.idpersonal
            LEFT join personal_cargo pca on pc.idpersonalcargo = pca.idpersonalcargo
            WHERE dt.dd_estado > 2 and dt.idtipo=1
            GROUP BY dt.iddespacho");
        }

        public function tbl_Buscar_com()
        {
            return $this->select("SELECT p.idpersonal,dt.iddespacho,d.de_fecha,d.de_fechacierre,d.de_codigo,pca.ca_descripcion cargo, CONCAT(p.pe_apellidos,', ', p.pe_nombres ) As responsable,1 as cantidad
            FROM despacho_det dt    
            JOIN comprobante_det a on dt.idapoyo = a.iddet 
            JOIN despacho d on dt.iddespacho = d.iddespacho
            LEFT join personal p on d.idpersonal = p.idpersonal
            LEFT join personal_contratos pc on p.idpersonal = pc.idpersonal
            LEFT join personal_cargo pca on pc.idpersonalcargo = pca.idpersonalcargo
            WHERE dt.dd_estado > 2 and dt.idtipo=2
            GROUP BY dt.iddespacho");
        }


        public function tbl_descargop_pendientes($id)
        {
            return $this->select("SELECT dt.iddet,p.idpersonal, d.de_codigo,a.idapoyo,a.etiqueta,a.persona,d.de_fecha,d.de_hora,(SELECT  CONCAT(cde.nombre,' - ',cp.nombre,' - ',cd.nombre) as nombre FROM ciudad_distrito cd left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento where cd.iddistrito=a.ap_distrito ) as distrito
            FROM despacho_det dt    
            JOIN apoyo_postal a on dt.idapoyo = a.idapoyo             
            JOIN despacho d on dt.iddespacho = d.iddespacho
            LEFT join personal p on d.idpersonal = p.idpersonal            
            WHERE dt.dd_estado=0 and dt.iddespacho = ".$id);     
        } 

        public function local($id){ 
            return $this->select("SELECT nombre from adm_locales al inner join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito WHERE idlocales=".$id);
        }

        public function tbl_descargop($id)
        {
            return $this->select("SELECT dt.iddet,p.idpersonal, d.de_codigo,a.idapoyo,a.etiqueta,a.persona,d.de_fecha,d.de_hora,dt.dd_fecha,dt.dd_estado,(SELECT  CONCAT(cde.nombre,' - ',cp.nombre,' - ',cd.nombre) as distrito FROM ciudad_distrito cd left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento where cd.iddistrito=a.ap_ubigeo ) as distrito,d.de_serie ,(select nombre FROM adm_locales al
                join ciudad_distrito cdd on al.lo_ciudad=cdd.iddistrito where al.idlocales=o.idlocal) as origen
            FROM despacho_det dt    
            JOIN apoyo_postal a on dt.idapoyo = a.idapoyo  
            JOIN orden o on a.idorden = o.idorden           
            JOIN despacho d on dt.iddespacho = d.iddespacho
            LEFT join personal p on d.idpersonal = p.idpersonal            
            WHERE dt.idtipo=1 and dt.iddespacho = ".$id);     
        }
        

        public function tbl_descargop_com($id)
        {
            return $this->select("SELECT  *,(SELECT  CONCAT(cd.nombre,' - ',cp.nombre,' - ',cde.nombre) as nombre FROM ciudad_distrito cd left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento where cd.iddistrito=cd.idlocales ) as distrito 
                from despacho_det dd 
                join despacho d on d.iddespacho = dd.iddespacho
                join comprobante_det cd on cd.iddet=dd.idapoyo
                join comprobante c on c.idcomprobante =  cd.idcomprobante
                join adm_locales al on c.idlocales=al.idlocales 
                left join ciudad_distrito cdd on al.lo_ciudad=cdd.iddistrito
                WHERE dd.idtipo=2 and dd.iddespacho=".$id); 
        }

        public function mod_Descargo($id)
        {
            $idapoyo=explode("-", $id);
            $tipo=explode("-", $id);
            
            if($tipo[1]=='/1'){ // ORDEN 

                 return $this->select("SELECT dd.iddet as codigo,dd.idapoyo,1 as tipo, persona as de_nombre,0 as de_ruc,direccion,ap_distrito, a.etiqueta as etiqueta,dd.idmotivo as motivo, dd.identrega as entrega,dd.dd_nota as nota,dd.dd_img1 as img1, dd.dd_img2 as img2, dd.dd_img3 as img3, dd.dd_img4 as img4,  dd.dd_img5 as img5, dd.dd_estado as dd_estado, dd.idmotivo as motivo

                    FROM despacho_det dd 
                    JOIN apoyo_postal a on dd.idapoyo = a.idapoyo
                    LEFT JOIN  cotizacion_det cd on a.idservicio = cd.iddet 
                    JOIN servicios_det  sd on sd.iddet = cd.idprod 
                    where dd.idapoyo='".$idapoyo[0]."' LIMIT 1");       

            }else {         //COMPROBANTE
                return $this->select("SELECT dd.iddet as codigo,2 as tipo, de_nombre, de_ruc,dd.idapoyo,(SELECT  CONCAT(cd.nombre,' - ',cp.nombre,' - ',cde.nombre) as distrito FROM ciudad_distrito cd left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento where cd.iddistrito=cd.idlocales ) as distrito, CONCAT(c.co_serie,'-',LPAD(c.co_correlativo,8,'0') ) as etiqueta,dd_estado, dd.idmotivo as motivo, dd.identrega as entrega,dd.dd_nota as nota, dd.dd_img1 as img1, dd.dd_img2 as img2, dd.dd_img3 as img3, dd.dd_img4 as img4,  dd.dd_img5 as img5

                from despacho_det dd 
                join despacho d on d.iddespacho = dd.iddespacho
                join comprobante_det cd on cd.iddet=dd.idapoyo
                join comprobante c on c.idcomprobante =  cd.idcomprobante
                join adm_locales al on c.idlocales=al.idlocales 
                left join ciudad_distrito cdd on al.lo_ciudad=cdd.iddistrito
                WHERE dd.idtipo=2 and dd.idapoyo='".$idapoyo[0]."' order by dd.iddet desc LIMIT 1 "); 
            }
            
        }
        public function consultar_codigo($dt)
        {
            $fac = explode('-', $dt);
            $tipo = $fac[0][0];
            $correlativo = ltrim($fac[1], "0");

            if ($tipo=='O'){
                return $this->select("SELECT a.idapoyo,1 as tipo, persona,direccion,ap_distrito 
                    FROM despacho_det dd                 
                    JOIN  apoyo_postal a on dd.idapoyo = a.idapoyo 
                    LEFT JOIN  cotizacion_det cd on a.idservicio = cd.iddet 
                    JOIN servicios_det  sd on sd.iddet = cd.idprod 
                    where etiqueta='".$dt."' and dd.dd_estado>1  LIMIT 1");       
            }else {
                return $this->select("SELECT cd.iddet as idapoyo,2 as tipo,de_nombre as persona, de_direccion as direccion, 1 ap_distrito 
                from despacho_det dd 
                join despacho d on d.iddespacho = dd.iddespacho
                join comprobante_det cd on cd.iddet=dd.idapoyo
                join comprobante c on c.idcomprobante =  cd.idcomprobante
                where co_serie='".$fac[0]."' and co_correlativo ='".$correlativo."' and dd.dd_estado >1  LIMIT 1"); 
            }             
        }

    }
 ?>
