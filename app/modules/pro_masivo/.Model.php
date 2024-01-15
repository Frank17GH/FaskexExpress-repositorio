<?php 
    class Mod extends database{

        public function apo_tabla($dt){ 
                $serie =  explode('-/', $dt)[0] ;
                $numero =  explode('-/', $dt)[1] ;
            return $this->select("SELECT *,(SELECT  CONCAT(cd.nombre,' - ',cp.nombre,' - ',cde.nombre) as nombre FROM ciudad_distrito cd left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento where cd.iddistrito=ap.ap_ubigeo ) as nombre, cd.tipo_entrega as entrega FROM apoyo_postal ap left join orden o on ap.idorden = o.idorden join cotizacion_det cd on cd.iddet = ap.idservicio where o.or_serie='".$serie."' and o.or_numero='".$numero."' ");
        }

        public function ord_apoyo($serie,$numero){ 

              if ($serie[0]=='O'){   

            return $this->select("SELECT ap.idorden,ap.idservicio as idservicio, cd.tipo_entrega,cl.cl_nombres as cliente,  concat(s.se_descripcion,' - ',sd.de_descripcion,' - ', cd.tipo_entrega,' - ',(select count(a.idservicio) as cantidad from apoyo_postal a where a.idservicio = ap.idservicio),'/', od.cantidad) as servicio, date_format(o.fecha_ingreso , '%d/%m/%Y') as fecha,CONCAT(c.co_serie,'-',c.num) as cotizacion,CONCAT(o.or_serie,'-',o.or_numero)as orden,
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
                where o.or_serie='".$serie."' and o.or_numero='".$numero."'
                GROUP by ap.idservicio ");     
                }else {

                    $num =ltrim( $numero, "0");

                    return $this->select("SELECT concat ( p.pe_nombres,' ',p.pe_apellidos) cliente,1 as total, com.idcomprobante as idorden, 0 as idservicio ,0 as cotizacion, 0 as orden, 1 as ingresado,1 as cantidad, cd.de_descrip servicio, com.co_fecha as fecha, com.co_serie,com.co_correlativo , (select cl_telefono from clientes where idclientes=cd.idclientes ) as telefono, cd.de_nombre as destino , cd.de_direccion ,cd.idlocales,cd.de_descrip,(SELECT  CONCAT(cdi.nombre,' - ',cp.nombre,' - ',cde.nombre) as nombre FROM ciudad_distrito cdi left join ciudad_provincia cp on cdi.idprovincia = cp.idprovincia left join ciudad_departamento cde on cdi.iddepartamento =cde.iddepartamento where cdi.iddistrito = cd.idlocales) as distrito, cd.de_obser

            from comprobante com 
            inner join comprobante_det cd on cd.idcomprobante=com.idcomprobante 
            LEFT JOIN personal p on com.iduser=p.idpersonal 
            inner join adm_locales part on com.idlocales=part.idlocales 
            where com.co_serie='".$serie."' and com.co_correlativo='".$num."'  ");

                }   
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
                    $item2 = str_pad($item, 6, "0", STR_PAD_LEFT);
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
                    
                    ap_ubigeo =  '".$dt['distrito']."',
                    ap_cargo = '".$dt['ap_cargo']."',
                    ap_codigo = '".$dt['ap_codigo']."',
                    observaciones = '".$dt['observacion']."',
                    ap_peso = '".$dt['peso']."' 
                    WHERE idapoyo =".$dt['idapoyo']);
            }else{

                $id = $this->select("SELECT  if((select count(idservicio) as tot from apoyo_postal where idservicio='".$dt['idservicio']."' and idorden='".$dt['idorden']."' ) >= od.cantidad, '0', '1') as estado FROM orden_det od  where od.idorden='".$dt['idorden']."' and od.idservicio =".$dt['idservicio']);           
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
                    
                    ap_ubigeo,
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
