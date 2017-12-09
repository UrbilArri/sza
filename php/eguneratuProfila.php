<?php
if(isset($_POST['izena'], $_POST['abizena'], $_POST['korreoa'])){
	$erabiltzaileak = simplexml_load_file('../xml/erabiltzaileak.xml');
			session_start();
			$erab=$_SESSION['user'];
			foreach($erabiltzaileak->erabiltzailea as $erabiltzailea){
				$laguntza=$erabiltzailea->erab;
				if(strcmp($laguntza,$erab)==0){
					$erabiltzailea->izena=$_POST['izena'];
					$abizena=$erabiltzailea->abizena=$_POST['abizena'];
					$korreoa=$erabiltzailea->korreoa=$_POST['korreoa'];
					$hiria=$erabiltzailea->hiria=$_POST['hiria'];
				}
			}
	$erabiltzaileak->asXML('../xml/erabiltzaileak.xml');
	echo('<script>location.href="nagusia.php"</script>');
}
 else{
 	echo('Ez daude datu guztiak');
 }
?>
