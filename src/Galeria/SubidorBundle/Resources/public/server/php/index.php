<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */



error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

$folder =  "$_REQUEST[folder]";
$options = array('folder' => "$folder",
                'mkdir_mode'=> 0777);
  $upload_handler = new UploadHandler($options);
  