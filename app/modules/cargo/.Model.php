<?php 

    class Mod extends database{

        public function tabla1($id){   

            return $this->select("SELECT ap.idapoyo, CONCAT(o.or_serie,'-',o.or_numero)  as cod_orden, ap.etiqueta as cod_apoyo, cd.tipo_recojo,cd.tipo_entrega,o.fecha_ingreso,o.fecha_inicio,o.fecha_vencimiento, sd.de_descripcion as servicio, ap.estado as estado, cl.cl_nombres as cliente, ct.co_nombres as contacto, ac.ar_nombre as cargo

            FROM apoyo_postal ap
            join orden o on ap.idorden = o.idorden 
            join cotizacion c on  o.idcotizacion = c.idcotizacion
            join clientes cl on c.idclientes = cl.idclientes
            left join contacto ct  on c.idcontacto = ct.idcontacto
            left join area_contacto ac on ct.idarea = ac.idarea
            join orden_det od on od.idorden = o.idorden 
            join cotizacion_det cd on od.idservicio = cd.iddet
            join servicios_det sd on cd.idprod = sd.iddet ".(($id)?'WHERE ap.estado='.$id:'' ) );

        }

         public function apoyo_postal($id){               
            return $this->select("SELECT * FROM apoyo_postal where idapoyo=".$id);    
        }

       /* public function tabla1($dt){ 
        	$sq=" v.estado=".$dt[estado]." AND v.obs LIKE '%".$dt[buscar]."%' ";

        	if ($dt[part]!="") {
        		$sq.=" AND v.partida=".$dt[part];
        	}

        	if ($dt[dest]!="") {
        		$sq.=" AND v.llegada=".$dt[dest];
        	}

        	if ($dt[f1]!="" && $dt[f2]!="") {
        		$sq.=" AND (fecha BETWEEN '".$dt[f1]."' and '".$dt[f2]."') ";
        	}

        	if ($dt[conduc]!="") {
        		$sq.=" AND ch.ID=".$dt[conduc];
        	}

        	if ($dt[vehic]!="") {
        		$sq.=" AND vh.ID=".$dt[vehic];
        	}        

            return $this->select("SELECT v.ID, DATE_FORMAT(v.fecha, '%d/%m/%Y') as fecha, DATE_FORMAT(v.hora, '%h:%i %p') as hora, l1.Descrip as part, l2.Descrip as dest,v.obs as obs, IF(v.estado=1,'Terminado','Pendiente') as estado, ch.Nom as chof, ch.Lic as lic, vh.placa as veh, v.obs as obs, (SELECT m.ID FROM manifiesto m WHERE m.idViaje=v.ID) as man  FROM viajes v INNER JOIN lugares l1 ON v.partida=l1.ID INNER JOIN lugares l2 ON v.llegada=l2.ID INNER JOIN choferes ch ON v.chofer=ch.ID INNER JOIN vehiculos vh ON v.vehiculo=vh.ID WHERE ".$sq."  LIMIT 1000");

        }*/

        public function vDet($Id){      
            return $this->select("SELECT 
                    ap.etiqueta,
                    o.fecha_vencimiento,
                    cl.cl_nombres,
                    o.or_producto,

                    (SELECT count(dest.iddet) FROM despacho_det dest
                     
                     join apoyo_postal apoy on dest.idapoyo = apoy.idapoyo 
                     
                     WHERE apoy.idorden=o.idorden) as cantidad

                    FROM `despacho_det` dt
                    join apoyo_postal ap  on dt.idapoyo = ap.idapoyo
                    join orden o on ap.idorden = o.idorden
                    join cotizacion c on o.idcotizacion = c.idcotizacion
                    join clientes cl on c.idclientes = cl.idclientes
                     WHERE dt.iddespacho = ".$Id."
                    group by ap.idorden ");
        }

         public function vDetalle($Id){      
            return $this->select("SELECT 
                                d.iddespacho,
                                d.de_codigo,
                                d.de_fecha,
                                d.de_hora,
                                d.de_tipo,
                                d.de_observacion,
                                CONCAT(p.pe_apellidos,', ', p.pe_nombres) As responsable,
                                (SELECT count(dt.iddet) FROM despacho_det dt WHERE dt.iddespacho=d.iddespacho) as cantidad,
                                pca.ca_descripcion as tper
                                FROM `despacho` d 
                                join personal p on d.idpersonal = p.idpersonal
                                join personal_contratos pc on p.idpersonal = pc.idpersonal
                                join personal_cargo pca on pc.idpersonalcargo = pca.idpersonalcargo
                                WHERE  d.iddespacho = ".$Id." and d.idusuario =".$_SESSION['fasklog']['iduser'] );
        }

        public function vIndicador(){      
            return $this->select("SELECT                                 
                   sum(estado = '0')  as nuevos, 
                   sum(estado = '1')  as base, 
                   sum(estado = '2')  as impreso, 
                   sum(estado = '3')  as habilitado, 
                   sum(estado = '4')  as pendientes,  
                   sum(estado = '5')  as asignados, 
                   sum(estado = '6')  as motivados,
                   sum(estado = '7')  as entregados    
                   FROM `apoyo_postal`    
            ");
        }        

        public function cre_despacho($dt){       

         //   print_r($dt) ;
    
            if($dt[idapoyo]>0 ){
                return $this->ejecutar("UPDATE `apoyo_postal` SET fecha ='".date("Y-m-d H:i:s")."', estado ='".$dt[estado]."', `motivo` = '".$dt[motivo]."', `tipo` = '".$dt[tipo]."', `cargo` = '".$dt[cargo]."', `Inmueble` = '".$dt[inmueble]."', `piso` = '".$dt[piso]."', `color` = '".$dt[color]."', `puerta` = '".$dt[puerta]."', `observaciones` = '".$dt[observaciones]."' WHERE `apoyo_postal`.`idapoyo` = '".$dt[idapoyo]."'");
            }           
        }

        public function selCargos($dt){              
        
               return $this->select("SELECT * FROM personal_cargo where ca_ambito=".$dt);                
        }
         public function selPersonal($dt){                      
               return $this->select("SELECT * FROM personal_contratos pc 
                join personal p on pc.idpersonal=p.idpersonal
                where pc.idpersonalcargo=".$dt);                
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

         public function del1($dt){ 

            $id=$this->ejecutar("DELETE FROM despacho_temp WHERE idtemp=".explode('-/', $dt)[0]);
  
            if ($dt) {
                return $dt=$this->ejecutar("UPDATE apoyo_postal SET estado=4  WHERE idapoyo= ".explode('-/', $dt)[1]);                
            }else{
                return 0;
            }

        }

         public function mod1($dt){

            return $this->select('SELECT p.idpersonal, pe_dni, pe_nombres, pe_apellidos, co_mensajero FROM personal p inner join personal_contratos pc on p.idpersonal=pc.idpersonal WHERE co_liquidado=1');
        }

          public function paquete($dt){

                $fac = explode('-', $dt);
                $serie= $fac[0].'-'.$fac[1].'-'.$fac[2];
                $numero= $fac[2];
                //item=".$numero." and
                return $this->select("SELECT idapoyo,persona,direccion,distrito,if(CONVERT(cargo USING utf8) = '0', '/./../app/recursos/img/img_base.png', CONCAT('',CONVERT(cargo USING utf8)))as cargo FROM apoyo_postal where estado=5 and  etiqueta='".$serie."' ");    
            
        }
      
        public function tabla2($dt){  

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

        public function vVi($dt){       	

      /*  	return $this->select("SELECT DATE_FORMAT(v.fecha, '%d/%m/%Y') as fecha, DATE_FORMAT(v.hora, '%H:%i:%p') as hora, vh.placa as vehiculo, c.Nom as chofer, CONCAT(l1.Descrip,' - ',l2.Descrip) as ruta, `obs`, `estado`,(SELECT m.ID FROM manifiesto m WHERE m.idViaje=v.ID) as man FROM viajes v INNER JOIN choferes c ON v.chofer=c.ID INNER JOIN vehiculos vh ON v.vehiculo=vh.ID INNER JOIN lugares l1 ON l1.ID=v.partida INNER JOIN lugares l2 ON l2.ID=v.llegada WHERE v.ID=".$dt);
*/
        }
        public function vViM($dt){           

            return $this->select("SELECT DATE_FORMAT(v.fecha, '%d/%m/%Y') as fecha, DATE_FORMAT(v.hora, '%H:%i:%p') as hora, vh.placa as vehiculo, c.Nom as chofer, CONCAT(l1.Descrip,' - ',l2.Descrip) as ruta, `obs`, `estado`,(SELECT m.ID FROM manifiesto m WHERE m.idViaje=v.ID) as man, c.Lic as lic, vh.marca as marca FROM viajes v INNER JOIN choferes c ON v.chofer=c.ID INNER JOIN vehiculos vh ON v.vehiculo=vh.ID INNER JOIN lugares l1 ON l1.ID=v.partida INNER JOIN lugares l2 ON l2.ID=v.llegada INNER JOIN manifiesto m ON m.idViaje=v.ID WHERE m.ID=".$dt);

        }

        public function detMani($dt){ 

         /*   return $this->select("SELECT g.nr_guia, pr.NomPer as remit,pd.NomPer as desti, (SELECT CONCAT(c.Serie,'-',c.Numero) FROM comprobante c WHERE c.nr_orden=g.ID AND c.TipDocEmisor!='07') as comp,(SELECT c.TipDocEmisor FROM comprobante c WHERE c.nr_orden=g.ID AND c.TipDocEmisor!='07') as tip, (SELECT SUM(gd.flete) FROM guia_detalle gd WHERE gd.idGuia=g.ID) as total FROM guia g INNER JOIN personas pr ON pr.ID=g.idRemitente INNER JOIN personas pd ON pd.ID=g.idDestinatario WHERE ISNULL((SELECT nc.ID FROM comprobante cc INNER JOIN comprobante nc ON nc.DocRef=CONCAT(cc.Serie,'-',LPAD(cc.Numero,6,'0')) WHERE cc.nr_orden=g.ID AND cc.TipDocEmisor!='07'))=1 AND g.idViaje=".$dt);
         */

        }
        public function detManiPrint($dt){ 
            return $this->select("SELECT g.nr_guia, pr.NomPer as remit, pd.NomPer as desti,(SELECT CONCAT(c.Serie,'-',c.Numero) FROM comprobante c WHERE c.nr_orden=g.ID AND c.TipDocEmisor!='07') as comp, (SELECT SUM(gd.flete) FROM guia_detalle gd WHERE gd.idGuia=g.ID) as total,(SELECT ll.Direcc FROM comprobante c INNER JOIN lugares ll ON c.lote_venta=ll.ID WHERE c.nr_orden=g.ID) as destino FROM guia g INNER JOIN personas pr ON pr.ID=g.idRemitente INNER JOIN personas pd ON pd.ID=g.idDestinatario  INNER JOIN viajes v ON g.idViaje=v.ID INNER JOIN manifiesto m ON m.idViaje=v.ID WHERE ISNULL((SELECT nc.ID FROM comprobante cc INNER JOIN comprobante nc ON nc.DocRef=CONCAT(cc.Serie,'-',LPAD(cc.Numero,6,'0')) WHERE cc.nr_orden=g.ID AND cc.TipDocEmisor!='07'))=1 AND m.ID=".$dt);

        }

        public function vLugs($dt){ 

            /*return $this->select("SELECT ID,Descrip from lugares where Est=1 ORDER BY Descrip");*/

        }

        public function vCon($dt){ 

        /*    return $this->select("SELECT `ID`, `Nom`, `Lic` FROM `choferes` WHERE `est`=1 ORDER BY Nom ASC");
*/
        }

        public function vVeh($dt){ 

        /*    return $this->select("SELECT `ID`, `placa` FROM `vehiculos` WHERE `est`=1 AND `idCat`=1 ORDER BY placa ASC");*/

        }

        public function iti($dt){ 

            return $this->select("SELECT r.ID,l2.Descrip as des, r.prec from rutas r  inner join lugares l2 on r.dest=l2.ID WHERE idRut=".explode('-/', $dt)[1]." ORDER BY r.prec ");

        }

        public function vMod($dt){ 

            return $this->select("SELECT ID,Descrip from vehiculos_cat where Est=1");

        }

        public function vRut($dt){ 

             return $this->select("SELECT r.ID,l.Descrip,l2.Descrip, r.est,r.part,r.dest,prec,hora, dias from rutas r inner join lugares l on r.part=l.ID inner join lugares l2 on r.dest=l2.ID WHERE r.ID=".$dt);

        }

        public function saveMani($dt){

        	date_default_timezone_set('America/Lima');

			$fecha= date("Y-m-d H:i:s"); 



            return $this->select("CALL save_manifiesto('".$dt."','".$fecha."','".$_SESSION['pan'][0]."');");

        }

        public function saveViaje($dt){ 

        	date_default_timezone_set('America/Lima');
			$fecha= date("Y-m-d H:i:s"); 

            return $this->update("INSERT INTO `viajes`(`usuario`, `fecha_creacion`, `fecha`, `hora`, `vehiculo`,`chofer`,`partida`, `llegada`, `obs`, `estado`) VALUES (".$_SESSION['pan'][0].",'".$fecha."','".$dt[fec]."','".$dt[hor]."','".$dt[veh]."','".$dt[cond]."','".$dt[part]."','".$dt[dest]."','".$dt[obs]."',0)");

        }

        public function upViaje($dt){
        	return $this->update("UPDATE `viajes` SET `fecha`='".$dt[fec]."',`hora`='".$dt[hor]."',`vehiculo`='".$dt[veh]."',`chofer`='".$dt[cond]."',`partida`='".$dt[part]."',`llegada`='".$dt[dest]."',`obs`='".$dt[obs]."' WHERE `ID`=".$dt[id]);
        }

        public function anularMani($dt){            
            return $this->select("CALL `anularManifiesto`(".$dt.");");
        }

        public function nIt($dt){ 
            return $this->update("INSERT IGNORE INTO rutas(`idRut`, `part`, `dest`, `prec`, `est`, `tp`) SELECT ".explode('-/', $dt['id'])[1].",0,".$dt['dest'].",'".$dt['prec']."',1,2 FROM dual WHERE NOT EXISTS (SELECT ID from rutas where dest=".$dt['dest']." and idRut=".explode('-/', $dt['id'])[1]."  LIMIT 1);");
        }

        public function dIt($dt){ 
            return $this->update("DELETE from rutas where ID=".$dt);
        }

        public function dRut($dt){ 
            return $this->update("DELETE from viajes where ID=".$dt);
        }

    }

 ?>

