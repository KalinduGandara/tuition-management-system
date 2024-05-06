<x-app-layout>
    <div class="dark:bg-gray-800 py-12 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form id="filterForm" method="GET" action="{{ route('attendances.index') }}"
                class="dark:text-white flex items-center space-x-4">
                <div>
                    <label for="tuitionClass" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tuition
                        Class</label>
                    <select id="tuitionClass" name="tuitionClass"
                        onchange="document.getElementById('filterForm').submit();"
                        class="mt-1 block w-full py-2 px-3 border-gray-500 bg-gray-600 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select a class</option>
                        @foreach ($tuitionClasses as $class)
                            <option value="{{ $class->id }}"
                                {{ request('tuitionClass') == $class->id ? 'selected' : '' }}>
                                {{ $class->center->name }} - {{ $class->grade }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('attendances.create') }}"
                    class="mt-6 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add
                    Attendance</a>
            </form>
            @if (!$tuitionClass)
                <p class="dark:text-gray-200">Select a class</p>
            @elseif (empty($classDays))
                <p class="dark:text-gray-200">No class days found</p>
            @else
                @php
                    $grouped = $classDays->groupBy(function ($item, $key) {
                        return \Carbon\Carbon::parse($item->date)->format('F Y');
                    });
                @endphp

                @foreach ($grouped as $month => $days)
                    <h2>{{ $month }}</h2>
                    <table class="table-auto dark:text-gray-200">
                        <thead>
                            <tr>
                                @foreach ($days as $classDay)
                                    <th class="px-4 py-2">Date</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($days as $classDay)
                                    <td class="border px-4 py-2">
                                        <a href="classDays/{{ $classDay->id }}">{{ $classDay->date }}</a>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
