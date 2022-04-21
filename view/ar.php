<div class="container">
    <form method="post">
        <h2>Ár változtatás</h2>
        <select name="termekLista">
            <?php
                foreach($lista as $row){
                    $termek->set_termek($conn,$row['id']);
                    echo "<option value='".$termek->get_id()."'>".$termek->get_nev()."</option>";
                }
            ?>
        </select><br>
        Ár: <input type="number" name="ar" required><br>
        <input type="submit" name="arForm">
    </form>
    <a href="index.php"><button class="btn btn-secondary">Vissza</button></a>
</div>