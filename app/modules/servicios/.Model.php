<?php 
    class Mod extends database{
        public function tabla1(){ 
            return $this->select("SELECT p.idproducto,pr_codigo, pr_nombre, ca_nombre, pr_costo,pr_stock, pr_min,ca_nombre as cat, pr_estado FROM producto p left join producto_categoria pc on p.idcategoria=pc.idcategoria WHERE pr_tipo=0");
        }
        public function mod1($dt){ 
            if ($dt) {
                return $this->select("SELECT p.idproducto, pr_codigo, idcategoria, pr_nombre, pr_costo,  pr_stock, pr_min, pr_imagen, pr_estado,pre_descrip, pre_precio,pre_unidades,p.idmarca,pr_cod_fabr  from producto p left join producto_presentacion pp on pp.idproducto=p.idproducto where p.idproducto=".$dt." order by pp.pre_unidades asc limit 1");
            }
        }
        public function categorias(){ 
            return $this->select("SELECT * from producto_categoria where ca_tipo=1");
        }
        public function del1($id){ 
            return $this->ejecutar("DELETE from producto WHERE idproducto=".$id);
        }
        public function insert1($dt){ 
            if ($dt[id]) { 
                return $this->ejecutar("UPDATE producto SET pr_codigo='".$dt[cod_prod]."',idcategoria=".$dt[cat].",pr_nombre='".$dt[nom]."',pr_costo='".$dt[cost]."',pr_estado='".$dt[est]."',pr_user_mod=".$_SESSION[fasklog][iduser].", pr_fech_mod='".date('Y-m-d')."' WHERE idproducto=".$dt[id]);
            }else{
                return $this->insertar("INSERT INTO producto(pr_codigo, idcategoria, pr_nombre, pr_costo, pr_estado, pr_user_crea, pr_fech_crea, idmarca, pr_tipo) VALUES ('".$dt[cod_prod]."',".$dt[cat].", '".$dt[nom]."','".$dt[cost]."','".$dt[est]."',".$_SESSION[fasklog][iduser].",'".date('Y-m-d')."',".$dt[marca].",0)");
            }
        }
    }
 ?>

