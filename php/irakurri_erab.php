<?php
if(isset($_POST['izena'], $_POST['abizena'], $_POST['korreoa'], $_POST['erab'], $_POST['pasahitza'], $_POST['pasahitza2'])){
 	$erabiltzaileak=simplexml_load_file('../xml/erabiltzaileak.xml');
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
	$erabiltzaileak->asXML('../xml/erabiltzaileak.xml');
	echo('<script>location.href="logIn.php"</script>');
 }
 else{
 	echo('Ez daude datu guztiak');
 }
?>
