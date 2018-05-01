<?php
define('URL_PUBLIC_FOLDER', 'aurelie');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
//Connexion BDD
$env = 'ovh';// ou local  
if($env == 'local'){
	define('DB_HOST','localhost');
	define('DB_USER','');
	define('DB_PASS','');
}else{
	define('DB_HOST','');
    define('DB_USER','');
    define('DB_PASS','');
}
define('SGBD','mysql');
define('DB_NAME','');
define('DB_CHARSET','utf8');