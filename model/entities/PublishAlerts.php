<?php

namespace model\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * PublishAlerts
 *
 * @ORM\Table(name="publish_alerts", indexes={@ORM\Index(name="fk_publish_alerts_1_idx", columns={"entry_id"})})
 * @ORM\Entity
 */
class PublishAlerts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '0';

    /**
     * @var \model\entities\BlogEntry
     *
     * @ORM\ManyToOne(targetEntity="model\entities\BlogEntry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entry_id", referencedColumnName="id")
     * })
     */
    private $entry;


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
     * Set status
     *
     * @param integer $status
     * @return PublishAlerts
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set entry
     *
     * @param \model\entities\BlogEntry $entry
     * @return PublishAlerts
     */
    public function setEntry(\model\entities\BlogEntry $entry = null)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * Get entry
     *
     * @return \model\entities\BlogEntry 
     */
    public function getEntry()
    {
        return $this->entry;
    }
}
