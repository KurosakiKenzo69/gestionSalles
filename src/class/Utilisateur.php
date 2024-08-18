<?php

class Utilisateur {
    private $id;
    private $prenom;
    private $nom;
    private $username;
    private $email;
    private $password;


    public function __construct($id, $prenom, $nom, $username, $email, $password) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getPrenom() {
        return $this->prenom;
    }
    
    public function getNom() {
        return $this->nom;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    
}

