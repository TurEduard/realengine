<?php
session_start();

@error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );
@ini_set ( 'error_reporting', E_ALL ^ E_WARNING ^ E_DEPRECATED ^ E_NOTICE );



@ini_set ( 'display_errors', true );
@ini_set ( 'html_errors', false );

define('ROOT_DIR', dirname (__FILE__));

header("Content-type: text/html; charset=utf-8");

require_once (ROOT_DIR . '/init.php');
?>