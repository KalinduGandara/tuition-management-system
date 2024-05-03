<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold mb-4">Tuition Class Details</h1>
                    <form action="{{ route('classDays.destroy', $classDay) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                </div>
                <p class="mb-2">Center Name: {{ $classDay->tuitionClass->center->name }}</p>
                <p class="mb-2">Class Grade: {{ $classDay->tuitionClass->grade }}</p>
                <p class="mb-2">Class Year: {{ $classDay->tuitionClass->year }}</p>
                <div>
                    <h2 class="text-xl font-bold mb-4">Class Day Details</h2>
                    <form action="{{ route('classDays.update', $classDay) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-white">Date
                                @if ($classDay->date == now()->format('Y-m-d'))
                                    (Today)
                                @endif
                            </label>
                            <input type="date" id="date" name="date"
                                class="mt-1 block w-1/2 py-2 px-3 border-gray-500 bg-gray-600 borde rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ $classDay->date }}" disabled>
                            @error('date')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Student Name</th>
                                    <th class="px-4 py-2">Present</th>
                                    <th class="px-4 py-2">Absent</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $attendance->registration->student->name }}</td>
                                        <td class="border px-4 py-2">
                                            <input type="radio"
                                                id="present-{{ $attendance->registration->student->id }}"
                                                name="attendances[{{ $attendance->registration->student->id }}]"
                                                value="Present"
                                                {{ $attendance->status == 'Present' ? 'checked' : '' }}>
                                            <label
                                                for="present-{{ $attendance->registration->student->id }}">Present</label>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <input type="radio"
                                                id="absent-{{ $attendance->registration->student->id }}"
                                                name="attendances[{{ $attendance->registration->student->id }}]"
                                                value="Absent" {{ $attendance->status == 'Absent' ? 'checked' : '' }}>
                                            <label
                                                for="absent-{{ $attendance->registration->student->id }}">Absent</label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Submit</button>
                    </form>
                </div>
            </div>
</x-app-layout>
