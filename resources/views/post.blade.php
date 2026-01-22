{{-- @dd($title) --}}
<x-layout>
    <x-slot:title>
        {{ $title }}!
    </x-slot:title>
    <x-slot:highlight>
        <p>{{ $highlight }}</p>
    </x-slot:highlight>
    <article class="text-white" class="py-8 max-w-screen-md border-b-1 border-white">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-100">{{ $user['title'] }}</h2>
        <div class="text-base">
            <a href="">{{ $user->name }}</a> | {{ $post['created_at']->diffForHumans() }}
        </div>
        <p class="my-4 font-light">{{ $post['article'] }}</p>
    <a href="/blog" class="font-medium hover:underline">Back to Posts &laquo;</a>
    </article>
</x-layout>
