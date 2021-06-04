<div>
    <div>
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
        <select wire:model="{{ $name }}"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <option value=''>Selecione</option>
            @foreach ($options as $key => $option)

            <option value="{{ $key }}">{{ $option }}</option>


            @endforeach

        </select>
    </div>
    @if ($errors->has($name))
        <small class="text-red-600">{{ $errors->first($name) }}</small>
    @endif
</div>
