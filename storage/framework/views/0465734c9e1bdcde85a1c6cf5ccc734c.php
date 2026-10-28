

<?php $__env->startSection('title', 'Edit a Book'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Edit a Book</h2>

    <form method="POST" action="<?php echo e(route('books.update', $book)); ?>" style="max-width: 28rem;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" value="<?php echo e(old('title', $book->title)); ?>" class="form-control">
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" id="author" name="author" value="<?php echo e(old('author', $book->author)); ?>" class="form-control">
            <?php $__errorArgs = ['author'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" id="year" name="year" value="<?php echo e(old('year', $book->year)); ?>" class="form-control">
            <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <label for="is_available" class="form-label">Available?</label>
            <select id="is_available" name="is_available" class="form-select">
                <option value="1" <?php if(old('is_available', $book->is_available ? '1' : '0') == '1'): echo 'selected'; endif; ?>>Yes</option>
                <option value="0" <?php if(old('is_available', $book->is_available ? '1' : '0') == '0'): echo 'selected'; endif; ?>>No</option>
            </select>
            <?php $__errorArgs = ['is_available'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select id="genre_id" name="genre_id" class="form-select">
                <option value="">Choose a genre</option>
                <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($genre->id); ?>"
                        <?php if(old('genre_id', $book->genre_id) == $genre->id): echo 'selected'; endif; ?>
                    ><?php echo e($genre->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['genre_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="btn btn-primary">Update Book</button>
        <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary">Cancel</a>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\libsys-portal\resources\views/books/edit.blade.php ENDPATH**/ ?>