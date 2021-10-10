<x-layout>
    <x-slot name="title">
        My BBS
    </x-slot>
    <h1>My BBS</h1>
    <ul>
        @forelse ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
            </li>
        @empty
            <li>No posts</li>
        @endforelse
    </ul>
</x-layout>
