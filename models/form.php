<?php
class FormModel{
    private $email;
    private $message;

	public function __construct($bdd){
		try{
           $this->bdd = $bdd;
       }catch (PDOException $e) {
           exit('Database connection could not be established.');
       }
	}
    public function verifMail($email){
        // Vérifie si la chaine ressemble à un email
        if(preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email)) {
            return true;
        }else{
            $_SESSION['mailErreur'] = 'Merci d\'entrer un mail correct.';
            $_SESSION['formError'] = true;
            return false;
        }
    }

    public function contact($email, $msg){

        if($this->verifMail($email)){
        	$contact = $this->bdd->prepare('INSERT INTO contact (email, message) VALUES (:email, :message)');
        	$contact->execute(array(':email' 	=> $email,
                                    ':message' 	=> $msg));
            require_once APP . 'models/mail.php';
			$passageLigne   = "\r\n";
			$to 			= "aurelie.cissokho@gmail.com";
			$subject 		= "Prise de contact";
			$message 		= "Message reçu depuis le portfolio." . $passageLigne . $passageLigne .
                                "Email de l'utilisateur : " . $email . $passageLigne .
                                "Message reçu : " . $msg;
           	$this->mailModel = new MailModel($to, $subject, $message);
			$this->mailModel->send();
        	return true;
        }
    }
    
}

