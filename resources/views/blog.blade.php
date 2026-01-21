{{-- @dd($title) --}}
<x-layout>
    <x-slot:title>
        {{ $title }}!
    </x-slot:title>
    <x-slot:highlight>
        <p>{{ $highlight }}</p>
    </x-slot:highlight>

    @foreach ($posts as $post)
    <article class="text-white" class="py-8 max-w-screen-md border-b-1 border-white">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-100">{{ $post['title'] }}</h2>
        <div class="text-base">
            <a href="">{{ $post['author'] }}</a> | 1 Januari 2024
        </div>
        <p class="my-4 font-light">{{ Str::limit($post['article'], 10) }}</p>
        <a href="/blog/{{ $post['slug'] }}" class="font-medium hover:underline">Read More &raquo;</a>
    </article>
    @endforeach
</x-layout>
