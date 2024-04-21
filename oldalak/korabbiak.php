<?php
if (isset($_POST["like"])) {
    // session_start();
    $index = $_POST["index"];
    $user = $_POST["like"];
    $data = array_reverse(json_decode(file_get_contents("../JSON/meresek.json"), true));

    if (in_array($_POST["like"], $data[$index]["likes"])) {
        for ($i = 0; $i < count($data[$index]["likes"]); $i++) {
            if ($data[$index]["likes"][$i] == $user) {
                unset($data[$index]["likes"][$i]);
                break;
            }
        }
    } else {
        for ($i = 0; $i < count($data[$index]["dislikes"]); $i++) {
            if ($data[$index]["dislikes"][$i] == $user) {
                unset($data[$index]["dislikes"][$i]);
                break;
            }
        }
        $data[$index]["likes"][] = $user;
    }
    file_put_contents("../JSON/meresek.json", json_encode(array_reverse($data), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header("Location: korabbiak.php");
}

if (isset($_POST["dislike"])) {
    // session_start();
    $index = $_POST["index"];
    $user = $_POST["dislike"];
    $data = array_reverse(json_decode(file_get_contents("../JSON/meresek.json"), true));

    if (in_array($_POST["dislike"], $data[$index]["dislikes"])) {
        for ($i = 0; $i < count($data[$index]["dislikes"]); $i++) {
            if ($data[$index]["dislikes"][$i] == $user) {
                unset($data[$index]["dislikes"][$i]);
                break;
            }
        }
    } else {
        for ($i = 0; $i < count($data[$index]["likes"]); $i++) {
            if ($data[$index]["likes"][$i] == $user) {
                unset($data[$index]["likes"][$i]);
                break;
            }
        }
        $data[$index]["dislikes"][] = $user;
    }
    file_put_contents("../JSON/meresek.json", json_encode(array_reverse($data), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header("Location: korabbiak.php");
}
?>

<!DOCTYPE html>
<html lang="hu">

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
                <li class="mobilLink"><a class="link" href="../index.php">Kezdőlap</a></li>
                <li class="mobilLink"><a class="link" href="./szoszamolas.php">Felvitel</a></li>
                <li class="mobilLink"><a class="link" href="./korabbiak.php">Korábbiak</a></li>
                <li class="mobilLink"><a class="link">Statisztikák</a></li>


                <?php
                if (isset($_COOKIE["fhn"])) {
                    echo '<li class="mobilLink" id="profil"><a class="link" href="./profil.php">Profil</a></li>';
                    echo '<li class="mobilLink" id="kijelentkezes"><a class="link" href="../PHP/kij.php">Kilépés</a></li>';
                } else {
                    echo '<li class="mobilLink" id="bejelentkezes"><a class="link" href="./reg.html">Belépés</a></li>';
                    // header("Location: ./reg.html");
                }

                ?>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Korábbi számolások</h1>

        <div class="meresek">

            <?php

            $data = json_decode(file_get_contents("../JSON/meresek.json"), true);
            $data = array_reverse($data);

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

                $who = $data[$i]['who'];
                echo "<form method=\"post\">";
                echo "<input type=\"number\" class=\"d-none\" name=\"index\" value=$i>";
                echo "<input type=\"text\" class=\"d-none\" name=\"like\" value=$who>";
                echo "<input type=\"submit\" class=\"likebtn";
                for ($j = 0; $j < count($data[$i]["likes"]); $j++) {
                    if ($data[$i]["likes"][$j] == $who) {
                        echo " already";
                        break;
                    }
                }
                echo "\" name=\"likebtn\" value=\"Jó - $likes\">";
                echo "</form>";


                $dislikes = count($data[$i]["dislikes"]);
                echo "<form method=\"post\">";
                echo "<input type=\"number\" class=\"d-none\" name=\"index\" value=$i>";
                echo "<input type=\"text\" class=\"d-none\" name=\"dislike\" value=\"$who\">";
                echo "<input type=\"submit\" class=\"dislikebtn";
                for ($j = 0; $j < count($data[$i]["dislikes"]); $j++) {
                    if ($data[$i]["dislikes"][$j] == $who) {
                        echo " already";
                        break;
                    }
                }
                echo "\" name=\"dislikebtn\" value=\"Nem jó - $dislikes\" data-index=\"$i\">";
                echo "</form>";
                echo "<br>";
                $when = $data[$i]['when'];

                echo "számolta: $who<br>ekkor: $when";

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