<x-layout>
    <x-slot:title>
        {{ $title }}!
    </x-slot:title>
    <x-slot:highlight>
        <p>{{ $highlight }}</p>
    </x-slot:highlight>

    <form action="{{ route('post.store') }}" method="POST" class="text-white border-white border-1 rounded-md p-4 space-y-2">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col">
                <label class="bg-gray-900 -mb-3 w-fit p-1 ml-2 z-10">Title</label>
                <input type="text" name="title" placeholder="Type your title here" class=" rounded-md bg-transparent">
            </div>
            <div class="flex flex-col">
                <label class="bg-gray-900 -mb-3 w-fit p-1 ml-2 z-10">Category</label>
                <input type="text" name="categoryName" placeholder="Select your category"
                    class=" rounded-md bg-transparent">
            </div>
            <div class="col-span-2 flex flex-col">
                <label class="pl-1 bg-gray-900 -mb-3 w-fit p-1 ml-2 z-10">Body</label>
                <textarea type="text" name="article" class="rounded-md bg-transparent w-full h-64"></textarea>
            </div>
            <div class="col-span-2 flex flex-col">
                <button type="submit">Submit</button>
            </div>
        </div>
    </form>
</x-layout>
