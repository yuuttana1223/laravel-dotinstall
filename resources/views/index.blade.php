<x-layout>
    <x-slot name="title">
        My BBS
    </x-slot>
    <h1>
        <span>My BBS</span>
        <a href="{{ route('posts.create') }}">[Add]</a>
    </h1>
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
