<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../CSS/menet.css">
    <title>Számolás</title>
</head>

<body>

    <header>
        <img id="logo"></img>
        <nav>
            <ul id="opcio">
                <li>Felvitel</li>
                <li>Korábbiak</li>
                <li>Statisztikák</li>
            </ul>
            <ul id="bejelentkezos">
                <li>Regisztráció</li>
                <li>Bejelentkezés</li>
            </ul>
        </nav>
    </header>

    <main>

    <h2><?php echo $_POST["oktato"] ?></h2>

        <div id="boxcontainer">
            <div class="timebox">
                <p>1: 0:05:00</p>
                <p>Ebből a szempontból</p>
            </div>

        </div>

        <p id="time">0:05:13</p>

        <button>Vége</button>

    </main>




</body>

</html>