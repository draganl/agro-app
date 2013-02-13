<?php
include_once('functions/generalFunctions.php');
include_once('includes/head.php');
include_once('includes/header.php');
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
						<h2>Mehanizacija</h2>
						<table id="myTable" class="tablesorter">
						<thead>
						<tr><th>ID</th><th>Proizvođač</th><th>Model</th><th>Vrsta</th><th>Status</th><th>Opis</th></tr>
						</thead>
						</tbody>
						<?php
							spajanje(); 
							$sql = "SELECT m.id, model, status, m.opis, p.naziv, v.vrsta_stroj FROM mehanizacija m INNER JOIN proizvodjac p ON p.id = m.id_proizvodjac_fk INNER JOIN vrsta_stroj v ON v.id = m.id_vrsta_stroj_fk";
							$parcele = pregled($sql);
							foreach ($parcele as $red) {
							if ($red['status']==1) {
							$red['status']="Ispravan";
							}
							else if ($red['status']==0) {
							$red['status']="Neispravan";
							}
							echo '<tr><td>'.$red['id'].'</td><td>'.$red['naziv'].'</td><td><a href="stroj.php?id='.$red['id'].'">'.$red['model'].'</a></td><td>'.$red['vrsta_stroj'].'</td><td>'.$red['status'].'</td><td>'.$red['opis'].'</td></tr>' ;
}
						?>
						<script type="text/javascript">
							$(document).ready(function() 
						    { 
						        $("#myTable").tablesorter(); 
						    } 
						);  
						</script>
						</tbody>
						</table>
					</div>
					
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
		</div>
<?php
include_once('includes/footer.php');
?>		