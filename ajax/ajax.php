<?php
include_once('../functions/generalFunctions.php');
if (isset($_POST['parcela_id']) && !empty($_POST['parcela_id'])) {
	$id=$_POST['parcela_id'];
	spajanje();
	$sql="SELECT * FROM parcela WHERE id=$id";
	$parcela=pregled($sql);
	var_dump($parcela);
}

?>