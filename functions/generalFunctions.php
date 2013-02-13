<?php
	function spajanje() {
		$host = 'localhost:8888';
		$db = 'agro';
		$user = 'root';
		$pass = 'root';
		$veza = mysql_connect($host,$user,$pass);
		if (!$veza){
			echo "Greška prilikom spajanja na server.";
		}
		mysql_select_db($db,$veza);
	}
	
//funkcija za formiranje arraya iz sql upita
	function pregled($sql) {
		mysql_query("SET NAMES utf8");
		$upit = mysql_query($sql);
		$rez = array();
		while ($red=mysql_fetch_array($upit)) {
			$rez[] = $red; 
		}
		return $rez;
	}	
?>