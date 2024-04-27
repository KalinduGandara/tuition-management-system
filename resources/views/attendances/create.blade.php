<x-app-layout>
    <h2 class="text-2xl dark:bg-gray-800 dark:text-gray-200 text-center">
        Create Attendance
    </h2>
    <div class="dark:bg-gray-800 py-12 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:bg-gray-800 bg-white border-b border-gray-200">
                    <form action="{{ route('attendances.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                            <input type="date" name="date" id="date"
                                class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-500 bg-gray-600"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="student_id" class="block text-gray-700 text-sm font-bold mb-2">Student
                                ID:</label>
                            <input type="text" name="student_id" id="student_id"
                                class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-500 bg-gray-600"
                                required>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Attendance
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
