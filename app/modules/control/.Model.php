<?php 
    class Mod extends database{

        public function resumen(){ 
            $query = $this->select("SELECT CONCAT(Nombres,' ',Apellidos), Ingre,Egre from caja_prins c inner join usuarios u on c.idUsu=u.ID where c.ID=1");
            return $query;
        } 
        public function tabla1($inf){ 
            $query = $this->select("(SELECT 'CAJA','INGRESO DE VENTAS' AS a,1,Fecha_fin,Total,ID from caja where Estado=0 and DATE_FORMAT(Aprob, '%Y-%m-%d') between '".$inf['inicio']."' and '".$inf['fin']."' and 1 in(".$inf['tip'].")) union (SELECT 'MOVIMIENTO', Descrip, Tip, Fecha,Monto,cm.ID from caja_movimiento cm left join caja cc on cc.ID=cm.idCaja where (cc.Estado=0 or cm.idCaja=0) and Tip in(".$inf['tip'].") and DATE_FORMAT(Fecha, '%Y-%m-%d') between '".$inf['inicio']."' and '".$inf['fin']."')");
            return $query;
        }
        public function valesCliente($id=0){
            $query = $this->select("SELECT g.ID, g.nr_guia,DATE_FORMAT(fecha_hora, '%d/%m/%Y') as fech,GROUP_CONCAT(gd.bultos,'-',gd.descrip) as detalle, SUM(gd.flete) as total, p.NomPer as destinatario, gd.peso, IF(gt.ID>0,1,0) as Sel FROM guia g INNER JOIN guia_detalle gd ON gd.idGuia=g.ID INNER JOIN personas p ON g.idDestinatario=p.ID LEFT JOIN guiasv_temp gt ON g.ID=gt.guia WHERE g.comp=0 AND (g.idRemitente=".$id." OR g.idDestinatario=".$id.") GROUP BY g.ID");
            return $query;
        }
        public function valesClienteFac($id=0){
            $query = $this->select("SELECT g.ID,gd.ID as idDET, g.nr_guia,DATE_FORMAT(fecha_hora, '%d/%m/%Y') as fech,gd.bultos,gd.descrip, gd.flete, p.NomPer as destinatario, gd.peso FROM guia g INNER JOIN guia_detalle gd ON gd.idGuia=g.ID INNER JOIN personas p ON g.idDestinatario=p.ID INNER JOIN guiasv_temp gt ON g.ID=gt.guia WHERE (g.idRemitente=".$id." OR g.idDestinatario=".$id.") ");
            return $query;
        }
        public function detGuia($id){
        	$query = $this->select("SELECT `descrip`, `flete` FROM `guia_detalle` WHERE `ID`=".$id);
            return $query;
        }
        public function actGuia($data){
        	$query = $this->insert("UPDATE `guia_detalle` SET `descrip`='".trim($data[descrip])."',`flete`=".$data[flete]." WHERE `ID`=".$data[id]);
            return $query;
        }
        public function Seleccionguia($id){
            $query = $this->select("CALL Seleccionguia(".$id.")");
            return $query[0];
        }
        public function savFac($data,$fecha){
        	
        	if ($data[td_CP]==1) {
        		$serie='F001';
        		$tdoc='01';
        	} else {
        		$serie='B001';
        		$tdoc='03';
        	}

        	$query = $this->select("CALL comprobante_insert_gvarios(".$_SESSION['pan'][0].", ".$data[idClientCP].", '".$serie."','".$fecha."','".$tdoc."');");
            return $query[0];
        }
        public function pendientes(){ 
            $query = $this->select("SELECT c.ID,CONCAT(Nombres,' ',Apellidos),c.Fin from caja c inner join usuarios u on c.idUsu=u.ID where c.Estado=2");
            return $query;
        }
        public function vCaja($id){ 
            $query = $this->select("SELECT CONCAT(Nombres,' ',Apellidos),CASE Turno when 1 then 'MAÑANA' when 2 then 'TARDE' when 3 then 'NOCHE' END,c.Estado,Fecha_inicio,Fecha_fin,c.Aprob from caja c inner join usuarios u on c.idUsu=u.ID where c.ID=".$id."");
            return $query;
        }
        public function vMCaja($id){ 
            $query = $this->select("SELECT CASE Tip when 1 then 'INGRESO' when 2 then 'EGRESO' END,Fecha,Monto from caja_movimiento where ID=".$id."");
            return $query;
        }
        public function ingresos($id){ 
            $query = $this->select("(SELECT Descrip, Monto from caja_movimiento where idCaja=".$id." and Tip=1) union (SELECT 'Apertura de Caja', Inicio from caja where ID=".$id.")");
            return $query;
        }
        public function egresos($id){ 
            $query = $this->select("SELECT Descrip, Monto from caja_movimiento where idCaja=".$id." and Tip=2");
            return $query;
        }
        public function ventas($id){ 
            $query = $this->select("SELECT sum(Total) from comprobante where idCaja=".$id." and Tippago=1");
            return $query;
        }
        public function nMov($info){ 
            $query = $this->select("CALL caja_prins_mov(".$info['tip'].",'".$info['motivo']."','".$info['fecha']."','".$info['mont']."',@a,@b)");
            return $query;
        }
        public function Cancel($id){ 
             $query = $this->select("CALL caja_update(".$id.",@a)");
            return $query;
        }
        public function savCaja($data){ 
            print_r($data);
             $query = $this->select("CALL caja_prins_insert_caja(".$data['id'].",".$data['tt'].",@a)");
            return $query;
        }
    }
 ?>

 