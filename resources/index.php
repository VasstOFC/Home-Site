<?php
	$id_polaczenia = new PDO("mysql:host=localhost;dbname=sklep", 'root','' );
	$wynik= $id_polaczenia->query('SELECT id,nazwa,opis,cena FROM podzespoly WHERE cena < 1000;');
	while($wiersz=$wynik->fetch())
	{
		echo $wiersz['id'].".ㅤ";
		echo $wiersz['nazwa']."ㅤ";
		echo $wiersz['opis']."ㅤ";
		echo $wiersz['cena']."<hr>";
	}
?>