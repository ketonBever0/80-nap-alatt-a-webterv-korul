<?php
if(empty($_POST["jelszo"]) || empty($_POST["jelszoujra"]))
{
    echo '<script>';
    echo 'alert("Nincs kitöltve valamelyik input!");';
    echo 'window.location.href = "../oldalak/profil.php";';
    echo '</script>';
    exit;
}

if (($_POST["jelszo"] != $_POST["jelszoujra"])) {
    echo '<script>';
    echo 'alert("A jelszavak nem egyeznek meg!");';
    echo 'window.location.href = "../oldalak/profil.php";';
    echo '</script>';
    exit;
}

$jsonData = file_get_contents('../JSON/aktualisanBejelntkezett.json');
$data = json_decode($jsonData, true);
$felhasznalonev = $data["fhn"];

$file = '../JSON/USERS/'.$felhasznalonev.'.json';

$data = array(
    'fhn' => $data["fhn"],
    'neptun' => $data["neptun"],
    'pass' => password_hash($_POST["jelszo"],PASSWORD_DEFAULT),
    'passa' => password_hash($_POST["jelszoujra"],PASSWORD_DEFAULT),
    'profilkep' => $data["profilkep"]
);

$json_data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents($file, $json_data);

echo '<script>';
echo 'alert("A jelszó sikeresen módosítva!");';
echo 'window.location.href = "../oldalak/profil.php";';
echo '</script>';
exit;
?>