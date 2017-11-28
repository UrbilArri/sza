<?php
	require_once("bisita_liburua.inc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Bisita liburua: iruzkinak.</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="bisita_liburua.css" type="text/css" />
	</head>
	<body>
	<?phpecho('<script>
			var xhro = new XMLHttpRequest();
			function funtzioa(id){
				
				 xhro.open("POST", "ajax.php", true); 
				 xhro.setResquestHeader("Content-type", "application/x-www-form-urlencoded");
				 xhro.send("id"=id);
				  }
			xhro.onreadystatechange = function(){ 
			switch(xhro.readyState){ 
				case 0: document.getElementById("egoera").innerHTML = "Hasi gabe ..."; break; 
				case 1: document.getElementById("egoera").innerHTML = "<b>Kargatzen ...</b>"; break; 
				case 2: document.getElementById("egoera").innerHTML = "<b>Kargatzen2 ...</b>"; break; 
				case 3: document.getElementById("egoera").innerHTML = "Elkarrekintza ..."; break; 
				case 4: document.getElementById("egoera").innerHTML = "<b>AMAITUA</b>"; 
				if(xhro.status==200) document.getElementById("emaitza").innerHTML = xhro.responseText; } }');
			
		</script>
		<h1>Bisita liburua</h1>
		
			if(!file_exists($BL_FILE))
			{
				echo('<p>Bisita liburua hutsik dago. Iruzkin bat idazten lehenengoa izan nahi baduzu klikatu <a href="berria.html">hemen</a>.</p>');
			}
			elseif(!($bl=simplexml_load_file($BL_FILE)))
			{
				echo('<p>Errore bat gertatu datu bisita liburua irakurtzean. Barkatu eragozpenak</p>');
			}
			else
			{
			?>
			<p>Hona hemen eskatutako iruzkin zerrenda. Menu nagusira itzultzeko sakatu <a href="index.html">hemen</a>.</p>
			<?php
				$kop=0;
				foreach($bl->bisita as $bisita)
				{
					// Iruzkin bat pantailaratzeko 2 baldintza hauetako bat bete behar
					// da (lehenengoa betetzen bada, bigarrena ez da ebaluatzen):
					//   · 'erab' eremua ez da bidali (iruzkin zerrenda osoa eskatu da).
					//   · 'erab' eremuako balioa eta iruzkinari dagokion izena berdinak
					//      dira (minuskulak eta maiuskulak kontuan ez hartzeko bi
					//      balioak minuskulara pasatzen dira).
					if(!isset($_POST['erab']) || 
					   (strtolower($_POST['erab']) == strtolower($bisita->izena)))
					{
						$kop++;
						echo('<div class="iruzkina">');
						echo('<div class="ir_goiburua">');
						echo('<span class="data">'.$bisita->data.'</span>');
						echo('<span class="izena">'.$bisita->izena.'</span>');
						if($bisita->eposta && $bisita->eposta['erakutsi']=="bai")
							echo('<span class="eposta">&lt;'.
								$bisita->eposta.'&gt;</span>');
						echo('</div>');
						echo('<div class="ir_gorputza">');
						$iruzkin =$bisita->iruzkina;
						
						echo(substr($iruzkin, 0, 50));
						if(strlen($iruzkin)>50){
							echo('<a href="ajax.php" id="enlazea" onclick="funtzioa('.$bisita['id'].')">Gehiago irakurri</a></br>');
							echo($bisita['id']);
						}
						echo('</div>');
						echo('</div>');
						echo('<label id="emaitza"></label>');
					}
				}
				// Erakutsi mezu bat ez bada iruzkinik aurkitu.
				if($kop==0)
					echo('Ez da aurkitu '.$_POST['erab'].' izeneko erabiltzailerik.');
			}
		?>
	</body>
</html>
