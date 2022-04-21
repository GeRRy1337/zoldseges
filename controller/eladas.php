<?php

    if(isset($_POST['eladasForm'])){
        $termek->set_termek($conn,$_POST['termekLista']);
        if($termek->eladas($conn,$_POST['mennyiseg'])){
            header("Location:index.php");
        }else{
            echo "Hiba!";
        }
    }

    $lista=Termekek::termek_lista($conn);
    include "view/eladas.php";
?>