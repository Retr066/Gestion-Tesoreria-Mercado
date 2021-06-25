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

        <div class="flex justify-center"><button wire:click="buscar()"
                class="p-2 border md:w-1/4 w-full rounded-md bg-gray-800 text-white">Generar Balance</button></div>
    </div>
</div>
