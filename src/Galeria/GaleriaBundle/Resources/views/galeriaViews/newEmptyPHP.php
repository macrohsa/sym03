<?php

$directorio=$_POST['directorio'];

$gale=$_POST['directorio'];

$archivos_correctos = moverArchivos($_FILES,$directorio); //llamamos a la funcion que mueve y comprueba los archivos

if(isset($archivos_correctos) and !empty($archivos_correctos)){
    echo 'Archivos cargados correctamente';
//	print_r($archivos_correctos); //podemos manipular los archivos desde el arreglo resultante.
}

echo "<br><br>";
echo "<a href='galerias.php?gale=$gale'>Volver</a>";

function moverArchivos($archivos,$directorio){ //Optimizada para multiples archivos
		
//	$directorio = "imagenes01/"; //ubicacion y nombre del directorio donde se guarda

	$ubicaciones = array();
	
	$extensiones = array('gif','jpg','jpe','jpeg','png'); //extensiones permitidas
	
	if (file_exists($directorio) && is_writable($directorio)) { //comprueba si el directorio existe y si es posible escribir
		if(isset($archivos["archivo"]["error"])){
			
			foreach ($archivos["archivo"]["error"] as $key => $error) {
				if ($error == 0) {
					$trozo = explode(".",$archivos["archivo"]["name"][$key]); //obtenemos la extensión
					$extension = strtolower(end($trozo)); //la pasamos a minuscula
					$valido = false;
                                        
					foreach($extensiones as $tipo){ //comprobamos que sea una extensión permitida
						if($tipo == $extension){
							$valido = true;
						}
					}
					
					if(isset($valido) and $valido === true){ //si el archivo es valido lo intentamos mover
						$nombre_archivo = date("Ymd") . "_" . date("is"). "_img_".$trozo[0].".".$extension; //generamos un nombre personalizable
						$ubicacion_original = $archivos["archivo"]["tmp_name"][$key]; //ubicacion original y temporal del archivo
						
						if(!move_uploaded_file($ubicacion_original,"$directorio/$nombre_archivo")){
							echo "No se puede mover el archivo \n";
						}
						else{
							$ubicaciones[] = $nombre_archivo;
						}
					}
					else{
						echo "Extension de archivo no valida \n";
					}
				}
				else{
					if($error != 0 and $error != 4){ //Si no subieron archivos No enviar ninguna advertencia
						$mensaje_error = mensajesErrorArchivos($archivos["archivo"]["error"][$key]);
						echo $mensaje_error." Intente nuevamente. \n";
						die;
					}
				}
			}
			return $ubicaciones;
		} //fin del existe error
		else { echo "Uno de los archivos sobrepasa la capacidad establecida por el servidor";}
	}
	else {
		echo "No existe la carpeta para subir archivos o no tiene los permisos suficientes.";
	}
} // Termina la funcion moverArchivos()

function mensajesErrorArchivos($error_code) { //Mensajes Personalizados
	switch ($error_code) {
		case UPLOAD_ERR_INI_SIZE:
			return 'El archivo excede el limite permitido por la directiva de PHP';
		case UPLOAD_ERR_FORM_SIZE:
			return 'El archivo excede el limite permitido por la directiva de HTML';
		case UPLOAD_ERR_PARTIAL:
			return 'El archivo solo se subio parcialmente, intentelo de nuevo';
		case UPLOAD_ERR_NO_FILE:
			return 'No hay archivo que subir';
		case UPLOAD_ERR_NO_TMP_DIR:
			return 'El folder temporal no existe';
		case UPLOAD_ERR_CANT_WRITE:
			return 'No tiene permisos para grabar archivos en el disco';
		case UPLOAD_ERR_EXTENSION:
			return 'El archivo tiene una extensión NO permitida';
		default:
			return 'Error desconocido al subir el archivo';
	}
} // Termina funcion mensajesErrorArchivos





?>
