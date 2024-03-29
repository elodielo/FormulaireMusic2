<?php 

namespace src\Models;

// use src\Services\Hydratation;

class ResaOption{
    private $idResa;
    private $idOption;
    private $jour;


    public function __construct($idResa, $idOption, $jour )
    {
        $this->idResa = $idResa;
        $this->idOption = $idOption;
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
     * Get the value of idOption
     */
    public function getIdOption()
    {
        return $this->idOption;
    }

    /**
     * Set the value of idOption
     */
    public function setIdOption($idOption): self
    {
        $this->idOption = $idOption;

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