<?php
  if (isset($_FILES["profilkepFeltoltes"])) {
    echo "A fájl neve: " . $_FILES["profilkepFeltoltes"]["name"] . "<br/>";
    echo "A fájl ideiglenes neve: " . $_FILES["profilkepFeltoltes"]["tmp_name"] . "<br/>";
    echo "A fájl mérete (bájtokban): " . $_FILES["profilkepFeltoltes"]["size"] . "<br/>";
    echo "A fájl típusa: " . $_FILES["profilkepFeltoltes"]["type"] . "<br/>";
    echo "Hibakód: " . $_FILES["profilkepFeltoltes"]["error"] . "<br/>";
    
    setcookie('profilkep', $_COOKIE['profilkep'], time() - 3600,'/');
    
    //$fajlnev = $_FILES["profilkepFeltoltes"]["name"];
    $fajlnev = $_FILES["profilkepFeltoltes"]["tmp_name"];
    $celhely = "../img/USER/". $_COOKIE["fhn"] ."-".$_FILES["profilkepFeltoltes"]["name"];

    if(move_uploaded_file($fajlnev, $celhely))
    {
      echo "sikeres áthelyezés";
    }

    
    setcookie('profilkep', $_COOKIE["fhn"] ."-".$_FILES["profilkepFeltoltes"]["name"], time() + 3600,'/');

    $jsonData = file_get_contents('../JSON/USERS/'.$_COOKIE["fhn"].'.json');
    $data = json_decode($jsonData, true);

    $data = array(
      'fhn' => $data["fhn"],
      'neptun' => $data["neptun"],
      'pass' => $data["pass"],
      'passa' => $data["passa"],
      'profilkep' => $_COOKIE["fhn"] ."-".$_FILES["profilkepFeltoltes"]["name"]
    );

    $file = '../JSON/USERS/'.$_COOKIE["fhn"].'.json';
    $json_data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents($file, $json_data);
    header("Location: ../oldalak/profil.php");
  }
?>