$(document).ready(function(){
	$("#formularioa").submit(function(){
		var boolean = true;
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
