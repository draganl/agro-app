<?php 
include_once('includes/head.php');
include_once('includes/header.php');
include_once('functions/generalFunctions.php');
?>
	<script type="text/javascript">
    function trazi(upit){
        if(upit.length == 0) {
            // Hide the suggestion box.
            $('#rezultat').hide();
        } else {
            $.post("ajax/trazilicaParcele.php", {podatak: ""+upit+""}, function(data){
                if(data.length >0) {
                    $('#rezultat').show();
                    $('#rezultat').html(data);
                }
            });
        }
    }//Kraj funkcije
    
    function izbrisi(parcela_id){
            $.post("ajax/deleteParcele.php", {podatak: ""+parcela_id+""}, function(data){
                if(data.length >0) {
                    $('#parcela_'+data).hide("slow");
                   //alert(data);
                }
            });
        
    }//Kraj funkcije
	
	function finishAjax(id, response){
	 	 $('#loader').hide();
	 	 $('#'+id).html(unescape(response));
	 	 $('#'+id).fadeIn();
		}
		
</script>
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
						<h2>Pregled parcela</h2>
						
						<form action="" method="post">
                   <div id="searchContainer">
                    <p>
                        <label for="trazilica">Pretražite parcele</label>
                        <input onkeyup="trazi(this.value);" id="trazilica" name="trazilica" type="text" value="" />
                    </p>
                    <div id="rezultat" style="display:none;"></div>
                   </div>
                </form>
						<p><a href="parcela.php">Nova parcela</a></p>
						
						<table id="myTable" class="tablesorter">
							<thead>
							<tr>
							 <th>Šifra</th>
							 <th>Naziv</th>
							 <th>Arcod</th>
							 <th>Čestice</th>
							 <th>Opis</th>
							 <th>Briši</th>
							</tr>
							</thead>
							<tbody>
							<?php 
								spajanje();
								$sql="select * from parcela";
								$parcele=pregled($sql);
							   /* echo '<pre>';
								print_r($parcele);
								echo '</pre>'; */
								foreach ($parcele as $red)
								{
									$cestice=unserialize($red['cestice']);
									$noveCestice = implode(", ", $cestice);
									echo '<tr id="parcela_'.$red['id'].'">';
									echo "<td>".$red['id']."</td><td><a href=\"parcela.php?id=".$red['id']."\">".$red['naziv']."</a></td><td>".$red['arcod_id']."</td><td>".$noveCestice."</td><td>".$red['opis']."</td>";
									echo '<td><p onclick="izbrisi('.$red['id'].')" style="cursor:pointer">delete</p></td>';
									echo "</tr>";
									
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
						<div id="bla"></div>
					</div>
					
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
		</div>
<?php include_once('includes/footer.php');?>
		