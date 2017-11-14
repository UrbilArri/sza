<?php
 if(isset($_POST['izena'], $_POST['posta'])){
 	$bisitak=simplexml_load_file('bisitak.xml');
 	$id=strval($bisitak->childNodes->lenght);
 	$bisita=$bisitak->addchild('bisita');
 	$bisita->addAttribute('id','n'.$id);
 	$timestamp=time();
 	$bisita->addchild('data', $timestamp);
 	$bisita->addchild('izena', $_POST['izena']);
 	if(!isset($_POST['iruzkina'])){
 		$iruzkina='Ez dago iruzkinik';
 	}
 	else{
 		$iruzkina=$_POST['iruzkina'];
 	}
 	$bisita->addchild('iruzkina', $iruzkina);
 	$eposta=$bisita->addchild('eposta', $_POST['posta']);
	$eposta->addAttribute('erakutsi','ez');
	$bisitak->asXML('bisitak.xml');
	echo('Datuak ondo gorde dira');
 }
 else{
 	echo('Ez daude datu guztiak');
 }
?>
