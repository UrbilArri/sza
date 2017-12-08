<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Social drive</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="./css/itxura.css">
		<style>
		</style>
	</head>
	<body>
		<h1>Profila</h1>
		<?php
			$erabiltzaileak = simplexml_load_file('erabiltzaileak.xml');
			$erab=$_SESSION['name'];
			foreach($erabiltzaileak->erabiltzailea as $erabiltzailea){
				$laguntza=$erabiltzailea->erab;
				if(strcmp($laguntza,$erab)==0){
					$izena=$erabiltzailea->izena;
					$abizena=$erabiltzailea->abizena;
					$korreoa=$erabiltzailea->korreoa;
					$hiria=$erabiltzailea->hiria;
					?>
					
					<form action="" id="formularioa" name="formularioa" method="post">
						<div class="form-style">
						Izena:<input type="text" id="izena" name="izena" value="<?php echo htmlspecialchars($izena); ?>" pattern="[A-Za-z]{1,15}" title="Izena a eta z artean" required></input></br>
						Abizena:<input type="text" id="abizena" name="abizena" value="<?php echo htmlspecialchars($abizena); ?>" pattern="[A-Za-z]{1,20}" required></input></br>
						Korreoa:<input type="text" id="korreoa" name="korreoa" value="<?php echo htmlspecialchars($korreoa); ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninput="konprobatuKorreoa(this.value)" title="Emailak honako formatua eduki behar du: emaila@emaila.emaila" required></input></br>
						Hiria:<input type="text" id="hiria" name="hiria" value="<?php echo htmlspecialchars($hiria); ?>"></input>
						</div>
							<input type="button" id="logout" name="logout" value="Log out" onclick="javascript:window.location.href='logIn.php'"></input>
							<input type="button" id="itzuli" name="itzuli" value="Itzuli"  onclick="javascript:window.location.href='nagusia.php'"></input>
							</br></br></br></br></br><div class="azpiko-botoiak">
							<input type="submit" id="gorde" name="gorde" style="right:45%; bottom: 25%" value="Gorde Aldaketak"></input>
						</div>
					</form>
					<?php
				}
			}	
		?>
	</body>
</html>
<?php
if(isset($_POST['name'])){
	if(isset($_POST['gorde'], $_POST['izena'], $_POST['abizena'], $_POST['korreoa'])){
		$erabiltzaileak = simplexml_load_file('erabiltzaileak.xml');
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
		$erabiltzaileak->asXML('erabiltzaileak.xml');
		echo('<script>location.href="nagusia.php"</script>');
	}
	if(isset($_POST['logout'])){
	
	}
 }
 else echo('<script>location.href"login.php"</script>');
?>
