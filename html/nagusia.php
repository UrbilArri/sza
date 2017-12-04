<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Social drive</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
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
			.taula{
				width: 1200px;
				padding: 10px 20px;
				background: #f4f7f8;
				margin: 10px auto;
				padding: 20px;
				border-radius: 8px;
			}
			.zelda{
				border-width: 2px;
				border-radius:2px;
				padding: 2px;
			}
			
			.form-style input[type="text"],
			.form-style textarea,
			.form-style select{
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
			.form-style input[type="text"]:focus,
			.form-style textarea:focus,
			.form-style select:focus{
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
		<h1>Ongi etorri social drivera!</h1>
		<table border = '1' align="center">
		<?php
			$abisuak = simplexml_load_file('abisuak.xml');
			echo '<table border = "1" class="taula"> </br>';
			echo '<td class="zelda">Data</td><td class="zelda">Mota</td><td class="zelda">Probintzia</td><td class="zelda">Hiria</td><td class="zelda">Errepidea</td><td class="zelda">Iruzkina</td></tr></br>';
			foreach($abisuak->abisua as $abisua)
			{
				$data = $abisua->data;
				$mota = $abisua->mota;
				$probintzia= $abisua->probintzia;
				$hiria = $abisua->hiria;
				$errepidea = $abisua->errepidea;
				$iruzkina = $abisua->iruzkina;
				echo "<td>$data</td><td>$mota</td><td>$probintzia</td><td>$hiria</td><td>$errepidea</td><td>$iruzkina</td></tr> \n";	
			}
		?></br></br>
		<form id="formularioa" name="formularioa">
			<input type="button" id="abisatu" name="abisatu" value="Abisatu" onclick="javascript:window.location.href='abisuaIgo.html'"></input>
		</form>
	</body>
</html>
