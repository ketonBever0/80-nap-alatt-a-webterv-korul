<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../CSS/korabbiak.css">
    <title>Korábbi mérések</title>
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
                <li class="mobilLink"><a class="link" href="../index.html">Kezdőlap</a></li>
                <li class="mobilLink"><a class="link" href="./szoszamolas.html">Felvitel</a></li>
                <li class="mobilLink"><a class="link">Korábbiak</a></li>
                <li class="mobilLink"><a class="link">Statisztikák</a></li>
                <li class="mobilLink" id="bejelentkezes"><a class="link" href="./reg.html">Belépés</a></li>
                <li class="mobilLink" id="profil"><a class="link" href="./profil.html">Profil</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <h1>Korábbi számolások</h1>

        <div class="meresek">

            <?php

            $data = json_decode(file_get_contents("../JSON/meresek.json"), true);

            for ($i = 0; $i < count($data); $i++) {
                echo "<div class=\"meresbox\">";
                echo "<h3>";
                echo $data[$i]["educator"];
                echo " - ";
                echo $data[$i]["word"];
                echo "</h3>";
                echo "<ol>";
                for ($j = 0; $j < count($data[$i]["realTimes"]); $j++) {
                    echo "<li>";
                    echo $data[$i]["realTimes"][$j];
                    echo " => ";
                    echo $data[$i]["stopwatchTimes"][$j];
                    echo "</li>";
                }
                echo "</ol>";
                
                $all = $data[$i]["all"];
                echo "<p>Összesen: $all</p><br>";

                $likes = count($data[$i]["likes"]);
                echo "<button class=\"likebtn\" data-index=\"$i\" data-action=\"like\">Jó - $likes</button>";
                $dislikes = count($data[$i]["dislikes"]);
                echo "<button class=\"dislikebtn\" data-index=\"$i\" data-action=\"dislike\">Nem jó - $dislikes</button>";

                echo "</div>";
                echo "<br>";
            }


            ?>


        </div>



    </main>


    <footer>
        <p id="labszoveg">Oldal készítői a "80 nap alatt a webterv körül" csapat</p>
    </footer>

</body>

</html>