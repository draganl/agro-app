<?php 
include_once('includes/head.php');
include_once('includes/header.php');
include_once('functions/generalFunctions.php');
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	spajanje();
	$sql="SELECT m.id, m.id_proizvodjac_fk, model, status, m.opis, id_vrsta_stroj_fk, p.naziv, v.vrsta_stroj FROM mehanizacija m INNER JOIN proizvodjac p ON p.id = m.id_proizvodjac_fk INNER JOIN vrsta_stroj v ON v.id = m.id_vrsta_stroj_fk WHERE m.id=$id";
	$stroj=pregled($sql);
	//print_r($stroj);
}

if (isset($_REQUEST['submitEdit'])) {
	$proizvodjac=$_REQUEST['proizvodjac'];
	$model=$_REQUEST['model'];
	$vrsta_stroj=$_REQUEST['vrsta_stroj'];
	$status=$_REQUEST['status'];
	$opis=$_REQUEST['opis'];
	
	$sql = "UPDATE mehanizacija SET id_proizvodjac_fk='{$proizvodjac}', model='{$model}', status='{$status}', opis='{$opis}', id_vrsta_stroj_fk='{$vrsta_stroj}' WHERE id=$id";
	if (mysql_query($sql)) {
		$info = "Podaci su uspješno spremljeni";
	}
	else {
		$info = "Greška prilikom spremanja";
	}
	
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
						<h2>Uređivanje mehanizacije</h2>
						<?php
						if (isset($info)) {
							echo $info;
						}
						?>
						<div class="divObrazac">
						<form action="" method="post">
							<p><label for="naziv">Proizvođač</label>
							<select name="proizvodjac">
						<?php
							spajanje(); 
							$sql = "SELECT id, naziv FROM proizvodjac";
							$proizvodjac_lista = pregled($sql);
							
							foreach ($proizvodjac_lista as $red) {
							if ($red['id']==$stroj[0][1]) {
							$selected="selected";
							}
							else {
							$selected="";
							}
								echo '<option value="'.$red['id'].'" '.$selected.'>'.$red['naziv'].'</option>' ;
}
						?>
					</select> <a href="proizvodjac.php">Dodaj novog proizvođača</a>
							</p>
							
							<p><label for="model">Model</label><input id="model" name="model" type="text" value="<?php echo $stroj[0]['model']; ?>" /></p>
							<p><label for="vrsta">Vrsta</label>
							<select name="vrsta_stroj">
						<?php
							spajanje(); 
							$sql = "SELECT id, vrsta_stroj FROM vrsta_stroj";
							$vrsta_lista = pregled($sql);
							
							foreach ($vrsta_lista as $red) {
							if ($red['id']==$stroj[0][5]) {
							$selected="selected";
							}
							else {
							$selected="";
							}
								echo '<option value="'.$red['id'].'" '.$selected.'>'.$red['vrsta_stroj'].'</option>' ;
}
						?>
					</select> <a href="vrsta_stroj.php">Dodaj vrstu stroja</a>
							</p>
							<?php
							if ($stroj[0][3]==1) {
							$ispravan="checked";
							$neispravan="";
							}
							else {
							$neispravan="checked";
							$ispravan="";
							}
							?>
							<p><label for="status">Status</label><input type="radio" name="status" value="1" <?php echo $ispravan; ?>>Ispravan 
<input type="radio" name="status" value="0"<?php echo $neispravan; ?>> Neispravan</p>
							<p><label for="opis">Opis</label><textarea id="opis" name="opis"><?php echo $stroj[0]['opis']; ?></textarea></p>
							<p><input id="submitEdit" name="submitEdit" type="submit" value="Uredi" /></p>							
						</form>
						</div>
					</div>
					
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
		</div>
<?php include_once('includes/footer.php');?>
		