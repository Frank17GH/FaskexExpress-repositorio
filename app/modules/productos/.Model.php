<?php 
    class Mod extends database{
        public function tabla1(){ 
            return $this->select("SELECT p.idproducto,pr_codigo, pr_nombre, ca_nombre, ma_descripcion as marca, al.lo_abreviatura, (SELECT pre_precio from producto_presentacion pp WHERE pp.idproducto=p.idproducto order by pre_unidades asc limit 1) as prec,pr_stock, pr_min,ca_nombre as cat, pr_imagen FROM producto p left join producto_categoria pc on p.idcategoria=pc.idcategoria left join producto_marca pm on p.idmarca=pm.idmarca inner join adm_locales al on p.idlocales=al.idlocales");
        }
        public function mod1($dt){ 
            if ($dt) {
                return $this->select("SELECT p.idproducto, pr_codigo, idcategoria, pr_nombre, pr_costo,  pr_stock, pr_min, pr_imagen, pr_estado,pre_descrip, pre_precio,pre_unidades,p.idmarca,pr_cod_fabr  from producto p left join producto_presentacion pp on pp.idproducto=p.idproducto where p.idproducto=".$dt." order by pp.pre_unidades asc limit 1");
            }
        }
        public function mod2($dt){ 
            return $this->select("SELECT * from producto_presentacion where idproducto=".$dt);
        }
        public function medida($dt){ 
            return $this->select("SELECT * from conf_medida where me_estado=1");
        }
        public function categorias(){ 
            return $this->select("SELECT * from producto_categoria where ca_tipo=0");
        }
        public function marcas(){ 
            return $this->select("SELECT * from producto_marca");
        }
        public function marca(){ 
            return $this->select("SELECT * from producto_marca");
        }
        public function locales(){ 
            if (!$_SESSION[fasklog][tipo]) {
                return $this->select("SELECT idlocales, lo_abreviatura, lo_direccion from adm_locales WHERE idgiros=".$_SESSION[fasklog][idgiros]);
            }else{
                return $this->select("SELECT al.idlocales, lo_abreviatura, lo_direccion from conf_user_locales cu inner join adm_locales al on cu.idlocales=al.idlocales WHERE cu.iduser=".$_SESSION[fasklog][iduser]);
            }
            
        }
        public function insert2($dt){ 
            return $this->insertar("INSERT INTO producto_presentacion(idproducto, idmedida, pre_descrip, pre_unidades, pre_precio) VALUES (".$dt['id'].",'".$dt['pres']."','".$dt['des']."',".$dt['cant'].",".$dt['precio'].")");
        }
        public function insert1($id, $cod_prod=0, $cod_fab=0, $marca, $cat, $est, $stock, $nom, $cost, $stock_min, $imagen,$medida,$precio){ 
            if (!$cod_fab) {$cod_fab=0;}
                if (!$stock_min) {$stock_min=0;}
            if ($id) { 
                if ($imagen) {
                    return $this->ejecutar("UPDATE producto SET pr_codigo='$cod_prod',pr_cod_fabr=$cod_fab,idcategoria=$cat,idmarca=$marca,pr_nombre='$nom',pr_costo=$cost,pr_min=$stock_min,pr_imagen='.$imagen',pr_control_stock=1,pr_estado=$est,pr_user_mod=".$_SESSION[fasklog][iduser].", pr_fech_mod='".date('Y-m-d')."' WHERE idproducto=".$id);
                }else{
                    return $this->ejecutar("UPDATE producto SET pr_codigo='$cod_prod',pr_cod_fabr=$cod_fab,idcategoria=$cat,idmarca=$marca,pr_nombre='$nom',pr_costo=$cost,pr_min=$stock_min,pr_control_stock=1,pr_estado=$est,pr_user_mod=".$_SESSION[fasklog][iduser].", pr_fech_mod='".date('Y-m-d')."' WHERE idproducto=".$id);
                }
            }else{
                if ($imagen) {
                    $prod= $this->insertar("INSERT INTO producto(pr_codigo, pr_cod_fabr, idcategoria, idmarca, pr_nombre, pr_costo, pr_stock, pr_min, pr_imagen, pr_control_stock, pr_estado, idlocales, pr_user_crea, pr_fech_crea) VALUES ('".$cod_prod."','".$cod_fab."',".$cat.", ".$marca.",'".$nom."',".$cost.",'".$stock."',".$stock_min.",'.$imagen',1,".$est.",".$_SESSION[fasklog][local_pre].",".$_SESSION[fasklog][iduser].",'".date('Y-m-d')."')");
                }else{
                    $prod= $this->insertar("INSERT INTO producto(pr_codigo, pr_cod_fabr, idcategoria, idmarca, pr_nombre, pr_costo, pr_stock, pr_min,  pr_control_stock, pr_estado, idlocales, pr_user_crea, pr_fech_crea) VALUES ('".$cod_prod."','".$cod_fab."',".$cat.", ".$marca.",'".$nom."',".$cost.",'".$stock."',".$stock_min.",1,".$est.",".$_SESSION[fasklog][local_pre].",".$_SESSION[fasklog][iduser].",'".date('Y-m-d')."')");
                }
                
                if ($prod) {
                    $prec= $this->insertar("INSERT INTO `producto_presentacion`(`idproducto`, `idmedida`, `pre_descrip`, `pre_unidades`, `pre_precio`) VALUES (".$prod.",'".$medida."','".$medida."',1,'".$precio."')");
                    return $prod;
                }else{
                    return $prod;
                }
            }
            
        }
        public function del1($dt1,$dt2){ 
            return $this->ejecutar("DELETE FROM producto_presentacion WHERE idpresentacion=".$dt1." and 1<(select * from (SELECT count(idproducto) from producto_presentacion WHERE idproducto=".$dt2.") t)");
        }
        public function del2($id){ 
            $del= $this->ejecutar("DELETE FROM producto WHERE idproducto=".$id);
            if ($del) {
                return $this->ejecutar("DELETE FROM producto_presentacion WHERE idproducto=".$id);
            }else{
                return $del;
            }
        }
    }
 ?>

