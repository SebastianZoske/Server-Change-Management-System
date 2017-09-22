<?php

namespace CDUCSU\SCMSBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aenderung
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Aenderung
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="beschreibung", type="string", length=500)
     */
    private $beschreibung;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datum", type="date")
     */
    private $datum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="uhrzeit", type="date", length=255)
     */
    private $uhrzeit;
    
    /**
     * @ORM\ManyToOne(targetEntity="Server",inversedBy="aenderungen")
     * @ORM\JoinColumn(name="f_server", referencedColumnName="id")
     */
    private $server;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="aenderungen")
     * @ORM\JoinColumn(name="f_user", referencedColumnName="id")
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
     * Set beschreibung
     *
     * @param string $beschreibung
     * @return Aenderung
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;
    
        return $this;
    }

    /**
     * Get beschreibung
     *
     * @return string 
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    /**
     * Set datum
     *
     * @param \DateTime $datum
     * @return Aenderung
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    
        return $this;
    }

    /**
     * Get datum
     *
     * @return \DateTime 
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set uhrzeit
     *
     * @param string $uhrzeit
     * @return Aenderung
     */
    public function setUhrzeit($uhrzeit)
    {
        $this->uhrzeit = $uhrzeit;
    
        return $this;
    }

    /**
     * Get uhrzeit
     *
     * @return string 
     */
    public function getUhrzeit()
    {
        return $this->uhrzeit;
    }

    /**
     * Set server
     *
     * @param \CDUCSU\SCMSBundle\Entity\Server $server
     * @return Aenderung
     */
    public function setServer(\CDUCSU\SCMSBundle\Entity\Server $server = null)
    {
        $this->server = $server;
    
        return $this;
    }

    /**
     * Get server
     *
     * @return \CDUCSU\SCMSBundle\Entity\Server 
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set user
     *
     * @param \CDUCSU\SCMSBundle\Entity\User $user
     * @return Aenderung
     */
    public function setUser(\CDUCSU\SCMSBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \CDUCSU\SCMSBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
