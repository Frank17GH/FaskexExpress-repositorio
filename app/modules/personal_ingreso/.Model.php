<?php 
    class Mod extends database{
        public function tabla1($dt){ 
            if ($dt['repo']==1) {
                $query.=" and DAY(co_inicio)=".$dt['dia'];
                $query.=" and MONTH(co_inicio)=".$dt['mes'];
                $query.=" and YEAR(co_inicio)=".$dt['anio'];
            }elseif ($dt['repo']==2) {
                $query.=" and MONTH(co_inicio)=".$dt['mes'];
                $query.=" and YEAR(co_inicio)=".$dt['anio'];
            }elseif ($dt['repo']==3) {
                $query.=" and YEAR(co_inicio)=".$dt['anio'];
            }elseif ($dt['repo']==4) {
                $query.=" and DATE_FORMAT(co_inicio, '%Y-%m-%d') between '".$dt['inicio']."' and '".$dt['fin']."'";
            }
            return $this->select("SELECT p.idpersonal,pe_dni,pe_apellidos, pe_nombres, co_inicio,gi_color,ca_descripcion, lo_abreviatura,c.idcontratos, ti_descripcion, ti_color,  (SELECT  CONCAT(cd.nombre,' - ',cp.nombre,' - ',cde.nombre) as nombre FROM ciudad_distrito cd left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento where cd.iddistrito=c.iddistrito ) as distrito
                from personal p inner 
                join personal_contratos c on p.idpersonal=c.idpersonal 
                inner join personal_cargo pc on c.idpersonalcargo=pc.idpersonalcargo 
                inner join adm_locales al on c.idlocales=al.idlocales 
                inner join conf_giros cg on al.idgiros=cg.idgiros 
                left join personal_tipo_contrato pt on c.idtipocontrato=pt.idtipocontrato 
                WHERE co_ingreso=1 ".$query);
        }
        public function sel1($id){ 
            return $this->select("SELECT idlocales, lo_abreviatura from adm_locales where idgiros=".explode('-/', $id)[0]);
        }
        public function sel_Distrito()
        {
            return $this->select("SELECT iddistrito, CONCAT(cd.nombre,' - ',cp.nombre,' - ',cde.nombre) as distrito 
                FROM ciudad_distrito cd 
                left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia 
                left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento ");
        }
        public function insert1($dt){ 
            if ($dt['fun']) {
                return $this->ejecutar("UPDATE personal_contratos SET idpersonalcargo=".$dt[cargo].",iddistrito=".$dt[distrito].", co_inicio='".$dt[inicio]."', co_fin='".$dt[fin]."', idlocales=".$dt[sede]." WHERE idcontratos=".$dt['fun']);
            }else{
                if (isset($dt[indefinido])) {
                    $fin='0000-00-00';
                }else{
                    $fin=$dt[fin];
                }
                return $this->insertar("INSERT INTO personal_contratos(idpersonal, idpersonalcargo, co_inicio, co_fin, idtipocontrato, co_rem_bruto, co_bono, idlocales,iddistrito, co_estado, co_ingreso) SELECT  ".$dt[id].",".$dt[cargo].",'".$dt[inicio]."','".$fin."',0,0,0,".$dt[sede].",".$dt[distrito].",0,1 FROM DUAL WHERE NOT EXISTS (SELECT * FROM personal_contratos WHERE idpersonal=".$dt[id]." and (co_estado=0 or co_estado=1))");
            }
        }
        public function del1($id){ 
            return $this->ejecutar("DELETE FROM personal_contratos WHERE co_estado=0 and idcontratos=".$id);
        }
        public function mod1(){ 
            return $this->select("SELECT idpersonalcargo, ca_descripcion FROM personal_cargo WHERE ca_estado=1 order by ca_descripcion asc");
        }
        public function mod1_2(){ 
            return $this->select("SELECT idgiros, gi_nombre FROM conf_giros");
        }
        public function mod1_3($id){ 
            return $this->select("SELECT pe_dni, c.idpersonal, pe_apellidos, pe_nombres, co_inicio, co_fin, c.idpersonalcargo, idgiros, c.idlocales, c.iddistrito
                FROM personal p inner 
                join personal_contratos c on p.idpersonal=c.idpersonal 
                inner join adm_locales al on c.idlocales=al.idlocales 
                WHERE  c.idcontratos=".$id);
        }
    }
 ?>

