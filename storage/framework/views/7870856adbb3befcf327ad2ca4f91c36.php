<?php echo csrf_field(); ?>
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $post->title ?? '')); ?>" required>
</div>

<div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name="content" class="form-control" required><?php echo e(old('content', $post->content ?? '')); ?></textarea>
</div>

<button type="submit" class="btn btn-success">Save</button>
<?php /**PATH C:\wamp64\www\laravel-modular-kit\app/Modules/Post/Views/form.blade.php ENDPATH**/ ?>