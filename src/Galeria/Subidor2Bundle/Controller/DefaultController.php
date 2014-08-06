<?php

namespace Galeria\Subidor2Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GaleriaSubidor2Bundle:Default:index.html.twig');
    }
    
    
    public function galeriasAction() {
        


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dire=$_POST["gale"];
        }
        else{
            $dire=$_GET["gale"];
        }

        $pathname=$dire;
        
        $directorio = $pathname;

        if (is_dir($directorio)) {
            if ($dd = opendir($directorio)) {
                while (($archivo = readdir($dd)) !== false) {
                    if (filetype($directorio."/".$archivo) == 'file') {
                        $imagenes[] = $directorio."/".$archivo;
                    }
                }
                closedir($dd);
            }
        }
        
        if (is_array($imagenes)) {
            
            natcasesort($imagenes);
        }

        
        return $this->render('GaleriaSubidor2Bundle:Default:galerias.html.twig');
    }
    
}
