<x-layout>
    <x-slot:title>
        {{ $title }}!
    </x-slot:title>
    <x-slot:highlight>
        <p>{{ $highlight }}</p>
    </x-slot:highlight>
    <div class="text-white border-1 border-white rounded-md py-4">
        <div class="flex flex-row justify-between border-b-2 py-1 mb-2 px-4 py-2">
            <p class="text-3xl font-semibold">{{ $count }} Posts made by {{ auth()->user()->username }} in {{ $countCategory }} Category </p>
            <a href="/add">
                <button class="flex flex-row items-center bg-[#6366F1] rounded-lg space-x-2 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <p class="">Add new Article</p>
                </button>
            </a>
        </div>
        <table class="w-full table-fixed">
            <thead>
                {{-- <td>Id</td> --}}
                <td class="border-b-2 pb-2 px-4">Title &darr;</td>
                <td class="border-b-2 pb-2 px-4">Slug &darr;</td>
                <td class="border-b-2 pb-2 px-4">Category &darr;</td>
                <td class="border-b-2 pb-2 px-4">Author &darr;</td>
                <td class="border-b-2 pb-2">Action &darr;</td>
            </thead>
            @forelse ($posts as $post)
                <tbody>
                    {{-- <td>{{ $loop->iteration ?? "You haven't add any article    " }}</td> --}}
                    <td class="px-4 py-2 border-b-1">{{ $post->title ?? '' }}</td>
                    <td class="px-4 py-2 border-b-1">{{ $post->slug ?? '' }}</td>
                    <td class="px-4 py-2 border-b-1">{{ $post->category->name ?? '' }}</td>
                    <td class="px-4 py-2 border-b-1">{{ $post->author->name ?? '' }}</td>
                    <td class="border-b-1">
                        <form action="{{ route('own.destroy', $post->id) }}" method="post" class="flex space-x-2">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('own.show', $post->id) }}"
                                class="text-yellow-500 hover:text-yellow-600">Show</a>
                            <a href="{{ route('own.edit', $post->id) }}"
                                class="text-green-500 hover:text-green-600">Edit</a>
                            <button class="text-red-500 hover:text-red-600" type="submit"
                                onclick="return confirm('Are you sure you want to delete {{ $post->title }} ?')">Delete</button>
                        </form>
                    </td>
                </tbody>
            @empty
                <p class="text-center py-2 text-2xl">You haven't made any article and posted it yet</p>
            @endforelse
        </table>
    </div>
</x-layout>
