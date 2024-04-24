<x-app-layout>
    <div class="py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('centers.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Center
                    </a>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    @foreach ($centers as $center)
                        <div class="bg-gray-800 p-4 sm:rounded-lg">
                            <div class="text-white">
                                <div class="text-2xl font-bold">
                                    <a href="{{ route('centers.show', $center) }}">{{ $center->name }}</a>
                                </div>
                                <div>{{ $center->address }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
