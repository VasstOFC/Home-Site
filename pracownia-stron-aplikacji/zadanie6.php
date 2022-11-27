<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 6</title>
</head>

<body>
    <?php
    /* 
    skrypt wysyła do bazy danych zapytanie wybierające jedynie pola id, nazwa, opis, cena z tabeli podzespoly dla tych podzespołów, których cena jest niższa niż 1000 zł 
    każdy zwrócony zapytaniem wiersz jest wyświetlany w osobnym wierszu tabeli w panelu głównym zgodnie z obrazem 2 
    */
    $polaczenie = mysqli_connect('localhost', 'root', '', 'sklep');
    $zapytanie1 = "SELECT id, nazwa , opis, cena FROM podzespoly WHERE cena < 1000";
    $wynik = mysqli_query ($polaczenie, $zapytanie1);
    echo "<table>";
    echo "<tr>"."<th>NUMER</th>"."<th>NAZWA PODZESPOŁU</th>"."<th>OPIS</th>"."<th>CENA</th>"."</tr>";
    while ($wiersz = mysqli_fetch_array($wynik)) {
        echo "<tr><td>"."$wiersz[id]"."</td>";
        echo "<td>" ."$wiersz[nazwa]"."</td>";
        echo "<td>" ."$wiersz[opis]"."</td>";
        echo "<td>" ."$wiersz[cena]"."</td></tr>";
    }
    echo "</table>";



    mysqli_close($polaczenie);
    ?>

</table>
</body>

</html>