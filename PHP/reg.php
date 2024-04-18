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
            'profilkep' => "default"
        );
    
        // A JSON adatok kiírása a fájlba
        $file = '../JSON/'.$_POST["fhn"].'.json';
        if (file_exists($file)) {
            echo "Sikertelen regisztráció, ilyen felhasználó már létezik!";
            exit;
        }
        $json_data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    
        if(file_put_contents($file, $json_data, FILE_APPEND)) {
            //Sikeres reg, átvisz a profil.html-re
            header('Location: ../oldalak/profil.html');
            exit(); // Megszakítjuk a script végrehajtását
        } else {
            //Ellenőrzés jellegű
            echo 'Hiba történt az adatok mentése közben.';
        }
    }
?>
      
