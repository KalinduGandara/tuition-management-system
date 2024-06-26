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
                    <div>
                        <a href="{{ route('tuitionClasses.test.create', $tuitionClass) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Create
                            Test</a>
                    </div>
                </div>
                <p class="mb-2">Center Name: {{ $tuitionClass->center->name }}</p>
                <p class="mb-2">Class Grade: {{ $tuitionClass->grade }}</p>
                <p class="mb-2">Class Year: {{ $tuitionClass->year }}</p>
                <h2 class="text-xl font-bold mt-4 mb-2">Test</h2>
                @php
                    $grouped = $tests->sortByDesc('date')->groupBy('type');
                @endphp

                <div class="flex flex-nowrap overflow-auto">
                    @foreach ($grouped as $type => $tests)
                        <div class="w-full sm:w-1/2 lg:w-1/4 p-2">
                            <h2 class="mb-2">{{ $type }}</h2>
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th>Test Date</th>
                                        <th>Test Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tests as $test)
                                        <tr>
                                            <td class="text-center">
                                                <a href="{{ route('tests.show', $test) }}"
                                                    class="text-yellow-500 hover:underline">
                                                    {{ $test->date }}
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $test->type }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
