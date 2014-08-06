<!DOCTYPE html>
<html>
    <head>
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/lightbox-2.6.min.js"></script>
 
        
        <link href="css/lightbox.css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Galerías</title>

    </head>
    <body bgcolor="#FFFFCC">
        
  
 
  <br><br>

        
        <form action="galerias.php" method="post" enctype="multipart/form-data">

            
            <select name="gale" id="gale" >
      
                 <option value="val">Seleccionar galeria</option>
                 <option value="imagenes">imagenes</option>
                 <option value="imagenes03">imagenes03</option>
                 <option value="sasa02">sasa02</option>
              </select>

	<br><br>
	<input type="submit" value="Ir a la galeria">
        
        <br><br> <br><br>
	<a href='crearGaleria.php' >Crear galería</a>
        
        <br><br>
        
        <a href='eliminarGaleria.php' >Eliminar galería</a>

        


</form>
    </body>
</html>
