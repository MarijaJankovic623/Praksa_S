<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Korisnik
 *
 * @ORM\Table(name="korisnik", uniqueConstraints={@ORM\UniqueConstraint(name="korisnicko_ime_UNIQUE", columns={"korisnicko_ime"}), @ORM\UniqueConstraint(name="lozinka_UNIQUE", columns={"lozinka"})})
 * @ORM\Entity
 */
class Korisnik implements UserInterface, \Serializable
{
    /**
     * @var string
     *
     * @ORM\Column(name="korisnicko_ime", type="string", length=100, nullable=false)
     */
    private $korisnickoIme;

    /**
     * @var string
     *
     * @ORM\Column(name="lozinka", type="string", length=100, nullable=false)
     */
    private $lozinka;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_korisnik", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idKorisnik;



    /**
     * Set korisnickoIme
     *
     * @param string $korisnickoIme
     *
     * @return Korisnik
     */
    public function setKorisnickoIme($korisnickoIme)
    {
        $this->korisnickoIme = $korisnickoIme;

        return $this;
    }

    /**
     * Get korisnickoIme
     *
     * @return string
     */
    public function getKorisnickoIme()
    {
        return $this->korisnickoIme;
    }

    /**
     * Set lozinka
     *
     * @param string $lozinka
     *
     * @return Korisnik
     */
    public function setLozinka($lozinka)
    {
        $this->lozinka = $lozinka;

        return $this;
    }

    /**
     * Get lozinka
     *
     * @return string
     */
    public function getLozinka()
    {
        return $this->lozinka;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Korisnik
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get idKorisnik
     *
     * @return integer
     */
    public function getIdKorisnik()
    {
        return $this->idKorisnik;
    }

    public function serialize()
    {
        return serialize(array(
            $this->idKorisnik,
            $this->korisnickoIme,
            $this->lozinka,
            // see section on salt below
            // $this->salt,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->idKorisnik,
            $this->korisnickoIme,
            $this->lozinka,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getPassword()
    {
        return $this->lozinka;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->korisnickoIme;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
