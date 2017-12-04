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
				width: 1050px;
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
				border-color:black;
				border: solid;
			}
			.azkenZelda {
				border: none;
				width:200px;
				color: red;
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
		<?php
			$abisuak = simplexml_load_file('abisuak.xml');
			echo '<table border = "1" class="taula"> </br>';
			echo '<td class="zelda" style="font-weight: bold">Data</td><td class="zelda" style="font-weight: bold">Mota</td><td class="zelda" style="font-weight: bold">Errepidea</td><td class="azkenZelda">Abisu osoa ikusi</td></tr></br>';
			foreach($abisuak->abisua as $abisua)
			{
				$data = $abisua->data;
				$mota = $abisua->mota;
				$errepidea = $abisua->errepidea;
				echo '<td class="zelda">'.$data.'</td><td class="zelda">'.$mota.'</td><td class="zelda">'.$errepidea.'</td><td class="azkenZelda"><input value="abisua ikusi"type="button" id='.$abisua['id'].' onclick="abisuaBalioaLortu(this.id)"></td></tr></br>';	
			}
		?></br></br>
		<form id="formularioa" name="formularioa">
			<div style="text-align: center">
				<input type="button" id="abisatu" name="abisatu" value="Abisua igo"  onclick="javascript:window.location.href='abisuaIgo.html'"></input>
			</div>
		</form>
		<script>
			function abisuaBalioaLortu(id){
			window.location.href="abisuOsoa.php?id="+id;
			}
		</script>
	</body>
</html>
