<?php
session_start();
$dbconn;
dbConnection();
function dbConnection(){
    global $dbconn;
    $dbconn=mysqli_connect("localhost",'root','','rentacar');
    if(!$dbconn){
        die("Deshtoi lidhja me DB".mysqli_error($dbconn));
    }
}

/** Funksionet per perdoruesit */
function merrPerdoruesit(){
    global $dbconn;
    $sql="SELECT perdoruesiid, emri, mbiemri, email, telefoni FROM perdoruesit";
    return mysqli_query($dbconn,$sql);
}
function merrPerdoruesId($pid){
    global $dbconn;
    $sql="SELECT perdoruesiid, emri, mbiemri, email, telefoni,role,fjalekalimi,nrpersonal FROM perdoruesit";
    $sql.=" WHERE perdoruesiid=$pid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res);
}
function shtoPerdorues($emri,$mbiemri,$roli,$nrpersonal,$telefoni,$email,$fjalekalimi){
    global $dbconn;
    $sql="INSERT INTO perdoruesit(emri, mbiemri, email, fjalekalimi, telefoni, nrpersonal, role) VALUES ";
    $sql.="('$emri', '$mbiemri', '$email', '$fjalekalimi', '$telefoni', '$nrpersonal', '$roli')";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Perdoruesi u shtua me sukses";
        header("Location: perdoruesit.php");
    }else{
        die("Deshtoi shtimi i perdoruesit" . mysqli_error($dbconn));
    }
}
function modifikoPerdorues($perdoruesiid,$emri,$mbiemri,$roli,$nrpersonal,$telefoni,$email,$fjalekalimi){
    global $dbconn;
    $sql="UPDATE perdoruesit SET emri='$emri', mbiemri='$mbiemri', email='$email' ,";
    $sql.="fjalekalimi='$fjalekalimi', telefoni='$telefoni', nrpersonal='$nrpersonal'";
    $sql.=", role='$roli' WHERE perdoruesiid=$perdoruesiid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Perdoruesi u modifukua me sukses";
        header("Location: perdoruesit.php");
    }else{
        die("Deshtoi modifikimi i perdoruesit" . mysqli_error($dbconn));
    }
}
/** */

function merrRezervimet(){
    global $dbconn;
    $sql="SELECT r.rezervimiid, a.emri, CONCAT(k.emri,' ',k.mbiemri) AS emrimbiemri, r.dataemarrjes, r.dataekthimit";
    $sql.=" FROM rezervimet r INNER JOIN automjetet a  ON a.automjetiid=r.automjetiid INNER JOIN klientet k ON r.klientiid=k.klientiid";
    $sql.=" ORDER BY r.rezervimiid DESC";
    return mysqli_query($dbconn,$sql);
}
function merrRezervimId($rezervimiid){
    global $dbconn;
    $sql="SELECT r.rezervimiid,a.automjetiid, a.emri,k.klientiid, CONCAT(k.emri,' ',k.mbiemri) AS emrimbiemri, r.dataemarrjes, r.dataekthimit";
    $sql.=" FROM rezervimet r INNER JOIN automjetet a  ON a.automjetiid=r.automjetiid INNER JOIN klientet k ON r.klientiid=k.klientiid";
    $sql.=" WHERE rezervimiid=$rezervimiid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res);
}
function shtoRezervim($klientiid,$automjetiid,$dataemarrjes,$dataekthimit){
    global $dbconn;

    $perdoruesiid=$_SESSION['user']['perdoruesiid'];
    $sql="INSERT INTO rezervimet(klientiid, automjetiid, perdoruesiid, dataemarrjes, dataekthimit) VALUES ";
    $sql.="('$klientiid', '$automjetiid', '$perdoruesiid', '$dataemarrjes', '$dataekthimit')";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Rezervimi u shtua me sukses";
        header("Location: rezervimet.php");
    }else{
        die("Deshtoi shtimi i rezervimit" . mysqli_error($dbconn));
    }
}
function modifikoRezervim($rezervimiid,$klientiid,$automjetiid,$dataemarrjes,$dataekthimit){
    global $dbconn;

    $perdoruesiid=2;
    $sql="UPDATE rezervimet  SET klientiid='$klientiid', automjetiid='$automjetiid', perdoruesiid='$perdoruesiid',";
    $sql.=" dataemarrjes='$dataemarrjes', dataekthimit='$dataekthimit' WHERE rezervimiid=$rezervimiid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Rezervimi u modifiku me sukses";
        header("Location: rezervimet.php");
    }else{
        die("Deshtoi modifikimi i rezervimit" . mysqli_error($dbconn));
    }
}


/** */

/** */

/** Funksionet per kategorite */
function merrKategorit(){
    global $dbconn;
    $sql="SELECT * FROM kategorit";
    return mysqli_query($dbconn,$sql); 
}
function merrKategoriId($kid){
    global $dbconn;
    $sql="SELECT * FROM kategorit WHERE kategoriaid=$kid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res); 
}
function shtoKategori($emri,$pershkrimi,$kostoja){
    global $dbconn;
    $sql="INSERT INTO kategorit(emri, pershkrimi, kostoja) VALUES ('$emri', '$pershkrimi', $kostoja)";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Kategoria u shtua me sukses";
        header("Location: kategorit.php");
    }else{
        die("Deshtoi shtimi i kategoris" . mysqli_error($dbconn));
    }
}
function modifikoKategori($kategoriaid,$emri,$pershkrimi,$kostoja){
    global $dbconn;
    $sql="UPDATE kategorit  SET emri='$emri', pershkrimi='$pershkrimi', kostoja='$kostoja'";
    $sql.=" WHERE kategoriaid=$kategoriaid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Kategoria u modifiku me sukses";
        header("Location: kategorit.php");
    }else{
        die("Deshtoi modifikimi i kategoris" . mysqli_error($dbconn));
    }
}

/** Funksionet per automjetet */
function merrAutomjetet(){
    global $dbconn;
    $sql="SELECT a.automjetiid, a.emri automjetiemri,k.emri kategoriaemri,a.nrregjistrimi,a.pershkrimi,k.kostoja
    FROM automjetet a INNER JOIN kategorit k ON a.kategoriaid=k.kategoriaid";
    return mysqli_query($dbconn,$sql);
}
function merrAutomjetId($automjetiid){
    global $dbconn;
    $sql="SELECT a.automjetiid, a.emri automjetiemri,k.kategoriaid, k.emri kategoriaemri,a.nrregjistrimi,";
    $sql.=" a.pershkrimi, k.kostoja FROM automjetet a INNER JOIN kategorit k ON a.kategoriaid=k.kategoriaid";
    $sql.=" WHERE a.automjetiid=$automjetiid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res);
}
function shtoAutomjet($emri,$kategoriaid,$nrregjistrimi,$pershkrimi){
    global $dbconn;
    $sql="INSERT INTO automjetet (emri,kategoriaid,nrregjistrimi, pershkrimi) 
    VALUES ('$emri', $kategoriaid,'$nrregjistrimi', '$pershkrimi')";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Automjeti u shtua me sukses";
        header("Location: automjetet.php");
    }else{
        die("Deshtoi shtimi i automjetit" . mysqli_error($dbconn));
    }
}
function modifikoAutomjet($automjetiid,$emri,$kategoriaid,$nrregjistrimi,$pershkrimi){
    global $dbconn;
    $sql="UPDATE automjetet  SET emri='$emri', kategoriaid=$kategoriaid, nrregjistrimi='$nrregjistrimi',pershkrimi='$pershkrimi'";
    $sql.=" WHERE automjetiid=$automjetiid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Automjeti u modifiku me sukses";
        header("Location: automjetet.php");
    }else{
        die("Deshtoi modifikimi i automjetit" . mysqli_error($dbconn));
    }
}
function fshijAutomjet($automjetiid){
    global $dbconn;
    $sql="DELETE FROM automjetet WHERE automjetiid=$automjetiid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Automjeti u fshi me sukses";
        header("Location: automjetet.php");
    }else{
        die("Deshtoi fshirja i automjetit" . mysqli_error($dbconn));
    }
}
?>
