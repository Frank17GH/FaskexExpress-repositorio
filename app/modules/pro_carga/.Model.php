<?php 
    class Mod extends database{

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
