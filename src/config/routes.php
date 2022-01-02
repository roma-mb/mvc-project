<?php

require_once __DIR__.'/../../vendor/autoload.php';

return [
    '/course/list' => [\APP\Controller\CourseController::class => 'index'],
    '/course/new' => [\APP\Controller\CourseController::class => 'create'],
    '/course/store' => [\APP\Controller\CourseController::class => 'store'],
];
