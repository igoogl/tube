<?

$kategori = array(
		'Araba',
		'Amat�r',
		'Komik',
		'Kamera �akalar�',
		'Korku',
);

foreach ($kategori as $sirala){
echo '<li><a href="ara.php?q='.$sirala.'">'.$sirala.'</a></li>';
}

?>