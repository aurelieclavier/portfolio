<?php
class Database{
    /**
     * @var null Database Connection
     */
    public $bdd = null;
    /**
     * @var null Model
     */
    public $contentModel = null;
    /**
     * Chaque fois que le contrôleur est créé, ouvrez également une connexion à la base de données et chargez "le modèle".
     */
    public function __construct(){
        $this->openDatabaseConnection();
        $this->loadContentModel();
        $this->loadMenuModel();
        $this->loadCompetenceModel();
        $this->loadCategoryModel();
        $this->loadFormModel();
    }
    /**
     * Ouvre la connexion à la base de données avec les informations d'identification à partir de l'application /config/config.php
     */
    private function openDatabaseConnection(){
        // générer une connexion à la base de données, en utilisant le connecteur PDO
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->bdd = new PDO(SGBD . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS);
    }
    /**
     * Chargement "ContentModel".
     * @return object ContentModel
     */
    public function loadContentModel(){
        require APP . 'models/content.php';
        // créer un nouveau "modèle" (et passer la connexion à la base de données)
        $this->contentModel = new ContentModel($this->bdd);
    }

    /**
     * Chargement "menuModel".
     * @return object menuModel
     */
    public function loadMenuModel(){
        require APP . 'models/menu.php';
        // créer un nouveau "modèle" (et passer la connexion à la base de données)
        $this->menuModel = new MenuModel($this->bdd);
    }

    /**
     * 
     * @return object CategoryModel
     */
    public function loadCategoryModel(){
        require APP . 'models/category.php';
        // créer un nouveau "modèle" (et passer la connexion à la base de données)
        $this->categoryModel = new CategoryModel($this->bdd);
    }

    /**
     * 
     * @return object CompetenceModel
     */
    public function loadCompetenceModel(){
        require APP . 'models/competence.php';
        // créer un nouveau "modèle" (et passer la connexion à la base de données)
        $this->competenceModel = new CompetenceModel($this->bdd);
    }

    public function loadFormModel(){
        require APP . 'models/form.php';
        // créer un nouveau "modèle" (et passer la connexion à la base de données)
        $this->formModel = new FormModel($this->bdd);
    }
}