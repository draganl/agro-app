<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 3.0 License

Name       : Unwritten
Description: A two-column, fixed-width design with a bright color scheme.
Version    : 1.0
Released   : 20120710
-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Unwritten by FCT</title>
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<h1><a href="#">Unwritten</a></h1>
				</div>
				<div id="search">
					<form action="" method="post">
						<div>
							<input class="form-text" name="search" size="32" maxlength="64" /><input class="form-submit" type="submit" value="Search" />
						</div>
					</form>
				</div>
				<div id="menu">
					<ul>
						<li class="first current_page_item"><a href="#">Homepage</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Articles</a></li>
						<li><a href="#">Photos</a></li>
						<li><a href="#">Information</a></li>
						<li><a href="#">Friends</a></li>
						<li><a href="#">About</a></li>
						<li class="last"><a href="#">Contact</a></li>
					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="splash">
				<img src="images/splash.jpg" width="1100" height="250" alt="" />
			</div>
			<div id="page">
				<div id="content">
					<div class="post">
					<table border="1">
					<tr><td>Ime</td><td>Prezime</td><td>Poštanski broj</td><td>Mjesto</td></tr>

					<?php
						$veza=mysql_connect('localhost','root','');
						mysql_select_db('adresar',$veza);
						mysql_query('SET NAMES utf8');
						$sql="SELECT o.ime, o.prezime, m.ptt, m.naziv FROM osoba o LEFT JOIN mjesto m ON o.ID_mjesto_fk = m.ID";
						
						$rez=mysql_query($sql);
						
						while ($red=mysql_fetch_array($rez))
						{
							echo "<tr>";
							echo "<td>".$red['ime']."</td><td>".$red['prezime']."</td><td>".$red['ptt']."</td><td>".$red['naziv']."</td>";
							echo "</tr>";
							
						}
						
					?>						
					</table>
					</div>
					
					<br class="clearfix" />
				</div>
				<div id="sidebar">
					<div class="post">
						<h3>Posuere tortor vitae</h3>
						<ul class="list">
							<li class="first"><a href="#">Elementum et auctor</a></li>
							<li><a href="#">Amet tempor blandit</a></li>
							<li><a href="#">Fringilla viverra quisque viverra</a></li>
							<li><a href="#">Placerat etiam lobortis suspendisse</a></li>
							<li><a href="#">Imperdiet aliquet sapien</a></li>
							<li class="last"><a href="#">Nulla volutpat aenean augue</a></li>
						</ul>
					</div>
					<div class="post">
						<h3>Scelerisque turpis quis</h3>
						<p>
							Dignissim cum iaculis malesuada dolor egestas nec nascetur. Praesent montes laoreet augue duis posuere. Magnis mus pellentesque sollicitudin nisl libero.
						</p>
					</div>
				</div>
				<br class="clearfix" />
			</div>
		</div>
		<div id="footer">
			&copy; 2012 Untitled | Design by <a href="http://www.freecsstemplates.org/">FCT</a> | Images by <a href="http://fotogrph.com/">Fotogrph</a>
		</div>
	</body>
</html>