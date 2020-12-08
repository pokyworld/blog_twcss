@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif
            <h2 class="text-xl mb-5">Posts</h2>
            <form action="{{ route('posts') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" 
                    class="bg-gray-200 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="Post something!"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Post</button>
                </div>
            </form>
            @if($posts->count())
                <p>{{ $posts->count() }}</p>
                @foreach($posts as $post)
                    <div class="mb-4">
                    <a href="" class="font-bold">Des</a> <span class="text-gray-600 text-sm">{{ $post->created_at}}</span>
                    <p class="mb-2">{{ $post->body }}</p>
                    </div>
                @endforeach
            @else
                <p>Ther are no posts to show.</p>
            @endif
            {{ var_dump($posts[0]->attributes) }}
        </div>
    </div>

@endsection