xhro = new XMLHttpRequest();
			function balidatu(){
				var boolean=true;
				if(document.getElementById('korreoEgoera').innerText == "korreo hau jada erregistraturik dago")boolean=false;
				return boolean;
			}
			xhro.onreadystatechange = function(){
				if(xhro.readyState == 4 && xhro.status==200){
					var emaitza = xhro.responseText;
					console.log(emaitza);
					if(emaitza =="ondo") document.getElementById("korreoEgoera").innerHTML="";
					else document.getElementById("korreoEgoera").innerHTML=emaitza;
				}
			}
			function konprobatuKorreoa(korreoa){
				xhro.open("POST", "../php/konprobatuKorreoa.php", true);
				xhro.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhro.send("korreoa="+korreoa);
			}
			
