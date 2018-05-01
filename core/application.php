<?php
class Application
{
    /**
     * "Start" the application:
     * Analyser les éléments de l'URL et appeler les contrôleurs/méthodes correspondants ou la solution de repli
     */
    public function __construct(){
        require APP . 'controllers/home.php';
        $page = new Home();
        $page->index();
    }
}