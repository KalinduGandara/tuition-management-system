<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold mb-4">
                        <a href="{{ route('tuitionClasses.show', $test->tuitionClass->id) }}"
                            class="text-blue-500 hover:underline">
                            Tuition Class Details
                        </a>
                    </h1>

                </div>
                <p class="mb-2">Center Name: {{ $test->tuitionClass->center->name }}</p>
                <p class="mb-2">Class Grade: {{ $test->tuitionClass->grade }}</p>
                <p class="mb-2">Class Year: {{ $test->tuitionClass->year }}</p>
                <h2 class="text-xl font-bold mt-4 mb-2">Test</h2>
                <p class="mb-2">Test Date: {{ $test->date }}</p>
                <p class="mb-2">Test Type: {{ $test->type }}</p>

                <form action="{{ route('tests.update', $test) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Mark</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($test->testMarks as $testMark)
                                <tr>
                                    <td class="text-center">{{ $testMark->registration->student->name }}</td>
                                    <td class="text-center">
                                        <input type="number" name="marks[{{ $testMark->registration_id }}]"
                                            value="{{ old('marks.' . $testMark->registration_id, $testMark->mark) }}"
                                            class="w-1/4 bg-gray-800 text-white p-2 rounded">

                                        @error('marks.' . $testMark->registration_id)
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Update
                        Marks</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
