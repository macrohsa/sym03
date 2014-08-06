<!DOCTYPE html>
<html>
    <head>
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/lightbox-2.6.min.js"></script>

        <link href="css/lightbox.css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Miniaturas galería</title>
    </head>
    <body bgcolor="#FFFFCC">
        
        <form action="eliminarImagenes.php" method="post" enctype="multipart/form-data"> 
        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dire=$_POST["gale"];
        }
        else{
            $dire=$_GET["gale"];
        }

        $pathname=$dire;
        
        $directorio = $pathname."/";

        if (is_dir($directorio)) {
            if ($dd = opendir($directorio)) {
                while (($archivo = readdir($dd)) !== false) {
                    if (filetype($directorio.$archivo) == 'file') {
                        $imagenes[] = $directorio.$archivo;
                    }
                }
                closedir($dd);
            }
        }
        
        if (is_array($imagenes)) {
            
            natcasesort($imagenes);
       ?>     
            <center><h2>Mi galería de imágenes</h2></center><br />
            <center><a href='sliderPHP.php?directorio=$directorio' title='Visor'>Visor imagenes</a>
            <br><br>
            <table border='0' cellspacing='0' cellpadding='4' align='center'>
            <tr>
       <?php     
            $i=0;
//            $vectorCheck= array();
            foreach ($imagenes as $imagen) {
                $contadorImagenes++;
                $contadorColumnas++;
                $i++;
       ?>
                <input type="hidden" name="imagen<?php echo $i; ?>" value="<?php echo $imagen; ?>">
<!--                <td>
                    <input name='id<?php echo $i; ?>' type='checkbox' value='id<?php echo $i; ?>' >
                </td>-->
                <td>
                    <!--<a href="<?php echo $imagen; ?>" rel='lightbox[galeria]'>-->
                        <img class="image_picker_image" src='phpThumb/phpThumb.php?src=../<?php echo $imagen; ?>&w=100&h=80' bordr='0' />
                    <!--</a>-->
                </td>
      <?php         
//                $vectorCheck[$i]=$imagen;
                if ($contadorColumnas == 4 && $contadorImagenes != count($imagenes)) {
      ?>
                    </tr><tr>
      <?php
                    $contadorColumnas = 0;
                }
                
            }
      ?>
            </tr>
            </table>
      <?php
        }
//        foreach ($vectorCheck as $vec) {
//            echo $vec;
//        }
     ?>   
            
            <select multiple="multiple" class="image-picker show-html">
     <?php
     foreach ($imagenes as $imagen) {
     ?> 
              <option data-img-src="phpThumb/phpThumb.php?src=../<?php echo $imagen; ?>&w=100&h=80" value="1">Cute Kitten 1</option>
      <?php
     }
     ?>         
              
            </select>
       <input type="hidden" name="nroi" id="nroi" value="<?php echo $i; ?>">
        <br><br>

        <br><br>
        
        <input type="submit" value="Eliminar Archivos">
         <br><br>

        <br><br>
        <left><a href='formularioPHP.php?directorio=$directorio' title='Subir archivos'>Subir archivos a galería</a>
           
        <br><br>

        <br><br>
       <left><a href='index.php' >Volver</a>
           
</form>  
        
    </body>
</html>