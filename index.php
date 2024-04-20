<!DOCTYPE html>
<html lang="hu">
    <head>
        <link rel="icon" type="image/x-icon" href="./img/logo.webp">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./CSS/kezdooldal.css">
        <link rel="stylesheet" href="./style.css">
        
        <meta charset="utf-8">
        <script src="./JS/mobilmenu.js"></script>
        <title>Kezdőlap</title>
    </head>
    <body>
       
        <header>
            <img id="logo" title="LOGO" alt="LOGO" src="./img/logo.webp">
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
                    <li class="mobilLink"><a class="link" href="./index.php">Kezdőlap</a></li>
                    <li class="mobilLink"><a class="link" href="./oldalak/szoszamolas.php">Felvitel</a></li>
                    <li class="mobilLink"><a class="link" href="./oldalak/korabbiak.php">Korábbiak</a></li>
                    <li class="mobilLink"><a class="link">Statisztikák</a></li>
                    <?php
                        if (isset($_COOKIE["fhn"])) {
                            echo '<li class="mobilLink" id="profil"><a class="link" href="./oldalak/profil.php">Profil</a></li>';
                            echo '<li class="mobilLink" id="kijelentkezes"><a class="link" href="./PHP/kij.php">Kilépés</a></li>';
                        }
                        else {
                            echo '<li class="mobilLink" id="bejelentkezes"><a class="link" href="./oldalak/reg.html">Belépés</a></li>';
                            //header("Location: ./reg.html");
                        }
                    
                    ?>
                </ul>
            </nav>
        </header>
        <main>
            <h1>Az oldalról röviden</h1>
            <p class="kezdo">Üdvözöllek a weboldalon, amely lehetővé teszi számodra, hogy részletesebben megismerd az előadók stílusát és nyelvhasználatát! Mostantól kiválaszthatod az előadót, akár egy adott témában vagy kontextusban is, és megtekintheted az általa használt kifejezéseket és szófordulatokat. Ez egy fantasztikus lehetőség arra, hogy mélyebb betekintést nyerj az előadó gondolatmenetébe és stílusába!</p>
            <p class="kezdo">Miután kiválasztottad az előadót, a platform összehasonlítja az aktuális előadásban elhangzott kifejezéseket az előző órákban vagy előadásokban használt kifejezésekkel. Ez segít abban, hogy megállapítsd, az adott előadó mennyire tér el az általános nyelvhasználattól vagy a saját korábbi stílusától.</p>
            <p class="kezdo">Ne feledd, hogy ez a funkció nemcsak arra szolgál, hogy megértsd az előadók egyedi kommunikációs stílusát, hanem segít neked is abban, hogy kritikusabb megközelítést alakíts ki az előadások és prezentációk iránt. Emellett az előadók számára is hasznos visszajelzést nyújthat arról, hogyan fejlődik a nyelvhasználatuk az idő múlásával, és hogyan tarthatják frissen előadói stílusukat.</p>
            <p class="kezdo">További böngészést kívánunk az oldalon, és reméljük, hogy élvezed az oldal funkcióit!</p>
        </main>
        <footer>
            <p id="labszoveg">Oldal készítői a "80 nap alatt a webterv körül" csapat</p>
        </footer>
    </body>
</html>