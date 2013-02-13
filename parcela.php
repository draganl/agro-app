<?php 
include_once('includes/head.php');
include_once('includes/header.php');
include_once('functions/generalFunctions.php');
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	spajanje();
	$sql="SELECT * FROM parcela WHERE id=$id";
	$parcela=pregled($sql);
	//print_r($parcela);

}

if (isset($_REQUEST['submitEdit'])) {
	$naziv=$_REQUEST['naziv'];
	$arcod_id=$_REQUEST['arcod_id'];
	$cestice=$_REQUEST['cestice'];
	$opis=$_REQUEST['opis'];
     mysql_query('SET NAMES utf8');
	
	$sql = "UPDATE parcela SET naziv='{$naziv}', arcod_id='{$arcod_id}', cestice='{$cestice}', opis='{$opis}' WHERE id=$id";
	if (mysql_query($sql)) {
		$info = "Podaci su uspješno spremljeni";
	}
	else {
		$info = "Greška prilikom spremanja";
	}
	
}

if (isset($_REQUEST['submitInsert'])) {
	$naziv=$_REQUEST['naziv'];
	$arcod_id=$_REQUEST['arcod_id'];
	$cestice=array();
		if ($_REQUEST['cestice1']!="")
		$cestice[]=$_REQUEST['cestice1'];
		if ($_REQUEST['cestice2']!="")
		$cestice[]=$_REQUEST['cestice2'];
		if ($_REQUEST['cestice3']!="")
		$cestice[]=$_REQUEST['cestice3'];
		$noveCestice=serialize($cestice);
	$opis=$_REQUEST['opis'];
	spajanje();
        mysql_query('SET NAMES utf8');
	$sql = "INSERT INTO parcela (naziv, arcod_id, cestice, opis) VALUES ('{$naziv}', '{$arcod_id}', '{$noveCestice}', '{$opis}')";
	if (mysql_query($sql)) {
		$info = "Podaci su uspješno spremljeni";
	}
	else {
		$info = "Greška prilikom spremanja";
	}
	
//echo $noveCestice;
}

?>
	
			<div id="page">
				<div id="sidebar">
					<div class="box">
						<h3>Felis euismod fringilla</h3>
						<p>
							Lorem ipsum dolor amet, consectetur adipiscing elit. Praesent cursus lobortis tincidunt. 
							Aenean non sem libero. Proin facilisis eros id risus elementum lorem vestibulum tempus dolore.
						</p>
					</div>
					<div class="box">
						<h3>Laoreet nullam curabitur</h3>
						<ul class="list">
							<li class="first"><a href="#">Aliquam sapien aliquam</a></li>
							<li><a href="#">Ipsum ipsum ac venenatis</a></li>
							<li><a href="#">Dolor ut non etiam</a></li>
							<li><a href="#">Tempus ante integer vivamus</a></li>
							<li><a href="#">Montes interdum sed parturient</a></li>
							<li><a href="#">Velit malesuada accumsan</a></li>
							<li><a href="#">Amet suscipit ornare tempor</a></li>
							<li class="last"><a href="#">Ante mauris sodales</a></li>
						</ul>
					</div>
				</div>
				<div id="content">
					<div class="box">
						<h2><?php if (isset($id)) {	echo "Uređivanje parcele";} else {echo "Nova parcela";}  ?></h2>
						<?php
						if (isset($info)) {
							echo $info;
						}
						?>
						<div class="divObrazac">
						<p><a href="parcela.php">Nova parcela</a></p>
						<form action="" method="post">
							<p><label for="naziv">Naziv parcele</label><input id="naziv" name="naziv" type="text" value="<?php if (isset($id)) echo $parcela[0]['naziv']; ?>" /></p>
							<p><label for="arcod_id">Arcod ID</label><input id="arcod_id" name="arcod_id" type="text" value="<?php if (isset($id)) echo $parcela[0]['arcod_id']; ?>" /></p>
							<p><label for="cestice1">Čestica 1</label><input id="cestice1" name="cestice1" type="text" value="" /></p>
							<p><label for="cestice2">Čestica 2</label><input id="cestice2" name="cestice2" type="text" value="" /></p>
							<p><label for="cestice3">Čestica 3</label><input id="cestice3" name="cestice3" type="text" value="" /></p>
							<p><label for="opis">Opis</label><textarea id="opis" name="opis"><?php if (isset($id)) echo $parcela[0]['opis']; ?></textarea></p>
							<?php if (isset($id)) { ?>
							<p><input id="submitEdit" name="submitEdit" type="submit" value="Uredi" /></p>	
							<?php } else { ?><p><input id="submitInsert" name="submitInsert" type="submit" value="Unesi" /></p><?php }  ?>						
						</form>
						</div>
					</div>
					
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
		</div>
<?php include_once('includes/footer.php');?>
		