{{-- @dd($title) --}}
<x-layout>
    <x-slot:title>
        {{ $title }}!
    </x-slot:title>
    <x-slot:highlight>
        <p>{{ $highlight }}</p>
    </x-slot:highlight>
    <div class="text-white flex justify-center items-center mb-8">
        <form action="/blog" method="GET"
            class="w-6/10 flex justify-between space-x-2 border-2 rounded-md items-center pl-3 h-full">
            @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if(request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="flex  items-center w-8/10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input type="search" placeholder="Search for article"
                    class="bg-transparent border-none outline-none focus:outline-none w-full"
                    name="search focus:ring-0 focus:outline-none">
            </div>
            <button dir="rtl" type="submit" class="bg-[#6366F1] rounded-s-sm h-full w-2/10 py-2">Search</button>
        </form>
    </div>
    <div class="grid grid-cols-3 gap-4 my-4">
        @foreach ($posts as $post)
        <div class="text-white" class="max-w-screen-md border border-white mb-2 ">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-100">{{ $post->title }}</h2>
            <div class="text-base">
                by
                <a href="/authors/{{ $post->author->username }}"
                        class="hover:underline text-[#6366F1]">{{ $post->author->name }}</a>
                        in
                    <a href="/categories/{{ $post->category->slug }}"
                        class="hover:underline text-[#6366F1]">{{ $post->category->name }}</a> |
                        {{ $post['created_at']->diffForHumans() }}
                    </div>
                    <p class="my-4 font-light">{{ Str::limit($post['article'], 255) }}</p>
                <a href="/blog/{{ $post['slug'] }}" class="font-medium hover:underline text-[#6366F1]">Read More &raquo;</a>
            </div>
            @endforeach
        </div>
        {{ $posts->links() }}
    </x-layout>
