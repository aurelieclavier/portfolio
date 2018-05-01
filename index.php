<?php
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'aurelie' . DIRECTORY_SEPARATOR);
require APP . 'config/config.php';
// load application class
require APP . 'core/application.php';
require APP . 'core/database.php';
// start the application
$app = new Application();

