<?php
$felhasznalonev = $_POST["fnb"];
// JSON fájl beolvasása
if (!file_exists('../JSON/USERS/'.$_POST['fnb'].'.json')) {
    echo '<script>';
        echo 'alert("FELHASZNÁLÓ NEM LÉTEZIK!");';
        echo 'window.location.href = "../oldalak/reg.html";';
        echo '</script>';
    exit;
}
$jsonData = file_get_contents('../JSON/USERS/'.$_POST['fnb'].'.json');

// JSON adatok dekódolása
$data = json_decode($jsonData, true);

if (!password_verify($_POST["passb"],$data["pass"])) {
    echo '<script>';
        echo 'alert("HIBÁS JELSZÓ!");';
        echo 'window.location.href = "../oldalak/reg.html";';
        echo '</script>';
    exit;
}



//Bejelntkezett felhasználó elmentése
/*$data = array(
    'fhn' => $data["fhn"],
    'neptun' => $data["neptun"],
    'pass' => $data["pass"],
    'passa' => $data["passa"],
    'profilkep' => $data["profilkep"]
);*/

setcookie('fhn', $data['fhn'], time() + 3600,'/');
setcookie('neptun', $data['neptun'], time() + 3600,'/');
setcookie('profilkep', $data['profilkep'], time() + 3600,'/');
$felhasznalonev = $_COOKIE["fhn"];
echo "<script>console.log('$felhasznalonev')</script>";
header("Location: ../oldalak/profil.php");
// A JSON adatok kiírása a fájlba - Teszt hogy működik-e a profilra bejelentkezés
/*$file = '../JSON/aktualisanBejelntkezett.json';

$json_data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

file_put_contents($file, $json_data);*/
?>