<?php
if(isset($_POST['id'])) {
	$bisitak = simplexml_load_file("/..data/bisita_liburua.xml");
	echo "<tr><td>Iruzkina</td></tr> \n";
	foreach($bisitak as $bisita) if($bisita['id'] == $_POST['id']) $iruzkina = $bisita->iruzkina;
	echo "<tr><td>$iruzkina</td></tr> \n";
}
else echo('arazoak egon dira');
?>
