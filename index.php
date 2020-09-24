<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styl3.css">
        <title>Filmoteka</title>
    </head>
    <body>
        <section id="b1" class="blok">
            <img src="klaps.png" alt="Nasze filmy">
        </section>
        <section id="b2" class="blok">
            <h1>BAZA FILMÃ“W</h1>
        </section>
        <section id="b3" class="blok">
            <form method="POST" action="index.php">
                <select name="options">
                    <option value="1">Sci-Fi</option>
                    <option value="2">animacja</option>
                    <option value="3">dramat</option>
                    <option value="4">horror</option>
                    <option value="5">komedia</option>
                </select>
                <input type="submit" value="Filmy" name="button">
            </form>
        </section>
        <section id="b4" class="blok">
            <img src="gwiezdneWojny.jpg" alt="szturmowcy">
        </section>
        <section id="gl">
            <h2>Wybrano filmy:</h2>
            <?php 
                $polaczenie = mysqli_connect('localhost', 'root', '','dane');
                    if (!isset($_POST['options'])) {
                        echo " ";
                    } else {
 			$gatunek = $_POST['options'];
 			$zapytanie = "SELECT tytul, rok, ocena FROM filmy WHERE gatunki_id = $gatunek";
 			$query = mysqli_query($polaczenie,$zapytanie);
 				
                                while ($wiersz = mysqli_fetch_assoc($query)) {
                                    echo "<p>Tytu³: " . $wiersz['tytul'] . ", Rok produkcji: " . $wiersz['rok'] . ", Ocena: " . $wiersz['ocena'] . "</p>";
 				}
                                
                      }
 				mysqli_close($polaczenie);
            ?>
        </section>
        <section id="gp">
            <h2>Wszystkie filmy:</h2>
             <?php
                $polaczenie = mysqli_connect('localhost', 'root', '','dane');
                $zapytanie = "SELECT filmy.id,filmy.tytul,rezyserzy.imie,rezyserzy.nazwisko FROM filmy INNER JOIN rezyserzy on filmy.rezyserzy_id=rezyserzy.id";
                $query = mysqli_query($polaczenie, $zapytanie);
                    while ($wiersz = mysqli_fetch_assoc($query))
                    {
                       echo "<p>" . $wiersz['id'] . "." . " " . $wiersz['tytul'] . "," . " " . "re¿yseria:" . " " . $wiersz['imie'] . " " . $wiersz['nazwisko'] . "</p>";
                    }
                mysqli_close($polaczenie);
            ?>
        </section>
        <section id="stopka">
            <p>Autor: 01234567890</p>
            <a href="kwerendy.txt">Zapytania do bazy</a>
            <a href="http://filmy.pl" target="_blank">PrzejdŸ do filmy.pl</a>
        </section>
    </body>
</html>