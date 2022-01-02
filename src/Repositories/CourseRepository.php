<?php

namespace APP\Repositories;

use APP\Entity\Course;
use APP\Infrastructure\EntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class CourseRepository
{
    private EntityRepository $repository;
    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerFactory())->getEntityManager();
        $this->repository    = $this->entityManager->getRepository(Course::class);
    }

    public function all(): array
    {
        return $this->repository->findAll();
    }

    public function save(string $description): Course
    {
        $course = new Course();
        $course->setDescription($description);

        $this->entityManager->persist($course);
        $this->entityManager->flush();

        return $course;
    }
}
