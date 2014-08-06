<?php

namespace Galeria\GaleriaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class GaleriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $generador, array $opciones){
        
        $generador->add('id','hidden', array(
        ));
        $generador->add('nombre','text', array(
            'label' =>'Nombre ',
            'max_length' =>50,
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
