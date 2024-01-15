<?php 
    class Mod extends database{
        public function tabla1($dt){ 
        	if ($dt) {
        		return $this->select('SELECT * from asiento_categoria WHERE idcategoria='.$dt);
        	}else{
        		return $this->select('SELECT * from asiento_categoria');
        	}
        }
        public function tabla2($dt){ 
        	if ($dt) {
        		return $this->select('SELECT * from asiento a left join asiento_categoria c on a.idcategoria=c.idcategoria WHERE idasiento='.$dt);
        	}else{
        		return $this->select('SELECT * from asiento a left join asiento_categoria c on a.idcategoria=c.idcategoria');
        	}
        }
        public function mod2(){ 
			return $this->select('SELECT * from asiento_categoria WHERE ca_estado=1');
        	
        }
        public function del1($dt){ 
            return $this->ejecutar('DELETE FROM asiento_categoria WHERE idcategoria='.$dt);
        }
        public function del2($dt){ 
            return $this->ejecutar('DELETE FROM asiento WHERE idasiento='.$dt);
        }
        public function insert1($dt){ 
        	if ($dt[id]) {
        		return $this->ejecutar("UPDATE asiento_categoria SET ca_descripcion='".$dt[descrip]."', ca_estado=".$dt[est]." WHERE idcategoria=".$dt[id]);
        	}else{
        		return $this->ejecutar("INSERT INTO asiento_categoria(ca_descripcion,ca_estado) SELECT '".$dt[descrip]."',".$dt[est]." FROM dual WHERE NOT EXISTS (SELECT * FROM asiento_categoria WHERE ca_descripcion='".$dt[descrip]."')");
        	}
        }
        public function insert2($dt){ 
        	if ($dt[id]) {
        		return $this->ejecutar("UPDATE asiento SET idasiento=".$dt[cod].", as_descripcion='".$dt[descrip]."', as_estado=".$dt[est].", idcategoria=".$dt[cat]." WHERE idasiento=".$dt[cod]);
        	}else{
        		return $this->ejecutar("INSERT INTO asiento(idasiento, as_descripcion, idcategoria, as_estado) SELECT '".$dt[cod]."', '".$dt[descrip]."', ".$dt[cat].", ".$dt[est]." FROM dual WHERE NOT EXISTS (SELECT * FROM asiento WHERE as_descripcion='".$dt[descrip]."')");
        	}
        }
    }
 ?>

