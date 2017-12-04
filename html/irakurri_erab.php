<?php
if(isset($_POST['izena'], $_POST['abizena'], $_POST['korreoa'], $_POST['erab'], $_POST['pasahitza'], $_POST['pasahitza2'])){
 	$erabiltzaileak=simplexml_load_file('erabiltzaileak.xml');
 	$id=strval($erabiltzaileak->count());
	$erabiltzailea=$erabiltzaileak->addchild('erabiltzailea');
 	$erabiltzailea->addAttribute('id',"n".$id);
 	$erabiltzailea->addchild('izena', $_POST['izena']);
 	$erabiltzailea->addchild('abizena', $_POST['abizena']);
	$erabiltzailea->addchild('korreoa', $_POST['korreoa']);
	if(isset($_POST['hiria']))$erabiltzailea->addchild('hiria', $_POST['hiria']);
	else $erabiltzailea->addchild('hiria', 'hiririk ez');
	$erabiltzailea->addchild('erab', $_POST['erab']);
	$erabiltzailea->addchild('pasahitza', $_POST['pasahitza']);
	$erabiltzailea->addchild('pasahitza2', $_POST['pasahitza2']);
	$erabiltzaileak->asXML('erabiltzaileak.xml');
	header('Location: nagusia.php');
 }
 else{
 	echo('Ez daude datu guztiak');
 	echo($_GET['izena']);
 	echo($_POST['izena']);
 	echo($_POST['abizena']);
 	echo($_POST['korreoa']);
 	echo($_POST['erab']);
 	echo($_POST['pasahitza']);
 	echo($_POST['pasahitza2']);
 }
?>
