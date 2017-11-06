<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40)
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40)
     */
    private $prenom;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    private $mail;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    private $nomGitHub;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $discord;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getNomGitHub()
    {
        return $this->nomGitHub;
    }

    /**
     * @param string $nomGitHub
     */
    public function setNomGitHub($nomGitHub)
    {
        $this->nomGitHub = $nomGitHub;
    }

    /**
     * @return string
     */
    public function getDiscord()
    {
        return $this->discord;
    }

    /**
     * @param string $discord
     */
    public function setDiscord($discord)
    {
        $this->discord = $discord;
    }


}