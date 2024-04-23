<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="grid grid-cols-1 gap-4">
                    <div class="bg-gray-800 p-4 sm:rounded-lg">
                        <div class="text-white">
                            <form action="{{ route('centers.update', $center) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-white">Center
                                        Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-input mt-1 block w-full border-gray-500 bg-gray-600 "
                                        value="{{ $center->name }}">
                                    @error('name')
                                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="address" class="block text-sm font-medium text-white">Center
                                        Address</label>
                                    <input type="text" name="address" id="address"
                                        class="form-input mt-1 block w-full border-gray-500 bg-gray-600 "
                                        value="{{ $center->address }}">
                                    @error('address')
                                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Update Center
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
