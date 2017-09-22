<?php

namespace CDUCSU\SCMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Server
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Server
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
     * @ORM\Column(name="bezeichnung", type="string", length=255)
     */
    private $bezeichnung;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="betriebssystem", type="string", length=255)
     */
    private $betriebssystem;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="funktion", type="string", length=255)
     */
    private $funktion;
    
    /**
     * @ORM\OneToMany(targetEntity="Aenderung", mappedBy="server")
     */
    private $aenderungen;
    
    /**
     * @ORM\ManyToOne(targetEntity="Standort", inversedBy="server")
     * @ORM\JoinColumn(name="f_standort", referencedColumnName="id")
     */
    private $standort;

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
     * Set bezeichnung
     *
     * @param string $bezeichnung
     * @return Server
     */
    public function setBezeichnung($bezeichnung)
    {
        $this->bezeichnung = $bezeichnung;
    
        return $this;
    }

    /**
     * Get bezeichnung
     *
     * @return string 
     */
    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }
    
    public function __toString() {
        return $this->getBezeichnung();
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->aenderungen = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add aenderungen
     *
     * @param \CDUCSU\SCMSBundle\Entity\Aenderung $aenderungen
     * @return Server
     */
    public function addAenderungen(\CDUCSU\SCMSBundle\Entity\Aenderung $aenderungen)
    {
        $this->aenderungen[] = $aenderungen;
    
        return $this;
    }

    /**
     * Remove aenderungen
     *
     * @param \CDUCSU\SCMSBundle\Entity\Aenderung $aenderungen
     */
    public function removeAenderungen(\CDUCSU\SCMSBundle\Entity\Aenderung $aenderungen)
    {
        $this->aenderungen->removeElement($aenderungen);
    }

    /**
     * Get aenderungen
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAenderungen()
    {
        return $this->aenderungen;
    }

    /**
     * Set standort
     *
     * @param \CDUCSU\SCMSBundle\Entity\Standort $standort
     * @return Server
     */
    public function setStandort(\CDUCSU\SCMSBundle\Entity\Standort $standort = null)
    {
        $this->standort = $standort;
    
        return $this;
    }

    /**
     * Get standort
     *
     * @return \CDUCSU\SCMSBundle\Entity\Standort 
     */
    public function getStandort()
    {
        return $this->standort;
    }

    /**
     * Set betriebssystem
     *
     * @param string $betriebssystem
     * @return Server
     */
    public function setBetriebssystem($betriebssystem)
    {
        $this->betriebssystem = $betriebssystem;

        return $this;
    }

    /**
     * Get betriebssystem
     *
     * @return string 
     */
    public function getBetriebssystem()
    {
        return $this->betriebssystem;
    }

    /**
     * Set funktion
     *
     * @param string $funktion
     * @return Server
     */
    public function setFunktion($funktion)
    {
        $this->funktion = $funktion;

        return $this;
    }

    /**
     * Get funktion
     *
     * @return string 
     */
    public function getFunktion()
    {
        return $this->funktion;
    }
}
