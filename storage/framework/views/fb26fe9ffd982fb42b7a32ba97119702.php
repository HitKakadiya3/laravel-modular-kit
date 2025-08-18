<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Posts</h1>
    <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary mb-3">Create Post</a>
    <ul class="list-group">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">
                <strong><?php echo e($post->title); ?></strong>
                <br><?php echo e(Str::limit($post->content, 100)); ?>

                <div class="mt-2">
                    <a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="POST" style="display:inline">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\laravel-modular-kit\app/Modules/Post/Views/index.blade.php ENDPATH**/ ?>