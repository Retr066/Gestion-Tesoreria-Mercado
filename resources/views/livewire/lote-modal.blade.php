<div>
    <x-modal-layout :tituloModal="$tituloModal" :action="$action" :tituloBoton="$tituloBoton" open="open">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Seleccione su Año:
                </label>
                <select wire:model="año"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    placeholder="Eliga el Año">
                    <option value="" selected disabled>Seleccione... </option>

                    <?php for ($year = (int) date('Y'); 2100 >= $year; $year++): ?>
                    <option value="<?= $year ?>"><?= $year ?></option>
                <?php endfor; ?>
                </select>
                @error('año') <span class="error text-red-700">{{ $message }}</span> @enderror
            </div>
        </div>
        </x-modalLayout>
</div>
