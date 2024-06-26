<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="grid grid-cols-1 gap-4">
                    <div class="bg-gray-800 p-4 sm:rounded-lg">
                        <div class="text-white">
                            <div class="flex justify-between items-center">
                                <div class="text-2xl font-bold">{{ $center->name }}</div>
                                <form action="{{ route('centers.tuitionClasses.store', $center) }}" method="POST">
                                    @csrf
                                    <input type="text" name="grade" placeholder="Grade"
                                        class="bg-gray-600 text-white p-2 rounded">
                                    <input type="text" name="year" placeholder="Year"
                                        class="bg-gray-600 text-white p-2 rounded">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                        Create Class
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
