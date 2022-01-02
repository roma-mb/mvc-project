<?php

namespace APP\Controller;

use APP\Services\CourseService;

class CourseController
{
    private CourseService $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index()
    {
        $courses = $this->courseService->list();

        return require __DIR__ . '/../View/Courses/list.php';
    }

    public function create()
    {
        return require __DIR__ . '/../View/Courses/form-new.php';
    }

    public function store(): void
    {
        $this->courseService
            ->store(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

        header('Location: /course/list', true, 302);
    }
}
