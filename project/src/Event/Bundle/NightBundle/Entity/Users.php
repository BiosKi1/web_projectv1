<?php

namespace Event\Bundle\NightBundle\Entity;

/**
 * Users
 */
class Users
{
    /**
     * @var string
     */
    private $pseudo;

    /**
     * @var string
     */
    private $mdp;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var integer
     */
    private $cp;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $genre;

    /**
     * @var string
     */
    private $couverture;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Event\Bundle\NightBundle\Entity\TypeUsers
     */
    private $typeUser;

    /**
     * @var \Event\Bundle\NightBundle\Entity\Autorisation
     */
    private $acces;


    /**
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return Users
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     *
     * @return Users
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Users
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Users
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Users
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Users
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     *
     * @return Users
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Users
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Users
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set couverture
     *
     * @param string $couverture
     *
     * @return Users
     */
    public function setCouverture($couverture)
    {
        $this->couverture = $couverture;

        return $this;
    }

    /**
     * Get couverture
     *
     * @return string
     */
    public function getCouverture()
    {
        return $this->couverture;
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

    /**
     * Set typeUser
     *
     * @param \Event\Bundle\NightBundle\Entity\TypeUsers $typeUser
     *
     * @return Users
     */
    public function setTypeUser(\Event\Bundle\NightBundle\Entity\TypeUsers $typeUser = null)
    {
        $this->typeUser = $typeUser;

        return $this;
    }

    /**
     * Get typeUser
     *
     * @return \Event\Bundle\NightBundle\Entity\TypeUsers
     */
    public function getTypeUser()
    {
        return $this->typeUser;
    }

    /**
     * Set acces
     *
     * @param \Event\Bundle\NightBundle\Entity\Autorisation $acces
     *
     * @return Users
     */
    public function setAcces(\Event\Bundle\NightBundle\Entity\Autorisation $acces = null)
    {
        $this->acces = $acces;

        return $this;
    }

    /**
     * Get acces
     *
     * @return \Event\Bundle\NightBundle\Entity\Autorisation
     */
    public function getAcces()
    {
        return $this->acces;
    }

    public function upload(UploadedFile $file,$id)
    {
        $fileName = $id;

        $file->move( __DIR__.'/../../../../../web/images/avatar', $fileName);

        return $fileName;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->pseudo,
            $this->mdp,
            // see section on salt below
            // $this->salt,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->pseudo,
            $this->mdp,
            ) = unserialize($serialized);
    }
}

