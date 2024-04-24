<x-app-layout>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <h1 class="text-xl dark:text-white mb-4">{{ $student->name }}</h1>
        <p class="dark:text-gray-300 mb-2">
            <strong class="dark:text-gray-400">Address:</strong> {{ $student->address }}
        </p>
        <p class="dark:text-gray-300 mb-2">
            <strong class="dark:text-gray-400">Grade:</strong> {{ $activeTuitionClass->grade }}
        </p>
        <p class="dark:text-gray-300">
            <strong class="dark:text-gray-400">Center:</strong> {{ $activeTuitionClass->center->name }}
        </p>
    </div>

    <h2 class="dark:text-white">Student Classes</h2>
    @if ($tuitionClasses->count())
        <table class="dark:bg-gray-800 dark:text-gray-300 w-full">
            @foreach ($tuitionClasses as $tuitionClass)
                <tr>
                    <td>Grade: {{ $tuitionClass->grade }} Year {{ $tuitionClass->year }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p class="dark:text-gray-400">No classes registered.</p>
    @endif

    <h2 class="dark:text-white">Test Marks</h2>
    @if ($testmarks->count())
        <table class="dark:bg-gray-800 dark:text-gray-300 w-full">
            <tr>
                <th>Date</th>
                <th>Test</th>
                <th>Mark</th>
                <th>Test Type</th>
            </tr>
            @foreach ($testmarks as $testmark)
                <tr>
                    <td>
                        {{ $testmark['test']->date }}
                    <td>
                        {{ $testmark['test']->name }}
                    </td>
                    <td>
                        {{ $testmark['mark']->mark }}
                    </td>
                    <td>
                        {{ $testmark['test']->type }}
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p class="dark:text-gray-400">No test marks found.</p>
    @endif
</x-app-layout>
