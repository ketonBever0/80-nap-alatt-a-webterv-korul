<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="../img/logo.webp">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/felhasznalolistazas.css">
        <link rel="stylesheet" href="../style.css">
        <title>Profil</title>
        <script src="../JS/mobilmenu.js"></script>
    </head>
    <body>
        <header>
            <img id="logo" title="LOGO" alt="LOGO" src="../img/logo.webp">
            <nav>
                <ul id="hambi" onclick=nyisdKi()>
                    <li class="hambiM">
                        <div class="hambiMenu"></div>
                        <div class="hambiMenu"></div>
                        <div class="hambiMenu"></div>
                    </li>
                </ul>
                <ul id="opcio">
                <li id="hambiKinyitva">
                    <ul id="hambi2" onclick=csukdBe()>
                        <li class="hambiM">
                            <div class="hambiMenu" id="felso"></div>
                            <div class="hambiMenu" id="kozep"></div>
                            <div class="hambiMenu" id="also"></div>
                        </li>
                    </ul>
                </li>
                <li class="mobilLink"><a class="link" href="../index.php">Kezdőlap</a></li>
                <li class="mobilLink"><a class="link" href="./szoszamolas.php">Felvitel</a></li>
                <li class="mobilLink"><a class="link" href="./korabbiak.php">Korábbiak</a></li>
                <li class="mobilLink"><a class="link">Statisztikák</a></li>
                
                
                <?php
                    if (isset($_COOKIE["admin"]))
                    {
                        if ($_COOKIE["admin"] == 1) 
                        {
                            echo '<li class="mobilLink"><a class="link" href="./fhlista.php">Felhasználók</a></li>';
                        }
                    }

                    if (isset($_COOKIE["fhn"])) {
                        echo '<li class="mobilLink" id="profil"><a class="link" href="./profil.php">Profil</a></li>';
                        echo '<li class="mobilLink" id="kijelentkezes"><a class="link" href="../PHP/kij.php">Kilépés</a></li>';
                    }
                    else {
                        echo '<li class="mobilLink" id="bejelentkezes"><a class="link" href="./reg.html">Belépés</a></li>';
                        //header("Location: ./reg.html");
                    }
                 
                ?>           
            </ul>
            </nav>
        </header>
        <main>
            <?php
                $mappaUtvonal = "../JSON/USERS/";

                //echo $mappaUtvonal;

                if (is_dir($mappaUtvonal)) {
                    if ($mappanyitas = opendir($mappaUtvonal)) {
                        echo "<h1 class='focim'>Adminisztrátorok</h1>";
                        while (($file = readdir($mappanyitas)) !== false) { // Módosítva: !== false
                            if (pathinfo($file, PATHINFO_EXTENSION) == "json") { // Módosítva: zárójelek hozzáadva és összehasonlítás hozzáadva
                                $teljesUtvonal = $mappaUtvonal . '/' . $file; // Módosítva: teljes útvonal kiszámítása

                                //echo "Valami";

                                $fajlTartalom = file_get_contents($teljesUtvonal);
                                $szabdaltTartalom = json_decode($fajlTartalom, true);
                                if ($szabdaltTartalom["admin"] === true) {
                                    echo '<div class="fhdoboz">';
                                    echo '<img class="kicsikepek" src="../img/USER/'.$szabdaltTartalom['profilkep'].'">';
                                    echo '<p class="fhnev"><span class="cim">Felhasználónév</span><br>'.$szabdaltTartalom["fhn"].'</p>';
                                    echo '<p class="neptun"><span class="cim">Neptunkód</span><br>'.$szabdaltTartalom["neptun"].'</p>';
                                    echo "</div>";
                                }
                                
                            }
                        }
                        closedir($mappanyitas); // Mappa bezárása
                    }
                    if ($mappanyitas = opendir($mappaUtvonal)) {
                        echo "<h1 class='focim'>Felhasználók</h1>";
                        while (($file = readdir($mappanyitas)) !== false) { // Módosítva: !== false
                            if (pathinfo($file, PATHINFO_EXTENSION) == "json") { // Módosítva: zárójelek hozzáadva és összehasonlítás hozzáadva
                                $teljesUtvonal = $mappaUtvonal . '/' . $file; // Módosítva: teljes útvonal kiszámítása

                                //echo "Valami";

                                $fajlTartalom = file_get_contents($teljesUtvonal);
                                $szabdaltTartalom = json_decode($fajlTartalom, true);
                                if ($szabdaltTartalom["admin"] === false) {
                                    echo '<div class="fhdoboz">';
                                    echo '<img class="kicsikepek" src="../img/USER/'.$szabdaltTartalom['profilkep'].'">';
                                    echo '<p class="fhnev"><span class="cim">Felhasználónév</span><br>'.$szabdaltTartalom["fhn"].'</p>';
                                    echo '<p class="neptun"><span class="cim">Neptunkód</span><br>'.$szabdaltTartalom["neptun"].'</p>';
                                    echo "</div>";
                                }
                                
                            }
                        }
                        closedir($mappanyitas); // Mappa bezárása
                    }
                }
            ?>
        </main>
        <footer>
            <p id="labszoveg">Oldal készítői a "80 nap alatt a webterv körül" csapat</p>
        </footer>
    </body>