<?php
include "inc/header.php";

?>

<section class="list-entity container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>
    <?php
    if(isset($_SESSION['message'])){
        echo "<div id='message'>" . $_SESSION['message'] . "</div>";
    }
    
    ?>
    <div class="filter">
        <form action="">
            <input type="radio" name="filter" id="te_gjithe" checked>
            <label for="te_gjithe">Te gjith | </label>
            <input type="radio" name="filter">
            <label for="te_gjithe">Staf | </label>
            <input type="radio" name="filter">
            <label for="te_gjithe">Administratoret</label>
            <input type="submit" class="btn-filtro" value="Filtro">
        </form>
    </div>
    <table class="styled-table">
        <thead>
        <tr>
            <th>Emri</th>
            <th>Mbiemri</th>
            <th>Email</th>
            <th>Nr telefonit</th>
            <th>Modifiko</th>
            <th>Fshiej</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $perdoruesit=merrPerdoruesit();
            while($perdoruesi = mysqli_fetch_assoc($perdoruesit)){
                $pid=$perdoruesi['perdoruesiid'];
                echo "<tr class='active-row'>";
                echo "<td>" . $perdoruesi['emri'] . "</td>";
                echo "<td>" . $perdoruesi['mbiemri'] . "</td>";
                echo "<td>" . $perdoruesi['email'] . "</td>";
                echo "<td>" . $perdoruesi['telefoni'] . "</td>";
                echo "<td><a href='shto_modifiko_perdorues.php?pid={$pid}'>
                <i class='fas fa-edit'></i></a></td>";
                echo "<td><a href='#'>
                <i class='far fa-trash-alt'></i></a></td>";
                echo "</tr>";
            }
            
            ?>
    </table>
    <a href="shto_modifiko_perdorues.php" id="add_entity"><i class="fas fa-plus"></i> Shto Perdorues</a>
</section>


<?php
include "inc/footer.php";

?>