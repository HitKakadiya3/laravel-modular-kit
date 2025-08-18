<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Post</h1>
    <form action="<?php echo e(route('posts.update', $post->id)); ?>" method="POST">
        <?php echo method_field('PUT'); ?>
        <?php echo $__env->make('Post::form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\laravel-modular-kit\app/Modules/Post/Views/edit.blade.php ENDPATH**/ ?>