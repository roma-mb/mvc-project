<?php $title = 'List Courses';

include __DIR__.'/../header.php'; ?>

    <a href="/course/new" class="btn btn-primary mb-2">
        New Course
    </a>

    <ul class="list-group">
        <?php foreach ($courses as $course) { ?>
            <li class="list-group-item">
                <?php echo $course->getDescription(); ?>
            </li>
        <?php } ?>
    </ul>

<?php include __DIR__.'/../footer.php'; ?>
