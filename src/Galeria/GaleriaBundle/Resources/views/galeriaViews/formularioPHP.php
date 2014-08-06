
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
<?php

$max_upload = (int)(ini_get('upload_max_filesize'));
$max_post = (int)(ini_get('post_max_size'));
$memory_limit = (int)(ini_get('memory_limit'));
$upload_mb = min($max_upload, $max_post, $memory_limit);

echo "Tamaño maximo permitido <strong>$upload_mb Mb</strong><br>";

echo "<br><br>";
$dir=$_GET['directorio'];
$gale=$dir;

?>
<form action="newEmptyPHP.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="directorio" id="directorio" value="<?php echo $dir; ?>">
    
	<label>Archivos</label>
	<input type="file" name="archivo[]" multiple>
	<br>


	<br><br>
	<input type="submit" value="Guardar Archivos">
        <br><br><br><br>
        <?php
        echo "<a href='galerias.php?gale=$gale' >Volver</a>";
        ?>
</form>
</body>
</html>

