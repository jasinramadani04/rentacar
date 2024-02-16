<?php
include "inc/header.php";

if(isset($_POST['shto'])){
    shtoAutomjet($_POST['emri'],$_POST['kategoria'],$_POST['nrRegjistrimit'],$_POST['pershkrimi']);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/car8.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin e Automjetit</h1>
        <br>
        <form id="automjeti" method="post">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri">
            </div>
            <div class="inputAndLabels">
                <label for="kategoria">Kategoria</label> <br>
                <select id="kategoria" name="kategoria">
                    <option value="">Zgjedh kategorine </option>
                    <?php
                        $kategorit=merrKategorit();
                        while ($kategoria = mysqli_fetch_assoc($kategorit)) {
                            $kategoriaid=$kategoria['kategoriaid'];
                            $emri=$kategoria['emri'];
                            echo "<option value='$kategoriaid'>$emri</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="nrRegjistrimit">Numri i regjistrimit</label> <br>
                <input type="text" id="nrRegjistrimit" name="nrRegjistrimit">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <input type="text" id="pershkrimi" name="pershkrimi">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="shto" name="shto" class="shtoModifiko" value="Shto Automjet">
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";

?>
