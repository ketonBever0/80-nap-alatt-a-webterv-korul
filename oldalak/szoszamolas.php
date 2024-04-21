<!DOCTYPE html>
<?php
if (!isset($_COOKIE["fhn"])) {
    header("Location: ./reg.html");
}
?>
<html lang="hu">

<head>
    <link rel="icon" type="image/x-icon" href="../img/logo.webp">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../CSS/valasztas.css">
    <link rel="stylesheet" href="../CSS/szamolas.css">
    <script src="../JS/mobilmenu.js"></script>
    <title>Választás</title>
    <script defer src="../JS/szamolas.js"></script>
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
                <li class="mobilLink"><a class="link" href="./szoszamolas.html">Felvitel</a></li>
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

    
    <main>

        <!-- <div id="formcontainer"> -->
            <section id="setup">
                
                <h2>Gyakran hallott szavak számolása</h2>

            <form onsubmit={startCounting(event)}>

                <div>
                    <label for="educator">Oktató:</label><br>
                    <!-- <select required id="educator" name="educator" onchange={handleInputChange(event)}>
                        <option value="" disabled selected>Válassz</option>
                        <option value="GerTom">GerTom</option>
                        <option value="Dr. Kató Zoltán">Dr. Kató Zoltán</option>
    
                    </select> -->

                    <input type="text" required id="educator" name="educator" onchange={handleInputChange(event)}>



                </div>
                <br>
                <div>
                    <label for="word">Szó(fordulat):</label><br>
                    <input type="text" required id="word" name="word" onchange={handleInputChange(event)}>
                </div>
                

                <br>
                <input type="submit" value="Kezdés">
                
            </form>
        </section>
        <!-- </div> -->
        
        <article id="oncounting">
            <h2 id="title-educator">&#8203;</h2>
            
            <h3 id="title-word">&#8203;</h3>
            
            <div id="boxcontainer">
                
                
                <!-- <div class="timebox">
                    <p>1: 0:05:00</p>
                    <p>Processzus</p>
                </div><div class="timebox">
                    <p>1: 0:05:00</p>
                    <p>Processzus</p>
                </div><div class="timebox">
                    <p>1: 0:05:00</p>
                    <p>Processzus</p>
                </div><div class="timebox">
                    <p>1: 0:05:00</p>
                    <p>Processzus</p>
                </div><div class="timebox">
                    <p>1: 0:05:00</p>
                    <p>Processzus</p>
                </div><div class="timebox">
                    <p>1: 0:05:00</p>
                    <p>Processzus</p>
                </div><div class="timebox">
                    <p>1: 0:05:00</p>
                    <p>Processzus</p>
                </div><div class="timebox">
                    <p>1: 0:05:00</p>
                    <p>Processzus</p>
                </div><div class="timebox">
                    <p>1: 0:05:00</p>
                    <p>Processzus</p>
                </div><div class="timebox">
                    <p>1: 0:05:00</p>
                    <p>Processzus</p>
                </div><div class="timebox">
                    <p>1: 0:05:00</p>
                    <p>Processzus</p>
                </div><div class="timebox">
                    <p>1: 0:05:00</p>
                    <p>Processzus</p>
                </div> -->


            </div>
            <span id="scroller">&#8203;</span>
        </article>


        <!-- <article id="summary">

            <h2 id="sumtitle">&#8203;</h2>





        </article> -->

    </main>

    <footer id="footer">
        <!-- <p id="timer">0:05:13</p> -->
        <p id="timer">
            <span id="hours"></span>:<span id="minutes"></span>:<span id="seconds"></span>.<span id="milliseconds"></span>
        </p>


    <button id="addbtn" onclick={addCount()}>
        <span class="plusicon">+</span>
        <br>
        <span id="addtitle">&#8203;</span>
        <br>
        <span class="plusicon">+</span>
    </button>

    <button id="stopbtn" onclick={stopTimer()}>
        Vége
    </button>

    </footer>




</body>

</html>