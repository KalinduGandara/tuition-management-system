<x-app-layout>
    <div class="py-12 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-800 text-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl leading-tight">
                        Tuition Classes
                    </h2>
                    <div class="mt-6">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Grade</th>
                                    <th class="px-4 py-2">Year</th>
                                    <th class="px-4 py-2">Center</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tuitionClasses as $tuitionClass)
                                    <tr class="text-gray-200">
                                        <td class="border px-4 py-2">{{ $tuitionClass->grade }}</td>
                                        <td class="border px-4 py-2">{{ $tuitionClass->year }}</td>
                                        <td class="border px-4 py-2">{{ $tuitionClass->center->name }}</td>
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
