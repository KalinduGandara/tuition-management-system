<x-app-layout>
    <div class="dark:bg-gray-800 py-12 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form method="GET" action="{{ route('attendances.index') }}"
                class="dark:text-white flex items-center space-x-4">
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date</label>
                    <input type="date" name="date" id="date"
                        class="mt-1 block w-full py-2 px-3 border-gray-500 bg-gray-600 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ $date }}">
                </div>
                <div>
                    <label for="tuitionClass" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tuition
                        Class</label>
                    <select id="tuitionClass" name="tuitionClass"
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
                <button type="submit"
                    class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Filter</button>
                <a href="{{ route('attendances.create') }}"
                    class="mt-6 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add
                    Attendance</a>
            </form>
            @if (!$tuitionClass)
                <p class="dark:text-gray-200">Select a class</p>
            @elseif (empty($classDays))
                <p class="dark:text-gray-200">No class days found</p>
            @else
                <table class="table-auto dark:text-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classDays as $classDay)
                            <tr>
                                <td class="border px-4 py-2">
                                    <a href="classDays/{{ $classDay->id }}">{{ $classDay->date }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
