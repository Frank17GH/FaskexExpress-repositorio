<?php 
    class Mod extends database{
        public function printCpe($id=NULL){
            return $this->select("SELECT DISTINCT p.TipDoc As cTipoDocumentoAdquiriente,c.TipDocEmisor As cTipoDocumentoEmisor,p.NomPer as vcRazonSocialAdquiriente,c.Serie as ser, LPAD(c.Numero,6,'0') as num ,c.MontoGravado as vcMontoGravado,c.Total as total,c.Fecha as cFechaEmision,p.dni As vcRucAdquiriente, idDir As dir,c.DocRef as docref,c.IGV as vcMontoIGV,idCorreo as vcMail,c.ID,Tippago as pago,u.Nombres as pnom,u.Apellidos as papell, dias_credito, detraccion from comprobante c inner join personas p on c.CodPer=p.id left join usuarios u on c.idUsu=u.ID  WHERE  c.ID=".$id."");
        } 
        public function printCpeDet($id=NULL){
            return $this->select("SELECT Cant, (Cant*Unit) as vcMontoTributoLinea,Total, Descrip,Unit from comprobante_detalle where idVenta=".$id."");
        }
        public function printGuia($id=NULL){
            return $this->select("SELECT serie, correlativo, tipoGuia, fechaEmision, fechaTraslado, origenDireccion, CONCAT(dd.nombre, ' - ', p.nombre, ' - ', d.nombre) as ubi_origen, CONCAT(dd2.nombre, ' - ', p2.nombre, ' - ', d2.nombre) as ubi_destino, destinoDireccion, origenNombre, origenDoc, destinoNombre, origenDoc, unidadMedida, peso, destinoDoc, vehiculoPlaca1, vehiculoDescripcion1, qr, v.ve_inscripcion as habilitacion, v.mtc FROM guia g inner join ciudad_distrito d on g.origenUbigeo=d.iddistrito inner join ciudad_provincia p on d.idprovincia=p.idprovincia inner join ciudad_departamento dd on p.iddepartamento=dd.iddepartamento inner join ciudad_distrito d2 on g.destinoUbigeo=d2.iddistrito inner join ciudad_provincia p2 on d2.idprovincia=p2.idprovincia inner join ciudad_departamento dd2 on p2.iddepartamento=dd2.iddepartamento left join vehiculos v on g.vehiculoId=v.idvehiculos where g.id=".$id);   
        } 
        public function printGuiaDet($id=NULL){
            return $this->select("SELECT * from guia_detalle where guia_id=".$id);
        }
        public function printManifiesto($dt){
            return $this->select("SELECT m.idmanifiestos,d.nombre as ma_origen, d2.nombre as ma_destino, NomPer as nom, vm.descripcion as ve_marca, modelo as ve_modelo, placa as ve_placa, fecha_envio, ma_turno FROM manifiestos m inner join personas p on m.idpiloto=p.id inner join vehiculos v on m.idvehiculos=v.id left join vehiculos_marcas vm on v.marca_id=vm.id inner join viajes vv on m.viaje_id=vv.id left join sucursales s on vv.localOrigen_id=s.id inner join sucursales s2 on vv.localDestino_id=s2.id left join distritos d on s.ubigeo = d.id left join distritos d2 on s2.ubigeo = d2.id WHERE idmanifiestos=".$dt);
        }
        public function printManifiestoDet($dt){
            return $this->select("SELECT CONCAT(c.serie,'-',c.correlativo) AS ser, destinoNombre, cantidad, cd.nombre as detalle, flete FROM guia c inner join guia_detalle cd on c.id=cd.guia_id where  manifiesto_id=".$dt);
        }
    }
 ?>

