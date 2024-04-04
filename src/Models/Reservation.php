<?php

namespace src\Models;

class Reservation
{
    private $id;
    private $nombre;
    private $reduit;
    private $prixTotal;
    private $enfants;
    private $luges;
    private $casques;
    private $id_client;

    function __construct($id, $nombre, $reduit, $prixTotal, $enfants, $luges, $casques, $id_client)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->reduit = $reduit;
        $this->prixTotal = $prixTotal;
        $this->enfants = $enfants;
        $this->luges = $luges;
        $this->casques = $casques;
        $this->id_client = $id_client;
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
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of reduit
     */
    public function getReduit()
    {
        return $this->reduit;
    }

    /**
     * Set the value of reduit
     */
    public function setReduit($reduit): self
    {
        $this->reduit = $reduit;

        return $this;
    }

    /**
     * Get the value of prixTotal
     */
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    /**
     * Set the value of prixTotal
     */
    public function setPrixTotal($prixTotal): self
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    /**
     * Get the value of enfants
     */
    public function getEnfants()
    {
        return $this->enfants;
    }

    /**
     * Set the value of enfants
     */
    public function setEnfants($enfants): self
    {
        $this->enfants = $enfants;

        return $this;
    }

    /**
     * Get the value of luges
     */
    public function getLuges()
    {
        return $this->luges;
    }

    /**
     * Set the value of luges
     */
    public function setLuges($luges): self
    {
        $this->luges = $luges;

        return $this;
    }

    /**
     * Get the value of casques
     */
    public function getCasques()
    {
        return $this->casques;
    }

    /**
     * Set the value of casques
     */
    public function setCasques($casques): self
    {
        $this->casques = $casques;

        return $this;
    }

    /**
     * Get the value of id_client
     */
    public function getIdClient()
    {
        return $this->id_client;
    }

    /**
     * Set the value of id_client
     */
    public function setIdClient($id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }
}
