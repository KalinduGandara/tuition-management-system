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

                    @php
                        $grouped = $classDays->groupBy(function ($item, $key) {
                            return \Carbon\Carbon::parse($item->date)->format('F Y');
                        });
                    @endphp

                    @foreach ($grouped as $month => $days)
                        <h2>{{ $month }}</h2>
                        <table class="table-auto dark:text-gray-200">
                            <thead>
                                {{-- <tr>
                                    @foreach ($days as $classDay)
                                        <th class="px-4 py-2">Date</th>
                                    @endforeach
                                </tr> --}}
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($days as $classDay)
                                        <td class="border px-4 py-2">
                                            <a href="classDays/{{ $classDay->id }}">{{ $classDay->date }}</a>
                                            @if ($classDay->date == now()->format('Y-m-d'))
                                                (Today)
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
