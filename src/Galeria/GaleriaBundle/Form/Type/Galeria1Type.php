<?php

namespace Galeria\GaleriaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class Galeria1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $generador, array $opciones){
        
        $generador->add('id','hidden', array(
        ));
        $generador->add('nombre','hidden', array(
        ));
        $generador->add('galeriaURL','hidden', array(
        ));
        $generador->add('fechaAlta','hidden', array(
        ));


    }
    
    public function getDefaultOptions(array $options) {
        return array('data_class' => 'Galeria\GaleriaBundle\Entity\galerias',);
    }
    
    
    public function getName() {
        return 'nombre';
    }
}
