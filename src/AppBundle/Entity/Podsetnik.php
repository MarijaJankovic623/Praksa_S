<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Podsetnik
 *
 * @ORM\Table(name="podsetnik", indexes={@ORM\Index(name="id_korisnik_idx", columns={"id_korisnik"})})
 * @ORM\Entity
 */
class Podsetnik
{
    /**
     * @var string
     *
     * @ORM\Column(name="naziv", type="string", length=45, nullable=true)
     */
    private $naziv = 'Podsetnik';

    /**
     * @var string
     *
     * @ORM\Column(name="opis", type="string", length=2000, nullable=false)
     */
    private $opis;

    /**
     * @var string
     *
     * @ORM\Column(name="vreme", type="string", length=5, nullable=false)
     */
    private $vreme;

    /**
     * @var integer
     *
     * @ORM\Column(name="ponedeljak", type="integer", nullable=true)
     */
    private $ponedeljak = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="utorak", type="integer", nullable=true)
     */
    private $utorak = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="sreda", type="integer", nullable=true)
     */
    private $sreda = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="cetvrtak", type="integer", nullable=true)
     */
    private $cetvrtak = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="petak", type="integer", nullable=true)
     */
    private $petak = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="subota", type="integer", nullable=true)
     */
    private $subota = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="nedelja", type="integer", nullable=true)
     */
    private $nedelja = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id_podsetnik", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPodsetnik;

    /**
     * @var \AppBundle\Entity\Korisnik
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Korisnik")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_korisnik", referencedColumnName="id_korisnik")
     * })
     */
    private $idKorisnik;



    /**
     * Set naziv
     *
     * @param string $naziv
     *
     * @return Podsetnik
     */
    public function setNaziv($naziv)
    {
        $this->naziv = $naziv;

        return $this;
    }

    /**
     * Get naziv
     *
     * @return string
     */
    public function getNaziv()
    {
        return $this->naziv;
    }

    /**
     * Set opis
     *
     * @param string $opis
     *
     * @return Podsetnik
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis
     *
     * @return string
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * Set vreme
     *
     * @param string $vreme
     *
     * @return Podsetnik
     */
    public function setVreme($vreme)
    {
        $this->vreme = $vreme;

        return $this;
    }

    /**
     * Get vreme
     *
     * @return string
     */
    public function getVreme()
    {
        return $this->vreme;
    }

    /**
     * Set ponedeljak
     *
     * @param integer $ponedeljak
     *
     * @return Podsetnik
     */
    public function setPonedeljak($ponedeljak)
    {
        $this->ponedeljak = $ponedeljak;

        return $this;
    }

    /**
     * Get ponedeljak
     *
     * @return integer
     */
    public function getPonedeljak()
    {
        return $this->ponedeljak;
    }

    /**
     * Set utorak
     *
     * @param integer $utorak
     *
     * @return Podsetnik
     */
    public function setUtorak($utorak)
    {
        $this->utorak = $utorak;

        return $this;
    }

    /**
     * Get utorak
     *
     * @return integer
     */
    public function getUtorak()
    {
        return $this->utorak;
    }

    /**
     * Set sreda
     *
     * @param integer $sreda
     *
     * @return Podsetnik
     */
    public function setSreda($sreda)
    {
        $this->sreda = $sreda;

        return $this;
    }

    /**
     * Get sreda
     *
     * @return integer
     */
    public function getSreda()
    {
        return $this->sreda;
    }

    /**
     * Set cetvrtak
     *
     * @param integer $cetvrtak
     *
     * @return Podsetnik
     */
    public function setCetvrtak($cetvrtak)
    {
        $this->cetvrtak = $cetvrtak;

        return $this;
    }

    /**
     * Get cetvrtak
     *
     * @return integer
     */
    public function getCetvrtak()
    {
        return $this->cetvrtak;
    }

    /**
     * Set petak
     *
     * @param integer $petak
     *
     * @return Podsetnik
     */
    public function setPetak($petak)
    {
        $this->petak = $petak;

        return $this;
    }

    /**
     * Get petak
     *
     * @return integer
     */
    public function getPetak()
    {
        return $this->petak;
    }

    /**
     * Set subota
     *
     * @param integer $subota
     *
     * @return Podsetnik
     */
    public function setSubota($subota)
    {
        $this->subota = $subota;

        return $this;
    }

    /**
     * Get subota
     *
     * @return integer
     */
    public function getSubota()
    {
        return $this->subota;
    }

    /**
     * Set nedelja
     *
     * @param integer $nedelja
     *
     * @return Podsetnik
     */
    public function setNedelja($nedelja)
    {
        $this->nedelja = $nedelja;

        return $this;
    }

    /**
     * Get nedelja
     *
     * @return integer
     */
    public function getNedelja()
    {
        return $this->nedelja;
    }

    /**
     * Get idPodsetnik
     *
     * @return integer
     */
    public function getIdPodsetnik()
    {
        return $this->idPodsetnik;
    }

    /**
     * Set idKorisnik
     *
     * @param \AppBundle\Entity\Korisnik $idKorisnik
     *
     * @return Podsetnik
     */
    public function setIdKorisnik(\AppBundle\Entity\Korisnik $idKorisnik = null)
    {
        $this->idKorisnik = $idKorisnik;

        return $this;
    }

    /**
     * Get idKorisnik
     *
     * @return \AppBundle\Entity\Korisnik
     */
    public function getIdKorisnik()
    {
        return $this->idKorisnik;
    }


    public function setDay($id){

        switch($id){
            case 0: $this->ponedeljak=1; break;
            case 1: $this->utorak=1;break;
            case 2: $this->sreda=1;break;
            case 3: $this->cetvrtak=1;break;
            case 4: $this->petak=1;break;
            case 5: $this->subota=1;break;
            case 6: $this->nedelja=1;break;
        }

    }
}
