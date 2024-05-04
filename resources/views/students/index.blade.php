<x-app-layout>
    <div class="py-12 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-800 text-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl leading-tight">
                        Students
                    </h2>
                    <div class="mt-6">
                        <input type="text" id="search" placeholder="Search..."
                            class="rounded-md shadow-sm my-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Index</th>
                                    <th class="px-4 py-2">Grade</th>
                                    <th class="px-4 py-2">Center</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr class="text-gray-200">
                                        <td class="border px-4 py-2">
                                            <a
                                                href="{{ route('students.show', $student->id) }}">{{ $student->name }}</a>
                                        </td>
                                        <td class="border px-4 py-2">{{ $student->student_index }}</td>
                                        <td class="border px-4 py-2">{{ $student->registration->tuitionClass->grade }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            {{ $student->registration->tuitionClass->center->name }}
                                        </td>
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

<script>
    $(document).ready(function() {
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
