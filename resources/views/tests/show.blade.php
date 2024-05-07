<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold mb-4">
                        <a href="{{ route('tuitionClasses.test', $test->tuition_class_id) }}"
                            class="text-white hover:underline">
                            Tuition Class Tests
                        </a>
                    </h1>
                    <div>
                        <a href="{{ route('tests.edit', $test) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit Test
                        </a>
                    </div>

                </div>
                <p class="mb-2">Center Name: {{ $test->tuitionClass->center->name }}</p>
                <p class="mb-2">Class Grade: {{ $test->tuitionClass->grade }}</p>
                <p class="mb-2">Class Year: {{ $test->tuitionClass->year }}</p>
                <h2 class="text-xl font-bold mt-4 mb-2">Test</h2>
                <p class="mb-2">Test Date: {{ $test->date }}</p>
                <p class="mb-2">Test Type: {{ $test->type }}</p>


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
                                    {{ $testMark->mark }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</x-app-layout>
