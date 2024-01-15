<?php
    class Ctrl {
        public function __construct() { } 

        public function tbl_atencion($dt){    
            return gList('exp_atencion/components/tbl_atencion',$dt,'tbl_atencion','tbl_orden'); 
        }                          
    }
?> 
 