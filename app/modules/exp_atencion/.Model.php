<?php 
    class Mod extends database{              
        public function tbl_atencion($dt){             
            $query='1=1 AND al.idgiros=95';
            $serie = $dt['tipo_documento'];
            $numero = str_pad($dt[nro_comprobante], 6, '0', STR_PAD_LEFT);     
              // $query.="and al.idgiros=95 and c.co_cargo=1";              
            if ($serie=='01' or $serie=='03'  or $serie=='0') {                                
                if ($dt[serie]!="0005") {$query.=" AND c.co_serie='".$dt[serie]."'"; }
                // if ($dt[idorden]!="") {$query.=" AND cd.idcomprobante=".$dt[idorden]; }
                if ($dt[nro_comprobante]!="") {$query.=" AND c.co_correlativo='".$numero."'"; }
                if ($dt[tipo_documento]!="0") {$query.=" AND c.co_tipo=".$dt[tipo_documento]; }   
                if ($dt[id_locales]!="") {$query.=" AND c.idlocales=".$dt[id_locales];}
                if ($dt[estado]!="0") {$query.=" AND cd.est_paq=".$dt[estado];}
                if ($dt[filtro_fecha]=="4") {$query.=" and DATE_FORMAT(c.co_fecha, '%Y-%m-%d') between '".$dt['inicio']."' and '".$dt['fin']."' ";}      
                elseif($dt[filtro_fecha]=="3"){ $query.=" and YEAR(c.co_fecha)=".$dt['anio'];}
                elseif($dt[filtro_fecha]=="2"){$query.=" and MONTH(c.co_fecha)='".$dt['mes']."'and YEAR(c.co_fecha)=".$dt['anio'] ;}
                elseif($dt[filtro_fecha]=="1"){$query.=" and DAY(c.co_fecha)='".$dt['dia']."' and MONTH(c.co_fecha)='".$dt['mes']."'and YEAR(c.co_fecha)=".$dt['anio'];}
                else{}
                 return $this->select("SELECT *,
                    (SELECT  cd.nombre FROM ciudad_distrito cd  where cd.iddistrito=cd.idlocales ) as distrito,
                        date_add(c.co_fecha, interval 3 day) fecha_devolucion,
                        date_add(c.co_fecha, interval 3 day) fecha_vencimiento,
                        date_add(c.co_fecha, interval 1 day) fecha_inicio,
                        c.co_fecha as fecha_ingreso, cd.est_paq,
                        c.co_nombre_envia as cliente,
                        IF(cd.est_paq < 3, '1', '0') pendiente,
                        IF(cd.est_paq = 3, '1', '0') motivado,
                        IF(cd.est_paq = 4, '1', '0') entregado,
                        1  as total                                                                                 
                    from comprobante c 
                    join comprobante_det cd on c.idcomprobante =  cd.idcomprobante
                    left join despacho_det dd on cd.iddet=dd.idapoyo                
                    left join despacho d on d.iddespacho = dd.iddespacho                                                                                
                    left join adm_locales al on c.idlocales=al.idlocales 
                    left join conf_giros cg on al.idgiros=cg.idgiros 
                    left join ciudad_distrito cdd on al.lo_ciudad=cdd.iddistrito                              
                    WHERE  ".$query." ");                
            }else {
                return 0;
            }
        }       

        public function tbl_orden($dt)
        {   $query='1=1 ';
            $serie = $dt['tipo_documento'];
            $numero = str_pad($dt[nro_comprobante], 6, '0', STR_PAD_LEFT);
            
            if ($serie=='99' or $serie=='0') {
                // if ($dt[idorden]!="") {$query.=" AND o.idorden=".$dt[idorden]; }
                if ($dt[serie]!="0005") {$query.=" AND o.or_serie='".$dt[serie]."'"; }
                if ($dt[nro_comprobante]!="") {$query.=" AND o.or_numero='".$numero."'"; }
                if ($dt[id_locales]!="") {$query.=" AND o.idlocal=".$dt[id_locales];}
                if ($dt[estado]!="0") {$query.=" AND ap.estado=".$dt[estado];}
                if ($dt[filtro_fecha]=="4") {$query.=" and DATE_FORMAT(o.fecha_ingreso, '%Y-%m-%d') between '".$dt['inicio']."' and '".$dt['fin']."' ";}      
                elseif($dt[filtro_fecha]=="3"){ $query.=" and YEAR(o.fecha_ingreso)=".$dt['anio'];}
                elseif($dt[filtro_fecha]=="2"){$query.=" and MONTH(o.fecha_ingreso)='".$dt['mes']."'and YEAR(o.fecha_ingreso)=".$dt['anio'] ;}
                elseif($dt[filtro_fecha]=="1"){$query.=" and DAY(o.fecha_ingreso)='".$dt['dia']."' and MONTH(o.fecha_ingreso)='".$dt['mes']."'and YEAR(o.fecha_ingreso)=".$dt['anio'];}
                else{}
                
              
                return $this->select("SELECT *,                     
                        sum(ap.estado = '0')  as noasignado,
                        sum(ap.estado = '1')  as asignado,
                        sum(ap.estado = '2')  as pendiente,
                        sum(ap.estado = '3')  as motivado,
                        sum(ap.estado = '4')  as entregado,
                        count(ap.idorden)  as total 	
                    from orden o
                    LEFT JOIN apoyo_postal ap on ap.idorden = o.idorden
                    LEFT JOIN cotizacion c on c.idcotizacion = o.idcotizacion
                    LEFT JOIN clientes cl on cl.idclientes = c.idclientes   
                    left join adm_locales al on o.idlocal=al.idlocales 
                    left join conf_giros cg on al.idgiros=cg.idgiros 
                    left join ciudad_distrito cdd on al.lo_ciudad=cdd.iddistrito                                
                where ".$query."  GROUP BY o.idorden");   
               
            }else{
                return 0;
                // LEFT JOIN despacho_det dd on dd.idapoyo = ap.idapoyo
            }
        }

        public function Locales()
        {
             return $this->select("SELECT * FROM adm_locales WHERE idgiros=95");
        }
    }
 ?>

