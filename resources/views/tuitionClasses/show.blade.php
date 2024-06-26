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
                        <a href="{{ route('tuitionClasses.attendance', $tuitionClass) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Attendance</a>
                        <a href="{{ route('tuitionClasses.payment', $tuitionClass) }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Payment</a>
                        <a href="{{ route('tuitionClasses.test', $tuitionClass) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-2">Test</a>
                        <form action="{{ route('tuitionClasses.destroy', $tuitionClass) }}"
                            onsubmit="return confirm('Are you sure you want to delete this tuition class?');"
                            method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Delete</button>
                        </form>
                    </div>
                </div>
                <p class="mb-2">Center Name: {{ $tuitionClass->center->name }}</p>
                <p class="mb-2">Class Grade: {{ $tuitionClass->grade }}</p>
                <p class="mb-2">Class Year: {{ $tuitionClass->year }}</p>
                <h2 class="text-xl font-bold mt-4 mb-2">Students</h2>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>Student</th>
                            @foreach ($classDays as $day)
                                <th>{{ $day->date }}</th>
                            @endforeach
                            <th>Physical Payment</th>
                            <th>Online Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td class="text-center"><a href="{{ route('students.show', $student) }}"
                                        class="text-blue-500 hover:underline">{{ $student->name }}</a></td>
                                @for ($i = 0; $i < count($classDays); $i++)
                                    <td class="text-center">
                                        @php
                                            $attendance = $student->attendances->skip($i)->first();
                                        @endphp
                                        @if ($attendance)
                                            <span
                                                class="{{ $attendance->status == 'Absent' ? 'text-red-500' : '' }}">{{ $attendance->status }}</span>
                                        @endif
                                    </td>
                                @endfor
                                @foreach (['Physical', 'Online'] as $type)
                                    <td class="text-center">
                                        @php
                                            $payment = $student->payments->firstWhere('type', $type);
                                        @endphp
                                        @if ($payment)
                                            <span> paid </span>
                                        @else
                                            <span class="text-red-500">not paid</span>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
