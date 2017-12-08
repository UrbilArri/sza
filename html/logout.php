<?php
	session_start(); 
	session_destroy(); 
	echo('<script>location.href="logIn.php"</script>');
	exit();
?>
