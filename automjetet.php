<?php
include "inc/header.php";
?>


<section class="list-entity container">
    <div class="image">
        <img src="img/car7.jpg" alt="">
    </div>
    <?php
    if (isset($_SESSION['message'])) {
        echo "<div id='message'>" . $_SESSION['message'] . "</div>";
    }
    ?>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Kategoria</th>
                <th>Numri i regjistrimit</th>
                <th>Pershkrimi</th>
                <th>Kostoja</th>
                <th>Modifiko</th>
                <th>Fshije</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $automjetet = merrAutomjetet();
                while ($automjeti = mysqli_fetch_assoc($automjetet)) {
                    $automjetiid=$automjeti['automjetiid'];
                    echo "<tr>";
                    echo "<td>" . $automjeti['automjetiemri'] . "</td>";
                    echo "<td>" . $automjeti['kategoriaemri'] . "</td>";
                    echo "<td>" . $automjeti['nrregjistrimi'] . "</td>";
                    echo "<td>" . $automjeti['pershkrimi'] . "</td>";
                    echo "<td>" . $automjeti['kostoja'] . "</td>";
                    echo "<td><a href='modifiko_automjete.php?aid=$automjetiid'>Edit</a></td>";
                    echo "<td><a href='fshij_automjete.php?aid=$automjetiid'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>

        </tbody>
    </table>
    <a href="shto_automjete.php" id="add_entity"><i class="fas fa-plus"></i> Shto Automjet</a>
</section>

<?php
include "inc/footer.php";

?>