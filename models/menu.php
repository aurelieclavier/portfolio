<?php
class MenuModel{
	private $id;
    private $lien;
    private $libelle;

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
	public function getMenu(){
		$stmt = $this->bdd->prepare('SELECT * FROM menu');
		$stmt->execute();
		return $stmt->fetchAll();
	}
}