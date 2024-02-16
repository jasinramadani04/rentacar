<?php
include "inc/header.php";
if(isset($_GET['aid'])){
    $automjetiid=$_GET['aid'];
    $automjeti=merrAutomjetId($automjetiid);
    $emri=$automjeti['automjetiemri'];
    $nrregjistrimi=$automjeti['nrregjistrimi'];
    $pershkrimi=$automjeti['pershkrimi'];
    $kategoriaId=$automjeti['kategoriaid'];
    $kategoriaEmri=$automjeti['kategoriaemri'];
}
if(isset($_POST['fshij'])){
    fshijAutomjet($automjetiid);
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
                <input disabled type="text" id="emri" name="emri"
                value="<?php if(!empty($emri)) echo $emri;?>">
            </div>
            <div class="inputAndLabels">
                <label for="kategoria">Kategoria</label> <br>
                <select disabled id="kategoria" name="kategoria">
                    <?php
                        echo "<option value='$kategoriaId'>$kategoriaEmri</option>";
                        $kategorit=merrKategorit();
                        while ($kategoria = mysqli_fetch_assoc($kategorit)) {
                            $kid=$kategoria['kategoriaid'];
                            $emri=$kategoria['emri'];
                            if($kategoriaId!=$kid){
                                echo "<option value='$kid'>$emri</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="nrregjistrimi">Numri i regjistrimit</label> <br>
                <input disabled type="text" id="nrregjistrimi" name="nrregjistrimi"
                value="<?php if(!empty($nrregjistrimi)) echo $nrregjistrimi;?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <input disabled type="text" id="pershkrimi" name="pershkrimi"
                value="<?php if(!empty($pershkrimi)) echo $pershkrimi;?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="fshij" name="fshij" class="shtoModifiko" value="Fshij">
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";

?>
