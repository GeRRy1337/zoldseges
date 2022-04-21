<?php 

class Termekek{
    private $id;
    private $nev;
    private $ar;
    private $mennyiseg;
    private $egyseg;
    private $valid;

    function set_termek($conn, $id){
        $result=$conn->query("Select * FROM `keszlet` right outer JOIN termek on termek.id=keszlet.termek_id  where id=".$id);
        if($result->num_rows>0){
            if($row=$result->fetch_assoc()){
                $this->id=$row['id'];
                $this->nev=$row['nev'];
                $this->ar=$row['ar'];
                $this->mennyiseg=$row['mennyiseg'];
                $this->egyseg=$row['egyseg'];
                $this->valid=$row['valid'];
            }
        }   
    }

    function get_id(){
        return $this->id;
    }
    function get_nev(){
        return $this->nev;
    }
    function get_ar(){
        return $this->ar;
    }
    function get_mennyiseg(){
        return $this->mennyiseg;
    }
    function get_egyseg(){
        return $this->egyseg;
    }
    function get_valid(){
        return $this->valid;
    }

    function torles($conn){
        if ($conn->query("Update termek set valid=0 where id=".$this->id)){
            return true;
        }else{
            return false;
        }
    }

    function keszlet($conn,$mennyiseg,$ar){
        $result=$conn->query("Select * from keszlet where termek_id=".$this->id);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            $rsme=$row['mennyiseg'];
            if ($conn->query("Update keszlet set mennyiseg=".($rsme + $mennyiseg).", ar=".$ar." where termek_id=".$this->id)){
                $conn->query("Insert into bevetelezes(termek_id,mennyiseg,ar,be_ki) Values(".$this->id.",".($mennyiseg-$rsme).",".$ar.",1)");
                return true;
            }else{
                return false;
            }
        }else{
            if ($conn->query("Insert into keszlet(termek_id,mennyiseg,ar) Values(".$this->id.",".$mennyiseg.",".$ar.")")){
                $conn->query("Insert into bevetelezes(termek_id,mennyiseg,ar,be_ki) Values(".$this->id.",".$mennyiseg.",".$ar.",1)");
                return true;
            }else{
                return false;
            }
        }
    }

    function ar($conn,$ar){
        if ($conn->query("Update keszlet set ar=".$ar." where termek_id=".$this->id)){
            return true;
        }else{
            return false;
        }
    }

    function eladas($conn,$mennyiseg){
        $result=$conn->query("Select * from keszlet where termek_id=".$this->id);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            $rsme=$row['mennyiseg'];
            $ar=$row['ar'];
            if($rsme-$mennyiseg>0){
                if ($conn->query("Update keszlet set mennyiseg=".($rsme - $mennyiseg)." where termek_id=".$this->id)){
                    $conn->query("Insert into bevetelezes(termek_id,mennyiseg,ar,be_ki) Values(".$this->id.",".($mennyiseg-$rsme).",".$ar.",0)");
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    }
    
    static function hozzaadas($conn,$nev,$egyseg){
        if ($conn->query("Insert into termek(nev,egyseg) Values('" .$nev. "','" .$egyseg. "')")){
            return true;
        }else{
            return false;
        }
    }


    static function termek_lista($conn){
        $arr=array();
        $result=$conn->query("SELECT * FROM `keszlet` right outer JOIN termek on termek.id=keszlet.termek_id order by valid desc");
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $arr[]=$row['id'];
            }
        }
        return $arr;
    }

    static function keszlet_lista($conn){
        $arr=array();
        $result=$conn->query("SELECT * FROM `keszlet` right outer JOIN termek on termek.id=keszlet.termek_id where valid=1");
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $arr[]=$row['id'];
            }
        }
        return $arr;
    }

    static function bevetel($conn){
        $result=$conn->query("SELECT abs(sum(ar*mennyiseg)) as bevetel FROM `bevetelezes` WHERE be_ki=0");
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                return $row['bevetel'];
            }
        }
        return false;
    }

    static function kiadas($conn){
        $result=$conn->query("SELECT abs(sum(ar*mennyiseg)) as kiadas FROM `bevetelezes` WHERE be_ki=1");
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                return $row['kiadas'];
            }
        }
        return false;
    }


}

?>