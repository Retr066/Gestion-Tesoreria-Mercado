<div>
    <x-modal-layout :tituloModal="$tituloModal" :action="$action" :tituloBoton="$tituloBoton" open="open">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                {{ __('¿Estás seguro de que deseas eliminar tu Informe Anual? Una vez que si eliminas el informe, todos sus recursos y datos se eliminarán permanentemente. Ingrese su contraseña para confirmar que desea eliminar permanentemente el informe.') }}
            </div>
            <div class="w-full px-3">
                <x-jet-input type="password"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    placeholder="{{ __('Password') }}" x-ref="password" wire:model.defer="password"
                    wire:keydown.enter="EliminarAño" />


                <x-jet-input-error for="password" class="mt-2" />
            </div>
        </div>

        </x-modalLayout>
</div>
