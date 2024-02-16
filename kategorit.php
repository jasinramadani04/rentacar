<?php
include "inc/header.php";

?>

<section class="list-entity container">
    <div class="image">
        <img src="img/car9.jpg" alt="">
    </div>
    <?php
    if (isset($_SESSION['message'])) {
        echo "<div id='message'>" . $_SESSION['message'] . "</div>";
    }

    ?>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Emri</th>
                <th>Pershkrimi</th>
                <th>Kostoja</th>
                <th>Modifiko</th>
                <th>Fshiej</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $kategorit = merrKategorit();
            while ($kategoria = mysqli_fetch_assoc($kategorit)) {
                $kategoriaid = $kategoria['kategoriaid'];
                echo "<tr class='active-row'>";
                echo "<td>" .  $kategoria['emri'] . "</td>";
                echo "<td>" .  $kategoria['pershkrimi'] . "</td>";
                echo "<td>" .  $kategoria['kostoja'] . "</td>";
                echo "<td><a href='shto_modifiko_kategori.php?kid={$kategoriaid}'>
                <i class='fas fa-edit'></i></a></td>";
                echo "<td><a href='#'>
                <i class='far fa-trash-alt'></i></a></td>";
                echo "</tr>";
                echo "</tr>";
            }

            ?>

        </tbody>
    </table>
    <a href="shto_modifiko_kategori.php" id="add_entity"><i class="add_entity fas fa-plus"></i> Shto Kategori</a>
</section>

<footer class="main-footer">
    <div class="main-footer-content container">
        <div>
            <p>&copy; Rent a Car 2021. All rights reserved.</p>
        </div>
        <div class="social-media">
            <div>
                <a href="#"><i class="fab fa-facebook"></i></a>
            </div>
            <div>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <div>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>

</body>

</html>