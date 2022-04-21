<?php
if(isset($_POST['hozzaadform'])){
    if(Termekek::hozzaadas($conn,$_POST['nev'],$_POST['egyseg'])){
        header("Location:index.php");
    }else{
        echo "Hiba!";
    }
}


include "view/hozzaadas.php";
?>