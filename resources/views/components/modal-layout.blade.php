<div>
    <x-jet-dialog-modal wire:model="{{ $open }}">

        <x-slot name="title">
            {{ $tituloModal }}
        </x-slot>
        <x-slot name="content">
            {{ $slot }}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cerrarModal" wire:loading.attr="disabled">Cerrar
                </x-jet-secundary-button>

                <x-jet-button wire:click="{{ $action }}" wire:loading.attr="disabled">{{ $tituloBoton }}
                    </x-jet-secundary-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
