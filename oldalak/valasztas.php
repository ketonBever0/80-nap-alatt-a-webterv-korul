<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Választás</title>
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
        <form action="szamolas.php" method="POST">

            <label for="oktato">Oktató:</label>
            <select name="oktato" id="oktato">
                <option value="null" disabled selected>Válassz</option>
                <option value="GerTom">GerTom</option>
                <option value="Miki">Miki</option>

            </select>
            <br>
            <label for="word">Szó(fordulat):</label>
            <input type="text" id="word">

            <br>
            <input type="submit" value="Kezdés">

        </form>
    </main>




</body>

</html>