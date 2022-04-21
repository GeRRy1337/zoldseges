<?php
    if(isset($_POST['arForm'])){
        $termek->set_termek($conn,$_POST['termekLista']);
        if($termek->ar($conn,$_POST['ar'])){
            header("Location:index.php");
        }else{
            echo "Hiba!";
        }
    }


    $lista=Termekek::keszlet_lista($conn);
    include "view/ar.php";
?>