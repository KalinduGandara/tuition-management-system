<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold mb-4">Tuition Class Details</h1>
                    <div>
                        <a href="{{ route('tuitionClasses.attendance.create', $tuitionClass->id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Mark Attendance
                        </a>
                    </div>
                </div>
                <p class="mb-2">Center Name: {{ $tuitionClass->center->name }}</p>
                <p class="mb-2">Class Grade: {{ $tuitionClass->grade }}</p>
                <p class="mb-2">Class Year: {{ $tuitionClass->year }}</p>
                <div>
                    <h2 class="text-xl font-bold mb-4">Class Days</h2>
                    <ul>
                        @foreach ($classDays as $classDay)
                            <li>
                                <a href="{{ route('classDays.edit', $classDay) }}"
                                    class="text-blue-500">{{ $classDay->date }}</a>
                                @if ($classDay->date == now()->format('Y-m-d'))
                                    (Today)
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
