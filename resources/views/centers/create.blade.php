<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <form method="POST" action="{{ route('centers.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <div class="mt-4">
                            <label for="name" class="text-gray-300">Name:</label>
                            <input id="name" class="mt-1 block w-full border-gray-500 bg-gray-600 " type="text"
                                name="name" autofocus />
                            @error('name')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="address" class="text-gray-300">Address:</label>
                            <input id="address" class="mt-1 block w-full border-gray-500 bg-gray-600 " type="text"
                                name="address" />
                            @error('address')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <button
                                class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">Submit</button>
                            <a href="{{ route('centers.index') }}" class="text-blue-400 hover:text-blue-500">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
