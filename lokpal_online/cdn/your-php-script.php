<?php 
//Check if user has right to access the file. If no, show access denied and exit the script.
$r = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
echo $r;
//$path = $_SERVER['REQUEST_URI'];
//$paths = explode('/', $path);
//$lastIndex = count($paths) - 1;
//$filename = $paths[$lastIndex]; // Maybe add some code to detect subfolder if you have them
// Check if that file exists, if no show some error message
// Output headers here
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($r));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($r));

        ob_clean();
        flush();
        readfile($r);
        exit;
?>