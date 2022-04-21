<?php 
    require 'Includes/db.inc.php';
    require 'model/termekek.php';
    $termek= new Termekek();
    $page = 'index';
    if(isset($_REQUEST['page'])){
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
        $page = $_REQUEST['page'];
    }
}
    include 'Includes/header.inc.php';
    ?>
<body>
<?php
        include 'controller/'.$page.'.php';
		//include 'Includes/menu.inc.php';
?>

</body>
</html>
<?php 
  $conn->close();
?>

