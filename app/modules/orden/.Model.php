<?php session_start();
    class Mod extends database{

        public function serie(){
            return $this->select("SELECT (tr_num+1) as num from orden_trabajo order by idtrabajo desc limit 1");
        }
         public function cre_orden($dt){      

            $orden = $dt[serie].'-'.$dt[numero];

             if($dt[detcc] and $dt[correo_para] and $dt[numero]){
                $id=$this->insertar("INSERT INTO `orden`( `iduser`, `idgiro`, `idlocal`, `or_tipo`, `idcotizacion`, `or_serie`, `or_numero`, `fecha_ingreso`, `fecha_inicio`, `fecha_vencimiento`, `fecha_devolucion`, `or_detalle`, `or_producto`) VALUES (".$_SESSION[fasklog][iduser].",".$_SESSION[fasklog][idgiros].",".$_SESSION[fasklog][local_pre].",".$dt[tipo].",'".$dt[idcotizacion]."','".$dt[serie]."','".$dt[numero]."',NOW(),'".$dt[fecha_inicio]."','".$dt[fecha_vencimiento]."','".$dt[fecha_devolucion]."','".$dt[detalle]."','".$dt[producto]."')" );
                   
                if ($id) {
                    $ot = $this->insertar("INSERT INTO `orden_trabajo`(`idorden`, `tr_serie`, `tr_num`, `tr_fecha`, `tr_iddigit`, `tr_obdigit`, `tr_segdigit`, `tr_cridigit`, `tr_candigit`, `tr_idhabil`, `tr_obhabil`, `tr_idopera`, `tr_obopera`, `tr_nviopera`, `tr_tmpopera`, `tr_fiopera`, `tr_ffopera`, `tr_flclient`, `tr_hrclient`, `tr_liqclient`) VALUES (".$id.",'".$dt[t_serie]."','".$dt[t_numero]."',NOW(),'".$dt[digit_ids]."','".$dt[digit_observacion]."','".$dt[digit_segment]."','".$dt[digit_criterio]."','".$dt[digit_cantidad]."','".$dt[habil_ids]."','".$dt[habil_observacion]."','".$dt[opera_ids]."','".$dt[opera_observacion]."','".$dt[opera_nvisita]."','".$dt[opera_tvisita]."','".$dt[opera_inicio]."','".$dt[opera_fin]."','".$dt[clien_fecha]."','".$dt[clien_hora]."','".$dt[clien_liqui]."')");

                    $array = explode(",", substr($dt[detcc], 0, -1));
                    $temp = explode(",", substr($dt[local], 0, -1));                   
                       
                    $longitud = count($array);

                       for($i=0; $i<$longitud; $i++)
                          {   
                           $dt=$this->ejecutar("INSERT INTO `orden_det`( `idservicio`, `idorden`, `cantidad`) VALUES (".$array[$i].",".$id.",".$temp[$i].")");

                            $cantidad = $temp[$i];

                            for ($j=0; $j < $cantidad; $j++) { 
                                $item = $j+1;

                                $item2 = str_pad($item, 6, "0", STR_PAD_LEFT);

                                $codigo=$orden.'-'.$item2;

                                $dt=$this->ejecutar("INSERT INTO `apoyo_postal` (
                                    `idorden`,                                    
                                    `iduser`,
                                    `idservicio`,
                                    `item`,
                                    `etiqueta`,
                                    `cargo`,
                                    `estado`) 
                                VALUES ('".$id."','".$_SESSION[fasklog][iduser]."','".$array[$i]."','".$item2."','".$codigo."','0','0');");  

                            }
                          }                   
                }else{
                    return 0;
                }
                 return $id;
            }else{
                return 0;
            }

                     
        }


        public function lista_orden(){ 
            return $this->select("SELECT or_serie, or_numero,fecha_ingreso,fecha_inicio, fecha_vencimiento, co_serie, num , cl.cl_nombres FROM `orden` o JOIN cotizacion ct on o.idcotizacion = ct.idcotizacion JOIN clientes cl ON ct.idclientes = cl.idclientes where o.idlocal=".$_SESSION['fasklog']['local_pre']);
        }
        public function list_glosa($id){ 
            return $this->select("SELECT * FROM `glosa` where gl_tipo =".$id);
        }

        public function list_origen(){ 
            return $this->select(" SELECT idreenlocal,re_nombre,re_cobertura FROM `reen_local`");
        }
        public function list_distritos($id){ 
            return $this->select("SELECT iddistrito,nombre from ciudad_distrito where iddistrito IN ($id)");
        }
        public function list_destino(){ 
            return $this->select(" SELECT ren_nombre,ren_cobertura FROM `reen_nacional` ");
        }               

         public function list_correo(){ 
            return $this->select("SELECT pe_nombres, pe_apellidos,pe_mail  FROM `personal` WHERE pe_mail !=''");
        }

        public function cotizacion($id,$id2){
            return $this->select("SELECT idcotizacion,co_fecha,co_serie,num,cl_nombres,cl_numdoc,cl_direccion,cl_correo,cl_telefono,co_nombres,ar_nombre,co_telefono,co_correo,co_texto  FROM `cotizacion` c 
                join clientes cl on c.idclientes = cl.idclientes  
                left join contacto co on c.idcontacto = co.idcontacto  
                left join area_contacto ac on co.idarea = ac.idarea where co_idgiro=".$_SESSION['fasklog']['idgiros']." and co_serie='".$id2."' and c.co_estado=1 and num='".$id."' ");
        }

        public function detalle($dt){

            $numero =  explode('-/', $dt)[0] ;
            $serie =  explode('-/', $dt)[1] ;

            return $this->select("SELECT ct.iddet as iddet , s.se_descripcion as se_descripcion ,sn.no_nombre as no_nombre,sa.am_nombre as am_nombre,sd.de_descripcion ,sd.idambito,precio_recojo,precio_entrega,total_reen,total_muestra,total_gestiones,total_seguro,total_transporte,cantidad,km_precio,km_adicional,total,sd.entrega_nacional,tipo_recojo,tipo_entrega, sd.venc as v,sd.devol as d FROM `cotizacion_det` ct
                JOIN cotizacion c on ct.idcotizacion=c.idcotizacion
               JOIN servicios_det sd on ct.idprod = sd.iddet
        JOIN servicios s on sd.idservicios = s.idservicios
        JOIN servicio_nom sn on sd.idnom = sn.idnom
        JOIN servicio_ambito sa on sd.idambito = sa.idambito  WHERE  c.co_estado=1 and c.num='".$numero."' and c.co_serie='".$serie."' ");  
        }

        public function sel1(){ 
            if (!$_SESSION['fasklog']['local_pre']) {
                return $this->select("SELECT cl.idseries as series,se_tipo AS id from conf_series_locales cl inner join conf_series cs on cl.idseries=cs.idseries where se_tipo='99'");
            }else{
                return $this->select("SELECT cl.idseries as series,se_tipo AS id from conf_series_locales cl inner join conf_series cs on cl.idseries=cs.idseries where cl.idlocales=".$_SESSION['fasklog']['local_pre']." and se_tipo='99'");
            }
        }
        public function sel2($dt){             
            //return $this->select("SELECT ifnull(max(or_numero)+1,1) as num from orden where or_tipo=1 order by idorden desc limit 1");

            return $this->select("SELECT IFNULL(max(or_numero)+1,1) as num from orden where or_serie='".$dt."'");
        }
        public function sel3($num){ 
            return $this->select("SELECT * FROM clientes where cl_numdoc='".$num."'");
        }
        public function sel4($num){ 
            return $this->select("SELECT * FROM contacto where idclientes=".$num);
        }
        public function sel5($num){ 
            return $this->select("SELECT * FROM contacto where idcontacto=".$num);
        }
        public function sel6(){ 
            if (!$_SESSION['fasklog']['local_pre']) {
                return $this->select("SELECT idpersonal,pe_apellidos, pe_nombres, ca_descripcion FROM personal p left join personal_cargo pc on p.idpersonalcargo=pc.idpersonalcargo ");
            }else{echo 2;
                return $this->select("SELECT idpersonal,pe_apellidos, pe_nombres, ca_descripcion FROM personal p left join personal_cargo pc on p.idpersonalcargo=pc.idpersonalcargo  WHERE idlocales=".$_SESSION['fasklog']['local_pre']);
            }
        }
        public function sel7(){ 
            if (!$_SESSION['fasklog']['local_pre']) {
                return $this->select("SELECT s.idservicios,se_descripcion FROM servicios s inner join servicios_local sl on s.idservicios=sl.idservicios");
            }else{
                echo "SELECT idservicios,se_descripcion FROM servicios s inner join servicios_local sl on s.idservicios=sl.idservicios  WHERE sl.idlocales=".$_SESSION['fasklog']['local_pre'];
                return $this->select("SELECT s.idservicios,se_descripcion FROM servicios s inner join servicios_local sl on s.idservicios=sl.idservicios  WHERE sl.idlocales=".$_SESSION['fasklog']['local_pre']);
            }
        }
    }
 ?>