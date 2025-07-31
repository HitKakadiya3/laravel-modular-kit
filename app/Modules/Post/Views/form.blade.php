@csrf
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $post->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name="content" class="form-control" required>{{ old('content', $post->content ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-success">Save</button>
