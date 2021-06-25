<div>

    <x-modal-layout :tituloModal="$tituloModal" :action="$action" open="open" :tituloBoton="$tituloBoton">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Descripcion del Reporte:
                </label>
                <input wire:model="description"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-first-name" type="text" placeholder="Escribir Descripcion" autocomplete="off">
                @error('description') <span class="error text-red-700">{{ $message }}</span> @enderror
            </div>
        </div>


        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Mes al que pertenece el Reporte:
                </label>
                <div class="relative">
                    <select wire:model="mes"
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state">
                        <option value="" selected disabled>Seleccione... </option>
                        @foreach ($meses as $key => $mes)
                            <option value="{{ $key }}">{{ $mes }}</option>
                        @endforeach
                    </select>
                    @error('mes') <span class="error text-red-700">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        </x-modalLayout>
</div>
