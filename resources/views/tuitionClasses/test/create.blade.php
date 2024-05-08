<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold mb-4">
                        <a href="{{ route('tuitionClasses.show', $tuitionClass->id) }}"
                            class="text-blue-500 hover:underline">
                            Tuition Class Details
                        </a>
                    </h1>

                </div>
                <p class="mb-2">Center Name: {{ $tuitionClass->center->name }}</p>
                <p class="mb-2">Class Grade: {{ $tuitionClass->grade }}</p>
                <p class="mb-2">Class Year: {{ $tuitionClass->year }}</p>
                <h2 class="text-xl font-bold mt-4 mb-2">Test</h2>

                <form action="{{ route('tuitionClasses.test.store', $tuitionClass) }}" method="POST">
                    @csrf
                    <div class="flex space-x-4">
                        <div class="mb-4 flex-1">
                            <label for="date" class="block text-sm font-medium text-white">Date</label>
                            <input type="date" id="date" name="date"
                                class="mt-1 block w-full py-2 px-3 border-gray-500 bg-gray-600 borde rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('date', date('Y-m-d')) }}">
                            @error('date')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 flex-1">
                            <label for="type" class="block text-sm font-medium text-white">Type</label>
                            <select id="type" name="type"
                                class="mt-1 block w-full py-2 px-3 border-gray-500 bg-gray-600 borde rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" disabled selected>Select Type</option>
                                <option value="Multiple Master"
                                    {{ old('type') == 'Multiple Master' ? 'selected' : '' }}>
                                    Multiple Master</option>
                                <option value="Term Test Master"
                                    {{ old('type') == 'Term Test Master' ? 'selected' : '' }}>
                                    Term Test Master</option>
                                <option value="Lesson Test Master"
                                    {{ old('type') == 'Lesson Test Master' ? 'selected' : '' }}>Lesson Test Master
                                </option>
                            </select>
                            @error('type')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Student Name</th>
                                <th class="px-4 py-2">Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $registration)
                                <tr>
                                    <td class="border px-4 py-2">{{ $registration->student->name }}</td>
                                    <td class="border px-4 py-2">
                                        <input type="number" id="marks-{{ $registration->id }}"
                                            name="marks[{{ $registration->id }}]"
                                            value="{{ old('marks.' . $registration->id) }}"
                                            class="w-1/2 py-2 px-3 border-gray-500 bg-gray-600 borde rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('marks.' . $registration->id)
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
