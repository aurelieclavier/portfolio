<?php
/**
 * Class Home
 *
 */
class Home extends Database
{
    /**
     * PAGE: index
     * Cette méthode gère ce qui se passe lorsque vous passez à http://yourproject (qui est la page par défaut)
     */
    public function index(){
        $send = false;
        //requête de la home;
        $header = $this->contentModel->getContentByCategory('header');
        $presentation = $this->contentModel->getContentByCategory('presentation');
        $nav = $this->menuModel->getMenu();
        $category = $this->categoryModel->getCategory();
        $competence = $this->competenceModel->getCompetence();

        $send = $this->send_message();

        //chargement des vues
        require APP . 'views/head.phtml';
        require APP . 'views/header.phtml';
        require APP . 'views/main.phtml';
        require APP . 'views/footer.phtml';
    }

    public function send_message(){
    	if (isset($_POST)) {
			$isSend = $this->formModel->contact($_POST['email'], $_POST['message']);
        }  
        return $isSend;
    }
}