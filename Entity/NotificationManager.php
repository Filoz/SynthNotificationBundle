<?php

/**
 * This file is part of the Synth Notification Bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Dom Udall <dom@synthmedia.co.uk>
 */

namespace Synth\NotificationBundle\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\User\UserInterface;
use Synth\NotificationBundle\Model\NotificationManager as BaseNotificationManager;
use Synth\NotificationBundle\Model\NotificationInterface;

class NotificationManager extends BaseNotificationManager
{
    protected $em;
    protected $class;
    protected $repository;

    /**
     * Constructor.
     *
     * @param EntityManager           $em
     * @param string                  $class
     */
    public function __construct(EntityManager $em, $class)
    {
        $this->em = $em;
        $this->repository = $em->getRepository($class);

        $metadata = $em->getClassMetadata($class);
        $this->class = $metadata->name;
    }

    public function deleteNotification(NotificationInterface $notification)
    {
        $this->em->remove($notification);
        $this->em->flush();
    }

    public function updateNotification(NotificationInterface $notification, $andFlush = true)
    {
        $this->em->persist($notification);
        if ($andFlush) {
            $this->em->flush();
        }
    }

    public function findNotificationBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    public function findNotificationsForUser(UserInterface $user)
    {
        $criteria = array(
            "fromUser" => $user->getId()
        );
        return $this->repository->findBy($criteria);
    }

    public function findNotificationsForUserByType(UserInterface $user, $type)
    {
        $criteria = array(
            "fromUser" => $user->getId(),
            "type" => $type
        );
        return $this->repository->findBy($criteria);
    }

    public function getClass()
    {
        return $this->class;
    }
}