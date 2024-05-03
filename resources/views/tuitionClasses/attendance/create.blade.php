<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold mb-4">Tuition Class Details</h1>
                </div>
                <p class="mb-2">Center Name: {{ $tuitionClass->center->name }}</p>
                <p class="mb-2">Class Grade: {{ $tuitionClass->grade }}</p>
                <p class="mb-2">Class Year: {{ $tuitionClass->year }}</p>
                <div>
                    <h2 class="text-xl font-bold mb-4">Mark Attendance</h2>
                    <form action="{{ route('tuitionClasses.attendance.store', $tuitionClass) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-white">Date</label>
                            <input type="date" id="date" name="date"
                                class="mt-1 block w-1/2 py-2 px-3 border-gray-500 bg-gray-600 borde rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('date', date('Y-m-d')) }}">
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
                                @foreach ($students as $student)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $student->name }}</td>
                                        <td class="border px-4 py-2">
                                            <input type="radio" id="present-{{ $student->id }}"
                                                name="attendances[{{ $student->id }}]" value="Present"
                                                {{ old('attendances.' . $student->id) == 'Present' ? 'checked' : '' }}>
                                            <label for="present-{{ $student->id }}">Present</label>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <input type="radio" id="absent-{{ $student->id }}"
                                                name="attendances[{{ $student->id }}]" value="Absent"
                                                {{ !old('attendances.' . $student->id) ? 'checked' : '' }}
                                                {{ old('attendances.' . $student->id) == 'Absent' ? 'checked' : '' }}>
                                            <label for="absent-{{ $student->id }}">Absent</label>
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
        </div>
    </div>
</x-app-layout>
