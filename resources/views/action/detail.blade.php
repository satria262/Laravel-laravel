<x-layout>
    <x-slot:title>
        {{ $title }}!
    </x-slot:title>
    <x-slot:highlight>
        <p>{{ $highlight }}</p>
    </x-slot:highlight>
    <div class="text-white space-y-2">
        <p class="text-4xl font-semibold w-1/2">{{ $post->author->name }}: {{ $post->title }}</p>
        <p>Made by You | {{ $post->created_at->diffForHumans() }} in <a href="{{ route('category-slug', $post->category->slug) }}" class="text-indigo-500">{{ $post->category->name }}</a></p>
        <hr>
        <p>
            {{ $post->article }}
        </p>
    </div>
</x-layout>
