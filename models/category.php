<?php
class CategoryModel{
	private $id;
    private $titre;
	private $class_name;

	public function __construct($bdd){
		try{
           $this->bdd = $bdd;
       }catch (PDOException $e) {
           exit('Database connection could not be established.');
       }
	}
	/**
	 * Ici la function permettant d'afficher tout le contenu du site;
	 *
	 */ 
	public function getCategory(){
		$stmt = $this->bdd->prepare('SELECT * FROM categorie');
		$stmt->execute();
		return $stmt->fetchAll();
	}
}

