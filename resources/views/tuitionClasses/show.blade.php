<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div>
                    <h1>Tuition Class Details</h1>
                    <p>Class Grade: {{ $tuitionClass->grade }}</p>
                    <p>Class year
                        : {{ $tuitionClass->year }}</p>
                    <h2>Students</h2>
                    <ul>
                        @foreach ($students as $student)
                            <li>
                                <a href="{{ route('students.show', $student) }}">{{ $student->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
