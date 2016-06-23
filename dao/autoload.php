<?php


spl_autoload_register('autoload');
function autoload( $class ){
    $dir = $_SERVER["DOCUMENT_ROOT"] . '/virtuel/';
    $tab = array();
    foreach (scandir($dir) as $file) {
        if (is_dir($dir . $file) && substr($file, 0, 1) !== '.')
            $tab[] = $file;
    }
    foreach($tab as $key => $value){
        foreach (scandir($dir.$value) as $file) {
            if ( substr( $file, 0, 2 ) !== '._' && preg_match( "/.php$/i" , $file ) ) {
                if ( str_replace( '.php', '', $file ) == $class || str_replace( '.php', '', $file ) == $class ) {
                    include $_SERVER["DOCUMENT_ROOT"].'/virtuel/'.$value.'/'.$file ;
                }
            }
        }
    }
}



?>
