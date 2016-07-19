<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 18/07/2016
 * Time: 16:26
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserRepository")
 * @ORM\Table(name="user")
 * @UniqueEntity("username",message="Username is already taken.")
 * @UniqueEntity("email",message="Email is already taken.")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="id",unique=TRUE,nullable=FALSE)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="string",name="username",unique=TRUE,nullable=FALSE)
     * @Assert\NotBlank(message="Username can't be empty.")
     */
    private $username;

    /**
     * @ORM\Column(type="string",name="password",nullable=FALSE)
     * @Assert\NotBlank(message="Password can't be empty.")
     */
    private $password;

    /**
     * @ORM\Column(type="string",name="email",unique=TRUE,nullable=FALSE)
     * @Assert\NotBlank(message="Email can't be empty.")
     * @Assert\Email(message="Email is not in valid format.")
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="Reminder",mappedBy="user")
     */
    private $reminders;

    public function __construct()
    {
        $this->reminders = new ArrayCollection();
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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * Add reminder
     *
     * @param \AppBundle\Entity\Reminder $reminder
     *
     * @return User
     */
    public function addReminder(\AppBundle\Entity\Reminder $reminder)
    {
        $this->reminders[] = $reminder;

        return $this;
    }

    /**
     * Remove reminder
     *
     * @param \AppBundle\Entity\Reminder $reminder
     */
    public function removeReminder(\AppBundle\Entity\Reminder $reminder)
    {
        $this->reminders->removeElement($reminder);
    }

    /**
     * Get reminders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReminders()
    {
        return $this->reminders;
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    public function getRoles()
    {
        return Array('ROLE_USER');
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
