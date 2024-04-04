<?php

namespace src\Models;


class ResaPass
{
    private $idResa;
    private $idPass;
    private $jour;


    public function __construct($idResa, $idPass, $jour)
    {
        $this->idResa = $idResa;
        $this->idPass = $idPass;
        $this->jour = $jour;
    }


    /**
     * Get the value of idResa
     */
    public function getIdResa()
    {
        return $this->idResa;
    }

    /**
     * Set the value of idResa
     */
    public function setIdResa($idResa): self
    {
        $this->idResa = $idResa;

        return $this;
    }

    /**
     * Get the value of idPass
     */
    public function getIdPass()
    {
        return $this->idPass;
    }

    /**
     * Set the value of idPass
     */
    public function setIdPass($idPass): self
    {
        $this->idPass = $idPass;

        return $this;
    }

    /**
     * Get the value of jour
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set the value of jour
     */
    public function setJour($jour): self
    {
        $this->jour = $jour;

        return $this;
    }
}
