<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 15/02/13 10:14
 */
namespace JordiLlonch\Bundle\WebScrapperBundle\Extractor\Storage;

use Doctrine\ORM\EntityManager;

abstract class Base
{
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    abstract public function saveData($id, $name, $data);
}
