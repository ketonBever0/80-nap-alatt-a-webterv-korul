<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="../img/logo.webp">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../CSS/profil.css">
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
                        header("Location: ./reg.html");
                    }
                 
                ?>           
            </ul>
            </nav>
        </header>
        <?php
            //$jsonData = file_get_contents('../JSON/aktualisanBejelntkezett.json');
            //$data = json_decode($jsonData, true);
        ?>
        <main>
            <section id="profil">
                <h6>&#8203;</h6>
                <article id="profilkepMegjelenes">
                    <h6>&#8203;</h6>
                    <?php echo '<img id="profilkep" src="../img/USER/'.$_COOKIE["profilkep"].'" alt="profilkep">'; ?>
                </article>
                <article id="profilAdatok">
                    <h6>&#8203;</h6>
                    <table id="pat">
                        
                        <tbody>
                            <tr>
                                <th>Felhasználónév</th>
                                <td><?php echo $_COOKIE["fhn"]; ?></td>
                            </tr>
                            <tr>
                                <th>Neptunkód</th>
                                <td><?php echo $_COOKIE["neptun"]; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </article>
            </section>
            <section id="szerkesztos">
                <h6>&#8203;</h6>
                <article id="jelszovalt">
                    <h6>&#8203;</h6>
                    <form action="../PHP/jelszomodosit.php" method="post" enctype="application/x-www-form-urlencoded">
                        <label for="jel"></label>
                        <input type="password" name="jelszo" id="jel" placeholder="Új jelszó">
                        <br>
                        <label for="jel2"></label>
                        <input type="password" name="jelszoujra" id="jel2"  placeholder="Új jelszó újra">
                        <br>
                        <input type="submit" value="Jelszó módosítása">
                    </form>
                </article>
                <article id="profilkepModositas">
                    <h6>&#8203;</h6>
                    <form action="../PHP/profilkepcsere.php" method="post" enctype="multipart/form-data">
                        <input type="file" id="kepf" name="profilkepFeltoltes" accept="image/*">
                        <input type="submit" value="Profilkép módosítása">
                    </form>
                </article>
            </section>
        </main>
        <footer>
            <p id="labszoveg">Oldal készítői a "80 nap alatt a webterv körül" csapat</p>
        </footer>
    </body>
</html>