<div class="container">
    <form method="post">
        <h2>Törlés</h2>
        <select name="torlesLista">
            <?php
                foreach($lista as $row){
                    $termek->set_termek($conn,$row['id']);
                    echo "<option value='".$termek->get_id()."'>".$termek->get_nev()."</option>";
                }
            ?>
        </select>
        <input type="submit">
    </form>
    <a href="index.php"><button class="btn btn-secondary">Vissza</button></a>
</div>