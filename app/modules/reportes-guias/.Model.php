<?php 
    class Mod extends database{
        public function tabla1($dt){
            $qy = '';
            if ($dt['sucursal']) {
                if ($dt['sucursal']==1) {
                    $qy = "and g.serie='V001'";
                }else{
                    $qy = "and g.serie='V002'";
                }
            }
            return $this->select("SELECT SUNAT, serie, correlativo, fechaEmision, destinoDoc, destinoNombre, id, (SELECT SUM(flete) FROM guia_detalle WHERE guia_id=g.id) as flete, facturado from guia g WHERE DATE_FORMAT(fechaEmision, '%Y-%m-%d') BETWEEN '".$dt['f_r1']."' AND '".$dt['f_r2']."' ".$qy);
        }
        public function sucursales($dt){ 
            return $this->select("SELECT * FROM sucursales");
        }
        public function guia($id=NULL){
            return $this->select("SELECT serie, correlativo, tipoGuia, fechaEmision, fechaTraslado, origenDireccion, CONCAT(dd.nombre, ' - ', p.nombre, ' - ', d.nombre) as ubi_origen, CONCAT(dd2.nombre, ' - ', p2.nombre, ' - ', d2.nombre) as ubi_destino, destinoDireccion, origenNombre, origenDoc, destinoNombre, origenDoc, unidadMedida, peso, destinoDoc, vehiculoPlaca1, vehiculoDescripcion1, qr, g.id, SUNAT, g.facturado FROM guia g inner join ciudad_distrito d on g.origenUbigeo=d.iddistrito inner join ciudad_provincia p on d.idprovincia=p.idprovincia inner join ciudad_departamento dd on p.iddepartamento=dd.iddepartamento inner join ciudad_distrito d2 on g.destinoUbigeo=d2.iddistrito inner join ciudad_provincia p2 on d2.idprovincia=p2.idprovincia inner join ciudad_departamento dd2 on p2.iddepartamento=dd2.iddepartamento where g.id=".$id);
        }
        public function detalleGuia($id=NULL){
            return $this->select("SELECT * from guia_detalle where guia_id=".$id);
        }
        public function delGuia($id){
            $query = $this->select("CALL guia_eliminar(".$id.")");
            return $query[0];
        }
        public function actDetalle($dt){
            return $this->update("UPDATE guia_detalle SET flete='".explode('-/', $dt)[1]."' WHERE id=".explode('-/', $dt)[0]);
        }
        public function anular($dt){ 
            $query = $this->select("CALL anular(".$dt.")");
            return $query[0];
        }
    }
 ?>