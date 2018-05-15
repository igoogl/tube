<?

$kategori = array(
		'Araba',
		'Amatör',
		'Komik',
		'Kamera Þakalarý',
		'Korku',
);

foreach ($kategori as $sirala){
echo '<li><a href="ara.php?q='.$sirala.'">'.$sirala.'</a></li>';
}

?>