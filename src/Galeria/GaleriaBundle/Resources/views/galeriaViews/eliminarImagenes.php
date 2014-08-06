<?php

$vectorImagenes = array();
$i = 0;

foreach ($_POST['seleccion'] as $indice => $valor){ 
echo "indice: ".$indice." => ".$valor."<br>"; 
$vectorImagenes[$i]=$valor;
$i++;

} 

foreach ($vectorImagenes as $vec) {
            unlink($vec);
        }

