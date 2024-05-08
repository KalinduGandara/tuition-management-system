<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="grid grid-cols-1 gap-4">
                    <div class="bg-gray-800 p-4 sm:rounded-lg">
                        <div class="text-white">
                            <div class="flex justify-between items-center">
                                <h1 class="text-2xl font-bold">Create Student</h1>
                                <div>
                                    <a href="{{ route('students.index') }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                        Back
                                    </a>
                                </div>
                            </div>
                            <form action="{{ route('students.store') }}" method="POST" class="mt-4">
                                @csrf
                                <div class="flex flex-wrap">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label for="name" class="block text-sm font-bold text-white">Name</label>
                                        <input type="text" name="name" id="name"
                                            class="rounded-md shadow-sm my-1 block border-gray-500 bg-gray-600 flex-grow w-full"
                                            required>
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label for="student_index"
                                            class="block text-sm font-bold text-white">Index</label>
                                        <input type="text" name="student_index" id="student_index"
                                            class="rounded-md shadow-sm my-1 block border-gray-500 bg-gray-600 flex-grow w-full"
                                            required>
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label for="registration_id"
                                            class="block text-sm font-bold text-white">Registration</label>
                                        <select name="registration_id" id="registration_id"
                                            class="rounded-md shadow-sm my-1 block border-gray-500 bg-gray-600 flex-grow w-full"
                                            required>
                                            @foreach ($registrations as $registration)
                                                <option value="{{ $registration->id }}">
                                                    {{ $registration->tuitionClass->grade }}
                                                    - {{ $registration->tuitionClass->center->name }} -
                                                    {{ $registration->tuitionClass->year }}
                                                </option>
                                            @endforeach
