<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',$dt,'tabla1'); 
        }
       
    }//--> fin clase
?> 
 