<?php 
    class Mod extends database{
        public function tabla1(){ 
            return $this->select("SELECT * from persona");
        }
    }
 ?>

