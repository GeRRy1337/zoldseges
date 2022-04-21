<?php

    if(isset($_POST['keszletForm'])){
        $termek->set_termek($conn,$_POST['termekLista']);
        if($termek->keszlet($conn,$_POST['mennyiseg'],$_POST['ar'])){
            header("Location:index.php");
        }else{
            echo "Hiba!";
        }
    }

    $lista=Termekek::keszlet_lista($conn);
    include "view/keszlet.php";
?>