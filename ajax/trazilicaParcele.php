<?php
include_once '../functions/generalFunctions.php';
spajanje();
if(isset($_POST['podatak'])) {
    $naziv = $_POST['podatak'];
    if(strlen($naziv) >0) {
        $tablica = 'parcela';
        $polje = 'naziv';
        $sql = "SELECT * FROM $tablica WHERE $polje LIKE '$naziv%'";
        mysql_query('SET NAMES utf8');
        $rezultat = mysql_query($sql);
        echo "<ul>";
            while ($parcela = mysql_fetch_assoc($rezultat)){
            echo '<li><a href="parcela.php?id='.$parcela['id'].'">'.$parcela['naziv'].'</a></li>';
            }
        echo "</ul>";
    }
}
?>