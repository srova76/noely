<?php
    include "MySQLConnection.php";
    class DadabeNoely extends MySQLConnection{
        public function __construct()
        {
            parent::__construct("localhost","root","","noely");
        }

        public function idSuivant($table,$champ){
            $sql="SELECT MAX($champ)+1 FROM $table";
            $res=mysqli_query($this->connection,$sql);
            $t=mysqli_fetch_array($res);
            $code=(is_null($t[0]))? 1:$t[0];
            return $code;
        }

        public function insert_into($table_name,$values=array(),$fields=null)
        {
            $val="";
            $c=count($values);
            for($k=0;$k<$c;$k++)
            {
                if(is_bool($values[$k])){
                    $b=($values[$k])?"true":"false";
                    if($k<$c-1)
                    {
                        $val.="$b,";
                    }
                    else
                    {
                        $val.="$b";
                    }
                }
                else{
                    if($k<$c-1)
                    {
                        $val.="'$values[$k]',";
                    }
                    else
                    {
                        $val.="'$values[$k]'";
                    }
                }
            }
            $fields=(is_null($fields))? "":"(".$fields.")";
            $sql="INSERT INTO $table_name $fields VALUES($val);";
            // echo $sql;
            $resultat=mysqli_query($this->connection,$sql);
            if($resultat)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        
        public function update($table_name,$set,$criteria=null)
        {
            $criteria = (isset($criteria)) ? " WHERE $criteria ": "";
            $sql="UPDATE $table_name SET $set $criteria";
            // echo $sql;
            mysqli_query($this->connection,$sql);
        }

        public function delete_from($table_name,$criteria=null)
        {
            $criteria = (isset($criteria)) ? " WHERE $criteria ": "";
            $sql="DELETE FROM $table_name $criteria";
            mysqli_query($this->connection,$sql);
        }

        public function testConnexionAdmin($login,$password)
        {
            $sql="SELECT * FROM administrateur WHERE login='$login';";
            $result=mysqli_query($this->connection,$sql);
            if(!$tab=mysqli_fetch_array($result))
            {
                $res[0]=false;
                $res[1]="Utilisateur introuvable";
            }
            else
            { 
                if($tab[1]!=md5($password))
                {
                    $res[0]=false;
                    $res[1]="Mot de passe incorecte";                
                }
                else
                {
                    $res[0]=true;
                    $res[1]=$tab[0];
                }
            }
            return $res;
        }

        public function testConnexionMembre($login,$password)
        {
            $sql="SELECT * FROM enfant WHERE emailEnfant='$login';";
            $result=mysqli_query($this->connection,$sql);
            if(!$tab=mysqli_fetch_array($result))
            {
                $res[0]=false;
                $res[1]="Utilisateur introuvable";
            }
            else
            { 
                if($tab[2]!=md5($password))
                {
                    $res[0]=false;
                    $res[1]="Mot de passe incorecte";                
                }
                else
                {
                    $res[0]=true;
                    $res[1]=$tab[0];
                }
            }
            return $res;
        } 

        public function select($columns,$table_name,$criteria=null,$orderby=null)
        {
            $criteria = (isset($criteria)) ? " WHERE $criteria ": "";
            $orderby = (isset($orderby)) ? " ORDER BY $orderby ": "";
            $sql="SELECT $columns FROM $table_name $criteria $orderby";
            // echo $sql;
            $result=mysqli_query($this->connection,$sql);
            $k=0;
            while ($tab=mysqli_fetch_array($result)) {
                $t[$k]=$tab;
                $k++;
            }
            if(isset($t)){
                return $t;
            }
        }

        public function nombreSouhait($enfant){
            $sql="SELECT COUNT(*) FROM souhait WHERE idEnfant='$enfant'";
            $res=mysqli_query($this->connection,$sql);
            $t=mysqli_fetch_array($res);
            $nb=(is_null($t[0]))? 1:$t[0];
            return $nb;
        }

        public function listeSouhait($enfant){
            $sql="SELECT s.idCadeau, c.nomCadeau, c.point, c.image, s.quantite, s.estValide
            FROM cadeau c, souhait s
            WHERE 
            s.idEnfant='$enfant' AND c.idCadeau=s.idCadeau";
            
            $res=mysqli_query($this->connection,$sql);
            $k=0;
            while($tab=mysqli_fetch_array($res)){
                $t[$k]=$tab;
                $k++;
            }
            if(isset($t)){
                return $t;
            }
        }

        public function top5(){
            $sql="SELECT s.idCadeau, c.nomCadeau, c.image, COUNT(s.idCadeau) nombre
            FROM cadeau c, souhait s
            WHERE
            c.idCadeau=s.idCadeau
            GROUP BY s.idCadeau ORDER BY nombre desc LIMIT 5";
            
            $res=mysqli_query($this->connection,$sql);
            $k=0;
            while($tab=mysqli_fetch_array($res)){
                $t[$k]=$tab;
                $k++;
            }
            if(isset($t)){
                return $t;
            }
        }

        public function statPoint(){
            $sql="SELECT bonPoints,COUNT(bonPoints) points
            FROM enfant
            GROUP BY bonPoints ORDER BY bonPoints ASC";
            
            $res=mysqli_query($this->connection,$sql);
            $k=0;
            while($tab=mysqli_fetch_array($res)){
                $t[$k]=$tab;
                $k++;
            }
            if(isset($t)){
                return $t;
            }
        }

        public function pointUtilise($enfant)
        {
            $sql="SELECT SUM(s.quantite*c.point) 
            FROM souhait s,cadeau c 
            WHERE s.idCadeau=c.idCadeau AND s.idEnfant='$enfant'";
            $res=mysqli_query($this->connection,$sql);
            $t=mysqli_fetch_array($res);
            $nb=(is_null($t[0]))? 0:$t[0];
            return $nb;
        }

        public function aDejaValide($enfant)
        {
            $sql="SELECT estValide FROM souhait WHERE idEnfant='$enfant'";
            $res=mysqli_query($this->connection,$sql);
            $t=true;
            while($tab=mysqli_fetch_array($res)){
                $t&=$tab[0];
            }
            if(isset($t)){
                return $t;
            }
        }
        
        public function pointEnfant($enfant)
        {
            $sql="SELECT bonPoints 
            FROM enfant
            WHERE idEnfant='$enfant'";
            $res=mysqli_query($this->connection,$sql);
            $t=mysqli_fetch_array($res);
            $nb=$t[0];
            return $nb;
        }

        public function avantMajSouhait($enfant,$cadeau,$quantite){
            $sql="SELECT (c.point*$quantite)-(c.point*s.quantite)
            FROM souhait s,cadeau c 
            WHERE s.idCadeau=c.idCadeau AND s.idEnfant='$enfant' AND s.idCadeau='$cadeau'";
            $res=mysqli_query($this->connection,$sql);
            if($res){
                $t=mysqli_fetch_array($res);
                $res=$t[0];
                return $res;
            }else{
                return null;
            }
            

        }

        public function avantAjoutSouhait($enfant,$cadeau,$quantite){
            $sql="SELECT c.point*$quantite 
            FROM cadeau c 
            WHERE c.idCadeau='$cadeau'";
            // echo $sql;
            $res=mysqli_query($this->connection,$sql);
            $t=mysqli_fetch_array($res);
            $res=$t[0];
            return $res;
        }

        public function souhaitAutre()
        {
            $sql="SELECT e.emailEnfant, c.nomCadeau,s.quantite
            FROM 
                cadeau c,souhait s,enfant e
            WHERE 
                s.idEnfant=e.idEnfant AND s.idCadeau=c.idCadeau 
            ORDER BY 
                e.emailEnfant ASC";
            $res=mysqli_query($this->connection,$sql);
            $k=0;
            while($tab=mysqli_fetch_array($res)){
                $t[$k]=$tab;
                $k++;
            }
            if(isset($t)){
                return $t;
            }
        }
    }
?>
