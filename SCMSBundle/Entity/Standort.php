<?php

namespace CDUCSU\SCMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Standort
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Standort
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
     * @ORM\Column(name="plz", type="string", length=255)
     */
    private $plz;

    /**
     * @var string
     *
     * @ORM\Column(name="ort", type="string", length=255)
     */
    private $ort;

    /**
     * @var string
     *
     * @ORM\Column(name="strasse", type="string", length=255)
     */
    private $strasse;

    /**
     * @var integer
     *
     * @ORM\Column(name="haus", type="integer")
     */
    private $haus;
    
    /**
     * @ORM\OneToMany(targetEntity="Server", mappedBy="standort")
     */
    private $server;


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
     * Set plz
     *
     * @param string $plz
     * @return Standort
     */
    public function setPlz($plz)
    {
        $this->plz = $plz;
    
        return $this;
    }

    /**
     * Get plz
     *
     * @return string 
     */
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * Set ort
     *
     * @param string $ort
     * @return Standort
     */
    public function setOrt($ort)
    {
        $this->ort = $ort;
    
        return $this;
    }

    /**
     * Get ort
     *
     * @return string 
     */
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * Set strasse
     *
     * @param string $strasse
     * @return Standort
     */
    public function setStrasse($strasse)
    {
        $this->strasse = $strasse;
    
        return $this;
    }

    /**
     * Get strasse
     *
     * @return string 
     */
    public function getStrasse()
    {
        return $this->strasse;
    }

    /**
     * Set haus
     *
     * @param integer $haus
     * @return Standort
     */
    public function setHaus($haus)
    {
        $this->haus = $haus;
    
        return $this;
    }

    /**
     * Get haus
     *
     * @return integer 
     */
    public function getHaus()
    {
        return $this->haus;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->server = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add server
     *
     * @param \CDUCSU\SCMSBundle\Entity\Server $server
     * @return Standort
     */
    public function addServer(\CDUCSU\SCMSBundle\Entity\Server $server)
    {
        $this->server[] = $server;
    
        return $this;
    }

    /**
     * Remove server
     *
     * @param \CDUCSU\SCMSBundle\Entity\Server $server
     */
    public function removeServer(\CDUCSU\SCMSBundle\Entity\Server $server)
    {
        $this->server->removeElement($server);
    }

    /**
     * Get server
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServer()
    {
        return $this->server;
    }
    
    public function __toString() {
        return $this->plz.' '.$this->ort;
    }
}
