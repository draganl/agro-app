<?php
include_once '../functions/generalFunctions.php';
spajanje();
if(isset($_POST['podatak'])) {
    $parcela_id = $_POST['podatak'];
        $sql = "DELETE FROM parcela WHERE id=$parcela_id";
        mysql_query('SET NAMES utf8');
        if (mysql_query($sql))
        echo $parcela_id;
    
}
?>