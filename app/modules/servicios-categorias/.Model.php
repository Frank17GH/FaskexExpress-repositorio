<?php 
    class Mod extends database{
        public function tabla1($dt){ 
            if ($dt['estado']==3) {
                return $this->select("SELECT `idcategoria`, `ca_nombre`, `ca_tipo`, `ca_estado`, (SELECT COUNT(*) FROM producto p where p.idcategoria=pc.idcategoria) as cant from producto_categoria pc WHERE ca_tipo=2");
            }else{
                return $this->select("SELECT `idcategoria`, `ca_nombre`, `ca_tipo`, `ca_estado`, (SELECT COUNT(*) FROM producto p where p.idcategoria=pc.idcategoria) as cant from producto_categoria pc where ca_tipo=2 and ca_estado=".$dt['estado']);
            }
        }
        public function mod2($dt){ 
            return $this->select("SELECT * from producto_categoria where idcategoria=".$dt);
        }
        public function insert1($dt){
        	return $this->insertar("INSERT INTO `producto_categoria`(`ca_nombre`, `ca_tipo`, `ca_estado`) VALUES ('".$dt['nombre']."',2,".$dt['estado'].")");
        }
        public function del1($dt){
        	return $this->ejecutar("DELETE FROM producto_categoria WHERE idcategoria=".$dt." and 0=(SELECT COUNT(*) FROM producto where idcategoria=".$dt.")");
        }
        public function edit1($dt){
        	return $this->ejecutar("UPDATE producto_categoria set ca_nombre='".$dt['nombre']."', ca_estado='".$dt['estado']."' WHERE idcategoria=".$dt['id']);
        }
    }
 ?>

