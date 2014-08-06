<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        


        <title>Galerías</title>

    </head>
    <body bgcolor="#FFFFCC">
        
  
 
  <br><br>

        

        
        <?php       
        
        
            $carpeta=$_POST["gale"];

//            echo $carpeta;

            foreach(glob($carpeta . "/*") as $archivos_carpeta)
            {
            echo $archivos_carpeta;
            echo "<br><br>";

//            if (is_dir($archivos_carpeta))
//            {
//            eliminarDir($archivos_carpeta);
//            }
//            else
//            {
//            unlink($archivos_carpeta);
//            }
            }
//
//            rmdir($carpeta);
            

        
       ?> 
  
         <br><br>
       <a href='index.php' >Volver</a>
       
    </body>
</html>

