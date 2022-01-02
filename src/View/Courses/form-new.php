<?php $title = 'Create Courses';

include __DIR__.'/../header.php'; ?>

    <form action="/course/store" class="form-group" method="post">
        <label for="description">Description: </label>
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="description" name="description">
        </div>
        <button class="btn btn-primary">Save</button>
    </form>

<?php include __DIR__.'/../footer.php'; ?>

