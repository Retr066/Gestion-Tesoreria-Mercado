<div>
    <h2 class="text-center text-gray-900 my-3">Registro de Ingresos</h2>
    <hr>
    <form>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Recibo
                </label>
                <input wire:model="ingreso_codigo" onkeypress="nextFocus('input1', 'input2')"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="input1" type="text" placeholder="Ingrese la fecha" autocomplete="off">
                @error('ingreso_codigo') <span class="error text-red-700">{{ $message }}</span> @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Fecha
                </label>
                <input wire:model="ingreso_fecha" onkeypress="nextFocus('input2', 'input4')"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="input2" type="date" placeholder="Doe" autocomplete="off">
                @error('ingreso_fecha') <span class="error text-red-700">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Concepto
                </label>
                <textarea wire:model="ingreso_descripcion"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 resize-none"
                    id="input3" placeholder="Ingresa la Descripcion"></textarea>
                @error('ingreso_descripcion') <span class="error text-red-700">{{ $message }}</span> @enderror

            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                    Tipo
                </label>
                <select wire:model="tipo_importe" onkeypress="nextFocus('input4', 'input5')" id="input4"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="" selected disabled>Seleccione... </option>
                    @foreach ($tipos as $key => $tipo)
                        <option value="{{ $tipo->Descripcion }}">{{ $tipo->Descripcion }}</option>
                    @endforeach
                </select>
                @error('tipo_importe') <span class="error text-red-700">{{ $message }}</span> @enderror
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                    Importe
                </label>
                <input wire:model="ingreso_importe" onkeypress="nextFocus('input5', 'input1')" id="input5"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-city" type="number" placeholder="Ingrese el importe" autocomplete="off">
                @error('ingreso_importe') <span class="error text-red-700">{{ $message }}</span> @enderror
            </div>
        </div>
    </form>
    @if ($open == 'hidden')
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class=" {{ $open2 }} w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <x-jet-button wire:click.prevent="save()" wire:loading.class="opacity-25">Guardar
                    </x-jet-secundary-button>
            </div>
    @endif
    @if ($open == '')


        <div class="{{ $open }} w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <x-jet-button wire:click.prevent="update()" wire:loading.class="opacity-25">Editar</x-jet-secundary-button>
        </div>
    @endif
</div>
</div>
@push('scripts')
    <script>
        function nextFocus(inputF, inputS) {
            document.getElementById(inputF).addEventListener('keydown', function(event) {
                if (event.keyCode == 13) {
                    document.getElementById(inputS).focus();
                }
            });
        }

    </script>
@endpush
