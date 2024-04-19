<?php
    if (empty($_POST["fhn"]) || empty($_POST["neptun"]) || empty($_POST["pass"]) || empty($_POST["passa"]))
    {
        //Sikertelen reg -> vissza a reg.html-re
        echo '<script>';
        echo 'alert("Sikertelen regisztráció!");';
        echo 'window.location.href = "../oldalak/reg.html";';
        echo '</script>';
        //header('Location: ../oldalak/reg.html');
        //echo "Sikertelen regisztráció!";
        exit;
    }
    if (trim($_POST["pass"]) != trim($_POST["passa"])) {
        echo "Sikertelen regisztráció!<br>";
        echo "Jelszavak nem egyeznek meg!";
        exit;
    }
    if (!empty($_POST["fhn"]) || !empty($_POST["neptun"]) || !empty($_POST["pass"]) || !empty($_POST["passa"]))
    {
        
        $data = array(
            'fhn' => trim($_POST["fhn"]),
            'neptun' => trim($_POST["neptun"]),
            'pass' => password_hash(trim($_POST["pass"]),PASSWORD_DEFAULT),
            'passa' => password_hash(trim($_POST["passa"]),PASSWORD_DEFAULT),
            'profilkep' => "profilpelda.webp"
        );
    
        // A JSON adatok kiírása a fájlba
        $file = '../JSON/USERS/'.$_POST["fhn"].'.json';
        if (file_exists($file)) {
            echo "Sikertelen regisztráció, ilyen felhasználó már létezik!";
            exit;
        }
        $json_data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    
        if(file_put_contents($file, $json_data)) {
            //Sikeres reg, átvisz a profil.html-re
            header('Location: ../oldalak/profil.php');
            setcookie('fhn', $data['fhn'], time() + 3600,'/');
            setcookie('neptun', $data['neptun'], time() + 3600,'/');
            setcookie('profilkep', $data['profilkep'], time() + 3600,'/');
            echo "<script>console.log(".$_COOKIE['fhn'].")</script>";
            //file_put_contents('../JSON/aktualisanBejelntkezett.json', $json_data);
            exit(); // Megszakítjuk a script végrehajtását
        } else {
            //Ellenőrzés jellegű
            echo 'Hiba történt az adatok mentése közben.';
        }
    }
?>