<?php 
    class Mod extends database{
        public function comp1(){ 
            return $this->select("SELECT cl.idcpe as cod, cpe_abre,cpe_icon from conf_cpe cc inner join conf_giros_cpe cl on cc.idcpe=cl.idcpe inner join adm_locales al on cl.idgiros=al.idgiros where cc.cpe_ver=3 and al.idlocales=".$_SESSION['fasklog']['local_pre']);
        }
        public function comp1_2(){ 
            return $this->select("SELECT cl.idseries as id, cs.se_tipo as tipo, cl.idseries FROM conf_series_locales cl inner join conf_series cs on cl.idseries=cs.idseries WHERE idlocales=".$_SESSION['fasklog']['local_pre']);
        }
    }
 ?>