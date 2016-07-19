<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 19/07/2016
 * Time: 09:27
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="reminder")
 */
class Reminder
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="id",unique=TRUE,nullable=FALSE)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type = "string", name = "name", nullable = FALSE)
     */
    private $name;

    /**
     * @ORM\Column(type = "string", name = "description", nullable = FALSE)
     */
    private $description;

    /**
     * @ORM\Column(type = "integer", name = "hours", nullable = FALSE)
     */
    private $hours;

    /**
     * @ORM\Column(type = "integer", name = "minutes", nullable = FALSE)
     */
    private $minutes;

    /**
     * @ORM\Column(type = "boolean", name = "mon", nullable = FALSE)
     */
    private $mon = false;
    /**
     * @ORM\Column(type = "boolean", name = "tue", nullable = FALSE)
     */
    private $tue = false;
    /**
     * @ORM\Column(type = "boolean", name = "wed", nullable = FALSE)
     */
    private $wed = false;
    /**
     * @ORM\Column(type = "boolean", name = "thu", nullable = FALSE)
     */
    private $thu = false;
    /**
     * @ORM\Column(type = "boolean", name = "fri", nullable = FALSE)
     */
    private $fri = false;
    /**
     * @ORM\Column(type = "boolean", name = "sat", nullable = FALSE)
     */
    private $sat = false;
    /**
     * @ORM\Column(type = "boolean", name = "sun", nullable = FALSE)
     */
    private $sun = false;

    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="reminders")
     * @ORM\JoinColumn(name="userId",referencedColumnName="id")
     */
    private $user;



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
     * Set name
     *
     * @param string $name
     *
     * @return Reminder
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Reminder
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Reminder
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set hours
     *
     * @param integer $hours
     *
     * @return Reminder
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours
     *
     * @return integer
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Set minutes
     *
     * @param integer $minutes
     *
     * @return Reminder
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;

        return $this;
    }

    /**
     * Get minutes
     *
     * @return integer
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * Set mon
     *
     * @param boolean $mon
     *
     * @return Reminder
     */
    public function setMon($mon)
    {
        $this->mon = $mon;

        return $this;
    }

    /**
     * Get mon
     *
     * @return boolean
     */
    public function getMon()
    {
        return $this->mon;
    }

    /**
     * Set tue
     *
     * @param boolean $tue
     *
     * @return Reminder
     */
    public function setTue($tue)
    {
        $this->tue = $tue;

        return $this;
    }

    /**
     * Get tue
     *
     * @return boolean
     */
    public function getTue()
    {
        return $this->tue;
    }

    /**
     * Set wed
     *
     * @param boolean $wed
     *
     * @return Reminder
     */
    public function setWed($wed)
    {
        $this->wed = $wed;

        return $this;
    }

    /**
     * Get wed
     *
     * @return boolean
     */
    public function getWed()
    {
        return $this->wed;
    }

    /**
     * Set thu
     *
     * @param boolean $thu
     *
     * @return Reminder
     */
    public function setThu($thu)
    {
        $this->thu = $thu;

        return $this;
    }

    /**
     * Get thu
     *
     * @return boolean
     */
    public function getThu()
    {
        return $this->thu;
    }

    /**
     * Set fri
     *
     * @param boolean $fri
     *
     * @return Reminder
     */
    public function setFri($fri)
    {
        $this->fri = $fri;

        return $this;
    }

    /**
     * Get fri
     *
     * @return boolean
     */
    public function getFri()
    {
        return $this->fri;
    }

    /**
     * Set sat
     *
     * @param boolean $sat
     *
     * @return Reminder
     */
    public function setSat($sat)
    {
        $this->sat = $sat;

        return $this;
    }

    /**
     * Get sat
     *
     * @return boolean
     */
    public function getSat()
    {
        return $this->sat;
    }

    /**
     * Set sun
     *
     * @param boolean $sun
     *
     * @return Reminder
     */
    public function setSun($sun)
    {
        $this->sun = $sun;

        return $this;
    }

    /**
     * Get sun
     *
     * @return boolean
     */
    public function getSun()
    {
        return $this->sun;
    }
}
