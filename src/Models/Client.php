<?php

namespace src\Models;


class Client
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $adresse;
    private $rgpdDate;
    private $mdp;

    public function __construct($id, $nom, $prenom, $email, $telephone, $adresse, $rgpdDate, $mdp)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
        $this->rgpdDate = $rgpdDate;
        $this->mdp = $mdp;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     */
    public function setTelephone($telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     */
    public function setAdresse($adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of rgpdDate
     */
    public function getRgpdDate()
    {
        return $this->rgpdDate;
    }

    /**
     * Set the value of rgpdDate
     */
    public function setRgpdDate($rgpdDate): self
    {
        $this->rgpdDate = $rgpdDate;

        return $this;
    }

    /**
     * Get the value of mdp
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     */
    public function setMdp($mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }
}
