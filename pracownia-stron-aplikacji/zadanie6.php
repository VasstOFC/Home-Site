<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="https://i.imgur.com/5AhVa3e.png" type="image/x-icon">
    <title>Ćwiczenie 6</title>
    <style>
        body {
            background-color: darkgrey;
        }
        div {
            width: 400px;
            background-color: lightgray;
            padding: 10px;
            border-radius: 15px;
            box-shadow: 5px 10px 5px lightcyan;
        }

        p {
            font-size: 14pt;
        }

        .pole {
            position: absolute;
            left: 130px;
        }

        #button {
            padding: 10px;
            background-color: white;
            border-radius: 5px;
            margin-top: 15px;
            border: 0px;
        }

        #button:hover {
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -ms-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
            background-color: darkgoldenrod;
        }

        input {
            border: 0;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div>
        <form action="index.php" method="POST">

            <b>Numer PESEL:</b>
            <input type="text" class="pole" name="pesel"><br>
            <input type="submit" value="Wyślij" id="button">
        </form>

        <?php
        function walidacja()
        {
            $pesel = $_POST['pesel'];
            echo '<br><hr>';

            /*           Sprawdzanie ilości znaków             */
            if (preg_match('/^[0-9]{11}$/', $pesel)) {
            } else {
                echo '<p style="margin: 0; color: red">PESEL nie ma 11 znaków</p>';
            }

            /*     Sprawdzanie czy podana wartość to cygry     */
            if (ctype_digit($pesel) === true) {
            } else {
                echo '<p style="margin: 0; color: red">PESEL musi składać się tylko z cyfr!</p>';
            }

            /*           Sprawdzanie sumy kontrolnej           */
            $wagi = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);
            $walidacja = 0;
            for ($i = 0; $i < 10; $i++) {
                $walidacja += $wagi[$i] * !empty($pesel[$i]);
            }
            $odejmowanie = 10 - $walidacja % 10;
            $liczba_kontrolna = ($odejmowanie == 10) ? 0 : $odejmowanie;
            if ($liczba_kontrolna == !empty($pesel[10])) {
                echo '<p style="margin: 0; color: green">Suma kontrolna jest poprawna!</p>';
            } else {
                echo '<p style="margin: 0; color: red">Suma kontrolna jest niepoprawna!</p>';
            }
            echo '<hr>';

            /*                 Sprawdzanie płci                */
            if (!empty($pesel[9]) % 2 == 1) {
                echo 'Płeć: Mężczyzna';
            } else {
                echo 'Płeć: Kobieta';
            }

        }
        walidacja();
        ?>

</body>

</html>