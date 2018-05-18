<?php

namespace App;

use Doctrine\ORM\EntityManager;

/**
 * Created by PhpStorm.
 * User: Root
 * Date: 17/05/2018
 * Time: 22:39
 */

abstract class MainRepository
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * AbstractResource constructor.
     * @param $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


}