<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    class Mod extends database{

        public function update1($dt){        

            return $this->insertar("UPDATE apoyo_postal SET `persona` = '".explode('-/', $dt)[1]."', `direccion` = '".explode('-/', $dt)[2]."', `referencia` = '".explode('-/', $dt)[3]."',`telefono` = '".explode('-/', $dt)[5]."', `distrito` = '".explode('-/', $dt)[4]."' ,`dni` = '".explode('-/', $dt)[7]."' WHERE idapoyo = '".explode('-/', $dt)[0]."' ");
            return 1;
        }
         public function update2($dt){

            return $this->insertar("UPDATE apoyo_postal SET 
            ap_empresa = '".$dt['empresa']."',
            persona = '".$dt['persona']."',
            direccion = '".$dt['direccion']."',
            referencia = '".$dt['referencia']."',
            telefono = '".$dt['telefono']."',
            ap_departamento = '".$dt['departamento']."',
            ap_provincia = '".$dt['provincia']."',
            ap_distrito = '".$dt['distrito']."',
            ap_ubigeo = '".$dt['ubigeo']."',
            ap_codpostal = '".$dt['codpostal']."',
            ap_cargo = '".$dt['ap_cargo']."',
            ap_codigo = '".$dt['ap_codigo']."',
            ap_peso = '".$dt['peso']."' 
            WHERE idapoyo =".$dt['idapoyo']);

            return 1;
        }

        public function estado($dt){

                $id=$this->ejecutar("UPDATE orden SET `or_estado` = '".explode('-/', $dt)[0]."' WHERE idorden = '".explode('-/', $dt)[1]."' ");        
                if ($id) {
                   $dt=$this->insertar("UPDATE apoyo_postal SET `estado` = '".explode('-/', $dt)[0]."' WHERE idorden = '".explode('-/', $dt)[1]."' ");
                    return $dt;
                }else{
                    return 0;
                }                    
        }

        public function orden_trabajo($id){
            return $this->select("SELECT * FROM `orden_trabajo` ot  join orden o on ot.idorden=o.idorden  join cotizacion c on o.idcotizacion=c.idcotizacion  
                join clientes cl on c.idclientes= cl.idclientes
                where ot.idorden=".$id);
        }

        public function item_apoyo($id){
            return $this->select("SELECT * FROM `apoyo_postal` 
                where idapoyo=".$id);
        }

         public function lista_orden(){ 
            return $this->select("SELECT idorden, or_serie, or_numero,fecha_ingreso,fecha_inicio, fecha_vencimiento, co_serie, num , cl.cl_nombres,
            (select  count(a.idorden) as cantidad from apoyo_postal a where a.idorden= o.idorden and estado>=0) as total,
            (select  count(a.idorden) as cantidad from apoyo_postal a where a.idorden= o.idorden and estado>=4) as digitado
            FROM `orden` o JOIN cotizacion ct on o.idcotizacion = ct.idcotizacion JOIN clientes cl ON ct.idclientes = cl.idclientes");
        }
        public function apoyo_postal($id){ 
            return $this->select("SELECT concat(s.se_descripcion,' - ',sd.de_descripcion,' - ', cd.tipo_entrega) as servicio,a.etiqueta as etiqueta,cd.tipo_entrega as entrega ,cl.cl_nombres as cliente, a.idapoyo, a.item,a.dni,a.persona,a.direccion as de_direccion,a.telefono,(SELECT  CONCAT(cdi.nombre,' - ',cp.nombre,' - ',cde.nombre) as nombre FROM ciudad_distrito cdi left join ciudad_provincia cp on cdi.idprovincia = cp.idprovincia left join ciudad_departamento cde on cdi.iddepartamento =cde.iddepartamento where cdi.iddistrito = a.ap_ubigeo) as distrito,a.etiqueta,a.cargo,a.estado,a.referencia, date_format(o.fecha_inicio, '%d-%m-%Y')  as fecha_inicio, date_format(o.fecha_vencimiento, '%d-%m-%Y') as fecha_fin, o.or_producto as tipo,a.ap_peso
                FROM `apoyo_postal` a 
                join orden o on a.idorden = o.idorden 
                join cotizacion c on c.idcotizacion = o.idcotizacion
                join clientes cl on cl.idclientes = c.idclientes
                join cotizacion_det cd on  cd.iddet = a.idservicio
                JOIN servicios_det sd on sd.iddet = cd.idprod 
                join servicios s on s.idservicios = sd.idservicios
                where a.idorden=".$id);
        }
        public function list_glosa($id){ 
            return $this->select("SELECT * FROM `glosa` where gl_tipo =".$id);
        }     
       
    }
 ?>