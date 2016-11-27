<?php

namespace Event\Bundle\NightBundle\Entity;

/**
 * Autorisation
 */
class Autorisation
{
    /**
     * @var string
     */
    private $libelle;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Autorisation
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString(){

        return $this->libelle;
    }
}

