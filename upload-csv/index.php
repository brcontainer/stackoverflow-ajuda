<?php
error_reporting(E_ALL & ~ E_NOTICE);
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>
<form id="form" name="form" action="add_analise.php" enctype="multipart/form-data" method="POST">
    <b>Importe o arquivo .CSV : </b><input name="file" id="file" type="file"   /><br>
    <hr>
    <input type="submit"  value="Ver Analise" />
</form>
