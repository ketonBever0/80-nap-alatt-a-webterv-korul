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
        echo 'alert("HAMIS JELSZÓ!");';
        echo 'window.location.href = "../oldalak/reg.html";';
        echo '</script>';
    exit;
}

header("Location: ../oldalak/profil.php");

//Bejelntkezett felhasználó elmentése
$data = array(
    'fhn' => $data["fhn"],
    'neptun' => $data["neptun"],
    'pass' => $data["pass"],
    'passa' => $data["passa"],
    'profilkep' => "default"
);

// A JSON adatok kiírása a fájlba
$file = '../JSON/aktualisanBejelntkezett.json';

$json_data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

file_put_contents($file, $json_data);
?>