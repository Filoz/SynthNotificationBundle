<?php

/**
 * This file is part of the Synth Notification Bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Dom Udall <dom@synthmedia.co.uk>
 */

namespace Synth\NotificationBundle\Model;

use DateTime;

abstract class Notification implements NotificationInterface
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var text $message
     */
    protected $message;

    /**
     * @var boolean $read
     */
    protected $read;

    /**
     * @var DateTime $createdAt
     */
    protected $createdAt;


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
     * Set the notification message
     *
     * @param text $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification message
     *
     * @return text
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set if the notification has been read by the owner
     *
     * @param boolean $read
     */
    public function setRead($read)
    {
        $this->read = $read;
    }

    /**
     * Returns if the notification has been read by the owner
     *
     * @return boolean
     */
    public function isRead()
    {
        return $this->read;
    }

    /**
     * Set the date when the notification was created
     *
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get the date when the notification was created
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}