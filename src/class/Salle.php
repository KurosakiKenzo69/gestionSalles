<?php

class Salle {
    private $id;
    private $nom;
    private $capacite;
    private $description;

    public function __construct($id, $nom, $capacite, $description) {
        $this->id = $id;
        $this->nom = $nom;
        $this->capacite = $capacite;
        $this->description = $description;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getCapacite() {
        return $this->capacite;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setCapacite($capacite) {
        $this->capacite = $capacite;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    
}