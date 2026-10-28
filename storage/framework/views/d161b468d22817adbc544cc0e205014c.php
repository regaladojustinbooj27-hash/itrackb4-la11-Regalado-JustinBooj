<?php $__env->startSection('title', 'All Books'); ?>

<?php $__env->startSection('content'); ?>

    <a href="<?php echo e(route('books.create')); ?>" class="btn btn-success btn-sm">+ Add a Book</a>
    <br><br>

    <p>
        Showing —
        Genre: <strong><?php echo e($selected->name ?? 'All'); ?></strong>
    </p>

    <p>
        <strong>Genre:</strong>
        <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('books.index', ['genre_id' => $genre->id])); ?>"><?php echo e($genre->name); ?></a>
            &nbsp;
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </p>

    <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary btn-sm">Clear filters</a>
    <br><br>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td>
                        <a href="<?php echo e(route('books.show', $book['id'])); ?>"><?php echo e($book['title']); ?></a>
                    </td>
                    <td><?php echo e($book['author']); ?></td>
                    <td>
                        <?php echo e($book['year']); ?>

                        <?php if($book['year'] < 1900): ?>
                            <span class="badge bg-secondary">Classic</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($book->genre->name); ?></td>
                    <td>
    <a href="<?php echo e(route('books.edit', $book)); ?>" class="btn btn-primary btn-sm">Edit</a>
    <form action="<?php echo e(route('books.destroy', $book)); ?>" method="POST" class="d-inline"
          onsubmit="return confirm('Delete this record?')">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5">There are no books to show right now — check back later.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\libsys-portal\resources\views/books/index.blade.php ENDPATH**/ ?>