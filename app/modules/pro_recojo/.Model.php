<?php 
    class Mod extends database{

        public function frm_recojo ($id){              
            return $this->select("SELECT * FROM recojos where id=".$id);
        }

        public function Distrito(){
            return $this->select("SELECT c.iddistrito as id, (SELECT  CONCAT(cd.nombre,' - ',cp.nombre,' - ',cde.nombre) as nombre from ciudad_distrito cd left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento where cd.iddistrito=c.iddistrito ) as nombre
                FROM personal p 
                INNER JOIN personal_contratos c on p.idpersonal=c.idpersonal
                where c.iddistrito>0 
                GROUP BY id");            
        }

        public function tbl_ ($dt){              
            return $this->select("SELECT  ");
        }
        
        public function sav_ ($dt){  
            $id=$this->insertar("INSERT  *  SELECT X,Y FROM dual WHERE NOT EXISTS (SELECT idapoyo from despacho_temp WHERE idapoyo=".$dt['idapoyo']." )");                        
        }
        
        public function sel_ ($id){              
               return $this->select("SELECT  ".$id);
        }                

        public function del_ ($id){ 
            $id=$this->ejecutar("DELETE ".$id);            
        }                
        
        public function upd_ ($id){
            return $this->ejecutar("UPDATE ".$id);          
        }       
    }
 ?>
