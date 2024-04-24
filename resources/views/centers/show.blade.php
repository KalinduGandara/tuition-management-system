<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="grid grid-cols-1 gap-4">
                    <div class="bg-gray-800 p-4 sm:rounded-lg">
                        <div class="text-white">
                            <div class="flex justify-between items-center">
                                <div class="text-2xl font-bold">{{ $center->name }}</div>
                                <div>
                                    <a href="{{ route('centers.edit', $center) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                        Edit
                                    </a>
                                    <form action="{{ route('centers.destroy', $center) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div>{{ $center->address }}</div>
                            <h2 class="text-xl font-bold mt-4">Tuition Classes</h2>
                            <ul class="list-disc list-inside">
                                @foreach ($tuitionClasses as $class)
                                    <li class="mt-2 flex items-center space-x-2">
                                        <a href="{{ route('tuitionClasses.show', $class) }}"
                                            class="font-bold">{{ $class->grade }}</a> -
                                        <p>{{ $class->year }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
