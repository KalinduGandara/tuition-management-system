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
                        <label for="registration_id" class="block text-sm font-medium text-white">Student</label>
                        <div class="flex justify-between">
                            <div class="w-1/4 flex items-center">
                                <input name="student_search" type="text" id="student_search"
                                    placeholder="Search students..." value="{{ old('student_search') }}"
                                    class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full">
                            </div>
                            <div class="w-3/4 flex items-center">
                                <select name="registration_id" id="registration_id"
                                    class="form-select rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow ml-2">
                                    <option value="">Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->registration_id }}"
                                            {{ old('registration_id') == $student->registration_id ? 'selected' : '' }}>
                                            {{ $student->name }} - {{ $student->student_index }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        @error('registration_id')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-between mb-4">
                        <div class=" w-1/2 mr-2 flex-grow">
                            <label for="type" class="block text-sm font-medium text-white">Type</label>
                            <select name="type" id="type"
                                class="form-select rounded-md shadow-sm mt-1 block w-full border-gray-500 bg-gray-600">
                                <option value="Physical" {{ old('type') == 'Physical' ? 'selected' : '' }}>Physical
                                </option>
                                <option value="Online" {{ old('type') == 'Online' ? 'selected' : '' }}>Online</option>
                            </select>
                            @error('type')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" w-1/2 ml-2 flex-grow">
                            <label for="amount" class="block text-sm font-medium text-white">Amount</label>
                            <input type="text" name="amount" id="amount" value="{{ old('amount') }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-500 bg-gray-600">
                            @error('amount')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-between mb-4">
                        <div class="w-1/2 mr-2 flex-grow">
                            <label for="date" class="block text-sm font-medium text-white">Date</label>
                            <input type="date" name="date" id="date"
                                value="{{ old('date', date('Y-m-d')) }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-500 bg-gray-600">
                            @error('date')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-1/2 ml-2 flex-grow">
                            <label for="month" class="block text-sm font-medium text-white">Month</label>
                            <select name="month" id="month"
                                class="form-select rounded-md shadow-sm mt-1 block w-full border-gray-500 bg-gray-600">
                                <option value="">Select Month</option>
                                <option value="1" {{ old('month') == '1' ? 'selected' : '' }}>January</option>
                                <option value="2" {{ old('month') == '2' ? 'selected' : '' }}>February</option>
                                <option value="3" {{ old('month') == '3' ? 'selected' : '' }}>March</option>
                                <option value="4" {{ old('month') == '4' ? 'selected' : '' }}>April</option>
                                <option value="5" {{ old('month') == '5' ? 'selected' : '' }}>May</option>
                                <option value="6" {{ old('month') == '6' ? 'selected' : '' }}>June</option>
                                <option value="7" {{ old('month') == '7' ? 'selected' : '' }}>July</option>
                                <option value="8" {{ old('month') == '8' ? 'selected' : '' }}>August</option>
                                <option value="9" {{ old('month') == '9' ? 'selected' : '' }}>September</option>
                                <option value="10" {{ old('month') == '10' ? 'selected' : '' }}>October</option>
                                <option value="11" {{ old('month') == '11' ? 'selected' : '' }}>November</option>
                                <option value="12" {{ old('month') == '12' ? 'selected' : '' }}>December</option>
                            </select>
                            @error('month')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
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
<script>
    $(document).ready(function() {
        var students = $('#registration_id option');

        $('#student_search').on('keyup', function() {
            var value = $(this).val().toLowerCase();

            $('#registration_id').html(students).find('option').each(function() {
                var text = $(this).text().toLowerCase();
                if (!text.includes(value)) {
                    $(this).remove();
                }
            });
        });
    });
</script>
