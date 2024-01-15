<?php
    class Ctrl {
        public function __construct() { } 
        public function printCpe($id){ 
            ?>
                <script type="text/javascript">
                    window.open('http://<?php echo __IP__.__HOME__.__MOD__; ?>documentos/formatos/cpe.php?id=<?php echo $id ?>', "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no");
                </script>
            <?php
        }
        public function printGuia($id){ 
           ?>
                <script type="text/javascript">
                    window.open('https://sistemas.faskex.com/app/modules/documentos/formatos/guia.php?id=<?php echo $id ?>', "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no");
                </script>
            <?php
       }
       public function printManifiesto($id){     
            ?>
                <script>
                    window.open('http://<?php echo __IP__.__HOME__.__MOD__; ?>documentos/formatos/manifiesto.php?id=<?php echo $id ?>', "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no");
                </script>
            <?php
        }
    }
?> 
 