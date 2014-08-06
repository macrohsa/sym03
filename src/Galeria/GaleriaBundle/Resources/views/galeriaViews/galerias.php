<!DOCTYPE html>
<html>
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!--<script src="js/jquery-1.10.2.min.js"></script>-->
        <!--<script src="js/lightbox-2.6.min.js"></script>-->
        <script src="js/image-picker.js"></script>
        <script src="js/image-picker.min.js"></script>

        <!--<link href="css/lightbox.css" rel="stylesheet" />-->
        <link href="css/image-picker.css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Miniaturas galería</title>
    </head>
    <body bgcolor="#FFFFCC">
        <div class="contenedor">
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
        }
       ?>     
            <center><h2>Mi galería de imágenes</h2></center><br />
            <center><a href='sliderPHP.php?directorio=<?php echo $directorio; ?>' title='Visor'>Visor imagenes</a>
            <br><br>



            <select name="seleccion[]" multiple="multiple" class="image-picker show-html"  hidden="true" >
     <?php
     $i=0;
     foreach ($imagenes as $imagen) {
         $i++;
     ?> 
              <option data-img-src="http://localhost/Imagenes/phpThumb/phpThumb.php?src=../<?php echo $imagen; ?>&w=100&h=80" value="<?php echo $imagen; ?>"><?php echo $imagen; ?></option>
      <?php
     }
     ?>         
              
            </select>
       <!--<input type="hidden" name="nroi" id="nroi" value="<?php echo $i; ?>">-->
        <br><br>

        
        <input type="submit" value="Eliminar Archivos">
         <br><br>

        <br><br>
        <left><a href='formularioPHP.php?directorio=<?php echo $directorio; ?>' title='Subir archivos'>Subir archivos a galería</a>
           
        <br><br>

        <br><br>
       <left><a href='index.php' >Volver</a>
           
           
           <script type="text/javascript">

    jQuery("select.image-picker").imagepicker({
       hide_select : true,
          show_label  : false
    });


  </script>
           
           
</form>  
        </div>
    </body>
</html>