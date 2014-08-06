<!DOCTYPE html>
 <html class="no-js" lang="en"> 
<head>

  <title>Slider</title>


  <link rel="stylesheet" href="css/1140.css">
  <link rel="stylesheet" href="css/flexslider.css">
  <link rel="stylesheet" href="css/style.css">

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" charset="utf-8">
	  $(window).load(function() {
	    $('.flexslider').flexslider({
	    	controlsContainer: '.flex-container'
	    });
	  });
	</script>


</head>

<body>
    <br>
<center><a href='index.php' >Volver a la galer&iacute;a</a>
  <div class="container">
    <header class="row">
    	<hgroup class="twelvecol center">
				<!--<h1>Responsive Slider</h1>-->
				<!--<h2>Using 1140px CSS Grid and FlexSlider</h2>-->
	</hgroup>
    </header>
    
    <div id="main" class="row">
        <div class="onecol"></div>
            <div id="slider" class="tencol">
                <div class="flex-container">
                    <div class="flexslider">
                        <ul class="slides">
                            
                            <?php 
                            
                            $directorio=$_GET['directorio'];
                            
        if (is_dir($directorio)) {
            $dd = opendir($directorio);
            if ($dd) {
                while (($archivo = readdir($dd)) !== false) {
                    if (filetype($directorio.$archivo) == 'file') {
                        $array[] = $directorio.$archivo;
                    }
                }
                closedir($dd);
            }
        }
                            
        natcasesort($array);
        
        foreach($array as $key=>$value) {
            echo "<li><img src='".$array[$key]."' width='700' height='500'/></li>";
        }

         ?>
    
                                </ul><!-- .slides -->
                        </div><!-- .flexslider -->
                </div><!-- .flex-container -->
        </div>
<div class="onecol last"></div>

    </div>

  </div>
 
  
</body>
</html>
