<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Social Drive</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript"></script>
		<style type="text/css">
			body {
				background-color: #3CBC8D;
			}
			h1 {
				text-align: center;
				color: black;
				font-family: Georgia, "Times New Roman", Times, serif;
				max-width: 500px;
				padding: 10px 20px;
				background: #f4f7f8;
				margin: 10px auto;
				padding: 20px;
				border-radius: 8px;
			}
			label{
				text-align: center;
				color: black;
				font-family: Georgia, "Times New Roman", Times, serif;
				display: block;
			}
			.form-style{
				max-width: 500px;
				padding: 10px 20px;
				background: #f4f7f8;
				margin: 10px auto;
				padding: 20px;
				border-radius: 8px;
				font-family: Georgia, "Times New Roman", Times, serif;
			}
			.form-style input[type="text"],
			.form-style input[type="password"]{
				font-family: Georgia, "Times New Roman", Times, serif;
				background: rgba(255,255,255,.1);
				border: none;
				border-radius: 4px;
				font-size: 16px;
				margin: 0;
				outline: 0;
				padding: 7px;
				width: 100%;
				box-sizing: border-box;
				box-sizing: border-box;
				box-sizing: border-box;
				background-color: #e8eeef;
				color:#8a97a0;
				box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
				margin-bottom: 30px;
		   
			}
			.form-style input[type="text"]:focus
			.form-style input[type="password"]:focus{
				background: #d2d9dd;
			}
			.form-style input[type="submit"],
			.form-style input[type="button"]
			{
				position: relative;
				display: block;
				padding: 19px 39px 18px 39px;
				color: #FFF;
				margin: 0 auto;
				background: #1abc9c;
				font-size: 18px;
				text-align: center;
				font-style: normal;
				width: 100%;
				border: 1px solid #16a085;
				border-width: 1px 1px 3px;
				margin-bottom: 10px;
			}
			.form-style input[type="submit"]:hover,
			.form-style input[type="button"]:hover
			{
				background: #109177;
			}
		</style>
	</head>
	<body>
		<h1>SARTU SOCIAL DRIVEN!!</h1>
</br></br></br>
		<div class="form-style">
		<form action="" id="formularioa" name="formularioa" method="post">
			Erabiltzaile izena:<input type="text" id="erab" name="erab" required></input></br>
			Pasahitza:<input type="password" id="pasahitza" name="pasahitza" required></input></br>
			<input type="submit" id="login" name="login" value="Log In" ></input>
			<input type="button" id="erregistratu" name="erregistratu" value="Erregistratu" onclick="javascript:window.location.href='erregistroa.html'"></input>	
		</form>
		</div>
		<script>
			$(document).ready(function(){
				$("#erregistratu").submit(function(){
					location.href="erregistratu.php"
				});
			});
		</script>
	</body>
</html>
<?php
if(isset($_POST['erab'], $_POST['pasahitza'])){
 	$erabiltzaileak=simplexml_load_file('erabiltzaileak.xml');
	foreach($erabiltzaileak->erabiltzailea as $erabiltzailea){
		$erab=$erabiltzailea->erab;
		$pasahitza=$erabiltzailea->pasahitza;
		if($erab==$_POST['erab'] && $pasahitza==$_POST['pasahitza']){
			$_SESSION['name']=$_POST['erab'];
			echo('<script>location.href="nagusia.php"</script>');
		}
	}
	echo('<div align="center" style="color: red;">ERABILTZAILE EDO PASAHITZA OKERRA</div>');
 }
?>
