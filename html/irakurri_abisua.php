<?php
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
?>
