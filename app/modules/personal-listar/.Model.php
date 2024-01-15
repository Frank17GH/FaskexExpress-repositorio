<?php 
    class Mod extends database{


        public function tabla1(){ 
            if (!$_SESSION['fasklog']['local_pre']) {
                return $this->select("SELECT idpersonal,pe_apellidos, pe_nombres, pe_dni, pe_nacimiento, (select idcontratos from personal_contratos c where c.idpersonal=p.idpersonal and c.co_liquidado=1 limit 1) as cont from personal p");
            }else{
                return $this->select("SELECT idpersonal,pe_apellidos, pe_nombres, pe_dni, pe_nacimiento, (select idcontratos from personal_contratos c where c.idpersonal=p.idpersonal and c.co_liquidado=1 limit 1) as cont from personal p");
            }
        }

        public function nderecho($dt){
         
            return $this->insertar("INSERT INTO personal_derechohabiente (de_dni,de_nombres,de_parentezco,idpersonal) SELECT '".explode('-/', $dt)[0]."', '".explode('-/', $dt)[1]."', '".explode('-/', $dt)[2]."', '".explode('-/', $dt)[3]."' FROM DUAL WHERE NOT EXISTS (SELECT * FROM personal_derechohabiente WHERE de_dni='".explode('-/', $dt)[0]."'  ) ");
        }


        public function tabla2($dt){
            return $this->select("SELECT *  from personal_derechohabiente WHERE idpersonal=".$dt);
        }

        public function mod2($dt){
            return $this->select("SELECT idpersonal,pe_apellidos, pe_nombres, pe_telefono,pe_mail, pe_dni, pe_nacimiento,pe_sexo, pe_civil, pe_hijos, pe_direccion, pe_emergencia, pe_academico, pe_academico_obs, pe_CIP, pe_tip_dep_bco, pe_num_dep_bco, pe_tip_cts_bco, pe_num_cts_bco,pe_tip_sangre, pe_ropa, pe_zapato, pe_num_moto, pe_num_auto, pe_lmoto, pe_lauto  from personal WHERE idpersonal=".$dt);
        }
        public function buscar($dt){ 
            return $this->select("SELECT idpersonal,CONCAT(pe_apellidos,', ', pe_nombres) as nom FROM personal WHERE pe_dni='".$dt."'");
        }
        public function del1($id){ 
            return $this->ejecutar("DELETE from personal WHERE idpersonal=".$id." AND 0=(SELECT COUNT(*) FROM personal_contratos pc WHERE pc.idpersonal=".$id.")");
        }
        public function del2($id){ 
            return $this->ejecutar("DELETE from personal_derechohabiente WHERE idderechohabiente=".$id);
        }
        public function up1($dt){ 
            if ($dt[id]) {
                return $this->ejecutar("UPDATE personal SET pe_dni='".$dt[dni]."', pe_apellidos='".$dt[apellidos]."', pe_nombres='".$dt[nombres]."', pe_sexo=".$dt[sexo].", pe_nacimiento='".$dt[nacimiento]."', pe_telefono='".$dt[telefonos]."', pe_mail='".$dt[mail]."', pe_civil=".$dt[civil].", pe_hijos=".$dt[hijos].", pe_direccion='".$dt[direccion]."', pe_emergencia='".$dt[emergencia]."', pe_academico='".$dt[grado]."', pe_academico_obs='".$dt[profesion]."', pe_CIP='".$dt[cip]."', pe_tip_dep_bco=".$dt[banco1].", pe_num_dep_bco='".$dt[num1]."', pe_tip_cts_bco=".$dt[banco2].", pe_num_cts_bco='".$dt[num2]."', pe_tip_sangre='".$dt[sangre]."', pe_ropa='".$dt[ropa]."', pe_zapato='".$dt[zapato]."', pe_lmoto=".$dt[lmoto].", pe_lauto=".$dt[lauto].", pe_num_moto='".$dt[nmoto]."', pe_num_auto='".$dt[nauto]."' WHERE idpersonal=".$dt[id]);
            }else{
                return $this->insertar("INSERT INTO personal(pe_dni, pe_apellidos, pe_nombres, pe_sexo, pe_nacimiento, pe_telefono, pe_mail, pe_civil, pe_hijos, pe_direccion, pe_emergencia, pe_academico, pe_academico_obs, pe_CIP, pe_tip_dep_bco, pe_num_dep_bco, pe_tip_cts_bco, pe_num_cts_bco, pe_tip_sangre, pe_ropa, pe_zapato, pe_lmoto, pe_lauto, pe_num_moto, pe_num_auto) SELECT '".$dt[dni]."', '".$dt[apellidos]."', '".$dt[nombres]."', ".$dt[sexo].", '".$dt[nacimiento]."', '".$dt[telefonos]."', '".$dt[mail]."', ".$dt[civil].", '".$dt[hijos]."', '".$dt[direccion]."', '".$dt[emergencia]."', ".$dt[grado].", '".$dt[profesion]."', '".$dt[cip]."', ".$dt[banco1].", '".$dt[num1]."', ".$dt[banco2].", '".$dt[num2]."', '".$dt[sangre]."', '".$dt[ropa]."', '".$dt[zapato]."', ".$dt[lmoto].", ".$dt[lauto].", '".$dt[nmoto]."', '".$dt[nauto]."' FROM DUAL WHERE NOT EXISTS (SELECT * FROM personal WHERE pe_dni='".$dt[dni]."')");
            }
            
        }
    }
 ?>

