<?php 
    class Mod extends database{
        public function tabla1(){ 
            return $this->select("SELECT idservicios, se_descripcion, se_estado from servicios");
        }
        public function tabla2(){ 
            return $this->select("SELECT idcategoria, ca_descrip from servicios_categoria");
        }
        public function tabla_local($id){ 
            if($id){
                return $this->select("SELECT * from `reen_local` where idreenlocal=".$id);
            }else {
                return $this->select("SELECT idreenlocal, re_nombre, re_estado from `reen_local` ");
            }
            
        }
        public function distritos($id){ 
            return $this->select("SELECT iddistrito,nombre from ciudad_distrito WHERE idprovincia=1501 ");
        }
        public function tabla_nacional($id){

            if($id){
                return $this->select("SELECT idreennacional, ren_nombre from reen_nacional where idreennacional=".$id);
            }else {
                 return $this->select("SELECT idreennacional, ren_nombre, ren_estado from reen_nacional ");
            }
           
        }
        public function mod1($id){ 
            return $this->select("SELECT idservicios, se_descripcion, se_estado from servicios WHERE idservicios=".$id);
        }
        public function mod3($id){ 
            return $this->select("SELECT iddet, de_descripcion, de_estado, servicios_adicionales as det,idambito, recojo,entrega,entrega_nacional from servicios_det WHERE iddet=".$id);
        }
        public function mod3_2($id){ 
            return $this->select("SELECT idcategoria, ca_descrip from servicios_categoria WHERE ca_estado=1");
        }
        public function mod3_3($id){ 
            return $this->select("SELECT idadicionales, ad_descrip, ad_ver from servicios_adicionales WHERE idcategoria=".$id);
        }
        public function mod4($id){ 
            return $this->select("SELECT idcategoria, ca_descrip, ca_estado from servicios_categoria WHERE idcategoria=".$id);
        }
        public function mod4_2($id){ 
            return $this->select("SELECT idadicionales, ad_descrip, ad_ver from servicios_adicionales WHERE idcategoria=".$id);
        }
        public function mod1_2($id){ 
            return $this->select("SELECT iddet,idservicios,de_descripcion,de_estado,no_nombre,am_nombre from servicios_det sd JOIN servicio_nom sn on sd.idnom = sn.idnom join servicio_ambito sa on sd.idambito = sa.idambito  WHERE sd.idservicios=".$id);
        }
        public function del1($id){ 
            return $this->ejecutar("DELETE from servicios_det WHERE iddet=".$id);
        }
        public function del2($dt){ 
            return $this->ejecutar("DELETE from servicios_adicionales WHERE idadicionales=".$dt);
        }
        public function del3($dt){ 
            return $this->ejecutar("DELETE from servicios WHERE idservicios=".$dt);
        }
        public function up1($dt){ 
            return $this->ejecutar("UPDATE servicios SET se_descripcion='".$dt[des]."', se_estado=".$dt[est]." WHERE idservicios=".$dt[id]);
        }
        public function update_recojo($dt){ 
            return $this->ejecutar("UPDATE servicios_det SET recojo='".explode('-/', $dt)[1]."' WHERE iddet=".explode('-/', $dt)[0]);
        } 
         public function update_entrega($dt){ 
            return $this->ejecutar("UPDATE servicios_det SET entrega='".explode('-/', $dt)[1]."' WHERE iddet=".explode('-/', $dt)[0]);
        } 
        public function update_entrega_nacional($dt){ 
            return $this->ejecutar("UPDATE servicios_det SET entrega_nacional='".explode('-/', $dt)[1]."' WHERE iddet=".explode('-/', $dt)[0]);
        }        
        public function insert1($dt){ 
            return $this->insertar("INSERT INTO servicios_det(idservicios, de_descripcion, de_estado) VALUES (".explode('-/', $dt)[0].", '".explode('-/', $dt)[1]."', ".explode('-/', $dt)[2].")");
        }
        public function insert2($dt){ 
            return $this->insertar("INSERT INTO servicios_adicionales(ad_descrip, idcategoria, ad_ver) VALUES ('".explode('-/', $dt)[1]."', ".explode('-/', $dt)[0].", '".explode('-/', $dt)[2]."')");
        }
        public function insert3($dt){ 
            return $this->insertar("INSERT INTO servicios(se_descripcion, se_estado) VALUES ('".$dt[des]."', ".$dt[est].")");
        }
        public function insert4($dt){ 
            return $this->ejecutar("UPDATE servicios_det SET servicios_adicionales='".explode('-/', $dt)[1]."' WHERE iddet=".explode('-/', $dt)[0]);
        }
        public function insert_local($dt){ 
            return $this->ejecutar("UPDATE `reen_local` SET re_cobertura='".explode('-/', $dt)[1]."' WHERE idreenlocal=".explode('-/', $dt)[0]);
        }

    }
 ?>