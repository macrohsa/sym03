<?php

namespace Galeria\GaleriaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use DateTime;


class DefaultController extends Controller
{
    
    
    public function indexAction()
    {
        return $this->render('GaleriaGaleriaBundle:Default:index.html.twig');
    }
    
    
    public function homeGaleriaAction(){
        
        $repositorio = $this->getDoctrine()->getRepository('GaleriaGaleriaBundle:galerias');
         
         $galerias = $repositorio->findAll();
         
         $galeria = new \Galeria\GaleriaBundle\Entity\galerias();
         
        $form = $this->createForm(new \Galeria\GaleriaBundle\Form\Type\GaleriaType(), $galeria);
        
        
        return $this->render('GaleriaGaleriaBundle:galeriaViews:index1.html.twig', array(
            'galerias' => $galerias,
            'form' => $form->createView(),
            ));
    }
    
    
    public function altaGaleriaAction(Request $request){
        
        
        $galeria = new \Galeria\GaleriaBundle\Entity\galerias();
         
        $form = $this->createForm(new \Galeria\GaleriaBundle\Form\Type\GaleriaType(), $galeria);
        
        
        if ($this->getRequest()->getMethod() == 'POST') {

            $form->bindRequest($this->getRequest());

            if ($form->isValid()) {
                
                $pathname1="/var/www/ProyectoGaleria/src/Galeria/GaleriaBundle/Resources/galeriasFotografos/";

                foreach($request->request->all() as $req){
//                    print_r($req['nombre']);
                }

                $pathname2=$req['nombre'];
                $pathname=$pathname1.$pathname2;
                
                $hoy = new DateTime('NOW');
                $galeria->setFechaAlta($hoy);
                $galeria->setGaleriaURL($pathname);
                
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($galeria);
                $em->flush();
                
                $id = $galeria->getId();

                
                // Arma pathname galeria con nombre y id
                $pathname=$pathname1.$pathname2."_".$id;
                
                mkdir($pathname); 
                chmod($pathname,  0777);
                
                $galeria->setGaleriaURL($pathname);
                $em->flush();
                
                $repositorio = $this->getDoctrine()->getRepository('GaleriaGaleriaBundle:galerias');
         
                $galerias = $repositorio->findAll();
                
                return $this->render('GaleriaGaleriaBundle:galeriaViews:index1.html.twig', array(
                    'galerias' => $galerias,
                    'form' => $form->createView(),
                ));
            }
        }
        
        return $this->render('GaleriaGaleriaBundle:galeriaViews:crearGaleria.html.twig', array(
            'form' => $form->createView(),
            ));
        
    }
    
    
    
    public function eliminarGaleriaAction(){
        
          
       $repositorio = $this->getDoctrine()->getRepository('GaleriaGaleriaBundle:galerias');
         
       $galerias = $repositorio->findAll();
         
       $galeria1 = new \Galeria\GaleriaBundle\Entity\galerias();
         
       $form = $this->createForm(new \Galeria\GaleriaBundle\Form\Type\Galeria1Type(), $galeria1); 
        

        if ($this->getRequest()->getMethod() == 'POST') {

            $form->bindRequest($this->getRequest());
            
            $idGaleSeleccionada=$_POST["gale"];
            
            $galeria1 = $repositorio->find($idGaleSeleccionada);
            
            $carpeta=$galeria1->getNombre();
            $carpeta1=$galeria1->getGaleriaURL();
            
            $form = $this->createForm(new \Galeria\GaleriaBundle\Form\Type\Galeria1Type(), $galeria1); 
              
            echo "carpeta: ".$carpeta;
            echo "<br><br>";
            echo "URL: ".$carpeta1;
             echo "<br><br>";


             foreach(glob($carpeta1. "/*") as $archivos_carpeta)
            {
                echo $archivos_carpeta;
                echo "<br><br>";
            }

            if ($form->isValid()) {
                
                
                
                
//                        $carpeta=$_POST["gale"];
                        
                            echo "La carpeta: ".$carpeta;
                             echo "<br><br>";
                             
                            foreach(glob($carpeta1. "/*") as $archivos_carpeta)
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
                
                return $this->render('GaleriaGaleriaBundle:galeriaViews:bajaGaleria.html.twig'
              );
            }
            
        }

        return $this->render('GaleriaGaleriaBundle:galeriaViews:eliminarGaleria.html.twig', array(
                    'galerias' => $galerias,
                    'form' => $form->createView(),
                ));
        

        
    }
    
    
    
    public function bajaGaleriaAction(){
        
          
        
        
        
        if ($this->getRequest()->getMethod() == 'POST') {

//            $form->bindRequest($this->getRequest());
            
            $idGaleSeleccionada=$_POST["gale"];
            
            $em = $this->getDoctrine()->getEntityManager();
            $galeria2 = $em->getRepository('GaleriaGaleriaBundle:galerias')->find($idGaleSeleccionada);
            
            $repositorio = $this->getDoctrine()->getRepository('GaleriaGaleriaBundle:galerias');
            
            $galeria1 = $repositorio->find($idGaleSeleccionada);
            
            $carpeta=$galeria1->getNombre();
            $carpeta1=$galeria1->getGaleriaURL();
            $carpetaReal="galeriasFotografos/".$carpeta."_".$idGaleSeleccionada;
              
            echo "carpeta: ".$carpeta;
            echo "<br><br>";
            echo "URL: ".$carpeta1;
             echo "<br><br>";

                             
                            foreach(glob($carpeta1. "/*") as $archivos_carpeta)
                                {
                                echo $archivos_carpeta;
                                echo "<br><br>";

                                if (is_dir($archivos_carpeta))
                                    {
                                        eliminarDir($archivos_carpeta);
                                }
                                else
                                    {
                                        unlink($archivos_carpeta);
                                }
                            }
                
                            rmdir($carpeta1);
                            $em->remove($galeria2);
                            $em->flush();
                
                return $this->render('GaleriaGaleriaBundle:galeriaViews:bajaGaleria.html.twig'
              );
            }
            

        

        
    }
    
    
    public function eliminarFotosGaleriaAction(Request $request){
        
//          $carpeta=$request->query->get('id');
//
//            echo "carpeta: ".$carpeta;
//            
//            $idGaleSeleccionada=$_POST["gale"];
//            
//            $em = $this->getDoctrine()->getEntityManager();
//            $galeria2 = $em->getRepository('GaleriaGaleriaBundle:galerias')->find($idGaleSeleccionada);
//            
//            $repositorio = $this->getDoctrine()->getRepository('GaleriaGaleriaBundle:galerias');
//            
//            $galeria1 = $repositorio->find($idGaleSeleccionada);
//            
//            $carpeta=$galeria1->getNombre();
//            $carpeta1=$galeria1->getGaleriaURL();
//
//            foreach(glob($carpeta1."/*") as $archivos_carpeta)
//            {
//            echo $archivos_carpeta;
//            echo "<br><br>";
//
//                if (is_dir($archivos_carpeta))
//                {
//                    eliminarDir($archivos_carpeta);
//                }
//                else
//                {
//                    unlink($archivos_carpeta);
//                }
//            }
//
//            rmdir($carpeta);
        
        return $this->render('GaleriaGaleriaBundle:galeriaViews:bajaGaleria.html.twig'
              );
    }
    
   
    public function mostrarGaleriaAction(){
        
        $idGaleSeleccionada=$_POST["gale"];
        
        $repositorio = $this->getDoctrine()->getRepository('GaleriaGaleriaBundle:galerias');
        
        $galeria1 = $repositorio->find($idGaleSeleccionada);

        $carpeta1=$galeria1->getGaleriaURL();

        $directorio = $carpeta1."/";
        $imagenes=array();
         $archivos=array();

        if (is_dir($directorio)) {
            if ($dd = opendir($directorio)) {
                while (($archivo = readdir($dd)) !== false) {
                    if (filetype($directorio.$archivo) == 'file') {
                        $imagenes[] = $directorio.$archivo;
                        $archivos[] = $archivo;
                    }
                }
                closedir($dd);
            }
        }
        if (!empty($imagenes)){
            if (is_array($imagenes)) {

                natcasesort($imagenes);
            }
        }

        
         $galerias = $repositorio->findAll();
         $galeria = new \Galeria\GaleriaBundle\Entity\galerias();
         $form = $this->createForm(new \Galeria\GaleriaBundle\Form\Type\GaleriaType(), $galeria);
         
         
        return $this->render('GaleriaGaleriaBundle:galeriaViews:galerias.html.twig', array(
            'galerias' => $galerias,
            'archivos' => $archivos,
            'imagenes' => $imagenes,
            'form' => $form->createView(),
            ));
 
        
        
    }
    
    
    
}




