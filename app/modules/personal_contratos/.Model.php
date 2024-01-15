<?php 
    class Mod extends database{
        public function tabla1(){ 
            return $this->select("SELECT p.idpersonal,pe_dni,pe_apellidos, pe_nombres, co_inicio,co_fin,gi_color,ca_descripcion, lo_abreviatura, co_estado, c.idcontratos, ti_descripcion, ti_color,co_liquidado from personal p inner join personal_contratos c on p.idpersonal=c.idpersonal inner join personal_cargo pc on c.idpersonalcargo=pc.idpersonalcargo inner join adm_locales al on c.idlocales=al.idlocales inner join conf_giros cg on al.idgiros=cg.idgiros left join personal_tipo_contrato pt on pt.idtipocontrato=c.idtipocontrato ");
        }
        public function insert1($dt){ 
            return $this->insertar("INSERT INTO personal_contratos(idpersonal, idpersonalcargo, co_inicio, co_fin, idtipocontrato, co_remuneracion, co_bono, idlocales, co_estado) SELECT  ".$dt[id].",".$dt[cargo].",'".$dt[inicio]."','".$dt[fin]."',0,0,0,".$_SESSION[fasklog][local_pre].",0 FROM DUAL WHERE NOT EXISTS (SELECT * FROM personal_contratos WHERE idpersonal=".$dt[id]." and (co_estado=0 or co_estado=1))");
        }
        public function mod1($id){ 
            return $this->select("SELECT pe_dni, pe_apellidos, pe_nombres FROM personal where idpersonal=".$id);
        }
        public function mod1_2($id){ 
            return $this->select("SELECT c.idcontratos,co_inicio, co_fin, gi_color,ca_descripcion, co_estado, idtipocontrato, co_liquidado from personal_contratos c inner join personal_cargo pc on c.idpersonalcargo=pc.idpersonalcargo inner join adm_locales al on c.idlocales=al.idlocales inner join conf_giros cg on al.idgiros=cg.idgiros WHERE c.idpersonal=".$id);
        }
        public function mod2($id){ 
            return $this->select("SELECT * FROM personal_contratos pc inner join personal p on pc.idpersonal=p.idpersonal where idcontratos=".$id);
        }
        public function mod2_1(){ 
            return $this->select("SELECT * FROM personal_cargo");
        }
        public function mod3($id){ 
            return $this->select("SELECT pe_dni, pe_apellidos, pe_nombres, co_fin FROM personal p inner join personal_contratos pc on p.idpersonal=pc.idpersonal WHERE co_liquidado=1 and p.idpersonal=".$id);
        }
        public function up1($dt){
            
            if ($dt[indefinido]=='on') {
                $fin='0000-00-00';
            }else{
                $fin=$dt[fin];
            }
            return $this->ejecutar("UPDATE personal_contratos SET idpersonalcargo=".$dt[cargo].", idtipocontrato=".$dt[tcontrato].", co_frec_pago=".$dt[frec_pago].", co_rem_bruto='".$dt[rem_bruta]."', co_rem_liquido='".$dt[rem_liqui]."', co_bono=".$dt[bono].", co_inicio='".$dt[inicio]."', co_fin='".$fin."',co_liquidado=".$dt[liquidado]." ,co_estado=".$dt[regula]." WHERE idcontratos=".$dt[id]);
        }
    }
 ?>

