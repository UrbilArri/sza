<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Social drive</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../css/itxura.css">
		<script src="../js/nagusia.js"></script>
	</head>
	<body>
		<h1>Ongi etorri social drivera!</h1>
				<input type="button" id="logout" style="text-align: center" name="logout" value="Log out" onclick="javascript:window.location.href='logout.php'"></input>
		<?php
			$abisuak = simplexml_load_file('../xml/abisuak.xml');
			echo '<table border = "1" class="taula" style="overflow-y:auto;"> </br>';
			echo '<td class="zelda" style="font-weight: bold">Data</td><td class="zelda" style="font-weight: bold">Mota</td><td class="zelda" style="font-weight: bold">Errepidea</td><td class="azkenZelda">Abisu osoa ikusi</td></tr></br>';
			foreach($abisuak->abisua as $abisua)
			{
				$data = $abisua->data;
				$mota = $abisua->mota;
				$errepidea = $abisua->errepidea;
				echo '<td class="zelda">'.$data.'</td><td class="zelda">'.$mota.'</td><td class="zelda">'.$errepidea.'</td><td class="azkenZelda"><div class="abisuOsoa"><input value="abisua ikusi"type="button" id='.$abisua['id'].' onclick="abisuaBalioaLortu(this.id)"></div></td></tr></br>';	
			}
		?>
		<div class="azpiko-botoiak">
			<input type="button" id="abisatu" name="abisatu" value="Abisua igo"  onclick="javascript:window.location.href='abisuaIgo.php'"></input>
			<input type="button" id="profila" name="profila" value="Profila"  onclick="javascript:window.location.href='profila.php'"></input></div>
	</body>
</html>
<?php if(!isset($_SESSION['name'])){
	echo('<script>location.href="logIn.php"</script>');
}
