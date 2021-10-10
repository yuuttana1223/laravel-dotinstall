<x-layout>
    <x-slot name="title">
        {{ $post->title }}My BBS
    </x-slot>
    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
</x-layout>
