<?php

namespace Galeria\SubidorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        
        
        $archivos=array();
        
        
        return $this->render('GaleriaSubidorBundle:subidorViews:index_1.php.twig', array(
            'files' => $archivos,
            ));
        
        
    }
    
    
    
    
    
  
}
