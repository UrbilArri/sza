<?php 
if(isset($_POST['erab'])){
	$erabiltzaileak = simplexml_load_file("../xml/erabiltzaileak.xml");
	$dago="";
	foreach($erabiltzaileak->erabiltzailea as $erabiltzailea){
		if($erabiltzailea->erab == $_POST['erab']) $dago= "erabiltzaile hau jada erregistraturik dago";
		}
	if($dago=="")$dago="erabiltzaile egokia";
	echo($dago);
}
else echo('<script>location.href="logIn.php"</script>');
?>
