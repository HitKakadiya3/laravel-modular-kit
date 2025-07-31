@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @method('PUT')
        @include('Post::form')
    </form>
</div>
@endsection
