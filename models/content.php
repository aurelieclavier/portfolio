<?php
class ContentModel{
	private $id;
    private $titre;
    private $sous_titre;
	private $contenu;
	private $categorie;

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
	public function getContentByCategory($category){
		$stmt = $this->bdd->prepare('SELECT * FROM contenu WHERE categorie = :categorie');
		$stmt->execute(array(':categorie' => $category));
		return $stmt->fetch();
	}
}

