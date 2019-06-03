<?php
// src/Acme/ContactBundle/Entity/Contact.php

namespace Acme\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mremi\ContactBundle\Entity\Contact as BaseContact;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 */
class Contact extends BaseContact
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
