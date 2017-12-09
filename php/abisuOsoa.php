<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Social drive</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../css/itxura.css">
	</head>
	<body>
		<h1>Abisua</h1>
			<input type="button" id="logout" style="text-align: center" name="logout" value="Log out" onclick="javascript:window.location.href='logIn.php'"></input>
		<?php
			$abisuak = simplexml_load_file('../xml/abisuak.xml');
			foreach($abisuak->abisua as $abisua)
			{
				if($_GET['id']==$abisua['id']){
				$hiria = $abisua->hiria;
				$data = $abisua->data;
				$mota = $abisua->mota;
				$errepidea = $abisua->errepidea;
				$probintzia = $abisua->probintzia;
				$iruzkina = $abisua->iruzkina;
				echo('<div class="form-style">');
				echo("Mota: <input type='text' id='mota' name='mota' value=$mota readonly></input>");
				echo("Data: <input type='text' id='data' name='data' value=$data readonly></input>");
				echo("Probintzia: <input type='text' id='probintzia' name='probintzia' value=$probintzia readonly></input>");
				echo("Hiria: <input type='text' id='hiria' name='hiria' value=$hiria readonly></input>");
				echo("Errepidea: <input type='text' id='errepidea' name='errepidea' value=$errepidea readonly></input>");
				echo("Iruzkina: <textarea name='iruzkina' id='iruzkina' value=$iruzkina rows='5' cols='100' readonly>$iruzkina</textarea>");
				echo('</div>');
				}
			}
		?></br></br>
			<input type="button" id="itzuli" name="itzuli" value="Itzuli"  onclick="javascript:window.location.href='nagusia.php'"></input>
	</body>
</html>
<?php 
if(!isset($_GET['id'], $_SESSION['name'])) echo('<script>location.href="logIn.php"</script>');
?>
