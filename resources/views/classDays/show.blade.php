<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold mb-4">
                        <a href="{{ route('tuitionClasses.show', $classDay->tuitionClass->id) }}"
                            class="text-blue-500 hover:underline">
                            Tuition Class Details
                        </a>
                    </h1>
                    <div>
                        <a href="{{ route('classDays.edit', $classDay) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                            Edit
                        </a>
                        <form action="{{ route('classDays.destroy', $classDay) }}"
                            onsubmit="return confirm('Are you sure you want to delete this class day?');" method="POST"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                <p class="mb-2">Center Name: {{ $classDay->tuitionClass->center->name }}</p>
                <p class="mb-2">Class Grade: {{ $classDay->tuitionClass->grade }}</p>
                <p class="mb-2">Class Year: {{ $classDay->tuitionClass->year }}</p>
                <div>
                    <h2 class="text-xl font-bold mb-4">Class Day Details</h2>
                    <p class="mb-2">Date
                        : {{ $classDay->date }} @if ($classDay->date == now()->format('Y-m-d'))
                            (Today)
                        @endif
                    </p>
                    <table class="table-auto dark:text-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Student Name</th>
                                <th class="px-4 py-2">Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td class="border px-4 py-2">
                                        {{ $attendance->registration->student->name }}
                                    </td>
                                    <td
                                        class="border px-4 py-2 {{ $attendance->status == 'Absent' ? 'text-red-500' : '' }}">
                                        {{ $attendance->status }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
