<?php

namespace CDUCSU\SCMSBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToMany(targetEntity="Aenderung",mappedBy="user")
     */
    private $aenderungen;

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
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }


    /**
     * Add aenderungen
     *
     * @param \CDUCSU\SCMSBundle\Entity\Aenderung $aenderungen
     * @return User
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
}
