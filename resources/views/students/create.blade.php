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
                                <div class="mb-4">
                                    <h2 class="text-xl font-bold">Student Information</h2>
                                    <label for="name">Name</label>
                                    <input
                                        class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full"
                                        type="text" id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror

                                    <label for="student_index">Student Index</label>
                                    <input
                                        class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full"
                                        type="text" id="student_index" name="student_index"
                                        value="{{ old('student_index') }}">
                                    @error('student_index')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror

                                    <label for="tuition_class_id">Tuition Class</label>
                                    <select
                                        class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full"
                                        id="tuition_class_id" name="tuition_class_id">
                                        <option selected value="" disabled>Select Tuition Class</option>
                                        @foreach ($tuitionClasses as $tuitionClass)
                                            <option value="{{ $tuitionClass->id }}"
                                                {{ old('tuition_class_id') == $tuitionClass->id ? 'selected' : '' }}>
                                                {{ $tuitionClass->center->name }} - {{ $tuitionClass->grade }}</option>
                                        @endforeach
                                    </select>
                                    @error('tuition_class_id')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label for="address">Address</label>
                                <input
                                    class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full"
                                    type="text" id="address" name="address" value="{{ old('address') }}">
                                @error('address')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror

                                <label for="address">WhatsApp Number</label>
                                <input
                                    class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full"
                                    type="text" id="whatsapp_no" name="whatsapp_no"
                                    value="{{ old('whatsapp_no') }}">
                                @error('whatsapp_no')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror


                                <div class="mb-4">
                                    <h2 class="text-xl font-bold">Parent Information</h2>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="mother_name">Mother's Name</label>
                                            <input
                                                class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full"
                                                type="text" id="mother_name" name="mother_name"
                                                value="{{ old('mother_name') }}">

                                            <label for="mother_phone">Mother's Phone Number</label>
                                            <input
                                                class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full"
                                                type="text" id="mother_phone" name="mother_phone"
                                                value="{{ old('mother_phone') }}">

                                            <label for="mother_occupation">Mother's Occupation</label>
                                            <input
                                                class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full"
                                                type="text" id="mother_occupation" name="mother_occupation"
                                                value="{{ old('mother_occupation') }}">
                                        </div>

                                        <div>
                                            <label for="father_name">Father's Name</label>
                                            <input
                                                class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full"
                                                type="text" id="father_name" name="father_name"
                                                value="{{ old('father_name') }}">

                                            <label for="father_phone">Father's Phone Number</label>
                                            <input
                                                class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full"
                                                type="text" id="father_phone" name="father_phone"
                                                value="{{ old('father_phone') }}">

                                            <label for="father_occupation">Father's Occupation</label>
                                            <input
                                                class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full"
                                                type="text" id="father_occupation" name="father_occupation"
                                                value="{{ old('father_occupation') }}">
                                        </div>
                                    </div>
                                </div>

                                <button
                                    class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
