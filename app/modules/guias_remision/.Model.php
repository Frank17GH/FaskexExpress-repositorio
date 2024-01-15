<?php 
    class Mod extends database{
        public function addprod($data){ 
            if(!$data['guia_codigoprod']){$data['guia_codigoprod']=0;}
            return $this->ejecutar("INSERT INTO guia_temp(codigo, nombre, medida, cantidad, usuario_id, docref, flete) VALUES(".$data['guia_codigoprod'].", '".$data['guia_nomprod']."', '".$data['guia_medidaprod']."', ".$data['guia_cantprod'].",".$_SESSION[fasklog][iduser].", '".$data['guia_docref']."', '".$data['guia_flete']."')");
        }
        public function delbien($id){
            return $this->ejecutar("DELETE from guia_temp where id=".$id);
        }
        public function mostrarGuia($id){
            $query = $this->select("CALL mostrar_guia(".explode('-/', $id)[0].", ".$_SESSION[fasklog][iduser].")");
           return $query[0];
        }

        public function tabla1($id){ 
            return $this->select("SELECT * from guias where facturado=0");
        }
        public function viewChoferes($id){
            return $this->select("SELECT p.idpersonal as ID, CONCAT(pe_apellidos, ' ', pe_nombres) AS NomPer, pe_dni as licencia from personal p inner join personal_contratos pc on p.idpersonal=pc.idpersonal where idpersonalcargo in(12) AND co_estado=1");
        }
        public function viewPlacas($id){ 
            return $this->select("SELECT idvehiculos as id, ve_placa as placa, ve_marca as descripcion from vehiculos where ve_estado=1");
        }
        public function viajes($id){ 
            return $this->select("SELECT v.id, d.nombre as d1, s.lo_direccion as origen, d2.nombre as d2, s2.lo_direccion as destino from viajes v inner join adm_locales s on v.localOrigen_id=s.idlocales inner join ciudad_distrito d on s.lo_ciudad=d.iddistrito inner join adm_locales s2 on v.localDestino_id=s2.idlocales inner join ciudad_distrito d2 on s2.lo_ciudad=d2.iddistrito where v.estado=1 and local_id=".$_SESSION['fasklog']['local_pre']);
        }
        public function series($id){ 
            return $this->select("SELECT s.idseries as nombre, s.se_tipo as tipo from conf_series s inner join conf_series_locales cs on cs.idseries=s.idseries where se_tipo='09' and idlocales=".$_SESSION['fasklog']['local_pre']);
        }
        public function guias($id){ 
            $qy = '';
            if ($dt['estado']) {
                $qy .='and estadoEntrega='.$dt['estado'];
            }
            return $this->select("SELECT * from guia where facturado=0 ".$qy);
        }
        public function guardar($dt){
            if ($dt['quienPaga'] == 1) {
                $pago = 1;
            }else{
                $pago = 0;
            }
            if ($dt['quienPaga'] == 1) {
                $pago = 1;
            }else{
                $pago = 0;
            }
            $query = $this->select("CALL guia_insert(".$_SESSION[fasklog][iduser].", '".$dt['serie']."','".$dt['tipoGuia']."', '".$dt['fechaEmision']."', '".$dt['fechaTraslado']."', '".$dt['origenDoc']."', '".str_replace("'", "\'", $dt['origenNombre'])."', '".$dt['destinoDoc']."', '".str_replace("'", "\'", $dt['destinoNombre'])."', '".$dt['vehiculoPlaca1']."', '".$dt['vehiculoDescripcion1']."', '".$dt['conductorLicencia1']."', '".$dt['conductorNombres1']."', '".$dt['unidadMedida']."', '".$dt['peso']."', ".$dt['viaje'].", '".$dt['origen']."', '".$dt['destino']."', ".$dt['viaje'].", ".$dt['quienPaga'].", ".$pago.", '".$dt['placa_id']."', ".$dt['medioPago'].", ".$_SESSION['fasklog']['local_pre'].")");
           return $query[0];
        }
    }
?>