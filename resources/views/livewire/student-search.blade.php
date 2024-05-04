<div>
    <label for="registration_id" class="block text-sm font-medium text-white">Student</label>
    <div class="flex justify-between">
        <div class="w-1/4 flex items-center">
            <input wire:model.live="search" type="text" placeholder="Search students..."
                class="rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow mr-2 w-full"
                wire:keydown.enter.prevent>
        </div>
        <div class="w-3/4 flex items-center">
            <span wire:loading wire:target="search" class="spinner"></span>
            <select name="registration_id" id="registration_id" wire:loading.remove wire:target="search"
                class="form-select rounded-md shadow-sm mt-1 block border-gray-500 bg-gray-600 flex-grow ml-2">
                @foreach ($students as $student)
                    <option wire:key="{{ $student->registration_id }}" value="{{ $student->registration_id }}"
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
    <style>
        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #3490dc;
            border-radius: 50%;
            width: 1.5em;
            height: 1.5em;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</div>
