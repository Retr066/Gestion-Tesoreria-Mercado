<x-app-layout>
    <div class="py-1">
        <h1 class="text-center m-4">Listado de Reportes</h1>
        <div class="max-w-7xl mx-auto text-center sm:px-6 lg:px-8">
            <livewire:table-lote />
        </div>
    </div>
    @push('modals')
        <livewire:lote-modal />
        <livewire:lote-delete-modal />
    @endpush
</x-app-layout>
