<?php
$bisitak = simplexml_load_file('bisitak.xml');
echo "<table border = '1'> \n";
echo "<tr><td>Data</td><td>Izena</td><td>Post-a</td><td>Iruzkina</td></tr> \n";
foreach($bisitak->bisita as $bisita)
{
	$data = $bisita->data;
	$izena = $bisita->izena;
	$iruzkina= $bisita->iruzkina;
	$eposta = $bisita->eposta;
	if($eposta['erakutsi']=='ez') $eposta="";
	echo "<tr><td>$data</td><td>$izena</td><td>$eposta</td><td>$iruzkina</td></tr> \n";	
}
?>
