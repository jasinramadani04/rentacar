<?php

include "inc/header.php";
if (isset($_POST['shtorezervim'])) {
    shtoRezervim(
        $_POST['klienti'],
        $_POST['automjeti'],
        $_POST['datamarrjes'],
        $_POST['datakthimit']
    );
}
if (isset($_GET['rid'])) {
    $rezervimiid = $_GET['rid'];

    $rezervimi = merrRezervimId($rezervimiid);
    // print_r($rezervimi);
    $autoid = $rezervimi['automjetiid'];
    $autoemri = $rezervimi['emri'];
    $klintid = $rezervimi['klientiid'];
    $klintemrimbiemri = $rezervimi['emrimbiemri'];
    $dataemarrjes=$rezervimi['dataemarrjes'];
    $dataemarrjes=date("Y-m-d",strtotime($dataemarrjes));
    $dataekthimit=$rezervimi['dataekthimit'];
    $dataekthimit=date("Y-m-d",strtotime($dataekthimit));
}
if (isset($_POST['modifikorezervim'])) {
    modifikoRezervim(
        $_POST['rezervimiid'],
        $_POST['klienti'],
        $_POST['automjeti'],
        $_POST['datamarrjes'],
        $_POST['datakthimit']
    );
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/car10.png" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin/editimin e Rezervimit</h1>
        <br>
        <form method="POST">
            <div class="inputAndLabels">
                <input type="hidden" name="rezervimiid" value="<?php if(!empty($rezervimiid)) echo $rezervimiid ?>"
                <label for="klienti">Klienti</label> <br>

                <select id="klienti" name="klienti">
                    <?php
                    //echo $_GET['rid'];
                    if (isset($_GET['rid'])) {
                        echo "<option value='$klintid'>$klintemrimbiemri</option>";
                    } else {
                        echo "<option value=''>Zgjedh klientin </option>";
                    }
                    $klientet = merrKlientet();
                    while ($klienti = mysqli_fetch_assoc($klientet)) {
                        $klientiid = $klienti['klientiid'];
                        $klientiemrimbiemri = $klienti['emri'] . " " . $klienti['mbiemri'];
                        if (!empty($klintid)) {
                            if ($klintid != $klientiid) {
                                echo "<option value='$klientiid'> $klientiemrimbiemri</option>";
                            }
                        } else {
                            echo "<option value='$klientiid'> $klientiemrimbiemri</option>";
                        }
                        
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="automjeti">Automjeti</label> <br>
                <select id="automjeti" name="automjeti">
                    <?php
                    //echo $_GET['rid'];
                    if (isset($_GET['rid'])) {
                        echo "<option value='$autoid'>$autoemri</option>";
                    } else {
                        echo "<option value=''>Zgjedh automjetin </option>";
                    }
                    $automjetet = merrAutomjetet();
                    while ($automjeti = mysqli_fetch_assoc($automjetet)) {
                        $automjetiid = $automjeti['automjetiid'];
                        $automjetiemri = $automjeti['emri'];
                        if (!empty($autoid)) {
                            if ($autoid != $automjetiid) {
                                echo "<option value='$automjetiid'> $automjetiemri</option>";
                            }
                        } else {
                            echo "<option value='$automjetiid'> $automjetiemri</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="datamarrjes">Data e marrjes</label> <br>
                <input type="date" id="datamarrjes" name="datamarrjes"
                value="<?php if(!empty($dataemarrjes)) echo $dataemarrjes ?>">
            </div>
            <div class="inputAndLabels">
                <label for="datakthimit">Data e kthimit</label> <br>
                <input type="date" id="datakthimit" name="datakthimit"
                value="<?php if(!empty($dataekthimit)) echo $dataekthimit ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                    if (!isset($_GET['rid'])) {
                        echo "<input id='shtorezervim' type='submit'
                            name='shtorezervim' class='shtoModifiko' value='Shto Rezervim'>";
                    } else {
                        echo "<input id='modifikorezervim' type='submit'
                            name='modifikorezervim' class='shtoModifiko' value='Modifiko Rezervim'>";
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
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