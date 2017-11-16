<?php

ob_start();
$filepath = ".".$_POST['filepath'];
$fileName = substr($filepath, 8);
$real_filename = urldecode($fileName);

$file_extension = strtolower(substr($fileName, -3));

switch($file_extension){
   case "pdf": $ctype="application/pdf"; break;
   case "exe": $ctype="application/octet-stream";break;
   case "zip": $ctype="application/zip"; break;
   case "doc": $ctype="application/masword"; break;
   case "xls": $ctype="application/vnd.ms-excel"; break;
   case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
   case "gif": $ctype="image/gif"; break;
   case "png": $ctype="image/png"; break;
   case "jpeg":
   case "jpg": $cytpe="image/jpg"; break;
   case "mp3": $ctype="audio/mpeg"; break;
   case "wav": $ctype="audio/x-wav"; break;
   case "mepeg";
   case "mpg";
   case "mpe": $ctype="video/mpeg"; break;
   case "mov": $ctype="void/quicktime"; break;
   case "avi": $ctype="void/x-msvideo"; break;
   case "php": $ctype="application/force-download"; break;
   case "htm":
   case "hwp": $ctype="application/force-download"; break;
   case "html":
   case "txt": $ctype="text/plain"; break;
   default: $ctype="application/force-download";

}

header("Pragma: public");
header("Expires: 0");
header("Content-Type: {$ctype}");
header("Content-Disposition: attachment; filename=".$real_filename);
header("Content-Transfer-Encoding: binary");
header("Content-Length".filesize($filepath));
header('Accept-Ranges: bytes');

ob_end_clean();
readfile($filepath);

?>