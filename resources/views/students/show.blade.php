<x-app-layout>
    <div class="py-12 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-800 text-white border-b border-gray-200">
                    <div class="flex flex-wrap -mx-2">
                        <!-- Student Information -->
                        <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
                            <div class="p-4 bg-gray-800 rounded shadow">
                                <h2 class="font-semibold text-xl leading-tight">
                                    {{ $student->name }}
                                </h2>
                                <ul class="list-disc pl-5 mt-4">
                                    <div class="mt-6">
                                        <ul class="list-disc pl-5">
                                            <li><strong>Index:</strong> {{ $student->student_index }}</li>
                                            <li><strong>Grade:</strong>
                                                {{ $student->registration->tuitionClass->grade }}</li>
                                            <li><strong>Center:</strong>
                                                {{ $student->registration->tuitionClass->center->name }}</li>
                                            <li><strong>Address:</strong> {{ $student->address }}</li>
                                            <li><strong>WhatsApp:</strong> {{ $student->whatsapp_no }}</li>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </div>

                        <!-- Parent Information -->
                        <div class="w-full md:w-1/2 px-2">
                            <div class="p-4 bg-gray-800 rounded shadow">
                                <h2 class="font-semibold text-xl leading-tight">
                                    Parent Information
                                </h2>
                                <h3 class="dark:text-white">Mother</h3>
                                <ul class="list-disc pl-5">
                                    <li><strong>Name:</strong> {{ $student->mother_name }}</li>
                                    <li><strong>Job:</strong> {{ $student->mother_occupation }}</li>
                                    <li><strong>Phone:</strong> {{ $student->mother_phone }}</li>
                                </ul>
                                <h3 class="dark:text-white">Father</h3>
                                <ul class="list-disc pl-5">
                                    <li><strong>Name:</strong> {{ $student->father_name }}</li>
                                    <li><strong>Job:</strong> {{ $student->father_occupation }}</li>
                                    <li><strong>Phone:</strong> {{ $student->father_phone }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Test Marks and Payments -->
                    <div class="flex flex-wrap -mx-2 mt-6">
                        <!-- Test Marks -->
                        <div class="w-full md:w-2/3 px-2">
                            <h2 class="font-semibold text-xl leading-tight">
                                Test Marks
                            </h2>
                            @if ($testmarks->count())
                                <table class="table-auto w-full">
                                    <tr>
                                        <th class="px-4 py-2">Date</th>
                                        <th class="px-4 py-2">Mark</th>
                                        <th class="px-4 py-2">Test Type</th>
                                    </tr>
                                    @foreach ($testmarks as $testmark)
                                        <tr>
                                            <td class="border px-4 py-2">
                                                {{ $testmark['test']->date }}
                                            </td>
                                            <td class="border px-4 py-2">
                                                {{ $testmark['mark']->mark }}
                                            </td>
                                            <td class="border px-4 py-2">
                                                {{ $testmark['test']->type }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="dark:text-gray-400">No test marks found.</p>
                            @endif
                        </div>
                        <!-- Payments -->
                        <div class="w-full md:w-1/3 px-2">
                            <h2 class="font-semibold text-xl leading-tight">
                                Payments
                            </h2>
                            @if ($payments->count())
                                <table class="table-auto w-full">
                                    <tr>
                                        <th class="px-4 py-2">Month</th>
                                        <th class="px-4 py-2">Amount</th>
                                        <th class="px-4 py-2">Type</th>

                                    </tr>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td class="border px-4 py-2">
                                                {{ $payment->month }}
                                            </td>
                                            <td class="border px-4 py-2">
                                                {{ $payment->amount }}
                                            </td>
                                            <td class="border px-4 py-2">
                                                {{ $payment->type }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="dark:text-gray-400">No payments found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
