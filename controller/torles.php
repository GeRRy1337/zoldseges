<?php
if(isset($_POST['torlesLista'])){
    $termek->set_termek($conn,$_POST['torlesLista']);
    if($termek->torles($conn)){
        header("Location:index.php");
    }else{
        echo "Hiba!";
    }
}

$lista=Termekek::keszlet_lista($conn);
include "view/torles.php";
?>