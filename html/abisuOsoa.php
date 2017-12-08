<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Social drive</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="./css/itxura.css">
	</head>
	<body>
		<h1>Ongi etorri social drivera!</h1>
		<div class="form-style2" style="text-align: center">
			<form action="logout.php" id="formularioa" name="formularioa" method="post">
				<input type="button" id="logout" style="text-align: center" name="logout" value="Log out" onclick="javascript:window.location.href='logIn.php'"></input>
			</form>
		</div>
		<?php
			$abisuak = simplexml_load_file('abisuak.xml');
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
				echo('<label style="text-align; color:brown; font-weight: bold;  font: sans;">MOTA</label></br>');
				echo("$mota</br>");
				echo("DATA</br>");
				echo("$data</br>");
				echo("PROBINTZIA</br>");
				echo("$probintzia</br>");
				echo("HIRIA</br>");
				echo("$hiria</br>");
				echo("ERREPIDEA</br>");
				echo("$errepidea</br>");
				echo("IRUZKINA</br>");
				echo("$iruzkina</br>");
				echo('</div>');
				}
			}
		?></br></br>
		<div class="form-style" style="text-align: center">
					<input type="button" id="abisatu" name="abisatu" value="Atzera joan"  onclick="javascript:window.location.href='nagusia.php'"></input>
		</div>
	</body>
</html>
<?php 
if(!isset($_GET['id'], $_SESSION['name'])) echo('<script>location.href="logIn.php"</script>');
?>
