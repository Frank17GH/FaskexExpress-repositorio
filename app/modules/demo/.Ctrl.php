<?php
    class Ctrl {
        public function __construct() { } 
        public function clientes(){
            return gList('clientes/clientes'); 
             
        }
        public function tabla1($data){     
            return gList('clientes/components/table1',0,'tabla1'); 
        }
    }//--> fin clase
?> 
 