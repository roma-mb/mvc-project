<?php

namespace APP\Infrastructure;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    public function getEntityManager(): EntityManagerInterface
    {
        $config = Setup::createAnnotationMetadataConfiguration(
            [__DIR__.'/../Entity'],
            false,
            null,
            null,
            false
        );

        return EntityManager::create([
            'driver' => 'pdo_sqlite',
            'path' => __DIR__.'/../../db.sqlite',
        ], $config);
    }
}
