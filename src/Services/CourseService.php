<?php

namespace APP\Services;

use APP\Entity\Course;
use APP\Repositories\CourseRepository;

class CourseService
{
    private CourseRepository $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function list(): array
    {
        return $this->courseRepository->all();
    }

    public function store(string $description): Course
    {
        return $this->courseRepository->save($description);
    }
}
