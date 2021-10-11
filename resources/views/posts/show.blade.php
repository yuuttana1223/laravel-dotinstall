<x-layout>
    <x-slot name="title">
        {{ $post->title }}My BBS
    </x-slot>
    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>
    <h1>
        <span>{{ $post->title }}</span>
        <a href="{{ route('posts.edit', $post) }}">[Edit]</a>
        <form action="{{ route('posts.destroy', $post) }}" method="post" id="delete_post">
            @method("DELETE")
            @csrf
            <button class="btn">[Delete]</button>
        </form>
    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>

    <h2>Comments</h2>
    @error('body')
        <div class="error">{{ $message }}</div>
    @enderror
    <ul>
        <li>
            <form action="{{ route('comments.store', $post) }}" method="post" class="comment-form">
                @csrf
                <input type="text" name="body" value="{{ old('body') }}">
                <button>Add</button>
            </form>
        </li>
        @foreach ($comments as $comment)
            <li>
                {{ $comment->body }}
                <form action="{{ route('comments.destroy', $comment) }}" method="post" class="delete-comment">
                    @method("DELETE")
                    @csrf
                    <button class="btn">[Delete]</button>
                </form>
            </li>
        @endforeach
    </ul>
    <script>
        "use strict";

        {
            document.getElementById("delete_post").addEventListener("submit", (e) => {
                e.preventDefault();
                if (!confirm("Sure to delete?")) {
                    return
                }

                e.target.submit();
            })

            document.querySelectorAll(".delete-comment").forEach((form) => {
                form.addEventListener("submit", (e) => {
                    e.preventDefault();
                    if (!confirm("Sure to delete?")) {
                        return;
                    }
                    e.target.submit();
                })
            })
        }
    </script>
</x-layout>
