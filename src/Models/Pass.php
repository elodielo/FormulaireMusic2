<?php

namespace src\Models;


class Pass
{
    private $id;
    private $typePass;
    private $prixPass;


    public function __construct($id, $typePass, $prixPass)
    {
        $this->id = $id;
        $this->typePass = $typePass;
        $this->prixPass = $prixPass;
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
     * Get the value of typePass
     */
    public function getTypePass()
    {
        return $this->typePass;
    }

    /**
     * Set the value of typePass
     */
    public function setTypePass($typePass): self
    {
        $this->typePass = $typePass;

        return $this;
    }

    /**
     * Get the value of prixPass
     */
    public function getPrixPass()
    {
        return $this->prixPass;
    }

    /**
     * Set the value of prixPass
     */
    public function setPrixPass($prixPass): self
    {
        $this->prixPass = $prixPass;

        return $this;
    }
}
