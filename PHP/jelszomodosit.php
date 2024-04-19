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

?>