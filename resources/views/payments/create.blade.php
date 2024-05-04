<x-app-layout>
    <div class="bg-gray-800 py-12 text-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-700 p-4 sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold mb-4">Payment</h1>
                </div>
                <form action="{{ route('payments.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="student_id" class="block text-sm font-medium text-gray-700">Student</label>
                        <select name="student_id" id="student_id"
                            class="form-select rounded-md shadow-sm mt-1 block w-full border-gray-500 bg-gray-600">
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->student_index }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select name="type" id="type"
                            class="form-select rounded-md shadow-sm mt-1 block w-full border-gray-500 bg-gray-600">
                            <option value="Physical">Physical</option>
                            <option value="Online">Online</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                        <input type="text" name="amount" id="amount"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-500 bg-gray-600">
                    </div>
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" name="date" id="date"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-500 bg-gray-600">
                    </div>
                    <div class="mb-4">
                        <label for="month" class="block text-sm font-medium text-gray-700">Month</label>
                        <input type="text" name="month" id="month"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-500 bg-gray-600">
                    </div>
                    <div class="mb-4">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
