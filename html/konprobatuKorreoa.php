<?php
if(isset($_POST['korreoa'])){
	$erabiltzaileak = simplexml_load_file("erabiltzaileak.xml");
	$dago="";
	foreach($erabiltzaileak->erabiltzailea as $erabiltzailea){
		if($erabiltzailea->korreoa == $_POST['korreoa']) $dago= "korreo hau jada erregistraturik dago";
		}
	if($dago=="")$dago="ondo";
	echo($dago);
}
?>
