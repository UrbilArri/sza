xhro = new XMLHttpRequest();
			function balidatu(){
				var boolean=true;
				var pasahitza = document.getElementById('pasahitza').value;
				var pasahitza2 = document.getElementById('pasahitza2').value;
				if(pasahitza!=pasahitza2){
					boolean=false;
					alert('Errepikatutako pasahitza ez da berdina');
				}
				if(document.getElementById('korreoEgoera').innerText == "korreo hau jada erregistraturik dago")boolean=false;
				if(document.getElementById('erabEgoera').innerText =="erabiltzaile hau jada erregistraturik dago")boolean=false;
				return boolean;
			}
			
			
			xhro.onreadystatechange = function(){
				if(xhro.readyState == 4 && xhro.status==200){
					var emaitza = xhro.responseText;
					console.log(emaitza);
					if(emaitza =="ondo") document.getElementById("korreoEgoera").innerHTML="";
					else if(emaitza =="erabiltzaile egokia") document.getElementById("erabEgoera").innerHTML="";
					else if(emaitza =="erabiltzaile hau jada erregistraturik dago")document.getElementById("erabEgoera").innerHTML=emaitza;
					else document.getElementById("korreoEgoera").innerHTML=emaitza;
				}
			}
			function konprobatuKorreoa(korreoa){
				xhro.open("POST", "../php/konprobatuKorreoa.php", true);
				xhro.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhro.send("korreoa="+korreoa);
			}
			function konprobatuErabIzena(erab){
				xhro.open("POST", "../php/konprobatuErabIzena.php", true);
				xhro.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhro.send("erab="+erab);
			}
































			
