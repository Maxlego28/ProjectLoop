<?php
class User {
    /*
    Auteur : Gabriel Braun - Grenier
    Date : 3/04/2018
    */
    private $courriel, $nom, $prenom, $mdp, $username;

    public function getCourriel() {
        return $this->courriel;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function getMdp() {
        return $this->mdp;
    }
    public function getUsername() {
        return $this->username;
    }
    
    public function setCourriel($value) {
        $this->courriel = $value;
    }
    public function setNom($value) {
        $this->nom = $value;
    }
    public function setPrenom($value) {
        $this->prenom = $value;
    }
    public function setMdp($value) {
        $this->mdp = $value;
    }
    public function setUsername($value) {
        $this->username = $value;
    }
    
    public function loadFromArray($t) {
        $this->courriel = $t['EMAIL'];
        $this->nom = $t['NOM'];
        $this->prenom = $t['PRENOM'];
        $this->mdp = $t['PASSWORD'];
        $this->username = $t['USERNAME'];
    }    
    public function loadFromObject($x) {
        $this->courriel = $x->COURRIEL;
        $this->nom = $x->NOM;
        $this->prenom = $x->PRENOM;
        $this->mdp = $x->MDP;
        $this->username = $x->USERNAME;
    }
}
?>