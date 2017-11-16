<?php
 if(isset($_POST['izena'], $_POST['posta'])){
 	$bisitak=simplexml_load_file('bisitak.xml');
 	$id=strval($bisitak->count());
 	$bisita=$bisitak->addchild('bisita');
 	$bisita->addAttribute('id',"n".$id);
 	$date = date('m/d/Y h:i:s a', time());
 	$bisita->addchild('data', $date);
 	$bisita->addchild('izena', $_POST['izena']);
 	if(strlen(trim($_POST['textarea']))<1){
 		$iruzkina='Ez dago iruzkinik';
 	}
 	else{
 		$iruzkina=$_POST['textarea'];
 	}
 	$bisita->addchild('iruzkina', $iruzkina);
 	$eposta=$bisita->addchild('eposta', $_POST['posta']);
 	if(isset($_POST['checkbox'])) $eposta->addAttribute('erakutsi','bai');
	else $eposta->addAttribute('erakutsi','ez');
	$bisitak->asXML('bisitak.xml');
	header('Location: erakutsi.php');
 }
 else{
 	echo('Ez daude datu guztiak');
 }
?>
