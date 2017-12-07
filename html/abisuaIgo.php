<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Social drive</title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src=""></script>
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
	<h1>BIDALI ZURE ABISUA</h1>
	<label>(*) derrigorrezkoak dira betetzea</label></br></br>
	<div class="form-style">
	<form action="" id="formularioa" name="formularioa" method="post">
		Mota(*):<select name="mota" id="mota">
				<option value="Hautatu bat">Hautatu bat</option> 
				<option value="Kontrola">Kontrola</option>
				<option value="autoIlara">Auto-ilara</option>
				<option value="Istripua">Istripua</option>
				<option value="Obrak">Obrak</option>
			</select></br>
		Probintzia(*):<select name="probintzia" id="probintzia">
				<option value="Hautatu bat">Hautatu bat</option> 
				<option value="Gipuzkoa">Gipuzkoa</option>
				<option value="Bizkaia">Bizkaia</option>
				<option value="Araba">Araba</option>
				<option value="Nafarroa">Nafarroa</option>
			</select></br>
		Hiria(*):<input type="text" id="hiria" name="hiria" required></br>
		Errepidea(*):<input type="text" id="errepidea" name="errepidea" required></br>
		Iruzkina:</br><textarea name="iruzkina" id="iruzkina" rows="5" cols="100"></textarea></br></br>
		<!--ordua automatikoki jarriko da abisuan-->
		<input type="submit" id="bidali" name="bidali" value="Bidali"></input>
		<input type="button" id="itzuli" name="itzuli" value="Itzuli" onclick="javascript:window.location.href='nagusia.php'"></input>	
	</form>
	</div>
	<script>
		$(document).ready(function(){
			$("#formularioa").submit(function(){
				var boolean = false;
				if($("#mota").val() == "Hautatu bat"){
					boolean = false;
					alert('Hautatu abisu mota bat mesedez');
				}
				if($("#probintzia").val() == "Hautatu bat"){
					boolean = false;
					alert('Hautatu probintzia bat mesedez');
				}
				return boolean;	
			});
		});
	</script>
	</body>	
</html>
<?php
if(isset($_SESSION['name'])){
if(isset($_POST['mota'], $_POST['probintzia'], $_POST['hiria'], $_POST['errepidea'])){
 	$abisuak=simplexml_load_file('abisuak.xml');
 	$id=strval($abisuak->count());
	$abisua=$abisuak->addchild('abisua');
 	$abisua->addAttribute('id',"n".$id);
	$date = date('m/d/Y h:i:s a', time());
 	$abisua->addchild('data', $date);
 	$abisua->addchild('mota', $_POST['mota']);
 	$abisua->addchild('probintzia', $_POST['probintzia']);
	$abisua->addchild('hiria', $_POST['hiria']);
	$abisua->addchild('errepidea', $_POST['errepidea']);
	if(strlen(trim($_POST['iruzkina']))<1){
 		$iruzkina='Ez dago iruzkinik';
 	}
 	else{
 		$iruzkina=$_POST['iruzkina'];
 	}
	$abisua->addchild('iruzkina', $iruzkina);
	$abisuak->asXML('abisuak.xml');
	echo "<script> window.location.href='nagusia.php'</script>";
 }
 else{
 	echo('Ez daude datu guztiak');
}
}
else echo('<script>location.href="login.php"</script>');
?>
