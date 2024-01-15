<?php 
    class Mod extends database{

        public function tbl_temporal($dt){  
            if ( $dt == 0 ){
                return $this->select("SELECT * FROM `despacho_temp` d 
                join apoyo_postal a on d.idapoyo=a.idapoyo 
                WHERE d.usuario=".$_SESSION['fasklog']['iduser']." ");
             }else {
                return $this->select("SELECT * FROM `despacho_det` d 
                join apoyo_postal a on d.idapoyo=a.idapoyo 
                WHERE  d.iddespacho = ".$dt);
             }                       
        }
        
        public function salida_guardar($dt){   

            if($dt[idpersonal]>0 and $dt[iddespacho]==0  ){
                return $this->proc("CALL despacho_insert1('".$dt[idpersonal]."','".$dt[idcargo]."',".$_SESSION[fasklog][iduser].",'".$dt[de_codigo]."','".$dt[de_fecha]."','".$dt[de_fechacierre]."','".$dt[de_hora]."','".$dt[de_dias]."','".$dt[de_ambito]."','".$dt[de_movilidad]."',".$dt[iddistrito].",'".$dt[de_observacion]."',".$_SESSION[fasklog][idgiros].",".$_SESSION[fasklog][local_pre].")");
            }           
        }

        public function tbl_detalle($id){             
            return $this->select("SELECT o.idorden,concat(o.or_serie,'-',o.or_numero) as orden ,a.ap_peso as peso,a.etiqueta,a.persona,a.direccion,(SELECT  CONCAT(cde.nombre,' - ',cp.nombre,' - ',cd.nombre) as nombre FROM ciudad_distrito cd left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento where cd.iddistrito=a.ap_distrito ) as distrito 
                FROM despacho_det dd
                join despacho d on dd.iddespacho = d.iddespacho 
                join apoyo_postal a on dd.idapoyo = a.idapoyo
                join orden o on a.idorden = o.idorden 
                WHERE dd.iddespacho=".$id);             
        }
         public function selCargos($dt){              
               return $this->select("SELECT * FROM personal_cargo where ca_ambito=".$dt);
        }
        public function codigo(){              
               return $this->select("SELECT IFNULL(max(de_codigo)+1,1) as codigo from despacho");
        }
        
         public function selPersonal($dt){              
        
               return $this->select("SELECT * FROM personal_contratos pc 
                join personal p on pc.idpersonal=p.idpersonal
                where pc.idpersonalcargo=".$dt);                
        }
        public function salida_nuevo($id){             
            return $this->select("SELECT iddespacho,de_codigo,de_ambito,idpersonal,idcargo,de_fecha,de_hora,de_dias,de_fechacierre,de_movilidad,iddistrito,de_observacion FROM despacho 
                WHERE iddespacho=".$id);             
        }        

        public function mod_buscar($dt){  

            if ( $dt == 0 ){
                return $this->select("SELECT d.iddespacho, d.de_codigo as codigo, d.de_fecha as emision,d.de_ambito as ambito, concat(p.pe_apellidos,', ',p.pe_nombres) as responsable,(SELECT COUNT(iddespacho) from despacho_det where iddespacho=d.iddespacho ) as cantidad  FROM despacho d 
                        left join despacho_det dd on d.iddespacho=dd.iddespacho 
                        left join personal p on d.idpersonal = p.idpersonal
                    WHERE d.idusuario=".$_SESSION['fasklog']['iduser']." GROUP BY d.iddespacho"); 
            }else {
                return $this->select("SELECT d.iddespacho, d.de_codigo as codigo, d.de_fecha as emision,d.de_ambito as ambito, concat(p.pe_apellidos,', ',p.pe_nombres) as responsable,(SELECT COUNT(iddespacho) from despacho_det where iddespacho=d.iddespacho ) as cantidad  FROM `despacho` d 
                        left join despacho_det dd on d.iddespacho=dd.iddespacho 
                        left join personal p on d.idpersonal = p.idpersonal
                    WHERE d.de_codigo LIKE LOWER('%".$dt."%') and  d.idusuario=".$_SESSION['fasklog']['iduser']); 
            }                     
        }

        public function saveDet($dt){

            if($dt[idapoyo]){

               $id=$this->insertar("INSERT  `despacho_temp`(`idapoyo`, `iddespacho`, `usuario`) SELECT ".$dt['idapoyo'].",'0', ".$_SESSION[fasklog][iduser]." FROM dual WHERE NOT EXISTS (SELECT idapoyo from despacho_temp WHERE idapoyo=".$dt['idapoyo']." )");           
                if ($id) {
                   $dt=$this->ejecutar("UPDATE apoyo_postal SET estado=5  WHERE idapoyo= ".$dt['idapoyo']." ");
                    return $id;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }                             
        }

        public function del_temp($dt){ 

            $id=$this->ejecutar("DELETE FROM despacho_temp WHERE idtemp=".explode('-/', $dt)[0]);
            if ($dt) {
                return $dt=$this->ejecutar("UPDATE apoyo_postal SET estado=4  WHERE idapoyo= ".explode('-/', $dt)[1]);
            }else{
                return 0;
            }
        }


        public function paquete($dt,$amb){
            $fac = explode('-', $dt);
            $serie= $fac[0].'-'.$fac[1].'-'.$fac[2];
            $numero= $fac[2];
            //item=".$numero." and
        return $this->select("SELECT idapoyo,persona,direccion,ap_distrito FROM apoyo_postal a 
        LEFT JOIN  cotizacion_det cd on a.idservicio = cd.iddet
        join servicios_det  sd on sd.iddet = cd.idprod
        where estado=4 and etiqueta='".$dt."' and sd.idambito =".$amb);   
            
        }

        public function apo_tabla($id){ 
            return $this->select("SELECT *,(SELECT  CONCAT(cde.nombre,' - ',cp.nombre,' - ',cd.nombre) as nombre FROM ciudad_distrito cd left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento where cd.iddistrito=ap.ap_distrito ) as nombre, cd.tipo_entrega as entrega FROM apoyo_postal ap left join orden o on ap.idorden = o.idorden join cotizacion_det cd on cd.iddet = ap.idservicio where o.or_numero=".$id);
        }

        public function ord_apoyo($id){ 
            return $this->select("SELECT ap.idorden,ap.idservicio as idservicio, cd.tipo_entrega,cl.cl_nombres as cliente,  concat(s.se_descripcion,' - ',sd.de_descripcion,' - ', cd.tipo_entrega,' - ',(select count(a.idservicio) as cantidad from apoyo_postal a where a.idservicio = ap.idservicio),'/', od.cantidad) as servicio, date_format(o.fecha_ingreso , '%d/%m/%Y') as fecha, 
                   (select SUM(cantidad) as total from orden_det  where idorden = o.idorden) as total ,
                (select count(a.idservicio) as cantidad from apoyo_postal a where a.idorden = o.idorden) as ingresado 
                FROM
                apoyo_postal ap 
                join orden o on ap.idorden = o.idorden
                join orden_det od on o.idorden = od.idorden
                join cotizacion c on c.idcotizacion = o.idcotizacion
                join cotizacion_det cd on cd.iddet = ap.idservicio    
                join clientes cl on cl.idclientes = c.idclientes
                JOIN servicios_det sd on sd.iddet = cd.idprod 
                join servicios s on s.idservicios = sd.idservicios
                where o.or_numero='".$id."'
                GROUP by ap.idservicio ");        
        }

        public function apo_generar($dt){ 

            $id = $this->select("SELECT  (select count(idservicio) as tot from apoyo_postal where idorden = '".$dt['idorden']."') as registrados ,concat(o.or_serie,'-', o.or_numero)as serie, SUM(od.cantidad) as total FROM orden_det od  join orden o on od.idorden =o.idorden where od.idorden=".$dt['idorden']);

            $lista =$this->select("SELECT idapoyo as idapoyo from apoyo_postal 
                where estado=0 and idorden =".$dt['idorden']); ;
            if($id[0]['registrados']==$id[0]['total'])
            {
                $this->ejecutar("UPDATE orden SET 
                    or_estado = 1 
                    WHERE idorden =".$dt['idorden']);

                for($i=0; $i<$id[0]['total']; $i++)
                { 
                    $item = $i+1;
                    $item2 = str_pad($item, 3, "0", STR_PAD_LEFT);
                    $codigo = $id[0]['serie'].'-'.$item2;
                    $val = $this->ejecutar("UPDATE apoyo_postal SET 
                    etiqueta = '".$codigo."',
                    estado = 1 
                    WHERE idapoyo =".$lista[$i]['idapoyo']);
                }                
            }else {
                return 0;
            }
            return $val;
         
        }

        public function apo_detalle($id){ 
            return $this->select("SELECT * from apoyo_postal where idapoyo=".$id);
        }
        public function del_apoyo($id){            
            return $this->ejecutar("DELETE FROM apoyo_postal WHERE idapoyo=".$id);            
        }
          
        public function dis_tabla(){ 
            return $this->select("SELECT cd.iddistrito, CONCAT(cd.iddistrito,' - ',cde.nombre,' - ',cp.nombre,' - ',cd.nombre) as nombre FROM ciudad_distrito cd left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento ");
        }
        public function apo_agregar($dt){                        
            if ($dt[idapoyo]) {                
                return $this->ejecutar("UPDATE apoyo_postal SET 
                    ap_empresa = '".$dt['empresa']."',
                    persona = '".$dt['persona']."',
                    direccion = '".$dt['direccion']."',
                    referencia = '".$dt['referencia']."',
                    telefono = '".$dt['telefono']."',
                    ap_distrito = '".$dt['distrito']."',
                    ap_cargo = '".$dt['ap_cargo']."',
                    ap_codigo = '".$dt['ap_codigo']."',
                    observaciones = '".$dt['observacion']."',
                    ap_peso = '".$dt['peso']."' 
                    WHERE idapoyo =".$dt['idapoyo']);
            }else{

                $id = $this->select("SELECT  if((select count(idservicio) as tot from apoyo_postal where idservicio='".$dt['idservicio']."' ) >= od.cantidad, '0', '1') as estado FROM orden_det od  where od.idorden='".$dt['idorden']."' and od.idservicio =".$dt['idservicio']);           
                if ($id[0]['estado']==1){
                    return $this->insertar("INSERT INTO apoyo_postal (
                    idorden,
                    iduser,
                    ap_empresa,
                    persona,
                    direccion,
                    referencia,
                    telefono,
                    idservicio,
                    ap_distrito,
                    ap_cargo,
                    ap_codigo,
                    ap_peso,
                    estado,
                    observaciones,
                    fecha) 
                    VALUES (
                    '".$dt['idorden']."',
                    '".$_SESSION[fasklog][iduser]."',
                    '".$dt['empresa']."',
                    '".$dt['persona']."',
                    '".$dt['direccion']."',
                    '".$dt['referencia']."',
                    '".$dt['telefono']."',
                    '".$dt['idservicio']."',
                    '".$dt['distrito']."',
                    '".$dt['ap_cargo']."',
                    '".$dt['ap_codigo']."',
                    '".$dt['peso']."',
                    '0',
                    '".$dt['observacion']."',
                    NOW()
                    )
                "); 


                } else {
                    return 0 ;
                  
            }      
                }
        }
    }
 ?>
