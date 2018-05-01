<?php
class MailModel {  
  private $destinataire;
  private $expediteur;
  private $objet;
  private $message;
  private $header;

  public function __construct($to, $subject, $message){
    $this->to       = $to;
    $this->subject  = $subject;
    $this->message  = $message;
  }

  public function send(){
    $this->headers = "From: Webmaster Site <contact@aurelie-clavier.fr>\n";
    $this->headers .= $headers."MIME-Version: 1.0\n"; // ajout du champ de version MIME
    $this->headers .= $headers."Content-type: text/html; charset=utf-8\n";

    if(mail($this->to, $this->subject, $this->message, $this->headers) == TRUE){
      echo "Envoi du mail réussi.";
    }else{
      echo "Erreur : l'envoi du mail a échoué.";
    }
  }
}