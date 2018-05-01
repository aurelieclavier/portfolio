<?php
class CompetenceModel{
	private $id;
	private $id_categorie;
    private $icone;

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
	public function getCompetence(){
		$stmt = $this->bdd->prepare('SELECT * FROM competence');
		$stmt->execute();
		return $stmt->fetchALL();
	}
}

