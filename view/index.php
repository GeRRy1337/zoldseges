<div class="container">
    <h1>Készlet</h1>
    <table class="table table-dark table-bordered w-100">
        <thead class="thead-light">
            <tr>
                <th>id</th>
                <th>Név</th>
                <th>Mennyiség</th>
                <th>Ár</th>
                <th>Egység</th>
            </tr>
        </thead>
        <tbody>
    <?php

        foreach($lista as $id){
            $termek->set_termek($conn,$id);
            echo '<tr>';
                echo "<td>".$termek->get_id()."</td>"; 
                echo "<td>".$termek->get_nev()."</td>"; 
                echo "<td>".$termek->get_mennyiseg()."</td>"; 
                echo "<td>".$termek->get_ar()."</td>"; 
                echo "<td>".$termek->get_egyseg()."</td>"; 
            echo '</tr>';
        }
    ?>
        </tbody>
    </table>

    <div>
        <a href="index.php?page=hozzaadas"><button class="btn btn-secondary">Termék hozzáadása</button></a>
        <a href="index.php?page=torles"><button class="btn btn-secondary">Termék törlése</button></a>
        <a href="index.php?page=keszlet"><button class="btn btn-secondary">Készlet</button></a>
        <a href="index.php?page=eladas"><button class="btn btn-secondary">Eladás</button></a>
        <a href="index.php?page=ar"><button class="btn btn-secondary">Ár változtatása</button></a>
        <hr>
    </div>
    <div>
        <p>Bevétel: <?=Termekek::bevetel($conn)?></p>
        <p>Kiadás: <?=Termekek::kiadas($conn)?></p>
        <p>Profit: <?php echo Termekek::bevetel($conn)-Termekek::kiadas($conn);?> </p>
    </div>
</div>