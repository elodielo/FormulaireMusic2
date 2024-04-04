<?php

namespace src\Models;

// use src\Services\Hydratation;

class Option
{
    private $id;
    private $nomOption;
    private $prixOption;
    private $nombreOption;


    public function __construct($id, $nomOption, $prixOption, $nombreOption)
    {
        $this->id = $id;
        $this->nomOption = $nomOption;
        $this->prixOption = $prixOption;
        $this->nombreOption = $nombreOption;
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
     * Get the value of nomOption
     */
    public function getNomOption()
    {
        return $this->nomOption;
    }

    /**
     * Set the value of nomOption
     */
    public function setNomOption($nomOption): self
    {
        $this->nomOption = $nomOption;

        return $this;
    }

    /**
     * Get the value of prixOption
     */
    public function getPrixOption()
    {
        return $this->prixOption;
    }

    /**
     * Set the value of prixOption
     */
    public function setPrixOption($prixOption): self
    {
        $this->prixOption = $prixOption;

        return $this;
    }

    /**
     * Get the value of nombreOption
     */
    public function getNombreOption()
    {
        return $this->nombreOption;
    }

    /**
     * Set the value of nombreOption
     */
    public function setNombreOption($nombreOption): self
    {
        $this->nombreOption = $nombreOption;

        return $this;
    }
}
