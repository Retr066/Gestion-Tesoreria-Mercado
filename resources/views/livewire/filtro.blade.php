<div>
    <div class="border border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white shadow-lg rounded-lg m-3">
        <div x-data="{optionsVisible : @entangle('show'),optionsVisible2 : @entangle('show2')}"
            class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Seleccione Tipo de Balance
                </label>
                <select wire:model="test" id="input4"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="" selected disabled>Seleccione... </option>
                    <option value="1">Anual</option>
                    <option value="2">Semestral</option>
                </select>
                {{-- @error('tipo_importe') <span class="error text-red-700">{{ $message }}</span> @enderror --}}
            </div>
            <div x-show="optionsVisible" class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Seleccione el Año
                </label>
                <select wire:model="tipo_año" id="input4"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="" selected>Seleccione... </option>
                    @foreach ($this->Años as $año)
                        <option value="{{ $año }}">{{ $año }}</option>
                    @endforeach
                </select>
                {{-- @error('tipo_importe') <span class="error text-red-700">{{ $message }}</span> @enderror --}}
            </div>
            <div x-show="optionsVisible2" class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Seleccione el Rango de Meses
                </label>
                <select {{-- wire:model="tipo_importe" --}} id="input4"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="" selected disabled>Seleccione... </option>
                    {{-- @foreach ($tipos as $key => $tipo)
                        <option value="{{ $tipo->Descripcion }}">{{ $tipo->Descripcion }}</option>
                    @endforeach --}}
                </select>
                {{-- @error('tipo_importe') <span class="error text-red-700">{{ $message }}</span> @enderror --}}
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">
                <div class="flex border rounded bg-gray-300 items-center p-2 ">
                    <svg class="fill-current text-gray-800 mr-2 w-5" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" width="24" height="24">
                        <path class="heroicon-ui"
                            d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z" />
                    </svg>
                    <input type="text" placeholder="Enter text here..."
                        class="bg-gray-300 max-w-full focus:outline-none text-gray-700" />
                </div>
                <div class="flex border rounded bg-gray-300 items-center p-2 ">
                    <svg class="fill-current text-gray-800 mr-2 w-5" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" width="24" height="24">
                        <path class="heroicon-ui"
                            d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM5.68 7.1A7.96 7.96 0 0 0 4.06 11H5a1 1 0 0 1 0 2h-.94a7.95 7.95 0 0 0 1.32 3.5A9.96 9.96 0 0 1 11 14.05V9a1 1 0 0 1 2 0v5.05a9.96 9.96 0 0 1 5.62 2.45 7.95 7.95 0 0 0 1.32-3.5H19a1 1 0 0 1 0-2h.94a7.96 7.96 0 0 0-1.62-3.9l-.66.66a1 1 0 1 1-1.42-1.42l.67-.66A7.96 7.96 0 0 0 13 4.06V5a1 1 0 0 1-2 0v-.94c-1.46.18-2.8.76-3.9 1.62l.66.66a1 1 0 0 1-1.42 1.42l-.66-.67zM6.71 18a7.97 7.97 0 0 0 10.58 0 7.97 7.97 0 0 0-10.58 0z" />
                    </svg>
                    <input type="text" placeholder="Enter text here..."
                        class="bg-gray-300 max-w-full focus:outline-none text-gray-700" />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">
                <div class="flex border rounded bg-gray-300 items-center p-2 ">
                    <svg class="fill-current text-gray-800 mr-2 w-5" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" width="24" height="24">
                        <path class="heroicon-ui"
                            d="M14 5.62l-4 2v10.76l4-2V5.62zm2 0v10.76l4 2V7.62l-4-2zm-8 2l-4-2v10.76l4 2V7.62zm7 10.5L9.45 20.9a1 1 0 0 1-.9 0l-6-3A1 1 0 0 1 2 17V4a1 1 0 0 1 1.45-.9L9 5.89l5.55-2.77a1 1 0 0 1 .9 0l6 3A1 1 0 0 1 22 7v13a1 1 0 0 1-1.45.89L15 18.12z" />
                    </svg>
                    <input type="text" placeholder="Enter text here..."
                        class="bg-gray-300 max-w-full focus:outline-none text-gray-700" />
                </div>
                <div class="flex border rounded bg-gray-300 items-center p-2 ">
                    <svg class="fill-current text-gray-800 mr-2 w-5" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" width="24" height="24">
                        <path class="heroicon-ui"
                            d="M13.04 14.69l1.07-2.14a1 1 0 0 1 1.2-.5l6 2A1 1 0 0 1 22 15v5a2 2 0 0 1-2 2h-2A16 16 0 0 1 2 6V4c0-1.1.9-2 2-2h5a1 1 0 0 1 .95.68l2 6a1 1 0 0 1-.5 1.21L9.3 10.96a10.05 10.05 0 0 0 3.73 3.73zM8.28 4H4v2a14 14 0 0 0 14 14h2v-4.28l-4.5-1.5-1.12 2.26a1 1 0 0 1-1.3.46 12.04 12.04 0 0 1-6.02-6.01 1 1 0 0 1 .46-1.3l2.26-1.14L8.28 4zm7.43 5.7a1 1 0 1 1-1.42-1.4L18.6 4H16a1 1 0 0 1 0-2h5a1 1 0 0 1 1 1v5a1 1 0 0 1-2 0V5.41l-4.3 4.3z" />
                    </svg>
                    <input type="text" placeholder="Enter text here..."
                        class="bg-gray-300 max-w-full focus:outline-none text-gray-700" />
                </div>
            </div>
        </div>
        <div class="flex justify-center"><button wire:click="buscar()"
                class="p-2 border md:w-1/4 w-full rounded-md bg-gray-800 text-white">Search</button></div>
    </div>
</div>

@push('scripts')
    <script>

    </script>
@endpush
