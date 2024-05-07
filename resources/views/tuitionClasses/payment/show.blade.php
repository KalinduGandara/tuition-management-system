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
                </div>
                <p class="mb-2">Center Name: {{ $tuitionClass->center->name }}</p>
                <p class="mb-2">Class Grade: {{ $tuitionClass->grade }}</p>
                <p class="mb-2">Class Year: {{ $tuitionClass->year }}</p>
                <h2 class="text-xl font-bold mt-4 mb-2">Payments</h2>
                <table class="table-auto w-full text-left">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            @foreach (range(1, date('n')) as $month)
                                <th colspan="2">{{ DateTime::createFromFormat('!m', $month)->format('F') }}</th>
                            @endforeach
                        </tr>
                        <tr>
                            <th></th>
                            @foreach (range(1, date('n')) as $month)
                                <th>Physical</th>
                                <th>Online</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                            <tr>
                                <td>{{ $registration->student->name }}</td>
                                @foreach (range(1, date('n')) as $month)
                                    @php
                                        $payments = $registration->payments->where('month', $month);
                                    @endphp
                                    <td>
                                        @if ($payments->where('type', 'Physical')->count())
                                            <span>paid</span>
                                        @else
                                            <span class="text-red-500">not paid</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($payments->where('type', 'Online')->count())
                                            <span>paid</span>
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
</x-app-layout>
